let http = require("http");

http
  .createServer(function (request, response) {
    response.writeHead(200, { "Content-Type": "text/html; charset=utf-8" });

    response.write("<table border='1'>");

    let generarNombresPrimers = () => {
      let esPrimer;

      for (let i = 2; i <= 15; i++) {
        esPrimer = true;

        // Here I use a square root in order to see the divisors of the number, for instance 25, it just needs to check divisors up to 5. Firstly, 2 (17.5), then 3 (8.3), followind that 4 (6.25) & finally 5 (5), as has 5 as divisor, is not prime.
        for (let j = 2; j <= Math.sqrt(i); j++) {
          console.log(`${i} % ${j} = ${i % j}`);

          if (i % j === 0) {
            esPrimer = false;
            break;
          }
        }

        response.write(
          `<tr><td>És el número <b>${i}</b> primer: <b>${esPrimer}</b></td></tr>`
        );
      }

      return "";
    };

    response.write(generarNombresPrimers());

    response.end();
  })
  .listen(8888);

console.log("El servidor està operatiu.");
