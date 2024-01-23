/*
 * Servidor amb ExpressJS amb HTTPS
 * @author  sergi.grau@fje.edu
 * @version 1.0 01.06.2020
 * format del document UTF-8
 *
 * CHANGELOG
 *
 * NOTES
 * atenció no funciona amb Chrome + Catalina
 * openssl req -nodes -new -x509 -keyout server.key -out server.cert
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes el Clot
 */

const express = require("express");
const fs = require("fs");
const https = require("https");
const app = express();

app.get("/", function (req, res) {
  res.send("hola HTTPS");
});

https
  .createServer(
    {
      key: fs.readFileSync("server.key"),
      cert: fs.readFileSync("server.cert"),
    },
    app
  )
  .listen(3000, function () {
    console.log("Exemple https://localhost:3000/");
  });
