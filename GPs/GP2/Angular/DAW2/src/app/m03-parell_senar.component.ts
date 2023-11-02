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
  styles: ['h2 { color: #900 }', 'h3 {color:#0F0}'],
})
export class M03_ParellSenar {
  esParell: boolean;

  constructor() {
    this.esParell = false; // On the beggining the result will be 0.
  }

  comprovarParell(nombre: string): void {
    this.esParell = parseInt(nombre) % 2 == 0;
  }
}
