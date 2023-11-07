var http = require("http");

function onRequest(request, response) {
  console.log("Petició Rebuda.");
  response.writeHead(200, { "Content-Type": "text/plain; charset=utf-8" });
  response.write("Hola Món 2"); // If I use a web browser, I'll get it twice, because of the favicon.
  response.end();
}

http.createServer(onRequest).listen(8888);

console.log("Servidor iniciat.");
