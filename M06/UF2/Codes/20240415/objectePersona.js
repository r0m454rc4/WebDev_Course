let persona = { nom: "r0m454rc4" };

persona.mostrarDades = function mostrarDades() {
  return "Hola " + this.nom;
};

console.log(persona.mostrarDades());
