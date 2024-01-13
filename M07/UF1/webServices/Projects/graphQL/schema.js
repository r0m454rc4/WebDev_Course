// Schema.js

const typeDefs = `#graphql
  # This is the entry point of the query.
  type Query {
    iniciarJoc(codiPartida: ID!): String
    obtenirCarta(codiPartida: ID!, numJug: Int!): String
    mostrarCartes(codiPartida: ID!, numJug: Int!): String
  }

  # This is to be able to submit or update data.
  type Mutation {
    tirarCarta(codiPartida: ID!, numJug: Int!, carta: Int!): String
    moureJugadorAposta(codiPartida: ID!, numJug: Int!, quantitatApostada: Int!): String
    moureJugadorPassa(codiPartida: ID!, numJug: Int!): String
    acabarJoc(codiPartida: ID!): String
  }
`;

// Here I export the module.
module.exports = { typeDefs };
