/**
 * http://localhost:4000/graphql
 * query { salutacions }
 */

const express = require("express");
const { graphqlHTTP } = require("express-graphql");
const { buildSchema } = require("graphql");

// schema of GraphQL, this is to specify what the server will do. it's the structure.
const esquema = buildSchema(
  // I ask for salutacions, which is property that returns a string.
  `
  type Query {
    salutacions: String
  }
`
);

// aquesta arrel té una funció per a cada endpoint de l'API
const arrel = {
  salutacions: () => {
    return "Hola Món!";
  },
};

const app = express();
app.use(
  "/graphql",
  graphqlHTTP({
    schema: esquema,
    rootValue: arrel,
    // graphiql: true, is to be able to test it on the web.
    graphiql: true,
  })
);

app.listen(4000);
console.log("Executant servidor GraphQL API a http://localhost:4000/graphql");
