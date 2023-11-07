let http = require("http");

http
  .createServer(function (request, response) {
    response.writeHead(200, { "Content-Type": "text/html; charset=utf-8" });

    let resultat = 0;
    response.write("<table border=1'>");

    for (let i = 0; i <= 10; i++) {
      resultat = i * 5;

      response.write(
        `<tr><td>El resultat de ${i} * 5 és <td><b>${resultat}</b> <br/></td></td></tr>`
      );
    }
    response.write("</table>");

    response.end();
  })
  .listen(8888);

console.log("El servidor està operatiu.");
