const { log } = require("console");
let http = require("http");

http
  .createServer(function (request, response) {
    response.writeHead(200, { "Content-Type": "text/html; charset=utf-8" });

    response.write("<table border='1'>");

    let generarNombresPrimers = () => {
      let bEsprimer = true;

      for (let i = 2; i <= 10; i++) {
        if (i == 2) {
          bEsprimer = true;
        } else if (i % 2 == 1 || i % i == 1) {
          bEsprimer = true;
          // console.log(`${i} % 2 = ${i % 2}`);
        } else {
          bEsprimer = false;
        }

        response.write(
          `<tr><td>És el número <b>${i}</b> primer: <b>${bEsprimer}</b></td></tr>`
        );
        // console.log(`És ${i} primer: ${bEsprimer}`);
      }

      return "";
    };

    response.write(generarNombresPrimers());

    response.end();
  })
  .listen(8888);

console.log("El servidor està operatiu.");
