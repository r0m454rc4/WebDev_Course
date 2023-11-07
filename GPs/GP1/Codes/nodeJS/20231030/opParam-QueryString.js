// http://localhost:8888/suma?n1=2&n2=7
// http://localhost:8888/resta?n1=1&n2=4

var http = require("http");
var url = require("url");

function iniciar() {
  function onPeticio(req, res) {
    const baseURL = req.protocol + "://" + req.headers.host + "/";
    const reqUrl = new URL(req.url, baseURL);

    let n1 = reqUrl.searchParams.get("n1");
    let n2 = reqUrl.searchParams.get("n2");
    let ruta = reqUrl.pathname; // reqUrl.pathname is to get the if is "suma" or "resta".
    let resultat = 0;

    if (ruta == "/suma") {
      res.writeHead(200, {
        "Content-Type": "text/plain; charset=utf-8",
      });

      resultat = parseInt(n1) + parseInt(n2);
    } else if (ruta == "/resta") {
      res.writeHead(200, {
        "Content-Type": "text/plain; charset=utf-8",
      });

      resultat = parseInt(n1) - parseInt(n2);
    } else {
      res.writeHead(404, {
        "Content-Type": "text/plain; charset=utf-8",
      });
    }

    res.write("El resultat és <b>" + resultat + "</b>");
    res.end();
  }

  http.createServer(onPeticio).listen(8888);
  console.log("Servidor iniciat.");
}

exports.iniciar = iniciar; // exports.iniciar is to export the function iniciar().
