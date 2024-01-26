/**
  query{
    obtenirDau(numCares: 12){
      numCares
      tirarUnCop
      tirarDiversosCops(numTirades: 8)
    }
  }
 */

const express = require("express");
const { graphqlHTTP } = require("express-graphql");
const { buildSchema } = require("graphql");

// schema de GraphQL, ! vol dir que NO POT SER NULL
const esquema = buildSchema(`#graphql
  type DauAleatori {
    numCares: Int!
    tirarUnCop: Int!
    tirarDiversosCops(numTirades: Int!): [Int]
  }

  type Query {
    obtenirDau(numCares: Int):DauAleatori
  }
`);

// aquesta arrel té una funció per a cada endpoint de l'API
const arrel = {
  obtenirDau: ({ numCares: numCares }) => {
    // I return an on object of DauAleatori.
    return new DauAleatori(numCares || 6);
  },
};

const app = express();
app.use(express.static("public"));
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

// The nome of the closs must be the same name as the schema.
class DauAleatori {
  constructor(numCares) {
    this.numCares = numCares;
  }

  tirarUnCop() {
    return 1 + Math.floor(Math.random() * this.numCares);
  }

  tirarDiversosCops({ numTirades }) {
    var sortida = [];

    for (var i = 0; i < numTirades; i++) {
      sortida.push(this.tirarUnCop());
    }

    return sortida;
  }
}
