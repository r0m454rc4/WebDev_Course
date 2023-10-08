interface Professor {
  // All of the teachers must pass the list.
  passarLlista(llista: string): boolean;
}

class Persona {
  private nom: string;

  constructor(n: string) {
    this.nom = n;
  }

  mostrarDAdes(): String {
    return this.nom;
  }
}

class ProfessorFp extends Persona implements Professor {
  constructor(n: string, private treballa: boolean) {
    super(n); // "nom" is sent to class Persona.
    this.treballa = treballa;
  }

  passarLlista(llista: string): boolean {
    // This logic can be different from ProfessorUni.
    return true;
  }
}
class ProfessorUni extends Persona implements Professor {
  passarLlista(llista: string): boolean {
    return false;
  }
}

let p1 = new ProfessorFp("Pepe", true);
let p2 = new ProfessorUni("Jordi");

// console.log(p1.passarLlista("DAW2"));
// console.log(p2.mostrarDAdes());

let professors: Professor[] = new Array();
professors[0] = p1;
professors[1] = p2;

// Polymorphism, depending the teacher will appear something or another, because they are not the same type.
for (let i = 0; i < professors.length; i++) {
  console.log(`Passa llista: ${professors[i].passarLlista("daw2")}`);
}
