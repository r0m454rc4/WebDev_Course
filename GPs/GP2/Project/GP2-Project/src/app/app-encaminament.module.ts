import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { M01_SalutacioComponent } from './m01-salutacio.component';
import { M02_SumaComponent } from './m02-suma.component';

const encaminaments: Routes = [
  // If the path is empty, redirects to tho component salutacio.
  { path: '', redirectTo: '/salutacio', pathMatch: 'full' },
  { path: 'salutacio', component: M01_SalutacioComponent },
  { path: 'suma', component: M02_SumaComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(encaminaments)],
  exports: [RouterModule],
})
export class AppEncaminamentModule {}
