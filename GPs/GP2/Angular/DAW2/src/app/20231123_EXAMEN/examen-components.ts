import { Component } from '@angular/core';

// Here I import the classes that I created.
import { Equip } from './equip';
import { Esportista } from './esportista';

@Component({
  selector: 'aplicacio',
  templateUrl: 'examen-component.html',
  styles: ['h1 { color: #900 }'],
})
export class repas_iterador_component {
  llistaEsportistes: Esportista[] = [];

  // Here I have an array that contains all of of the passengers that will be on the plane.
  passatgerSelec = [this.llistaEsportistes[0], this.llistaEsportistes[2]];

  llistaEquips: Equip[] = [];

  public crearEsportista(
    dniEsportista: string,
    nomEsportista: string,
    posicioEsportista: string
  ) {
    this.llistaEsportistes.push(
      new Esportista(dniEsportista, nomEsportista, posicioEsportista)
    );
  }

  public crearEQuip(
    esport: string,
    categoria: string,
    nomEquip: string,
    dniEsportista: string
  ) {
    // This is to be able to find if a dniEsportista is in the list.
    let esportista = this.llistaEsportistes.find(
      (e) => e.dniEsportista == dniEsportista
    );

    if (esportista) {
      // If a passenger is found, I add it to the plane
      let equip = new Equip(esport, categoria, nomEquip, [esportista]);

      this.llistaEquips.push(equip);
    }
  }

  // Here I create a function that will create a table if a button is pressed, it'll do it if it's true.
  mostrarTaulaEquips: boolean = false;

  public mostrarEquips() {
    this.mostrarTaulaEquips = true;
  }

  mostrarTaulaEsportistes: boolean = false;

  public mostrarEsportistes() {
    this.mostrarTaulaEsportistes = true;
  }

  // Function to delete a sportsman.
  esborrarEsportista(nomEsportista: string) {
    // Find the index of the Esportista with the given name
    const index = this.llistaEsportistes.findIndex(
      (esportista) => esportista.nomEsportista === nomEsportista
    );

    // Check if the Esportista with the given name exists
    if (index !== -1) {
      // Remove the Esportista from the array
      this.llistaEsportistes.splice(index, 1);
    }
  }
}
