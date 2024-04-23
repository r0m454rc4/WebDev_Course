function Persona(n) {
  this.nom = n;
}

let persona1 = new Persona("Pepe");
let alumne1 = Object.create(Persona);
alumne1.nom = "Manuel";

let usuari = {
  nom: "Colla2",
  curs: "DAW2",
  nota: 5,

  set nota(n) {
    if (n > 10) n = 10;
    if (n < 0) n = 0;
    this.n = s;
  },

  get nota() {
    return `La nota es ${this.n}`;
  },
};

if (!alumne1.curs) {
  alert("Te valor");
}

// This is to add a new method to persona.
Persona.prototype.mostraDades = function () {
  return `Hola soc en ${this.nom}`;
};

persona1.mostraDades();
