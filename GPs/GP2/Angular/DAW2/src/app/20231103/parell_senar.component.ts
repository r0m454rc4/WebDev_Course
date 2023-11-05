import { Component } from '@angular/core';

@Component({
  selector: 'aplicacio',
  template: `
    <div>
      <input type="number" placeholder="Entra número" #nombre required />
    </div>

    <button (click)="comprovarParell(nombre.value)">Comprovar</button>

    <!--*ngIf is a conditional -->
    <h2 *ngIf="esParell">És parell</h2>
    <h3 *ngIf="!esParell">No és parell</h3>
  `,
  styles: ['h2 { color: #0F0 }', 'h3 {color:#900}'],
})
export class ParellSenar {
  esParell: boolean;

  constructor() {
    this.esParell = false; // On the beggining esParell will be false.
  }

  comprovarParell(nombre: string): void {
    this.esParell = parseInt(nombre) % 2 == 0; // It returns false/true.
  }
}
