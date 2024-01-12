// http://localhost:4000/m02-ConsultaBasicaClient.html

fetch("/graphql", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },

  // JSON.stringify is to convert it to string.
  // query is an object.
  body: JSON.stringify({ query: "{ salutacions, curs }" }),
})
  .then((r) => r.json())
  .then((data) => console.log("Dades obtingudes:", data));
