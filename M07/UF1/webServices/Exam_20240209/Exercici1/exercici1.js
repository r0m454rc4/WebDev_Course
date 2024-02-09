/**
 * Full REST application.
 * @author roma.sarda.casellas373@gmail.com
 */

const express = require("express");
const { graphqlHTTP } = require("express-graphql");
const { buildSchema } = require("graphql");

/*
  query AfegirDispositiu {
      afegirDispositiu(IP: "10.20.1.5", nom: "hola", actiu: true) {
          IP
          nom
          actiu
      }
  }

  query ConsultarDispositiu {
      consultarDispositiu(IP: "10.20.1.5") {
          IP
          nom
          actiu
      }
  }

  query ConsultarDispositius {
      consultarDispositius {
          IP
          nom
          actiu
      }
  }

  mutation EsborrarDispositiu {
      esborrarDispositiu(IP: "10.20.1.5") {
          IP
          nom
          actiu
      }
  }
*/

const esquema = buildSchema(`#graphql
  type Dispositiu {
    IP: String!
    nom: String!
    actiu: Boolean!
  }

  type Query {
    afegirDispositiu(IP: String, nom: String, actiu: Boolean): Dispositiu
    consultarDispositiu(IP: String!): Dispositiu
    consultarDispositius: [Dispositiu]
  }

  type Mutation {
    esborrarDispositiu(IP: String!): Dispositiu
  }
`);

const dispositius = [];

const arrel = {
  afegirDispositiu: ({ IP, nom, actiu }) => {
    let dispositiu = new Dispositiu(IP, nom, actiu);
    dispositius.push(dispositiu);
    return dispositiu;
  },
  esborrarDispositiu: ({ IP }) => {
    let dispositiu = dispositius.find((d) => d.IP == IP);
    let index = dispositius.indexOf(dispositiu);
    dispositius.splice(index, 1);
  },
  consultarDispositiu: ({ IP }) => {
    let dispositiu = dispositius.find((d) => d.IP == IP);
    if (!dispositiu) throw new Error("Cap dispositiu amb IP " + IP);
    return dispositiu;
  },
  consultarDispositius() {
    return dispositius;
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

class Dispositiu {
  constructor(IP, nom, actiu) {
    this.IP = IP;
    this.nom = nom;
    this.actiu = actiu;
  }
}
