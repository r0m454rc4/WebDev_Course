class Avio {
  numSerieAvio: string;
  numSeients: number;
  dniPassatger: Passatger[]; // Becasue a plane doesn't need to have an passenger.
  constructor(numSerieAvio: string, numSeients: number, dniPassatger?: any) {
    this.numSerieAvio = numSerieAvio;
    this.numSeients = numSeients;
    this.dniPassatger = dniPassatger;
  }
}

class Passatger {
  dniPassatger: string;
  nom: string;
  cognom: string;
  edat: number;
  numSerieAvio: Avio[];

  constructor(
    dniPassatger: string,
    nom: string,
    cognom: string,
    edat: number,
    numSerieAvio?: any
  ) {
    this.dniPassatger = dniPassatger;
    this.nom = nom;
    this.cognom = cognom;
    this.edat = edat;
    this.numSerieAvio = numSerieAvio;
  }
}

let avio1: Avio = new Avio("ABABA1", 100, ["11111111A", "22222222A"]);
let avio2: Avio = new Avio("CDCDC2", 20, "22222222A");

let passatger1: Passatger = new Passatger(
  "11111111A",
  "Pepe",
  "García",
  18,
  "ABABA1"
);
let passatger2: Passatger = new Passatger(
  "22222222A",
  "Godofredo",
  "Del Palo",
  21,
  ["ABABA1", "CDCDC2"]
);

const passatgers = [passatger1, passatger2];
const avions = [avio1, avio2];

passatgers.forEach((passatger) => {
  console.log(passatger);
});

avions.forEach((avio) => {
  console.log("------------------------");
  console.log(avio);
});
