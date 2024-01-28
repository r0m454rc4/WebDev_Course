/*
  The difference between localStorage & sessionStorage is that localStorage keeps the values after closing the browser instead of sessionStorage, because this one deletes it.
*/

// emmagatzematge is an object.
var emmagatzematge = {
  taula: document.getElementById("taula"), // Taula is a property.

  // This is  a method from the object called emmagatzematge.
  desar: function () {
    localStorage.setItem(
      document.getElementById("nom").value, // Key.
      document.getElementById("nota").value // Value that is stored.
    );

    emmagatzematge.esborrarTaula();
    emmagatzematge.mostrar();
  },

  mostrar: function () {
    for (let i = 0; i < localStorage.length; i++) {
      let fila = taula.insertRow(-1);

      fila.insertCell(0).innerHTML = i; // This is to add the index of the row at the beggining.
      fila.insertCell(1).innerHTML = localStorage.key(i);
      fila.insertCell(2).innerHTML = localStorage.getItem(localStorage.key(i)); // getItem is to recover the value.
    }
  },

  esborrarTaula: function () {
    // taula.rows.length -> taula = getElementById("taula"), rows = array that stores the rows from the table.
    while (taula.rows.length > 0) {
      taula.deleteRow(0); // Delete the first row.
    }
  },

  esborrarItem: function () {
    localStorage.removeItem(document.getElementById("nom").value); // Here I delete the value using the key, which in this case is "nom".
    emmagatzematge.esborrarTaula();
    emmagatzematge.mostrar();
  },

  netejar: function () {
    localStorage.clear();
    emmagatzematge.esborrarTaula();
    emmagatzematge.mostrar();
  },

  mostrarMitjana: function () {
    let mitjana = 0;
    let fila = taula.insertRow(-1);

    for (let i = 0; i < localStorage.length; i++) {
      // I multiply 1 because I want an integer, not a string.

      mitjana +=
        (localStorage.getItem(localStorage.key(i)) * 1) / localStorage.length;
    }

    fila.insertCell(0).innerHTML = mitjana;

    console.log(mitjana);
  },
};

document
  .getElementById("desar")
  .addEventListener("click", emmagatzematge.desar, false); // emmagatzematge.desar calls the method desar from the object emmagatzematge.
document
  .getElementById("esborrar")
  .addEventListener("click", emmagatzematge.esborrarItem, false);
document
  .getElementById("netejar")
  .addEventListener("click", emmagatzematge.netejar, false);
document
  .getElementById("mitjana")
  .addEventListener("click", emmagatzematge.mostrarMitjana, false);

emmagatzematge.mostrar();
