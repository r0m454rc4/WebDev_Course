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

import { M01_SalutacioComponent } from './20231026/m01-salutacio.component';
import { M02_SumaComponent } from './20231026/m02-suma.component';
import { M03_IteradorComponent } from './20231103/m03-iterador.component';

const encaminaments: Routes = [
  // If the path is empty, redirects to tho component salutacio.
  { path: '', redirectTo: '/salutacio', pathMatch: 'full' },
  { path: 'salutacio', component: M01_SalutacioComponent },
  { path: 'suma', component: M02_SumaComponent },
  { path: 'iterador', component: M03_IteradorComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(encaminaments)],
  exports: [RouterModule],
})
export class AppEncaminamentModule {}
