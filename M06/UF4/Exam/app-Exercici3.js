const app = require("express")();
const http = require("http").Server(app);
const io = require("socket.io")(http);

app.get("/", (req, res) => {
  res.sendFile(__dirname + "/Exercici3.html");
});

io.on("connection", (socket) => {
  console.log("Usuari connectat");
  socket.on("disconnect", () => {
    console.log("Usuari desconnectat");
  });

  socket.maxConnections = 2;

  socket.on("dadesDesDelClient", function (data) {
    console.log(
      `SERVIDOR -> dades rebudes del client-> x:${data.x}, y:${data.y}`
    );

    socket.emit("dadesDesDelServidor", `x:${data.x}, y:${data.y}`);
  });
});

http.listen(8888, () => {
  console.log("Servidor iniciat a http://localhost:8888");
});
