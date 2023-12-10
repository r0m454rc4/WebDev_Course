let http = require("http");
let fs = require("fs");

let llistaProductes = [];

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

        // productes.push(document.getElementById("seleccioProducte"));
        console.log(sortida);
        res.write(sortida);
        res.end();
      });
    } else if (reqUrl.pathname == "/compra") {
      let consultaDemanada = reqUrl.searchParams; // This is because I'm sending the data using get, this is stored on the searchParams.

      if (consultaDemanada.get("consulta") == "compra") {
        console.log("COMPRA");

        // producte is the selected option in the form.

        let producte = consultaDemanada.get("producte");
        let quantitatProductes = consultaDemanada.get("quantitatProductes");

        for (let i = 0; i < quantitatProductes; i++) {
          llistaProductes.push(producte);
        }

        console.log(
          `Quantitat de productes seleccionats: ${quantitatProductes}`
        );
        console.log(`Producte seleccionat: ${producte}`);
        console.log(`Llista de productes ${llistaProductes}`);

        fs.readFile("index.html", function (err, sortida) {
          res.writeHead(200, {
            "Content-Type": "text/html; charset=utf-8",
          });

          // console.log(sortida);
          res.write(sortida);
          res.end();
        });
      } else if (consultaDemanada.get("consulta") == "tramita") {
        console.log("TRAMITA");

        fs.readFile("tramita.html", function (err, sortida) {
          res.writeHead(200, {
            "Content-Type": "text/html; charset=utf-8",
          });

          if (llistaProductes.length == 0) {
            sortida += "No hi ha cap producte a la cistella.";
          }

          llistaProductes.forEach((producte) => {
            sortida += `<li class="list-group-item">${producte}</li>`;
          });

          res.write(sortida);
          res.end();
        });
      }
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
