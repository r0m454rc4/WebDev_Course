// Class that represents a team.

import { IEquip } from './iEquip';
import { Esportista } from './esportista';

// This class now implements the atributs from IEquip interface.
export class Equip implements IEquip {
  constructor(
    public esport: string,
    public categoria: string,
    public nomEquip: string,
    public dniEsportista: Esportista[]
  ) {
    this.esport = esport;
    this.categoria = categoria;
    this.nomEquip = nomEquip;
    this.dniEsportista = dniEsportista;
  }
}
