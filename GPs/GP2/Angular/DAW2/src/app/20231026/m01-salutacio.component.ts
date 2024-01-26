import { Component } from '@angular/core';
import {MatButtonModule} from '@angular/material/button';

@Component({
  selector: 'aplicacio', // I also changed <app-root></app-root> from index.html.
  template: '<h1>Hola, Angular de Google!</h1>',
  imports: [MatButtonModule],
})
export class M01_SalutacioComponent {}
