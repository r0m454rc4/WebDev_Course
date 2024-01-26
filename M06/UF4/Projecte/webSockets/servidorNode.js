const app = require("http").createServer(onRequest);
const io = require("socket.io")(app);
const port = 8888;

var fs = require("fs");

function onRequest(req, res) {
  const baseURL = req.protocol + "://" + req.headers.host + "/";
  const reqUrl = new URL(req.url, baseURL);

  if (reqUrl.pathname == "/") {
    fs.readFile(__dirname + "/index.html", function (err, data) {
      if (err) {
        res.writeHead(500);
        return res.end("Error carregant pàgina");
      }
      res.writeHead(200);
      res.end(data);
    });
  } else if (reqUrl.pathname == "/Assets/Styles/Style.css") {
    fs.readFile(__dirname + "/Assets/Styles/Style.css", function (err, data) {
      if (err) {
        res.writeHead(500);
        return res.end("Error carregant pàgina");
      }
      res.writeHead(200);
      res.end(data);
    });
  } else if (reqUrl.pathname == "/index.js") {
    fs.readFile(__dirname + "/index.js", function (err, data) {
      if (err) {
        res.writeHead(500);
        return res.end("Error carregant pàgina");
      }
      res.writeHead(200);
      res.end(data);
    });
  } else if (reqUrl.pathname == "/Assets/Images/Marvel-Logo.png") {
    fs.readFile(
      __dirname + "/Assets/Images/Marvel-Logo.png",
      function (err, data) {
        if (err) {
          res.writeHead(500);
          return res.end("Error carregant pàgina");
        }
        res.writeHead(200);
        res.end(data);
      }
    );
  } else {
    res.writeHead(404, {
      "Content-Type": "text/html; charset=utf-8",
    });
    sortida = "404 NOT FOUND";
    res.write(sortida);
    res.end();
  }
}

io.on("connection", (socket) => {
  console.log("Usuari connectat");

  socket.on("disconnect", () => {
    console.log("Usuari desconnectat");
  });

  socket.on("obtenirLogoSuperHeroi", async function (data) {
    let url = `https://gateway.marvel.com:443/v1/public/characters?ts=${data.hora}&apikey=${data.clauApiPublica}&hash=${data.clauHash}`;

    let resposta = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    let dataResposta = await resposta.json();

    // console.log(`Resposta: ${JSON.stringify(dataResposta)}`);
    socket.emit("dadesDesDelServidor_obtenirLogoSuperHeroi", dataResposta);
  });

  socket.on("obtenirComics", async function (data) {
    let url = `https://gateway.marvel.com:443/v1/public/comics?characters=1011334%2C1017100%2C1009144%2C1010699%2C1009146%2C1016823%2C1009148%2C1009149%2C1010903%2C1011266&orderBy=title&limit=21&ts=${data.hora}&apikey=${data.clauApiPublica}&hash=${data.clauHash}`;

    let resposta = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    let dataResposta = await resposta.json();

    // console.log(`Resposta: ${JSON.stringify(dataResposta)}`);
    socket.emit("dadesDesDelServidor_obtenirComics", dataResposta);
  });

  socket.on("obtenirComicsSuperHeroi", async function (data) {
    let url = `https://gateway.marvel.com:443/v1/public/characters/${data.idSuperHeroi}/comics?orderBy=title&ts=${data.hora}&apikey=${data.clauApiPublica}&hash=${data.clauHash}`;

    let resposta = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    let dataResposta = await resposta.json();
    // console.log(dataResposta);

    // console.log(`Resposta: ${JSON.stringify(dataResposta)}`);
    socket.emit("dadesDesDelServidor_obtenirComicsSuperHeroi", dataResposta);
  });

  socket.on("obtenirDetallsComic", async function (data) {
    let url = `https://gateway.marvel.com:443/v1/public/comics/${data.idComic}?orderBy=title&ts=${data.hora}&apikey=${data.clauApiPublica}&hash=${data.clauHash}`;

    let resposta = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    let dataResposta = await resposta.json();
    // console.log(dataResposta);

    // console.log(`Resposta: ${JSON.stringify(dataResposta)}`);
    socket.emit("dadesDesDelServidor_obtenirDetallsComic", dataResposta);
  });
});

app.listen(port);
console.log(`Servidor iniciat a http://localhost:${port}`);
