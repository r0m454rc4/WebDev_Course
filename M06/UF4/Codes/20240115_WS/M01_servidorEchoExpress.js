/*
 * Servidor amb ExpressJS que utilitza comunicacions amb WebSockets
 * @author  sergi.grau@fje.edu
 * @version 1.0 24.03.2021
 * format del document UTF-8
 *
 * CHANGELOG
 * @version 1.0 24.03.2021
 * - Servidor amb ExpressJS que utilitza comunicacions amb WebSockets
 *
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes el Clot
 */
const app = require("express")();
const http = require("http").Server(app);
const io = require("socket.io")(http);

app.get("/", (req, res) => {
  res.sendFile(__dirname + "/M01_echo.html");
});
app.get("/M01_echo.js", (req, res) => {
  res.sendFile(__dirname + "/M01_echo.js");
});

io.on("connection", (socket) => {
  console.log("usuari connectat");
  socket.on("disconnect", () => {
    console.log("usuari desconnectat");
  });
  socket.emit("dadesDesDelServidor", { dades: "ABC" });
  socket.on("dadesDesDelClient", function (data) {
    console.log("SERVIDOR -> dades rebudes del client->" + data.dades);
  });
});

http.listen(3000, () => {
  console.log("escoltant en *:3000");
});
