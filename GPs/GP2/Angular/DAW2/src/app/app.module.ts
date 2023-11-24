import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { M01_SalutacioComponent } from './20231026/m01-salutacio.component'; // I import a component.
import { M02_SumaComponent } from './20231026/m02-suma.component';
import { ParellSenar } from './20231103/parell_senar.component';
import { M03_IteradorComponent } from './20231103/m03-iterador.component';
import { M03_mitja_iterador_component } from './20231109/m03-mitja-iterador.component';
import { M04_PomodoroComponent } from './20231116/m04-pomodoro.component';

import { repas_iterador_component } from './20231123_EXAMEN/examen-components';

@NgModule({
  declarations: [
    M01_SalutacioComponent,
    M02_SumaComponent,
    ParellSenar,
    M03_IteradorComponent,
    M03_mitja_iterador_component,
    M04_PomodoroComponent,
    repas_iterador_component,
  ], // Here I must say the components I want to be able to use.
  imports: [BrowserModule],
  providers: [],
  bootstrap: [repas_iterador_component], // This is the component I'm using.
})
export class AppModule {}
