/*
 * Component que te la lògica del component compte enrera,
 * mostra con es generen esdeveniments i es controlen propietats
 * @author sergi grau, sergi.grau@fje.edu
 * @version 1.0
 * date 15.10.2016
 * format del document UTF-8
 *
 * CHANGELOG
 * 15.10.2016
 * - Component que te la lògica del component compte enrera,
 * 15.10.2017
 * - Actualització a Angular 5
 * 1.12.2020
 * - Actualització a Angular 11
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes El Clot
 */
import { Component } from '@angular/core';
import { Alumne } from './alumne';

@Component({
  selector: 'aplicacio',
  templateUrl: 'm03-mitja-iterador.component.html',
  styles: ['h1 { color: #900 }'],
})
export class M03_mitja_iterador_component {
  public mitjanaNotes: number = 0; // If I don't have any mark, value of mitjanaNotes will be 0.

  llistaAlumnes: Alumne[] = [
    new Alumne(1, 'Joan', 10),
    new Alumne(2, 'Sergi', 5),
    new Alumne(3, 'Anna', 0),
  ];

  constructor() {
    this.calcularMitjana(); // On the constructor I call calcularMitjana(), in order call it from the beggining.
  }

  afegirAlumne(id: string, nom: string, nota: string): void {
    this.llistaAlumnes.push(new Alumne(parseInt(id), nom, parseInt(nota)));
    this.calcularMitjana(); // I call calcularMitjana() in order to get the new average.
  }

  esborrarAlumne(id: string): void {
    this.llistaAlumnes.forEach((alumne, index) => {
      if (alumne.id === parseInt(id)) this.llistaAlumnes.splice(index, 1);
    });
    this.calcularMitjana();
  }

  calcularMitjana(): void {
    let suma: number = 0;
    for (let alumne of this.llistaAlumnes) {
      suma += alumne.nota;
    }
    this.mitjanaNotes = suma / this.llistaAlumnes.length;
  }
}
