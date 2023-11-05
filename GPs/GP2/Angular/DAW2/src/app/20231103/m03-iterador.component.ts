import { Component } from '@angular/core';

@Component({
  selector: 'aplicacio',
  templateUrl: 'm03-iterador-component.html',
  styles: ['h1 { color: #900 }'],
})
export class M03_IteradorComponent {
  llistaAlumnes: string[] = ['Joan', 'Sergi', 'Anna'];

  afegirAlumne(alumne: string): void {
    this.llistaAlumnes.push(alumne);
  }

  esborrarAlumne(alumne: string) {
    if (this.llistaAlumnes.indexOf(alumne) >= 0) {
      this.llistaAlumnes.splice(this.llistaAlumnes.indexOf(alumne), 1); // I delete one name from the array.
    }
  }
}
