// BUTTON THAT WHEN YOU CLICK, USE PIPES AND ORDER THE MARKS ASC/ DESC.
// INPUT THAT SHOWS THE MARKS THAT ARE GREATER OR EQUAL THAN THE ENTERED.
import { Component } from '@angular/core';
import { Assignatura } from './Assignatura';
import { Alumne } from './alumne';

@Component({
  selector: 'aplicacio',
  templateUrl: './Exercici3.html',
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
export class ExerciciExamen3Component {
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
}
