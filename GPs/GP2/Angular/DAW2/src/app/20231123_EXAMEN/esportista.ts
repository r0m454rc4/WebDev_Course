// Class that represents a sporstman.

import { IEsportista } from './iEsportista';

// This class now implements the atributs from IPersona interface.
export class Esportista implements IEsportista {
  constructor(
    public dniEsportista: string,
    public nomEsportista: string,
    public posicioEsportista: string
  ) {
    this.dniEsportista = dniEsportista;
    this.nomEsportista = nomEsportista;
    this.posicioEsportista = posicioEsportista;
  }
}
