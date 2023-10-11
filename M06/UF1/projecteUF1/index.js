window.onload = function () {
  class Alumne {
    constructor(dniAlumne, nomAlumne, cognomAlumne, cursAlumne, notaAlumne) {
      this.dniAlumne = dniAlumne;
      this.nomAlumne = nomAlumne;
      this.cognomAlumne = cognomAlumne;
      this.cursAlumne = cursAlumne;
      this.notaAlumne = notaAlumne;
    }
  }

  let llistaAlumnes = [
    // List that contains all of the alumns.
    (alumne1 = new Alumne("1111111A", "Leo", "Herrera", "DAW2", 6)),
    (alumne2 = new Alumne("2222222A", "Romà", "Sardá", "DAW2", 6.5)),
    (alumne3 = new Alumne("3333333A", "Victor", "Toro", "DAW2", 6)),
    // 2nd group.
    (alumne4 = new Alumne("4444444B", "Alejando", "Torrente", "DAW2", 7)),
    (alumne5 = new Alumne("4444444B", "Bru", "Carreras", "DAW2", 5.5)),
    (alumne6 = new Alumne("5555555B", "Javier", "Pérez", "DAW2", 6.05)),
    // 3rd group.
    (alumne7 = new Alumne("4444444C", "Bru", "Carreras", "DAW2", 5.5)),
    (alumne8 = new Alumne("5555555C", "Javier", "Pérez", "DAW2", 7.12)),
    (alumne9 = new Alumne("6666666C", "Toni", "Varon", "DAW2", 6.05)),
    // 4th group.
    (alumne7 = new Alumne("7777777D", "Alex", "Maench", "DAW2", 8.25)),
    (alumne8 = new Alumne("8888888D", "Adrià", "Millian", "DAW2", 6.69)),
    (alumne9 = new Alumne("9999999D", "Arnau", "Vicente", "DAW2", 4.35)),
  ];

  function crearGrupsAlunes() {
    let grups = [];

    console.log(grups);

    for (let i = 0; i < 10; i++) {
      let grup = [];

      for (let j = 0; j < 3; j++) {
        let alumne = llistaAlumnes[j];
        grup.push(alumne); // With push I add "alumne" to the end of "grup" array.
      }

      grups.push(grup);
    }
  }

  crearGrupsAlunes();
};
