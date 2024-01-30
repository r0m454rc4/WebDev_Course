window.onload = function () {
  let cmptPomes = 0,
    cmptTaronjes = 0,
    cmptSindries = 0;

  var tds = document.querySelectorAll("td"); // querySelectorAll is to select all of the elemets that have an element, in this case, td
  [].forEach.call(tds, function (item) {
    // Here I use an empty array, and for each item, I call the function.
    item.addEventListener("dragover", gestionarSobreDrag, false); // dragover -> When I hover it.
    item.addEventListener("drop", gestionarDrop, false); // gestionarDrop -> WHen I drop the image.
  });

  var imatges = document.querySelectorAll("img");
  [].forEach.call(imatges, function (item) {
    // Foreach image, I call gestionarIniciDrag.
    item.addEventListener("dragstart", gestionarIniciDrag, false); // dragstart: When I start dragging it.
  });

  function gestionarSobreDrag(ev) {
    // ev = event.
    ev.preventDefault(); // This is to disable the other, for instance, if I had a link or something like this, it'll ignore it.
  }

  // When I drag the itmage I call this function and the value I store is the id(creu/ ratlla), not the image.
  function gestionarIniciDrag(ev) {
    ev.dataTransfer.setData("imatge", ev.target.id); // dataTransfer works like a clipboard.

    let dragIcon = document.createElement("img");
    // dragIcon.src = "./media/HTML-logo.png";

    ev.dataTransfer.setDragImage(dragIcon, -10, -10);
  }

  function gestionarDrop(ev) {
    botoTramita = document.getElementById("botoTramita");

    ev.preventDefault();
    var data = ev.dataTransfer.getData("imatge"); // Here I store if the fruit.

    console.log(`Data: ${data}`);
    if (data == "poma") {
      cmptPomes++;
    } else if (data == "taronja") {
      cmptTaronjes++;
    } else {
      cmptSindries++;
    }

    botoTramita.onclick = () => {
      console.log(
        `Pomes: ${cmptPomes}, taronjes: ${cmptTaronjes}, sindries: ${cmptSindries} `
      );

      document.getElementById(
        "estatComanda"
      ).innerHTML = `Pomes: ${cmptPomes}, taronjes: ${cmptTaronjes}, sindries: ${cmptSindries}`;
    };

    var emmagatzematge = {
      // This is  a method from the object called emmagatzematge.
      desar: function () {
        localStorage.setItem(
          "Pomes", // Key.
          cmptPomes // Value that is stored.
        );

        localStorage.setItem(
          "Taronjes", // Key.
          cmptTaronjes // Value that is stored.
        );

        localStorage.setItem(
          "Sindries", // Key.
          cmptSindries // Value that is stored.
        );
      },
    };

    document
      .getElementById("botoTramita")
      .addEventListener("click", emmagatzematge.desar, false); // emmagatzematge.desar calls the method desar from the object emmagatzematge.

    if (this.childNodes.length < 1) {
      // This is to prevent inserting more than one photo.
      ev.target.appendChild(document.getElementById(data).cloneNode(true)); // Here I cleate a clone of creu or ratlla.
    } else if (this.childNodes.length == 1) {
      // This is to replace the image.
      ev.removeChild(this.childNodes[0]);
      ev.target.appendChild(document.getElementById(data).cloneNode(true)); // Here I cleate a clone of creu or ratlla.
    }
  }
};
