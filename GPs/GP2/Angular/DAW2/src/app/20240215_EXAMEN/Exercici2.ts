// BUTTON THAT WHEN YOU CLICK, USE PIPES AND ORDER THE MARKS ASC/ DESC.
// INPUT THAT SHOWS THE MARKS THAT ARE GREATER OR EQUAL THAN THE ENTERED.
import { Component } from '@angular/core';
import { Assignatura } from './Assignatura';
import { Alumne } from './alumne';
import { Exercici2_OrdenarNotaPipe } from './Exercici2-Pipe';

@Component({
  selector: 'aplicacio',
  templateUrl: './Exercici2.html',
  styles: [
    `
      table {
        text-align: center;
        border-collapse: collapse;
      }

      th,
      td {
        border: solid 1px;
        padding: 10px;
      }
    `,
  ],
})
export class Exercici2Component {
  // alumnes = [
  //   new Alumne('3', 'Anna', new Assignatura(8)),
  //   new Alumne('1', 'Sergi', new Assignatura(5)),
  //   new Alumne('2', 'Joan', new Assignatura(3)),
  // ];

  alumnes = [
    new Alumne('3', 'Anna', 8),
    new Alumne('1', 'Sergi', 5),
    new Alumne('2', 'Joan', 3),
  ];

  ordreAscendent: boolean = false;

  // I've done this part with the help of chatGPT.
  public filtrarPerNota() {
    this.ordreAscendent = !this.ordreAscendent;
    let notaFiltrada = new Exercici2_OrdenarNotaPipe().transform(
      this.alumnes,
      this.ordreAscendent
    );

    console.log(notaFiltrada);
  }
}
