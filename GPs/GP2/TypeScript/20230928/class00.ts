class Cotxe {
  private distanciaRecorreguda: number = 0; // Because I don't want to be able to modify distanciaRecorreguda from a variable.
  color: string;

  constructor(public esHibrid: boolean, color: string = "vermell") {
    // I created esHibrid whithout the need of declaring it.
    this.color = color;
  }

  conduir(distancia: number): void {
    this.distanciaRecorreguda += distancia;
  }

  static sonarClaxon(): string {
    // Static means that just can be used when I invoke the class.
    return "meeec";
  }

  get distancia(): number {
    return this.distanciaRecorreguda;
  }
}

let cotxe1: Cotxe = new Cotxe(false);
cotxe1.conduir(100);
console.log(cotxe1.distancia);

let cotxe2: Cotxe = new Cotxe(false, "blue");
cotxe2.conduir(20);
console.log(cotxe2.distancia, cotxe2.color, cotxe2.esHibrid);

cotxe1.conduir(15);
console.log(cotxe1.distancia);
