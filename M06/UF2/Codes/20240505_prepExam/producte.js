window.onload = () => {
  class Producte {
    constructor(nom, preu, quantitat) {
      this.nom = nom;
      this.preu = preu;
      this.quantitat = quantitat;
    }
  }

  let p1 = new Producte("Poma", 1.75, 3);
  let p2 = new Producte("Taronja", 3.99, 2);
  let p3 = new Producte("Sindria", 4.5, 1);

  class CarretCompra {
    constructor() {
      // this.productes = [];
      this.preuTotal = 0;
    }

    afegirProducte(producte) {
      for (let i = 0; i < producte.quantitat; i++) {
        // this.productes.push(producte);
        this.preuTotal += producte.preu;
        this.quantitatProductes++;

        document.getElementById(
          "informacioProductes"
        ).innerHTML += `${producte.nom} - ${producte.preu}€<br>`;
      }

      document.getElementById("preuTotalProductes").innerHTML = `
      --- --- --- --- --- ---
      <br>
      Preu total: ${this.preuTotal}€`;
    }
  }

  let carret = new CarretCompra();

  carret.afegirProducte(p1);
  carret.afegirProducte(p2);
  carret.afegirProducte(p3);
};
