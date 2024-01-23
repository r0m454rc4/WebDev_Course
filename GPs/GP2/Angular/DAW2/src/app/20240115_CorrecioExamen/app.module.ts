import { Jugador } from './jugador';

export class Equip {
  /**
   * Constructor de la classe Alumne
   * @param nom nom de l'alumne
   * @param nota  nota de l'alumne
   */
  constructor(
    public id: number,
    public nom: string,
    public jugadors?: Jugador[]
  ) {
    this.id = id;
    this.nom = nom;
    this.jugadors = jugadors;
  }
}
