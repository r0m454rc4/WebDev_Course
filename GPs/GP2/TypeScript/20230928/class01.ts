class Alumne {
  dni: string;
  nom: string;
  cognom: string;
  curs: string;
  nota: number;
  assignatura: Assignatura[]; // Needs to have "[]" because I can have more than one assignatura.

  constructor(
    dni: string,
    nom: string,
    cognom: string,
    curs: string,
    nota: number,
    assignatura?: any // Becasue an alumn doesn't need to have an assignatura.
  ) {
    this.dni = dni;
    this.nom = nom;
    this.cognom = cognom;
    this.curs = curs;
    this.nota = nota;
    this.assignatura = assignatura;

    if (this.nota < 0 || this.nota > 10) {
      this.nota = 0;
    }
  }
}

class Assignatura {
  assignatura: string;
  hores: number;
  professor: string;

  constructor(assignatura: string, hores: number, professor: string) {
    this.assignatura = assignatura;
    this.hores = hores;
    this.professor = professor;
  }
}

let assignatura1: Assignatura = new Assignatura("Python3", 99, "Pepe");
let assignatura2: Assignatura = new Assignatura(
  "Bases de datos",
  300,
  "Antonio"
);

let alumne1: Alumne = new Alumne("1111111A", "Pepe", "García", "DAW2", 5, [
  assignatura1,
  assignatura2,
]);
let alumne2: Alumne = new Alumne(
  "2222222B",
  "Manuel",
  "Rodríguez",
  "ASIX2",
  9,
  assignatura1
);
let alumne3: Alumne = new Alumne(
  "3333333C",
  "Godofredo",
  "Labrado",
  "DAM2",
  -1,
  assignatura2
);

const alumnes = [alumne1, alumne2, alumne3];

alumnes.forEach((alumne) => {
  console.log(alumne);
});
