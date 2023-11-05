import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { M01_SalutacioComponent } from './20231026/m01-salutacio.component'; // I import a component.
import { M02_SumaComponent } from './20231026/m02-suma.component';
import { ParellSenar } from './20231103/parell_senar.component';
import { M03_IteradorComponent } from './20231103/m03-iterador.component';
import { IteradorAlumneComponent } from './20231103/iterador-alumne.component';

@NgModule({
  declarations: [
    M01_SalutacioComponent,
    M02_SumaComponent,
    ParellSenar,
    M03_IteradorComponent,
    IteradorAlumneComponent,
  ], // Here I must say the components I want to be able to use.
  imports: [BrowserModule],
  providers: [],
  bootstrap: [IteradorAlumneComponent], // This is the component I'm using.
})
export class AppModule {}
