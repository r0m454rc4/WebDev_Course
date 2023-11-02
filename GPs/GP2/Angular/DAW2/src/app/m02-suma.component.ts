import { Component } from '@angular/core';

@Component({
  selector: 'aplicacio',
  template: `
    <div>
      <input type="text" placeholder="Entra nombre 1" #n1 required />
    </div>

    <div>
      <input type="text" placeholder="Entra nombre 2" #n2 required />
    </div>
    <button (click)="sumar(n1.value, n2.value)">Suma</button>
    <button (click)="restar(n1.value, n2.value)">Resta</button>
    <div role="alert">
      <!-- With whis I print the result of resultat -->
      <h1>El resultat és {{ resultat }}</h1>
    </div>

    <!--*ngIf is a conditional -->
    <h2 *ngIf="resultat < 0">el valor es negatiu</h2>
    <h3 *ngIf="resultat > 10">el valor es superior a 10</h3>
  `,
  styles: ['h2 { color: #900 }', 'h3 {color:#0F0}'],
})
export class M02_SumaComponent {
  resultat: number;

  constructor() {
    this.resultat = 0; // On the beggining the result will be 0.
  }
  sumar(n1: string, n2: string): void {
    this.resultat = parseInt(n1) + parseInt(n2);
  }
  restar(n1: string, n2: string): void {
    this.resultat = parseInt(n1) - parseInt(n2);
  }
}
