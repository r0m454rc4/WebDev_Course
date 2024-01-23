/*
 * Servidor amb node amb HTTP2
 * @author  sergi.grau@fje.edu
 * @version 1.0 01.06.2020
 * format del document UTF-8
 *
 * CHANGELOG
 *
 * NOTES
 * openssl req -x509 -newkey rsa:2048 -nodes -sha256 -subj '/CN=localhost'   -keyout localhost-privkey.pem -out localhost-cert.pem
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes el Clot
 */

const http2 = require("http2");
const fs = require("fs");

const server = http2.createSecureServer({
  key: fs.readFileSync("localhost-privkey.pem"),
  cert: fs.readFileSync("localhost-cert.pem"),
});
server.on("error", (err) => console.error(err));

server.on("stream", (stream, headers) => {
  // stream is a Duplex
  stream.respond({
    "content-type": "text/html; charset=utf-8",
    ":status": 200,
  });
  stream.end("<h1>Hello World</h1>");
});

server.listen(8443);
