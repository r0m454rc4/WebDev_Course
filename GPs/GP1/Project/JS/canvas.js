function dibuixar() {
    // This function is to execute the canvas when the webpage is loaded.
    let canvas = document.getElementById("areaDibuix");
    let ctx = canvas.getContext("2d"); // ctx (context) is an object.
    let [x, y] = [100, 100]; // Declare x, y with 100 as value.
  
    let logo = new Image(); // Now logo is an image.

    logo.onload = function () {
      // When logo charges:
      ctx.drawImage(logo, 1, 35, 110, 85); // I draw it.
    };
    logo.src = "/Assets/Images/logo.png";
};
    window.addEventListener("load", dibuixar, true);