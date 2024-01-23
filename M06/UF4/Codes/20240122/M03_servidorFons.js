/*
 * Servidor amb NodeJS que utilitza comunicacions amb WebSockets
 * Utilitza la biblioteca socket.io i mostra com utilitzar broascasting,
 * que envia un missatge a tothom menys a aquell que ha iniciat el sòcol
 * @author  sergi.grau@fje.edu
 * @version 2.0 02.03.2016
 * format del document UTF-8
 *
 * CHANGELOG
 * 02.03.2016
 * - Servidor amb NodeJS que utilitza comunicacions amb WebSockets
 *
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes el Clot
 */
const app = require("http").createServer(onRequest);
const io = require("socket.io")(app);

const fs = require("fs");
const url = require("url");

console.log("servidor iniciat");
app.listen(8888);

function onRequest(req, res) {
  var pathname = url.parse(req.url).pathname;
  if (pathname == "/") {
    fs.readFile(__dirname + "/M03_fons.html", function (err, data) {
      if (err) {
        res.writeHead(500);
        return res.end("Error carregant pàgina");
      }
      res.writeHead(200);
      res.end(data);
    });
  } else if (pathname == "/M03_fons.js") {
    fs.readFile(__dirname + "/M03_fons.js", function (err, data) {
      if (err) {
        res.writeHead(500);
        return res.end("Error carregant pàgina");
      }
      res.writeHead(200);
      res.end(data);
    });
  } else {
    res.writeHead(404, {
      "Content-Type": "text/html; charset=utf-8",
    });
    sortida = "404 NOT FOUND";
    res.write(sortida);
    res.end();
  }
}

function enviarMissatges(socket, data) {
  socket.emit("rgb", {
    r: data.r,
    g: data.g,
    b: data.b,
  });
  socket.broadcast.emit("rgb", {
    r: data.r,
    g: data.g,
    b: data.b,
  });
}
// io.on = data recieved by the server.
io.on("connection", function (socket) {
  // If i get some data that is "r", "g" or "b".
  socket.on("r", function (data) {
    console.log("SERVIDOR -> dades rebudes del client->" + data.r);
    enviarMissatges(socket, data);
  });
  socket.on("g", function (data) {
    console.log("SERVIDOR -> dades rebudes del client->" + data.g);
    enviarMissatges(socket, data);
  });
  socket.on("b", function (data) {
    console.log("SERVIDOR -> dades rebudes del client->" + data.b);
    enviarMissatges(socket, data);
  });
});
