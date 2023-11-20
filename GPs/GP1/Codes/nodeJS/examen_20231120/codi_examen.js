let http = require("http");
let fs = require("fs");
// let puppeteer = require("puppeteer");

function iniciar() {
  function onRequest(req, res) {
    const baseURL = req.protocol + "://" + req.headers.host + "/";
    const reqUrl = new URL(req.url, baseURL);
    console.log("Petició per a  " + reqUrl.pathname + " rebuda.");

    if (reqUrl.pathname == "/") {
      // If I ask /.

      // fs.readFile is to read pagina.html.
      fs.readFile("index.html", function (err, sortida) {
        res.writeHead(200, {
          // As I return an html, the MIME must be "text/html".
          "Content-Type": "text/html; charset=utf-8",
        });

        // console.log(sortida);
        res.write(sortida);
        res.end();
      });

      // document.getElementById("producte_seleccionat");
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
