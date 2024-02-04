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
      <a class="navbar-brand" href="#">{{ titol }}</a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <!-- routerLink="/salutacio is like an href but for angular. -->
          <!-- routerLinkActive="active" is to say that is active -->
          <a routerLink="/salutacio" routerLinkActive="active">Salutacio </a>
          <a
            class="nav-item nav-link"
            routerLink="/suma"
            routerLinkActive="active"
            >Suma</a
          >
          <a
            class="nav-item nav-link"
            routerLink="/iterador"
            routerLinkActive="active"
            >iterador</a
          >
        </div>
      </div>
    </nav>
    <router-outlet></router-outlet>
  `,
})
export class M11_EncaminamentComponent {
  titol = 'DAW2 demo de routing';
}
