/*
 * programa que mostra com es pot treballar amb l'API indexedDB
 * @author sergi.grau@fje.edu
 * @version 1.0
 * date 15.12.2016
 * format del document UTF-8
 *
 * CHANGELOG
 * 15.12.2016
 * - programa que mostra com es pot treballar amb l'API indexedDB
 *
 * NOTES
 * ORIGEN
 * Desenvolupament en entorn client. Escola del clot
 */

// If I want to change the version of the code, I must change this number.
const DB_VERSION = 4;
const dadesClients = [
  {
    ssn: "123",
    nom: "Sergi",
    edad: 45,
    email: "sergi.grau@fje.edu",
  },
  {
    ssn: "456",
    nom: "Joan",
    edad: 32,
    email: "joan@fje.edu",
  },
];

// Verify if available for the browser.
window.indexedDB =
  window.indexedDB ||
  window.mozIndexedDB ||
  window.webkitIndexedDB ||
  window.msIndexedDB;
window.IDBTransaction = window.IDBTransaction ||
  window.webkitIDBTransaction ||
  window.msIDBTransaction || {
    READ_WRITE: "readwrite",
  };
window.IDBKeyRange =
  window.IDBKeyRange || window.webkitIDBKeyRange || window.msIDBKeyRange;

// La petició d'obertura no crea la DB, retorna de manera asíncrona un IDBOpenDBRequest, amb un objecte exit o error.
var peticioObertura = window.indexedDB.open("DAW2", DB_VERSION);
var db;

var emmagatzematge = {
  // Desar is a method.

  desar: function () {
    var magatzemObjsAlumnes = db
      .transaction("alumnes", "readwrite")
      .objectStore("alumnes");
    var alumne = {
      nom: document.getElementById("nom").value,
      cognom: document.getElementById("cognom").value,
      nota: document.getElementById("nota").value,
    };

    magatzemObjsAlumnes.add(alumne);
    emmagatzematge.esborrarTaula();
    emmagatzematge.mostrar(magatzemObjsAlumnes);
  },
  mostrar: function (magatzemObjsAlumnes) {
    magatzemObjsAlumnes.openCursor().onsuccess = function (event) {
      var cursor = event.target.result;
      if (cursor) {
        var fila = taula.insertRow(0);
        fila.insertCell(0).innerHTML = cursor.key;
        fila.insertCell(1).innerHTML = cursor.value.nom;
        fila.insertCell(2).innerHTML = cursor.value.nota;
        cursor.continue();
      }
    };
  },
  esborrarTaula: function () {
    while (taula.rows.length > 0) {
      taula.deleteRow(0);
    }
  },
  esborrarItem: function () {
    magatzemObjsAlumnes = db
      .transaction("alumnes", "readwrite")
      .objectStore("alumnes");
    magatzemObjsAlumnes.delete(document.getElementById("nom").value);
    emmagatzematge.esborrarTaula();
    emmagatzematge.mostrar(magatzemObjsAlumnes);
  },
  netejar: function () {
    emmagatzematge.esborrarTaula();
  },
};
document
  .getElementById("desar")
  .addEventListener("click", emmagatzematge.desar, false);
document
  .getElementById("esborrar")
  .addEventListener("click", emmagatzematge.esborrarItem, false);
document
  .getElementById("netejar")
  .addEventListener("click", emmagatzematge.netejar, false);

peticioObertura.onerror = function (event) {
  alert("Problema!");
};
peticioObertura.onsuccess = function (event) {
  // db now is inicialized.
  db = event.target.result;
};

// onupgradeneeded is to delete the values after changing DB_VERSION.
peticioObertura.onupgradeneeded = function (event) {
  var db = event.target.result;
  try {
    db.deleteObjectStore("clients");
    db.deleteObjectStore("noms");
    db.deleteObjectStore("alumnes");
  } catch (e) {}
  // ObjectStore conté la informació sobre els nostres clients. El codi
  // "SSN" es la ruta de la clau perquè es garanteix que sigui única
  var magatzemObjsClients = db.createObjectStore("clients", {
    // keyPath is the primary key.
    keyPath: "ssn",
  });

  // un altre magatzem amb autoIncrement com a key generator
  var magatzemObjsNoms = db.createObjectStore("noms", {
    autoIncrement: true,
  });

  //  magatzem amb autoIncrement com a key generator per a les notes dels alumnes
  var magatzemObjsAlumnes = db.createObjectStore("alumnes", {
    keyPath: "cognom",
  });

  // Loop that adds the name of the client to magatzemObjsNoms.
  for (var i in dadesClients) {
    magatzemObjsNoms.add(dadesClients[i].nom);
    magatzemObjsNoms.add(dadesClients[i].email);
  }

  // Crear un índex per buscar clients pel seu nom. Podem tenir duplicats
  // Així que no podem utilitzar un índex únic.
  magatzemObjsClients.createIndex("nom", "nom", {
    unique: false,
  });

  // Crear un índex per buscar clients per correu electrònic. Volem assegurar-nos que
  // No hi ha dos clients tenen el mateix correu electrònic, per tal d'utilitzar un índex únic.
  magatzemObjsClients.createIndex("email", "email", {
    unique: true,
  });

  // Utilitzeu la transacció OnComplete per assegurar-se que la creació és ObjectStore
  // Acabat abans d'afegir dades en ell.
  // transaction is to obtain data.
  magatzemObjsClients.transaction.oncomplete = function (event) {
    // Emmagatzemar els valors de la magatzemObjsClients acabat de crear.
    // clients is the name of the transaction.
    var magatzemObjsClients = db
      .transaction("clients", "readwrite")
      .objectStore("clients");
    for (var i in dadesClients) {
      console.log(dadesClients[i]);
      // I add the client data on magatzemObjsClients.
      var peticio = magatzemObjsClients.add(dadesClients[i]);
    }

    var peticio = magatzemObjsClients.get("123");
    peticio.onerror = function (event) {};
    peticio.onsuccess = function (event) {
      console.log("client " + peticio.result.nom);
    };

    // This is the same as a select.
    magatzemObjsClients.openCursor().onsuccess = function (event) {
      var cursor = event.target.result;
      // cursor is line by line.
      if (cursor) {
        console.log(cursor.key + " es " + cursor.value.nom);
        cursor.continue();
      }
    };
  };
};
