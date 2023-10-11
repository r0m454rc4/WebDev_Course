window.onload = function () {
  let nCmptVic = 0; // I have it here because if not it'll reset each time I click on "novaJugada".
  let nCmptPer = 0;
  let nCmptEmp = 0;

  document.getElementById("novaJugada").onclick = function () {
    let opcions = ["pedra", "paper", "tisores"];
    let nAleatori = Math.floor(Math.random() * opcions.length);
    let opcioOrdinador = opcions[nAleatori];
    let opcioUsuari = opcions;
    let estatJoc;

    if (document.getElementById("pedra").checked) {
      opcioUsuari[0];

      if (opcioUsuari && opcioOrdinador == "pedra") {
        estatJoc = `L'ordinador ha escollit la mateixa opció. Has empatat el joc.`;
        nCmptEmp += 1;
      } else if (opcioUsuari && opcioOrdinador == "tisores") {
        estatJoc = `L'ordinador ha escoliit ${opcioOrdinador}. Has guanyat el joc.`;
        nCmptVic += 1;
      } else {
        // console.log("Has perdut el joc.");
        estatJoc = `L'ordinador ha escoliit ${opcioOrdinador}. Has perdut el joc.`;
        nCmptPer += 1;
      }
      // console.log(opcioUsuari[0]);
    } else if (document.getElementById("paper").checked) {
      opcioUsuari[1];

      if (opcioUsuari && opcioOrdinador == "paper") {
        estatJoc = `L'ordinador ha escollit la mateixa opció. Has empatat el joc.`;
        nCmptEmp += 1;
      } else if (opcioUsuari && opcioOrdinador == "pedra") {
        estatJoc = `L'ordinador ha escoliit ${opcioOrdinador}. Has guanyat el joc.`;
        nCmptVic += 1;
      } else {
        // console.log("Has perdut el joc.");
        estatJoc = `L'ordinador ha escoliit ${opcioOrdinador}. Has perdut el joc.`;
        nCmptPer += 1;
      }
      // console.log(opcioUsuari[1]);
    } else if (document.getElementById("tisores").checked) {
      opcioUsuari[2];

      if (opcioUsuari && opcioOrdinador == "pedra") {
        estatJoc = `L'ordinador ha escollit la mateixa opció. Has empatat el joc.`;
        nCmptEmp += 1;
      } else if (opcioUsuari && opcioOrdinador == "tisores") {
        estatJoc = `L'ordinador ha escoliit ${opcioOrdinador}. Has guanyat el joc.`;
        nCmptVic += 1;
      } else {
        // console.log("Has perdut el joc.");
        estatJoc = `L'ordinador ha escoliit ${opcioOrdinador}. Has perdut el joc.`;
        nCmptPer += 1;
      }
      // console.log(opcioUsuari[2]);
    } else {
      estatJoc = "No has seleccionat res.";
    }

    document.getElementById("resumComptador").innerHTML = `
      Partides guanyades: ${nCmptVic}
      <br>
      Partides perdudes: ${nCmptPer}
      <br>
      Partides empatades: ${nCmptEmp}
      <br> <br>
    `;

    document.getElementById("resultat").innerHTML = `${estatJoc}`;
  };

  document.getElementById("esborraSel").onclick = function () {
    document.getElementById("pedra").checked = false;
    document.getElementById("paper").checked = false;
    document.getElementById("tisores").checked = false;
  };

  document.getElementById("iniciarCmpt").onclick = function () {
    nCmptVic = 0;
    nCmptPer = 0;
    nCmptEmp = 0;

    document.getElementById("resumComptador").innerHTML = "";
  };

  document.getElementById("esborraRes").onclick = function () {
    document.getElementById("resultat").innerHTML = "";
  };
};
