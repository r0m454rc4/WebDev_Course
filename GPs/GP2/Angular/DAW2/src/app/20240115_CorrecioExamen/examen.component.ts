import { Component } from '@angular/core';
import { Jugador } from './jugador';
import { Equip } from './equip';

@Component({
  selector: 'aplicacio',
  templateUrl: 'examen.html',
  styles: ['h1 { color: #900 }'],
})
export class Examen {
  jugadorSeleccionat: number = 0;
  equipSeleccionat: number = 0;
  equipSeleccionatAmostrar: number = 0;
  llistaJugadorsEquipSeleccionat: Jugador[] = [];

  llistaJugadors: Jugador[] = [new Jugador(1, 'Joan', 'porter')];
  llistaEquips: Equip[] = [
    new Equip(0, 'DAW'),
    new Equip(1, 'DAM'),
    new Equip(2, 'ASIX'),
    new Equip(3, 'IA/Big Data'),
  ];
  constructor() {}
  crearJugador(id: string, nom: string, posicio: string): void {
    this.llistaJugadors.push(new Jugador(parseInt(id), nom, posicio));
  }
  assignarJugador(): void {
    console.log(this.jugadorSeleccionat, this.equipSeleccionat);
    const equip = this.llistaEquips.find((e) => e.id == this.equipSeleccionat);
    const jugador = this.llistaJugadors.find(
      (j) => j.id == this.jugadorSeleccionat
    );
    console.log(equip, jugador);

    if (equip && jugador) {
      if (equip.jugadors) {
        equip.jugadors.push(jugador);
      } else {
        equip.jugadors = [jugador];
      }
    }
    console.log(this.llistaEquips);
  }
  desassignarJugador(): void {}
  mostrarJugadors(): void {
    console.log(this.equipSeleccionatAmostrar);
    this.llistaJugadorsEquipSeleccionat = [];
    this.llistaEquips.forEach((e) => {
      if (e.id == this.equipSeleccionatAmostrar) {
        if (e.jugadors) {
          this.llistaJugadorsEquipSeleccionat.push(...e.jugadors);
        }
      }
    });
    console.log(this.llistaJugadorsEquipSeleccionat);
  }
}
