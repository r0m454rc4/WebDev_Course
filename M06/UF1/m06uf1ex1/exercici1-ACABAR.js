window.onload = function () {
  let opcions = ["Pedra", "Paper", "Tisores"];

  function opcioAleatoria(opcions) {
    for (let i in opcions) {
      let nAleatori = Math.floor(Math.random() * opcions.length);
      let opcioOrdinador = opcions[nAleatori];

      // console.log(opcioOrdinador);
      return opcioOrdinador;
      break;
    }
  }

  document.getElementById("novaJugada").onclick = function () {
    let nCmpt = 0;
    let opcioUsuari = opcions;

    if (document.getElementById("pedra").checked) {
      opcioUsuari[0];

      if (opcioUsuari === opcioAleatoria(opcions)) {
        console.log("Empat");
      }
      // console.log(opcioUsuari[0]);
    } else if (document.getElementById("paper").checked) {
      opcioUsuari[1];
      // console.log(opcioUsuari[1]);
    } else if (document.getElementById("tisores").checked) {
      opcioUsuari[2];
      // console.log(opcioUsuari[2]);
    } else {
      console.log("No has seleccionat res.");
    }

    document.getElementById("resumComptador").innerHTML = `
  Partides guanyades: ${nCmpt}
  <br>
  Partides perdudes: ${nCmpt}
  <br>
  Partides empatades: ${nCmpt}
  <br> <br>
  `;

    document.getElementById("resultat").innerHTML = `
  L'ordinador ha escollit ${opcioAleatoria(opcions)}
  `;
  };
};
