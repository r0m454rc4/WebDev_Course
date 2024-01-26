const express = require("express");
const { graphqlHTTP } = require("express-graphql");
const { buildSchema } = require("graphql");

/*
Exemple CRUD amb Alumnes
sergi.grau@fje.edu
20.12.20 versio 1

query {
  obtenirAlumnes {
    codi
    nom
  }
}

query {
  obtenirAlumne(codi:"2") {
    codi
    nom
  }
}

mutation {
  esborrarAlumne(codi:"1")
  afegirAlumne(nom:"PERE") {
    codi
    nom
  }
}

mutation {
  modificarAlumne(codi:"3", nom:"sergi") {
    codi
    nom
  }
}
*/

const esquema = buildSchema(`#graphql
  type Alumne {
    codi: ID!
    nom: String
    nota: Float
  }

  type Query {
    obtenirAlumne(codi: ID!): Alumne
    obtenirAlumnes: [Alumne]
    calcularMitjana(): Float
  }

  type Mutation {
    afegirAlumne(nom: String, nota: Float): Alumne
    modificarAlumne(codi: ID!, nom: String, nota: Float): Alumne
    esborrarAlumne(codi: ID!): Int
  }
`);

// aquesta arrel té una funció per a cada endpoint de l'API

const alumnes = [
  { codi: "1", nom: "SERGI", nota: 5 },
  { codi: "2", nom: "ANNA", nota: 10 },
  { codi: "3", nom: "JOAN", nota: 7.5 },
];

const arrel = {
  obtenirAlumnes() {
    return alumnes;
  },
  obtenirAlumne: ({ codi }) => {
    let alumne = alumnes.find((a) => a.codi == codi);
    if (!alumne) throw new Error("cap Alumne amb codi " + codi);
    return alumne;
  },
  afegirAlumne: ({ nom, nota }) => {
    // crea un codi aleatori
    let codi = require("crypto").randomBytes(10).toString("hex");
    let alumne = new Alumne(codi, nom, nota);
    alumnes.push(alumne);
    return alumne;
  },
  modificarAlumne: ({ codi, nom }) => {
    let alumne = alumnes.find((a) => a.codi == codi);
    alumne.nom = nom;
    return alumne;
  },
  esborrarAlumne: ({ codi }) => {
    let alumne = alumnes.find((a) => a.codi === codi);
    let index = alumnes.indexOf(alumne);
    alumnes.splice(index, 1);
  },
  calcularMitjana: () => {
    let suma = 0;
    alumnes.forEach((a) => (suma += a.nota));
    return suma / alumnes.length;
  },
};

const app = express();
app.use(
  "/graphql",
  graphqlHTTP({
    schema: esquema,
    rootValue: arrel,
    graphiql: true,
  })
);
app.listen(4000);
console.log("Executant servidor GraphQL API a http://localhost:4000/graphql");

//Classe que representa un Alumne
class Alumne {
  constructor(codi, nom, nota) {
    this.codi = codi;
    this.nom = nom;
    this.nota = nota;
  }
}
