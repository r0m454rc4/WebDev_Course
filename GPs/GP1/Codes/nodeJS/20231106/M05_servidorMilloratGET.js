let http = require("http");
let fs = require("fs");

function iniciar() {
  function onRequest(req, res) {
    const baseURL = req.protocol + "://" + req.headers.host + "/";
    const reqUrl = new URL(req.url, baseURL);
    console.log("Petició per a  " + reqUrl.pathname + " rebuda.");

    let consulta = reqUrl.searchParams;
    let suma = 0,
      i = 0;
    if (reqUrl.pathname == "/mitjana") {
      consulta.forEach(function (valor, clau) {
        if (clau == "nota") {
          suma += parseInt(valor);
          i++;
        }
      });
      res.write(`la mitjana és  ${(suma / i).toFixed(2)} `);
      res.end();
    } else if (reqUrl.pathname == "/pagina.html") {
      fs.readFile("pagina.html", function (err, sortida) {
        res.writeHead(200, {
          "Content-Type": "text/html; charset=utf-8",
        });
        console.log(+sortida);
        res.write(sortida);
        res.end();
      });
    } else if (reqUrl.pathname == "/styles/style.css") {
      fs.readFile("./styles/style.css", function (err, sortida) {
        res.writeHead(200, {
          "Content-Type": "text/css; charset=utf-8",
        });
        res.write(sortida);
        res.end();
      });
    } else if (reqUrl.pathname == "/imatge.jpg") {
      fs.readFile("imatge.jpg", function (err, sortida) {
        res.writeHead(200, {
          "Content-Type": "image/jpeg; charset=utf-8",
        });
        res.write(sortida);
        res.end();
      });
    } else if (reqUrl.pathname == "/favicon.ico") {
      fs.readFile("favicon.ico", function (err, sortida) {
        res.writeHead(200, {
          "Content-Type": "image/vnd.microsoft.icon; charset=utf-8",
        });
        res.write(sortida);
        res.end();
      });
    } else {
      res.writeHead(404, {
        "Content-Type": "text/html; charset=utf-8",
      });
      res.write("not found");
      res.end();
    }
  }

  http.createServer(onRequest).listen(8888);
  console.log("Servidor iniciat.");
}

exports.iniciar = iniciar;
