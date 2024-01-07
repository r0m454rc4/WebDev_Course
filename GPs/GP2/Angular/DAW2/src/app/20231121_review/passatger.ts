// Class that represents a passenger.

import { IPassatger } from './iPassatger';

// This class now implements the atributs from IPersona interface.
export class Passatger implements IPassatger {
  /**
   * Constructor of the class Passatger.
   * @param nom name of the person.
   * @param dniPassatger nif from the person.
   * @param edat age from the person.
   */

  constructor(
    public nom: string,
    public dniPassatger: string,
    public edat: number
  ) {
    this.nom = nom;
    this.dniPassatger = dniPassatger;
    this.edat = edat;
  }
}
