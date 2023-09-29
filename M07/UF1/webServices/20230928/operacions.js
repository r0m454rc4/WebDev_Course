const express = require("express");
const app = express();

app.use(express.urlencoded({ extended: true })); // In order to code the url.
app.use(express.json()); // per analitzar les peticions HTTP que portin JSON al body

app.put("/daw2/sumar/:n1/:n2", (req, res) => {
  let n1 = parseInt(req.params.n1); // In order to convert it to a number
  let n2 = req.params.n2 * 1; // The multiplication is to convert the string to a number without using parseInt.
  let resultat = "El resultat és " + (n1 + n2);
  // let resultat = String(n1 + n2);

  res.send(resultat); // I cannot send a number, is mandatory to use a string.
});

app.listen(3000, () => console.log("inici servidor"));
