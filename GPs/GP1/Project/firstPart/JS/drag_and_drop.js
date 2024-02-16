window.onload = function () {
  var squares = document.querySelectorAll(".square");
  var dragContainer = document.querySelector(".drag");
  var correctAnswers = 0;

  // Asigna un identificador único a cada imagen
  var imatges = document.querySelectorAll(".drag img");
  imatges.forEach(function (item, index) {
    var imgId = index + 1;
    item.setAttribute("data-img-id", imgId);
    item.addEventListener("dragstart", gestionarIniciDrag, false);
  });

  squares.forEach(function (square) {
    square.addEventListener("dragenter", gestionarEntradaDrag, false);
    square.addEventListener("dragleave", gestionarSalirDrag, false);
    square.addEventListener("dragover", gestionarSobreDrag, false);
    square.addEventListener("drop", gestionarDropSquare, false);
  });

  dragContainer.addEventListener("dragover", gestionarSobreDrag, false);
  dragContainer.addEventListener("drop", gestionarDropContainer, false);

  function gestionarEntradaDrag(ev) {
    ev.preventDefault();
    // Cambia el color de fondo solo si el elemento tiene la clase "square".
    if (ev.target.classList.contains("square")) {
      // Verifica en qué columna se encuentra el cuadro de destino
      var isLeftColumn = ev.target.closest(".container-left");
      // Cambia el color en consecuencia
      ev.target.style.backgroundColor = "lightblue";
    }
  }

  function gestionarSalirDrag(ev) {
    // Restaura el color de fondo solo si el elemento tiene la clase "square".
    if (ev.target.classList.contains("square")) {
      // Restaura el color de fondo
      ev.target.style.backgroundColor = "";
    }
  }

  function gestionarSobreDrag(ev) {
    ev.preventDefault();
  }

  function gestionarIniciDrag(ev) {
    ev.dataTransfer.setData("imatge", ev.target.id);
  }

  function gestionarDropSquare(ev) {
    ev.preventDefault();
    var imgId = ev.dataTransfer.getData("imatge");
    var draggedElement = document.getElementById(imgId);
    var square = ev.target.closest(".square");
  
    if (square && !square.querySelector("img")) {
      // Verifica que el cuadro no tenga una imagen antes de agregar una nueva
      square.appendChild(draggedElement);
      square.style.backgroundColor = "lightblue";
  
      // Reproduce un sonido
      var audio = new Audio('./Assets/Audio/gota.mp3');
      audio.play();
    }
  }  

  function gestionarDropContainer(ev) {
    ev.preventDefault();
    var imgId = ev.dataTransfer.getData("imatge");
    var draggedElement = document.getElementById(imgId);

    // Mueve la imagen al contenedor .drag
    dragContainer.appendChild(draggedElement);

    // Restaura el color de fondo del square
    draggedElement.closest(".square").style.backgroundColor = "";

    // Reproduce un sonido
    var audio = new Audio('./Assets/Audio/gota.mp3');
    audio.play();
  }

  // Función para verificar los aciertos
  function verificarAciertos() {
    correctAnswers = 0;

    squares.forEach(function (square, index) {
      var img = square.querySelector("img");
      if (img) {
        var imgId = parseInt(img.getAttribute("data-img-id"));
        var squareId = index + 1;

        // Verifica si el id de la imagen es igual al número del square
        if (imgId === squareId) {
          correctAnswers++;
        }
      }
    });

    // Muestra el número de aciertos
    alert("Tienes " + correctAnswers + " aciertos.");
  }

  // Asigna la función verificarAciertos al botón de verificar
  var verificarBoton = document.getElementById("verificarBoton");
  verificarBoton.addEventListener("click", verificarAciertos);
};
