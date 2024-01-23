/*
 * Servidor amb NodeJS que utilitza comunicacions amb WebSockets
 * @author  sergi.grau@fje.edu
 * @version 2.0 19.02.2016
 * format del document UTF-8
 *
 * CHANGELOG
 * 19.02.2016
 * - Servidor amb NodeJS que utilitza comunicacions amb WebSockets
 *
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes el Clot
 */

const express = require("express");
const fs = require("fs");
const https = require("https");
const app = express();
const io = require("socket.io")(https);

app.use(require("express").static("public"));

app.set("views", __dirname + "/views");
app.set("view engine", "jade");
app.engine("jade", require("jade").__express);
app.get("/", function (req, res) {
  res.render("index_https");
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

io.sockets.on("connection", function (socket) {
  socket.emit("missatge", { missatge: "Benvingut" });
  socket.on("enviar", function (data) {
    io.sockets.emit("missatge", data);
  });
});
