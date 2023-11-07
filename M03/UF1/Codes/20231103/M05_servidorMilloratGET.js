/*
 * Servidor HTTP millorat amb Node JS. Utilitza una funció refactorizada.
 * 2 peticions perque navegador demana el favicon, fa un d'URL per a preparar
 * l'encaminament
 * @author sergi grau, sergi.grau@fje.edu
 * @version 1.0
 * date 14/2/2014
 * format del document UTF-8
 *
 * CHANGELOG
 * 08.10.2015
 * - arxiu principal que arrenca el servidor HTTP
 * 01.11.2021
 * - Actualització a NodeJS 17
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes el Clot
 */
let http = require("http");
let url = require("url")
let fs = require("fs");
let querystring = require("querystring");

function iniciar() {
    function onRequest(req, res) {
        const baseURL = req.protocol + '://' + req.headers.host + '/';
        const reqUrl = new URL(req.url, baseURL);
        console.log("Petició per a  " + reqUrl.pathname + " rebuda.");
        
        let consulta = reqUrl.searchParams;
        let suma = 0, i = 0;
        if (reqUrl.pathname == '/mitjana') {
            consulta.forEach(function (valor, clau) {
                if (clau == 'nota') {
                    suma += parseInt(valor);
                    i++;
                }
            });
            res.write(`la mitjana és  ${(suma / i).toFixed(2)} `);
            res.end();
        }
        else if (reqUrl.pathname == '/pagina.html') {
            fs.readFile('pagina.html', function (err, sortida) {
                res.writeHead(200, {
                    "Content-Type": "text/html; charset=utf-8"
                });
                console.log(+sortida);
                res.write(sortida);
                res.end();
            });  
        }
        else{
            res.writeHead(404, {
                "Content-Type": "text/html; charset=utf-8"
            });
            res.write('not found');
            res.end();
        }
       
    }

        http.createServer(onRequest).listen(8888);
        console.log("Servidor iniciat.");
    }

    exports.iniciar = iniciar;
