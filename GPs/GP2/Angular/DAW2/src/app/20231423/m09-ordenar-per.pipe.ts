/*
 * Pipe personalitzada que ordena un array
 * @author sergi grau, sergi.grau@fje.edu
 * @version 1.0
 * date 15.10.2016
 * format del document UTF-8
 *
 * CHANGELOG
 * 5.12.2017
 * - Pipe personalitzada que ordena un array
 * 1.12.2020
 * - Actualització a Angular 11
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes El Clot
 */

import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'ordenarPer',
})
export class M09_OrdenarPerPipe implements PipeTransform {
  transform(array: Array<any>, args: any) {
    if (array) {
      let ordernarPerValor = args[0];
      let perValor = 1;

      if (ordernarPerValor.charAt(0) == '!n') {
        perValor = -1;
        ordernarPerValor = ordernarPerValor.substring(1);
      }

      array.sort((a: any, b: any) => {
        if (a[ordernarPerValor] < b[ordernarPerValor]) {
          return -1 * perValor;
        } else if (a[ordernarPerValor] > b[ordernarPerValor]) {
          return 1 * perValor;
        } else {
          return 0;
        }
      });

      array.forEach((a: any) => {
        if (a.n.length > 3) {
          console.log(`Inici: ${a.n}: ${a.n.length}`);
          a.n = a.n.slice(0, 3) + '...';
          console.log(`Resultat: ${a.n}`);
        }
      });

      return array;
    }
  }
}
