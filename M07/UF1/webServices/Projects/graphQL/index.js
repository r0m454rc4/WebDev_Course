/**
 * Card game, 7 & 1/2.
 *
 * @author roma.sarda.casellas373@gmail.com
 * @version 1.0.
 * @date 12.01.24.
 */

const express = require("express");
const { graphqlHTTP } = require("express-graphql");
const { buildSchema } = require("graphql");

// Types.
const { typeDefs } = require("./schema");
const esquema = buildSchema(typeDefs);

// aquesta arrel té una funció per a cada endpoint de l'API

const alumnes = [
  { codi: "1", nom: "SERGI" },
  { codi: "2", nom: "ANNA" },
  { codi: "3", nom: "JOAN" },
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
  afegirAlumne: ({ nom }) => {
    // crea un codi aleatori
    let codi = require("crypto").randomBytes(10).toString("hex");
    let alumne = new Alumne(codi, nom);
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
  constructor(codi, nom) {
    this.codi = codi;
    this.nom = nom;
  }
}
