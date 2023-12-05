const http = require("http");
const fs = require("fs");

/*
Desenvolupa una aplicació amb Node.js que permeti anar comprant una sèrie de productes
d’una llista. Cada producte té un nom i preu.
1. Cada compra pot ser d’un determinat nombre de productes. En polsar en botó tramitar
comanda, presenta un resum dels productes comprats i l’import total.
2. S'ha d'utilitzar BootStrap per la interfície
3. Les dades queden emmagatzemades en un array d'Objectes en memòria
*/

let compres = [];
let productesSelect = "";
let productes = [
  { nom: "Poma", icona: "🍎", preu: 1.5 },
  { nom: "Peres", icona: "🍐", preu: 2 },
  { nom: "Taronges", icona: "🍊", preu: 2.5 },
  { nom: "Banana", icona: "🍌", preu: 2.5 },
];
productes.forEach((element) => {
  productesSelect += `<option value='${element.nom}' >${element.icona}</option>`;
});

console.log(productesSelect);

const server = http.createServer((req, res) => {
  const baseURL = req.protocol + "://" + req.headers.host + "/";
  const reqUrl = new URL(req.url, baseURL);

  if (reqUrl.pathname === "/home") {
    fs.readFile("./home.html", "utf8", (err, dades) => {
      if (err) {
        res.writeHead(500, { "Content-Type": "text/plain" });
        res.end("Error llegint fitxer");
      } else {
        res.writeHead(200, { "Content-Type": "text/html" });
        dades = dades.replace("<productes>", productesSelect);
        res.end(dades);
      }
    });
  } else if (reqUrl.pathname === "/compra") {
    let dades = "";
    let consulta = reqUrl.searchParams;

    if (consulta.get("operacio") == "compra") {
      let producte = { nom: consulta.get("producte") };
      compres.push(producte);
      res.writeHead(302, {
        Location: "/home",
      });
      res.end(dades);
    } else if (consulta.get("operacio") == "tramita") {
      console.log(compres);
      let acu = "";
      let suma = 0;

      fs.readFile("./comanda.html", "utf8", (err, dades) => {
        if (err) {
          res.writeHead(500, { "Content-Type": "text/plain" });
          res.end("Error llegint fitxer");
        } else {
          res.writeHead(200, { "Content-Type": "text/html" });
          compres.forEach((element) => {
            let p = productes.find((a) => a.nom === element.nom);
            acu += `<li class="list-group-item">${p.icona} - ${p.preu}</li>`;

            suma += p.preu;
          });

          acu += `<li class="list-group-item">Total: ${suma}</li>`;
          dades = dades.replace("<productes>", acu);
        }
        res.end(dades);
      });
    }
  } else if (reqUrl.pathname === "/estils.css") {
    fs.readFile("./estils.css", "utf8", (err, data) => {
      if (err) {
        res.writeHead(500, { "Content-Type": "text/text" });
        res.end("Error llegint fitxer");
      } else {
        res.writeHead(200, { "Content-Type": "text/css" });
        res.end(data);
      }
    });
  } else {
    res.writeHead(404, { "Content-Type": "text/plain" });
    res.end("Pàgina no trobada");
  }
});

server.listen(8888, () => {
  console.log("Servidor a http://localhost:3000");
});
