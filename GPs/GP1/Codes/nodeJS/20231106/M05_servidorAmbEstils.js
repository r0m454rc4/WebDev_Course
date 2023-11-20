let http = require("http");
let fs = require("fs");
let puppeteer = require('puppeteer');

function iniciar() {
  const browser = puppeteer.launch();

  function onRequest(req, res) {
    const baseURL = req.protocol + "://" + req.headers.host + "/";
    const reqUrl = new URL(req.url, baseURL);
    console.log("Petició per a  " + reqUrl.pathname + " rebuda.");

    let consulta = reqUrl.searchParams;
    let suma = 0,
      i = 0;
    if (reqUrl.pathname == "/mitjana") {
      // http://localhost:8888/mitjana?nota=5?&nota=10

      consulta.forEach(function (valor, clau) {
        if (clau == "nota") {
          suma += parseInt(valor);
          i++;
        }
      });

      res.write(`La mitjana obtinguda equival a: ${(suma / i).toFixed(2)} `);
      res.end();
    } else if (reqUrl.pathname == "/pagina") {
      // If I ask for pagina.

      // fs.readFile is to read pagina.html.
      fs.readFile("pagina.html", function (err, sortida) {
        res.writeHead(200, {
          // As I return an html, the MIME must be "text/html".
          "Content-Type": "text/html; charset=utf-8",
        });

        getElement
        // console.log(sortida);
        res.write(sortida);
        res.end();
      });
    }
    // As pagina.html asks for style.css, because is linked on the html, I need to manually add the request.
    else if (reqUrl.pathname == "/styles/style.css") {
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
      // If I don't ask for any of the pages that were before, I send "Not found".

      res.writeHead(404, {
        "Content-Type": "text/html; charset=utf-8",
      });
      res.write("Not found");
      res.end();
    }
  }

  http.createServer(onRequest).listen(8888);
  console.log("Servidor iniciat.");
}

exports.iniciar = iniciar;
