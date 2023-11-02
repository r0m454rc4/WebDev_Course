import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';

import { M01_SalutacioComponent } from './m01-salutacio.component'; // I import a component.
import { M02_SumaComponent } from './m02-suma.component';
// import { M02_SumaComponent_bis } from './m02bis-suma.component';
import { M03_ParellSenar } from './m03-parell_senar.component';
import { M03_IteradorComponent } from './m03-iterador.component';

@NgModule({
  declarations: [
    M01_SalutacioComponent,
    M02_SumaComponent,
    M03_ParellSenar,
    // M02_SumaComponent_bis,
    M03_IteradorComponent,
  ], // Here I must say the components I want to be able to use.
  imports: [BrowserModule],
  providers: [],
  bootstrap: [M03_IteradorComponent], // This is the component I'm using.
})
export class AppModule {}
