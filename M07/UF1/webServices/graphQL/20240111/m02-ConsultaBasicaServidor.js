/**
 * http://localhost:4000/m02-ConsultaBasicaClient.html
 */

const express = require("express");
const { graphqlHTTP } = require("express-graphql");
const { buildSchema } = require("graphql");

// schema de GraphQL
const esquema = buildSchema(`
  type Query {
    salutacions: String
    curs: String
  }
`);

/**
 * query{
  salutacions,
  curs
}
 */
const arrel = {
  salutacions: () => {
    return "Hola Món!";
  },

  curs: () => {
    return "DAW2!";
  },
};

const app = express();
// app.use(express.static("public")); is to be able to use it as a web server.
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
