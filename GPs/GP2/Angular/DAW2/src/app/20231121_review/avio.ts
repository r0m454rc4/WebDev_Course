// Class that represents a plane.

import { IAvio } from './iAvio';
import { Passatger } from './passatger';

// This class now implements the atributs from IPersona interface.
export class Avio implements IAvio {
  /**
   * Constructor of the class Persona.
   * @param nom name of the person.
   * @param dni nif from the person.
   * @param edat age from the person.
   */

  constructor(
    public numSerie: string,
    public model: string,
    public seients: number,
    public origen: string,
    public desti: string,
    public dniPassatger: Passatger[]
  ) {
    this.numSerie = numSerie;
    this.model = model;
    this.seients = seients;
    this.origen = origen;
    this.desti = desti;
    this.dniPassatger = dniPassatger;
  }
}
