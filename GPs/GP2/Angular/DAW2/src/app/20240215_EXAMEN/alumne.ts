// Class that represents a person.
import { IPersona } from './iPersona';
import { Assignatura } from './Assignatura';

// This class now implements the atributs from IPersona interface.
export class Alumne implements IPersona {
  constructor(
    public codi: string,
    public nomPersona: string,
    // public nota: Assignatura
    public nota: string
  ) {
    this.codi = codi;
    this.nomPersona = nomPersona;
    this.nota = nota;
  }
}
