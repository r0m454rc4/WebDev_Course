import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { M01_SalutacioComponent } from './20231026/m01-salutacio.component'; // I import a component.
import { M02_SumaComponent } from './20231026/m02-suma.component';
import { ParellSenar } from './20231103/parell_senar.component';
import { M03_IteradorComponent } from './20231103/m03-iterador.component';
import { M03_mitja_iterador_component } from './20231109/m03-mitja-iterador.component';
import { M04_PomodoroComponent } from './20231116/m04-pomodoro.component';

import { repas_iterador_component } from './20231123_EXAMEN/examen-components';
import {
  M05_BindingsComponent,
  M05_CompteEnrera_Component,
} from './20231423/m05-bindings.component';
import { M06_DirectivesComponent } from './20231423/m06-directives.component';
import { M07_DirectivaPersonalizada } from './20231423/m07-directiva-personalitzada.directive';
import { M07_DirectivaPersonalitzadaComponent } from './20231423/m07-directiva-personalitzada.component';
import { M08_PipesComponent } from './20231423/m08-pipes.component';
import { M09_OrdenarPerPipe } from './20231423/m09-ordenar-per.pipe';
import { M09_PipePersonalizadaComponent } from './20231423/m09-pipe-personalitzada.component';

@NgModule({
  declarations: [
    M01_SalutacioComponent,
    M02_SumaComponent,
    ParellSenar,
    M03_IteradorComponent,
    M03_mitja_iterador_component,
    M04_PomodoroComponent,
    repas_iterador_component,
    M05_BindingsComponent,
    M05_CompteEnrera_Component,
    M05_BindingsComponent,
    M06_DirectivesComponent,
    M07_DirectivaPersonalizada,
    M07_DirectivaPersonalitzadaComponent,
    M08_PipesComponent,
    M09_OrdenarPerPipe,
    M09_PipePersonalizadaComponent,
  ], // Here I must say the components I want to be able to use.
  imports: [BrowserModule],
  providers: [],
  bootstrap: [M09_PipePersonalizadaComponent], // This is the component I'm using.
})
export class AppModule {}
