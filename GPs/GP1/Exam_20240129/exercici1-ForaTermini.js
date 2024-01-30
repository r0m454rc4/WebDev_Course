window.onload = () => {
  var canvas = document.getElementById("exercici");
  var context = canvas.getContext("2d");
  let generarRectangle = document.getElementById("generarRectangle");
  let generarPoligon = document.getElementById("generarPoligon");
  let generarCircumferencia = document.getElementById("generarCircumferencia");

  let dibuixaRectangle = (context) => {
    if (canvas.getContext) {
      context.beginPath();
      context.moveTo(0, 0);
      context.lineTo(100, 0);
      context.lineTo(100, 100);
      context.lineTo(0, 100);
      context.closePath();

      context.fill();
    }
  };

  let dibuixaPoligon = (
    context,
    x,
    y,
    radi,
    costats,
    angleInicial,
    antiHorari
  ) => {
    if (canvas.getContext) {
      context.beginPath();
      if (costats < 3) return;
      var a = (Math.PI * 2) / costats;
      a = antiHorari ? -a : a;
      context.save();
      context.translate(x, y);
      context.rotate(angleInicial);
      // context.moveTo(radi, 0);
      context.moveTo(350, 350);

      for (let i = 0; i < costats; i++) {
        context.lineTo(radi * Math.cos(a * i), radi * Math.sin(a * i));
      }

      context.closePath;
      context.restore;

      context.closePath();
      context.fill();
    }
  };

  let dibuixaCircumferencia = (context) => {
    if (canvas.getContext) {
      context.save();
      context.translate(300, 300);
      context.rotate(Math.PI / 4);
      ctx.arc(95, 50, 40, 0, 2 * Math.PI);
      context.stroke();
    }
  };

  let x = Math.floor(Math.random() * 350);
  let y = Math.floor(Math.random() * 350);
  // let radi = Math.floor(Math.random() * 50);
  let costats = Math.floor(Math.random() * 8);
  let angleInicial = Math.floor(Math.random() * 365);
  let antiHorari = Boolean(Math.round(Math.random()));

  generarRectangle.onclick = () => {
    dibuixaRectangle(context);
  };

  generarPoligon.onclick = () => {
    dibuixaPoligon(context, x, y, 50, costats, angleInicial, antiHorari);
  };

  generarCircumferencia.onclick = () => {
    dibuixaCircumferencia(context);
  };
};
