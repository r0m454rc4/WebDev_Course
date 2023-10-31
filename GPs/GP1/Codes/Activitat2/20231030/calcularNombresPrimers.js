// http://localhost:8888/calcularNombresPrimers?quantitat=20

let http = require("http");
var url = require("url");

http
  .createServer(function (req, response) {
    const baseURL = req.protocol + "://" + req.headers.host + "/";
    const reqUrl = new URL(req.url, baseURL);

    let ventallNumeros = parseInt(reqUrl.searchParams.get("quantitat"));

    let generarNombresPrimers = () => {
      let bEsprimer = false;

      if (reqUrl.pathname == "/calcularNombresPrimers") {
        response.writeHead(200, { "Content-Type": "text/html; charset=utf-8" });

        response.write("<table border='1'>");

        for (let i = 0; i <= ventallNumeros; i++) {
          if (i <= 1) {
            bEsprimer = false;
          } else if (i == 2) {
            bEsprimer = true;
          } //else if (i % 1 == 0 && 1 % i == 0) {
          //   bEsprimer = true;
          // }
          else if (i % i == 0 || i % 1 == 1) {
            bEsprimer = false;
          } else {
            bEsprimer = true;
          }

          response.write(
            `<tr><td>És el número <b>${i}</b> primer: <b>${bEsprimer}</b></td></tr>`
          );
          // console.log(`És ${i} primer: ${bEsprimer}`);
        }
      } else {
        response.writeHead(404, { "Content-Type": "text/html; charset=utf-8" });
      }

      return "";
    };

    response.write(generarNombresPrimers());

    response.end();
  })
  .listen(8888);

console.log("El servidor està operatiu.");
