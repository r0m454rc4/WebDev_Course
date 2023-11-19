// http://localhost:8888/notes?nota=5&nota=10&nota=7

let http = require("http");

function iniciar() {
  function onPeticio(req, res) {
    const baseURL = req.protocol + "://" + req.headers.host + "/";
    const reqUrl = new URL(req.url, baseURL);

    var consulta = reqUrl.searchParams;
    console.log(consulta);

    let mitja = 0,
      i = 0;

    // If I enter /notes as a path.
    if (reqUrl.pathname == "/notes") {
      res.writeHead(200, {
        "Content-Type": "text/plain; charset=utf-8",
      });

      consulta.forEach(function (valor, clau) {
        if (clau == "nota") {
          // If the name of the key is "nota", I will enter.

          mitja += parseInt(valor);
          i++;
        }
      });

      res.write(`La mitja és <b> ${(mitja / i).toFixed(2)} </b>`);
    } else {
      res.writeHead(404, {
        "Content-Type": "text/plain; charset=utf-8",
      });
      res.write("Has d'introduïr una URL vàlida.");
    }

    res.end();
  }

  http.createServer(onPeticio).listen(8888);
  console.log("Servidor iniciat.");
}

exports.iniciar = iniciar;
