import { Component } from '@angular/core';

// Here I import the classes that I created.
import { Avio } from './avio';
import { Passatger } from './passatger';

@Component({
  selector: 'aplicacio',
  templateUrl: 'repas-iterador-component.html',
  styles: ['h1 { color: #900 }'],
})
export class repas_iterador_component {
  llistaPassatgers: Passatger[] = [
    new Passatger('Joan', '1234567A', 5),
    new Passatger('Manel', '1482190B', 50),
    new Passatger('Collados', '8901909B', 61),
  ];

  // Here I have an array that contains all of of the passengers that will be on the plane.
  passatgerSelec = [this.llistaPassatgers[0], this.llistaPassatgers[2]];

  llistaAvions: Avio[] = [
    new Avio('1234567AB', 'A380', 519, 'BCN', 'DBX', this.passatgerSelec),
  ];

  public crearPassatger(nom: string, dni: string, edat: string) {
    this.llistaPassatgers.push(new Passatger(nom, dni, parseInt(edat)));
  }

  mostrarTaulaPassatgers: boolean = false;

  public mostrarPassatgers() {
    this.mostrarTaulaPassatgers = true;
  }

  public crearAvio(
    numSerie: string,
    model: string,
    seients: string,
    origen: string,
    desti: string,
    dniPassatger: string
  ) {
    // This is to be able to find if a dniPassatger is in the list.
    let passatger = this.llistaPassatgers.find(
      (p) => p.dniPassatger == dniPassatger
    );

    if (passatger) {
      // If a passenger is found, I add it to the plane
      let avio = new Avio(numSerie, model, parseInt(seients), origen, desti, [
        passatger,
      ]);

      this.llistaAvions.push(avio);
    }
  }

  // Here I create a function that will create a table if a button is pressed, it'll do it if it's true.
  mostrarTaulaAvions: boolean = false;

  public mostrarAvions() {
    this.mostrarTaulaAvions = true;
  }

  public afegirPassatger(
    numSerie: string,
    model: string,
    seients: string,
    origen: string,
    desti: string,
    dniPassatger: string
  ) {
    // This is to be able to find if a dniPassatger is in the list.
    let passatger = this.llistaPassatgers.find(
      (p) => p.dniPassatger == dniPassatger
    );

    if (passatger) {
      // If a passenger is found, I add it to the plane
      let avio = new Avio(numSerie, model, parseInt(seients), origen, desti, [
        passatger,
      ]);

      this.llistaAvions.push(avio);
    }
  }
}
