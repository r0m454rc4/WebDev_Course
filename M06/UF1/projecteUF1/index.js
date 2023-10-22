window.addEventListener("load", function () {
  class Alumne {
    constructor(dniAlumne, nomAlumne, cognomAlumne, cursAlumne, notaAlumne) {
      this.dniAlumne = dniAlumne;
      this.nomAlumne = nomAlumne;
      this.cognomAlumne = cognomAlumne;
      this.cursAlumne = cursAlumne;
      this.notaAlumne = notaAlumne;
    }
  }

  const llistaAlumnes = [
    // List that contains all of the alumns.
    new Alumne("1A", "Leo", "Herrera", "DAW2", 6.0),
    new Alumne("2A", "Romà", "Sardá", "DAW2", 6.5),
    new Alumne("3A", "Victor", "Toro", "DAW2", 6.12),
    // 2nd group.
    new Alumne("4B", "Alejando", "Torrente", "DAW2", 7.0),
    new Alumne("5B", "Bru", "Carreras", "DAW2", 5.5),
    new Alumne("6B", "Javier", "Pérez", "DAW2", 6.05),
    // 3rd group.
    new Alumne("7C", "Helena", "Alba", "DAW2", 5.5),
    new Alumne("8C", "Daniel", "Collados", "DAW2", 7.12),
    new Alumne("9C", "Toni", "Varon", "DAW2", 6.05),
    // 4th group.
    new Alumne("10D", "Alex", "Maench", "DAW2", 8.25),
    new Alumne("11D", "Adrià", "Millian", "DAW2", 6.69),
    new Alumne("12D", "Arnau", "Vicente", "DAW2", 4.35),
    // 5th group.
    new Alumne("13E", "Martí", "Rodríguez", "DAM2", 3.75),
    new Alumne("14E", "Antonio", "Acosta", "DAM2", 4.49),
    new Alumne("15E", "Lucía", "Rodríguez", "DAW2", 8.31),
    // 6th group.
    new Alumne("16F", "André", "Mafuta", "DAM2", 9.18),
    new Alumne("17F", "Sergi", "Grau", "DAW2", 10.0),
    new Alumne("18F", "Jordi", "Binefa", "DAM2", 8.99),
    // 7th group.
    new Alumne("19G", "Sandra", "Herranz", "DAW2", 9.18),
    new Alumne("20G", "Marta", "Coll", "DAW2", 10.0),
    new Alumne("21G", "David", "Pérez", "SMX2", 8.99),
    // 8th group.
    new Alumne("22H", "Pepe", "García", "DAW2", 9.18),
    new Alumne("23H", "Manuel", "Sánchez", "DAW2", 10.0),
    new Alumne("24H", "Jaume", "Reixac", "SMX2", 8.99),
    // 9th group.
    new Alumne("25I", "Josefa", "Huerto", "DAW2", 9.18),
    new Alumne("26I", "Pepa", "Cerdita", "DAW2", 10.0),
    new Alumne("27I", "Pau", "Jaimejuan", "SMX2", 8.99),
    // 10th group.
    new Alumne("28J", "Mario", "Gallego", "DAW2", 9.18),
    new Alumne("29J", "Júlia", "Serra", "DAW2", 10.0),
    new Alumne("30J", "Miquel", "Baztan", "SMX2", 8.99),
    // 11th group.
    new Alumne("31K", "Rosa", "Gabaldon", "DAW2", 9.18),
    new Alumne("32K", "María", "Cubells", "DAW2", 10.0),
    new Alumne("33K", "Gemma", "Simó", "SMX2", 8.99),
    // 12th group.
    new Alumne("34L", "Abdou", "Diawara", "DAW2", 9.18),
    new Alumne("35L", "Laia", "Sánchez", "DAW2", 10.0),
    new Alumne("36L", "Anna", "Martín", "SMX2", 8.99),
    // 13th group.
    new Alumne("37M", "Fernanda", "Calla", "DAW2", 9.18),
    new Alumne("38M", "Carla", "Alfonso", "DAW2", 10.0),
    new Alumne("39M", "Alberto", "García", "SMX2", 8.99),
    // 14th group.
    new Alumne("40N", "Josep", "Gil", "DAW2", 9.18),
    new Alumne("41N", "Sandra", "Piñeiro", "DAW2", 10.0),
    new Alumne("42N", "Laia", "Cantos", "SMX2", 8.99),
  ];

  // -- CREATE TABLE WHERE THE NAME OF THE ALUMNS WILL BE. -- //

  let crearTaulaAlumnes = (nomAlumne) => {
    let taulaAlumnes = `
      <table id="llistaOrdAl">
        <tr>
          <td>
            ${nomAlumne[0]}
          </td>
          <td>
            ${nomAlumne[1]}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            ${nomAlumne[2]}
          </td>
        </tr>
      </table>
      `;

    return taulaAlumnes;
  };

  // -- CREATE ALUMNS FOR GROUPS.  -- //

  let crearAlumesPerGrup = (numeroGrup) => {
    // numeroGrup is a parameter to select the group number.
    let grups = [];

    for (let i = 0; i <= llistaAlumnes.length / 3; i++) {
      // llistaAlumnes.length / 3 is because in each group there are 3 alumns.
      let grup = [];

      for (let j = 0; j < 3; j++) {
        let alumne = i * 3 + j; // Get the index of an alumn.

        if (alumne < llistaAlumnes.length) {
          grup.push(llistaAlumnes[alumne]); // With push I add "alumne" to the end of "grup" array.
        }
      }
      // console.log(grup);

      grups.push(grup);
    }

    let nomAlumnesPerGrup = [];

    for (let alumne of grups[numeroGrup]) {
      // If I don't use a for of, I'll get "undefined".
      nomAlumnesPerGrup.push(alumne.nomAlumne);
    }

    let nAlumne = nomAlumnesPerGrup;
    // console.log(`nAlumne: ${nAlumne}`)

    nAlumne = crearTaulaAlumnes(nAlumne);

    return nAlumne;
  };

  // --- SHOW TABLE OF GROUPS. --- //

  let nGrup = [];

  for (let i = 1; i <= llistaAlumnes.length / 3; i++) {
    nGrup.push("Grup " + i);
  }

  let llistaGps = document.getElementById("llistaGps");
  let grups = "<table>";

  for (let j = 0; j < 14; j++) {
    console.log(j);

    if (j % 2 == 0) {
      grups += "<tr></tr>";
    }

    grups += `
      <td id="llistaGrup${j + 1}">
        ${nGrup[j]}
      </td>`;
  }

  grups += "</table>";

  console.log(grups);
  llistaGps.innerHTML = grups;

  // --- SHOW GROUPS ON THE CLASSROOM. --- //

  let borrarPosicioGrup = 0;

  for (let i = 1; i <= nGrup.length; i++) {
    let grupClicat = document.getElementById(`llistaGrup${i}`);
    let grp = document.getElementById(`grup${i}`);

    grupClicat.ondblclick = () => {
      // ondblclick is to execute when I double click.

      if (borrarPosicioGrup != 0) {
        // If a row has been previously selected, I reset the color to lightcyan.

        document.getElementById(
          `grup${borrarPosicioGrup}`
        ).style.backgroundColor = "lightcyan";

        document.getElementById(
          `llistaGrup${borrarPosicioGrup}`
        ).style.backgroundColor = "lightcyan";
        // console.log(`Previously selected: ${borrarPosicioGrup}`);
      }

      if (borrarPosicioGrup == i) {
        // If I double click on the same group again.

        borrarPosicioGrup = -i;
        // console.log(`Delesect group: ${borrarPosicioGrup}`);
        borrarPosicioGrup = 0; // If I don't have it I won't be able to select another group after deselecting.
      } else {
        // Select a group.

        grp.style.backgroundColor = "violet";
        grupClicat.style.backgroundColor = "violet";
        borrarPosicioGrup = i;
        // console.log(`Select group: ${borrarPosicioGrup}`);
      }
    };
  }

  // --- SHOW ALUMNS. -- //

  // I have done this with a little bit of help from ChatGPT.
  for (let i = 1; i <= nGrup.length; i++) {
    let alumnesGrupClicat = document.getElementById(`llistaGrup${i}`);

    alumnesGrupClicat.onclick = () => {
      document.getElementById("llistaAlumnesGrups").innerHTML =
        crearAlumesPerGrup(i - 1); // Because the array starts from 0 not from 1.
      // console.log(`llistaGrup${i}`);
    };
  }
});
