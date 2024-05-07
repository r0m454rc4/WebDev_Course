window.onload = () => {
  class Persona {
    constructor(nom) {
      this.nom = nom;
    }
  }

  class Treballador extends Persona {
    constructor(nom, salari) {
      super(nom);
      this.salari = salari;
    }
  }

  let treballador1 = new Treballador("Auron", 1000);
  let treballador2 = new Treballador("Colla2", 2300);
  let treballador3 = new Treballador("Esther", 1000);
  let treballador4 = new Treballador("Maria", 1500);

  class Empresa {
    constructor(nom, salari) {
      this.nom = nom;
      this.salari = salari;
      this.quantitatTreballadors = new Map();
    }

    // afegirTreballador(treballador) {
    //   this.nom = treballador.nom;
    //   this.salari = treballador.salari;

    //   document.getElementById(
    //     "informacioTreballadors"
    //   ).innerHTML += `${this.nom} - ${this.salari}€<br>`;

    //   console.log(`${this.nom} - ${this.salari}`);
    // }

    afegirTreballador(treballador) {
      this.nom = treballador.nom;
      this.salari = treballador.salari;
      this.quantitatTreballadors.set(this.nom, this.salari);
    }

    llistarTreballadors() {
      console.log(this.quantitatTreballadors);

      let regexp = /\b[aoeui]\w*/gi;

      for ([this.nom, this.salari] of this.quantitatTreballadors) {
        if (regexp.test(this.nom)) {
          document.getElementById(
            "informacioTreballadors"
          ).innerHTML += `${this.nom} - ${this.salari}€<br>`;

          // Here there's a bug I need to fix.
          this.salari += this.salari;
          document.getElementById("salariTotal").innerHTML = `${this.salari}€`;
        }
      }
    }
  }

  document.getElementById("botoTramita").onclick = () => {
    let empresa = new Empresa();

    empresa.afegirTreballador(treballador1);
    empresa.afegirTreballador(treballador2);
    empresa.afegirTreballador(treballador3);
    empresa.afegirTreballador(treballador4);

    empresa.llistarTreballadors();
  };
};
