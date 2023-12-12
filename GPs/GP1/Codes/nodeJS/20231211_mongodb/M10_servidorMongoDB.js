/*
 * Servidor HTTP millorat amb Node JS.
 * Connecta amb MongoDB i realitza diverses operacions CRUD
 * @author sergi grau, sergi.grau@fje.edu
 * @version 2.0
 * date 06.04.2017
 * format del document UTF-8
 *
 * CHANGELOG
 * 08.04.2016
 * - Connecta amb MongoDB i realitza diverses operacions CRUD
 * 06.04.2017
 * - millora la sortida de les operacions realitzades amb mongodb
 * 01.11.2021
 * - actualització a client MongoDB 4.x
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes el Clot
 */
let http = require("http");

let MongoClient = require("mongodb").MongoClient;
let assert = require("assert"); //utilitzem assercions

let ObjectId = require("mongodb").ObjectID;

function iniciar() {
  let ruta = "mongodb://localhost:27017/provaDAW2";

  MongoClient.connect(ruta, function (err, client) {
    assert.equal(null, err);
    console.log("Connexió correcta");
    let db = client.db("provaDAW2"); // Here I say the database that I'll use.

    // This function adds two users, "sergi" and "joan".
    // afegirDocuments(db, err, function () {});

    // consultarDocumentMenor40(db, err, function () {});

    // This function shows the information of the user with sergi as name.
    consultarDocument(db, err, function () {});

    // This function deletes all of the users of the database.
    // esborrarTotsDocuments(db, err, function () {
    //   client.close();
    // });

    //atenció aquestes crides són asíncrones cal tancar la connexió en la darrera
    // Malament db.close();
  });

  function onRequest(req, res) {
    const baseURL = req.protocol + "://" + req.headers.host + "/";
    const reqUrl = new URL(req.url, baseURL);
    console.log("Petició per a  " + reqUrl.pathname + " rebuda.");
    res.writeHead(200, {
      "Content-Type": "text/plain; charset=utf-8",
    });
    res.write("camí: " + ruta + "\n");

    let consulta = reqUrl.searchParams; // consulta stores the value of the search paramters, such as ?p=23.
    console.log(consulta);

    consulta.forEach(function (valor, clau) {
      res.write("parametre: " + clau + "\n");
      res.write("valor: " + valor + "\n");
    });
    res.end();
  }

  http.createServer(onRequest).listen(8888);
  console.log("Servidor iniciat.");
}

let afegirDocuments = function (db, err, callback) {
  db.collection("usuaris").insertOne({
    nom: "sergi",
    anys: 45,
    telf: "123-567-890",
  });

  db.collection("usuaris").insertOne({
    nom: "joan",
    anys: 30,
    telf: "123-567-890",
  });

  assert.equal(err, null);
  console.log("Afegit document a col·lecció usuaris");
  callback();
};

let consultarDocument = function (db, err, callback) {
  let cursor = db.collection("usuaris").find({
    nom: "sergi", // Here I search for the user that has the name "sergi".
  });

  cursor.toArray(function (err, results) {
    assert.equal(err, null);

    if (results != null) {
      results.forEach((doc) => {
        console.log(`Nom ${doc.nom} i anys ${doc.anys}`);
      });
    } else {
      callback();
    }
  });
};

let consultarDocumentMenor40 = function (db, err, callback) {
  let cursor = db.collection("usuaris").find({
    anys: {
      $lt: 40,
    },
  });
  cursor.forEach(function (err, doc) {
    assert.equal(err, null);
    if (doc != null) {
      console.log(doc.nom, doc.anys);
    } else {
      callback();
    }
  });
};

let esborrarTotsDocuments = function (db, err, callback) {
  console.log(`Esborrant tots els usuaris de la base de dades.`);

  db.collection("usuaris").deleteMany({}, function (err, results) {
    //console.log(results);
    callback();
  });
};

exports.iniciar = iniciar;
