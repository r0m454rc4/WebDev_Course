/**
 * Back-end amb graphql, que mostra com s'utilitzen els tipus bàsics
 * @author sergi.grau@fje.edu
 * @version 1.0 13.12.20
 */

/*
  query{
    aleatori
    citaDelDia
    llencem3copsUnDau
  }
*/

const express = require("express");
const { graphqlHTTP } = require("express-graphql");
const { buildSchema } = require("graphql");

// schema de GraphQL
const esquema = buildSchema(`#graphql
  type Query {
    citaDelDia: String
    # Float! is to return always something.
    aleatori: Float!
    llencem3copsUnDau: [Int]
    llencem5copsUnDau: [Int]
  }
`);

// aquesta arrel té una funció per a cada endpoint de l'API
const arrel = {
  citaDelDia: () => {
    return Math.random() < 0.5
      ? "cal estudiar més GraphQL"
      : "cal practicar més GraphQL";
  },
  aleatori: () => {
    return Math.random();
  },
  llencem3copsUnDau: () => {
    // Array of thee elements, in order to throw three dices.
    return [1, 2, 3].map((_) => 1 + Math.floor(Math.random() * 6));
  },
  llencem3copsUnDau: () => {
    // Array of thee elements, in order to throw three dices.
    return [1, 2, 3, 4, 5].map((_) => 1 + Math.floor(Math.random() * 6));
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
