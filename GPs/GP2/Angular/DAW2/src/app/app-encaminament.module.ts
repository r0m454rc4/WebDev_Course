/*
 * Mòdul d'encaminament
 * @author sergi grau, sergi.grau@fje.edu
 * @version 1.0
 * date 15.10.2017
 * format del document UTF-8
 *
 * CHANGELOG
 * 15.10.2017
 * - Mòdul d'encaminament
 *
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes El Clot
 */

import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { Exercici2Component } from './20240215_EXAMEN/Exercici2';
import { Exercici3CrearComponent } from './20240215_EXAMEN/Exercici3-crear';

const encaminaments: Routes = [
  // If the path is empty, redirects to tho component salutacio.
  { path: '', redirectTo: '/inici', pathMatch: 'full' },
  { path: 'inici', component: Exercici2Component },
  { path: 'crear', component: Exercici3CrearComponent },
  // { path: 'iterador', component: M03_IteradorComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(encaminaments)],
  exports: [RouterModule],
})
export class AppEncaminamentModule {}
