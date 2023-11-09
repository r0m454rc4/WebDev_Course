import { Component } from '@angular/core';
import { Alumne } from './alumne'; // I import the class Alumne.

@Component({
  selector: 'aplicacio',
  templateUrl: 'iterador-alumne.html',
  styles: ['h1 { color: #900 }'],
})
export class IteradorAlumneComponent {
  // Alumne[] is to call the constructor.
  llistaAlumnes: Alumne[] = [
    new Alumne('Joan', 10),
    new Alumne('Sergi', 7),
    new Alumne('Anna', 5),
  ];

  afegirAlumne(alumne: string, nota: string): void {
    let notaNum = parseFloat(nota);

    // Convert NaN to 0.
    if (isNaN(notaNum)) {
      notaNum = 0;
    }

    this.llistaAlumnes.push(new Alumne(alumne, notaNum)); // parseInt(nota) is to convert the string (as I get it from an HTML form to int).
  }

  esborrarAlumne(alumne: string) {
    this.llistaAlumnes.splice(
      this.llistaAlumnes.findIndex((alumneIndexat) => {
        return alumneIndexat.nom != alumne;
      }),
      1
    );
  }

  mostrarMitja() {
    for (let i of this.llistaAlumnes) {
      `La mitja és ${[this.llistaAlumnes[i].nota]}`;
    }
  }
}
