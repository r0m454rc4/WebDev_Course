// Schema.js

const typeDefs = `#graphql
  type Alumne {
    codi: ID!
    nom: String
  }

  type Query {
    obtenirAlumne(codi: ID!): Alumne
    obtenirAlumnes: [Alumne]
  }

  type Mutation {
    afegirAlumne(nom: String): Alumne
    modificarAlumne(codi: ID!, nom: String): Alumne
    esborrarAlumne(codi: ID!): Int
  }
`;

module.exports = { typeDefs };
