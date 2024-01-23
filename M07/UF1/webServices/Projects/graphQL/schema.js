const typeDefs = `#graphql
  # EstatPartida is an union that will return a boolean, a string... depending on the sitation.
  union EstatPartida = ResultatBoolea | ResultatString

  type ResultatBoolea {
    partidaIniciada: Boolean!
  }

  type ResultatString {
    missatgeError: String!
  }

  type Query {
    iniciarJoc(codiPartida: ID!): EstatPartida
    obtenirCarta(codiPartida: ID!, numJug: Int!): String
    mostrarCartes(codiPartida: ID!, numJug: Int!): String
  }

  type Mutation {
    tirarCarta(codiPartida: ID!, numJug: Int!, carta: Int!): String
    moureJugadorAposta(codiPartida: ID!, numJug: Int!, quantitatApostada: Int!): String
    moureJugadorPassa(codiPartida: ID!, numJug: Int!): String
    acabarJoc(codiPartida: ID!): EstatPartida
  }
`;

// Here I export the module.
module.exports = { typeDefs };
