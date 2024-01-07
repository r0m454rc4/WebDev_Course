/*
 * Component que mostra el funcionament d'una pipe personalitzada
 * @author sergi grau, sergi.grau@fje.edu
 * @version 1.0
 * date 15.10.2016
 * format del document UTF-8
 *
 * CHANGELOG
 * 5.12.2017
 * - Component que mostra el funcionament d'una pipe personalitzada
 * 1.12.2020
 * - Actualització a Angular 11
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes El Clot
 */

import { Component } from '@angular/core';

@Component({
  selector: 'aplicacio',
  template: `
    <h2>LLista Alumnes</h2>

    <ul class="list-group">
      <li
        class="list-group-item"
        *ngFor="let alumne of alumnes | ordenarPer : '!n'"
      >
        <label *ngIf="alumne.n.length > 3">Nom : {{ alumne.n }}</label>
      </li>
    </ul>
  `,
})
export class M09_PipePersonalizadaComponent {
  articles: Array<any> = [];

  alumnes = [
    { i: 11, n: 'Sergi' },
    { i: 12, n: 'Anna' },
    { i: 13, n: 'Joan' },
    { i: 14, n: 'Pep' },
  ];
}
