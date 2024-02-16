import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'ordenarPerNota',
})
export class Exercici2_OrdenarNotaPipe implements PipeTransform {
  transform(array: Array<any>, args: any) {
    if (array) {
      // console.log(args);

      let ordernarPerValor = args;
      let perValor = 1;

      console.log(ordernarPerValor);

      if (ordernarPerValor == false) {
        perValor = -1;
        console.log(`False: ${perValor}`);
      } else {
        perValor = 1;
        console.log(`True: ${perValor}`);
      }
      array.sort((a: any, b: any) => {
        if (a.nota < b.nota) {
          console.log(`a.nota < b.nota: ${a.nota < b.nota}`);
          return -1 * perValor;
        } else if (a.nota > b.nota) {
          console.log(`a.nota > b.nota: ${a.nota > b.nota}`);
          return 1 * perValor;
        } else {
          return 0;
        }
      });

      return array;
    }
  }
}
