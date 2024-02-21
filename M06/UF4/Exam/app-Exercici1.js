const app = require("express")();
const http = require("http").Server(app);

app.get("/", (req, res) => {
  res.sendFile(__dirname + "/Exercici1.html");
});
app.get("/ciutats", (req, res) => {
  res.sendFile(__dirname + "/Exercici1.xml");
});

http.listen(8888, () => {
  console.log("Servidor iniciat a http://localhost:8888");
});
