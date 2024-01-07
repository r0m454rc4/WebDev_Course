/*
 * Component que demostra el funcionament de diverses directives
 * Fa ús d'una classe interna
 * @author sergi grau, sergi.grau@fje.edu
 * @version 1.0
 * date 15.10.2016
 * format del document UTF-8
 *
 * CHANGELOG
 * 15.10.2016
 * - Component embolcall que utilitza un subcomponent amb la lògica
 * 5.12.2017
 * - correccions i actualitzacions
 * 1.12.2020
 * - Actualització a Angular 11
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes El Clot
 */

import { Component } from '@angular/core';

export class Alumne {
  id: number = 0;
  nom: string = '';
}

@Component({
  selector: 'aplicacio',
  template: `
    <p>expressió: {{ estatVisible }}</p>
    <button class="btn btn-primary" (click)="dada = 2">dada 2</button>
    <button class="btn btn-primary" (click)="dada = 3">dada 3</button>
    <button class="btn btn-primary" (click)="veureInfo()">Mostrar info</button>

    <!-- if estatVisible is true. -->
    <div *ngIf="estatVisible">
      <!-- [ngStyle] is a directive, color is a dynamic style.  -->
      <h2 [ngStyle]="{ color: color }">Angular2!</h2>
    </div>

    <ul class="list-group">
      <!-- [ngClass] is a static class. -->
      <!-- I use *ngFor to iterate over the list of alumns. -->
      <li
        [ngClass]="'blau'"
        class="list-group-item"
        *ngFor="let alumne of alumnes; let i = index"
      >
        Alumne #{{ i }} {{ alumne.nom }}
      </li>
    </ul>

    <!-- [ngSwitch] is another directive. -->
    <div [ngSwitch]="dada">
      <!-- *ngSwitchCase is to check if the 2nd case. -->
      <h2 *ngSwitchCase="2">has seleccionat 2</h2>

      <!-- ng-container allows you to add more things, such as a component or other things... -->
      <ng-container *ngSwitchCase="3">
        <h2>has seleccionat 3</h2>
      </ng-container>

      <!-- *ngSwitchDefault is the default option of the switch. -->
      <p *ngSwitchDefault>No has seleccionat res</p>
    </div>
  `,
  // The color of the dynamic style.
  styles: ['.blau { color: #00F }'],
})
export class M06_DirectivesComponent {
  color: string = 'red';
  dada: number = 4;

  alumnes = [
    { id: 11, nom: 'Sergi' },
    { id: 12, nom: 'Joan' },
    { id: 13, nom: 'Anna' },
  ];

  estatVisible: boolean = false;

  veureInfo(): void {
    this.estatVisible = !this.estatVisible;
  }
}
