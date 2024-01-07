import { Component } from '@angular/core';

// Here I import the classes that I created.
import { Equip } from './equip';
import { Esportista } from './esportista';

@Component({
  selector: 'aplicacio',
  templateUrl: 'examen-component.html',
  styles: ['h1 { color: #900 }'],
})
export class examen_esportista_component {
  llistaEsportistes: Esportista[] = [
    new Esportista('1A', 'Joan', 'Davanter'),
    new Esportista('2B', 'Ramon', 'Centre'),
    new Esportista('3C', 'Colla2', 'Porter'),
  ];

  llistaEspDefecte = [this.llistaEsportistes[0], this.llistaEsportistes[1]];
  llistaEquips: Equip[] = [
    new Equip('Basket', 'Benjami', 'Baskeboleros', this.llistaEspDefecte),
  ];

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
    // This is to be able to find if dniEsportista is in the list.
    let esportista = this.llistaEsportistes.find(
      (e) => e.dniEsportista == dniEsportista
    );

    console.log(esportista);

    if (esportista) {
      // If a sportsman is found, add it to the team.
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
  esborrarEsportista(dniEsportista: string) {
    // Find the index of the Esportista with the given name
    const index = this.llistaEsportistes.findIndex(
      (esportista) => esportista.dniEsportista === dniEsportista
    );

    // Check if the Esportista with the given name exists, -1 means out of the array.
    if (index !== -1) {
      // Remove the Esportista from the array
      // this.llistaEsportistes.splice(index, 1);
      this.llistaEquips.splice(index);
      // console.log(this.llistaEquips[index].dniEsportista);
      console.log(`Index: ${index}`);
    }

    console.log(`DNI esportista: ${dniEsportista}`);
  }
}
