// http://localhost:8888/notes?nota=5&nota=10&nota=7

var http = require("http");
var url = require("url");

function iniciar() {
  function onPeticio(req, res) {
    const baseURL = req.protocol + "://" + req.headers.host + "/";
    const reqUrl = new URL(req.url, baseURL);

    var consulta = reqUrl.searchParams;
    console.log(consulta);

    let mitja = 0,
      i = 0;

    if (reqUrl.pathname == "/notes") {
      res.writeHead(200, {
        "Content-Type": "text/plain; charset=utf-8",
      });

      consulta.forEach(function (valor, clau) {
        if (clau == "nota") {
          // If the name of the key is "nota".
          mitja += parseInt(valor);
          i++;
        }
      });
    } else {
      res.writeHead(404, {
        "Content-Type": "text/plain; charset=utf-8",
      });
    }

    res.write(`La mitja és <b> ${(mitja / i).toFixed(2)} </b>`);
    res.end();
  }

  http.createServer(onPeticio).listen(8888);
  console.log("Servidor iniciat.");
}

exports.iniciar = iniciar;
