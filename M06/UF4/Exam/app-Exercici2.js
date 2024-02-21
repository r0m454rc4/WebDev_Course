const app = require("express")();
const http = require("http").Server(app);

app.get("/", (req, res) => {
  res.sendFile(__dirname + "/Exercici2.html");
});
app.get("/ciutats", (req, res) => {
  res.sendFile(__dirname + "/Exercici2.json");
});

http.listen(8888, () => {
  console.log("Servidor iniciat a http://localhost:8888");
});
