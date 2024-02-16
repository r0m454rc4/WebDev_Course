import { Component } from '@angular/core';

@Component({
  selector: 'aplicacio',
  templateUrl: './Exercici1.html',
})
export class Exercici1Component {
  inputEnviat: boolean = false;

  public enviar() {
    this.inputEnviat = true;
  }
}
