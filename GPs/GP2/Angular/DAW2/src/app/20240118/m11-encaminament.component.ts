/*
 * Component que definex el marc per a fer uns encaminaments a altres components
 * @author sergi grau, sergi.grau@fje.edu
 * @version 1.0
 * date 15.10.2017
 * format del document UTF-8
 *
 * CHANGELOG
 * 15.10.2017
 * - Component que definex el marc per a fer uns encaminaments a altres components
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- <a class="navbar-brand" href="#">{{ titol }}</a> -->
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <!-- routerLink="/salutacio is like an href but for angular. -->
          <!-- routerLinkActive="active" is to say that is active -->

          <section>
            <a routerLink="/salutacio" routerLinkActive="active">
              <button mat-raised-button color="accent">Salutacio</button>
            </a>
          </section>

          <section>
            <a
              class="nav-item nav-link"
              routerLink="/suma"
              routerLinkActive="active"
            >
              <button mat-raised-button color="primary">Suma</button></a
            >
          </section>

          <section>
            <a
              class="nav-item nav-link"
              routerLink="/iterador"
              routerLinkActive="active"
            >
              <button mat-raised-button color="warn">Iterador</button></a
            >
          </section>
        </div>
      </div>
    </nav>
    <router-outlet></router-outlet>
  `,
  styles: [
    `
      section {
        max-width: 600px;
        margin: 8px 8px 8px 0;
      }
    `,
  ],
})
export class M11_EncaminamentComponent {
  titol = 'DAW2 demo de routing';
}
