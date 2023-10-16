window.onload = () => {
  class Alumne {
    constructor(dniAlumne, nomAlumne, cognomAlumne, cursAlumne, notaAlumne) {
      this.dniAlumne = dniAlumne;
      this.nomAlumne = nomAlumne;
      this.cognomAlumne = cognomAlumne;
      this.cursAlumne = cursAlumne;
      this.notaAlumne = notaAlumne;
    }
  }

  let crearGrupsAlunes = (numeroGrup) => {
    // numeroGrup is a parameter to select the group number.
    const llistaAlumnes = [
      // List that contains all of the alumns.
      (alumne1 = new Alumne("1A", "Leo", "Herrera", "DAW2", 6.0)),
      (alumne2 = new Alumne("2A", "Romà", "Sardá", "DAW2", 6.5)),
      (alumne3 = new Alumne("3A", "Victor", "Toro", "DAW2", 6.12)),
      // 2nd group.
      (alumne4 = new Alumne("4B", "Alejando", "Torrente", "DAW2", 7.0)),
      (alumne5 = new Alumne("5B", "Bru", "Carreras", "DAW2", 5.5)),
      (alumne6 = new Alumne("6B", "Javier", "Pérez", "DAW2", 6.05)),
      // 3rd group.
      (alumne7 = new Alumne("7C", "Helena", "Alba", "DAW2", 5.5)),
      (alumne8 = new Alumne("8C", "Daniel", "Collados", "DAW2", 7.12)),
      (alumne9 = new Alumne("9C", "Toni", "Varon", "DAW2", 6.05)),
      // 4th group.
      (alumne10 = new Alumne("10D", "Alex", "Maench", "DAW2", 8.25)),
      (alumn11 = new Alumne("11D", "Adrià", "Millian", "DAW2", 6.69)),
      (alumne12 = new Alumne("12D", "Arnau", "Vicente", "DAW2", 4.35)),
      // 5th group.
      (alumne13 = new Alumne("13E", "Martí", "Rodríguez", "DAM2", 3.75)),
      (alumne14 = new Alumne("14E", "Antonio", "Acosta", "DAM2", 4.49)),
      (alumne15 = new Alumne("15E", "Lucía", "Rodríguez", "DAW2", 8.31)),
      // 6th group.
      (alumne16 = new Alumne("11F", "André", "Mafuta", "DAM2", 9.18)),
      (alumne17 = new Alumne("12F", "Sergi", "Grau", "DAW2", 10.0)),
      (alumne18 = new Alumne("13F", "Jordi", "Binefa", "DAM2", 8.99)),
    ];

    let grups = [];

    // console.log(grups);

    for (let i = 0; i < 10; i++) {
      let grup = [];

      for (let j = 0; j < 3; j++) {
        let alumne = i * 3 + j; // Get the index of an alumn.

        // This part I did it with the help of ChatGPT.
        if (alumne < llistaAlumnes.length) {
          grup.push(llistaAlumnes[alumne]); // With push I add "alumne" to the end of "grup" array.
        }
      }

      grups.push(grup);
    }

    let nomAlumnesPerGrup = [];

    for (let alumne of grups[numeroGrup]) {
      // If I don't use a for of, I'll get "undefined".
      // console.log(alumne.nomAlumne);
      nomAlumnesPerGrup.push(alumne.nomAlumne);
    }

    return nomAlumnesPerGrup;
  };

  // --- GRUPS --- //

  let nGrup = [];

  for (let i = 1; i <= 10; i++) {
    nGrup.push("Grup " + i);
  }

  // nGrup = nGrup.join(" "); // In order to delete the commas from the array.

  document.getElementById("llistaGrups").innerHTML = `
  <table>
    <tr id="llistaGrups">
      <td id="llistaGrup1">
        ${nGrup[0]}
      </td>
      <td id="llistaGrup2">
        ${nGrup[1]}
      </td>
      <td id="llistaGrup3">
       ${nGrup[2]}
      </td>
      <td id="llistaGrup4">
        ${nGrup[3]}
      </td>
      <td id="llistaGrup5">
        ${nGrup[4]}
      </td>
      <td id="llistaGrup6">
        ${nGrup[5]}
      </td>
    </tr>
  </table>
  `;

  // --- MOSTRAR USUARIS -- //

  // document.getElementById("grup1").onclick = function () {
  //   document.getElementById("alumnes").innerHTML = `<br>` + crearGrupsAlunes(0);
  // };

  let crearLlistaAlunes = (nGrup) => {
    document.getElementById("llistaAlumnes").innerHTML = `
    <table>
      <tr id="llistaAlumnes">
        <td id="llistaAlumnes1">
          ${crearGrupsAlunes(0)}
        </td>
        <td id="llistaAlumnes2">
          ${crearGrupsAlunes(1)}
        </td>
        <td id="llistaAlumnes3">
         ${crearGrupsAlunes(2)}
        </td>
        <td id="llistaAlumnes4">
          ${crearGrupsAlunes(3)}
        </td>
        <td id="llistaAlumnes5">
          ${crearGrupsAlunes(4)}
        </td>
        <td id="llistaAlumnes6">
          ${crearGrupsAlunes(5)}
        </td>
      </tr>
    </table>
    `;
  };

  document.getElementById("llistaGrup1").onclick = function () {
    console.log("LlistaGrup1 clicat");

    document.getElementById("alumnes").innerHTML = `<br>` + crearGrupsAlunes(0); // I write the name of the alumns.
  };

  // document.getElementById("llistaGrup1").onclick = function () {
  //   console.log("LlistaGrup1 clicat");

  //   document.getElementById("alumnes").innerHTML =
  //     `<br>` + crearLlistaAlunes(nGrup[0]); // I write the name of the alumns.
  // };

  document.getElementById("llistaGrup2").onclick = function () {
    document.getElementById("alumnes").innerHTML = `<br>` + crearGrupsAlunes(1); // I write the name of the alumns.
  };

  document.getElementById("llistaGrup3").onclick = function () {
    document.getElementById("alumnes").innerHTML = `<br>` + crearGrupsAlunes(2); // I write the name of the alumns.
  };

  document.getElementById("llistaGrup4").onclick = function () {
    document.getElementById("alumnes").innerHTML = `<br>` + crearGrupsAlunes(3); // I write the name of the alumns.
  };

  document.getElementById("llistaGrup5").onclick = function () {
    document.getElementById("alumnes").innerHTML = `<br>` + crearGrupsAlunes(4); // I write the name of the alumns.
  };

  document.getElementById("llistaGrup6").onclick = function () {
    document.getElementById("alumnes").innerHTML = `<br>` + crearGrupsAlunes(5); // I write the name of the alumns.
  };

  // document.getElementById("grup2").onclick = function () {
  //   document.getElementById("alumnes").innerHTML = `<br>` + crearGrupsAlunes(1);
  // };
};
