import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MatTabsModule } from '@angular/material/tabs';

import { AppEncaminamentModule } from './app-encaminament.module';

import { M01_SalutacioComponent } from './m01-salutacio.component'; // I import a component.
import { M02_SumaComponent } from './m02-suma.component';

import { M11_EncaminamentComponent } from './m11-encaminament.component';

@NgModule({
  declarations: [
    M01_SalutacioComponent,
    M02_SumaComponent,
    M11_EncaminamentComponent,
  ], // Here I must say the components I want to be able to use.
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    AppEncaminamentModule,
    MatTabsModule,
  ],
  bootstrap: [M11_EncaminamentComponent], // This is the component I'm using.
})
export class AppModule {}
