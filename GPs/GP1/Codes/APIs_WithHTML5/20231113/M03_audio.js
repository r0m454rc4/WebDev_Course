/*
 * programa que mostra com es pot treballar amb l'API audio
 * @author sergi.grau@fje.edu
 * @version 1.0
 * date 19.01.2017
 * format del document UTF-8
 *
 * CHANGELOG
 * 19.01.2017
 * - programa que mostra com es pot treballar amb l'API audio
 *
 * NOTES
 * ORIGEN
 * Desenvolupament en entorn client. Escola del clot
 */

document.getElementById('estat').addEventListener('click', canviaEstat, true);
document.getElementById('inici').addEventListener('click', anarInici, true);
document.getElementById('final').addEventListener('click', anarFinal, true);

var musica = document.getElementById("so");
var estat = document.getElementById("estat");
var temps = document.getElementById("temps");

 function inici() {
   musica.addEventListener("load", function() {
     musica.play();
     temps.innerHTML = musica.duration;

   });
 }

 function canviaEstat() {
   if(musica.paused) {
     musica.play();
     estat.innerHTML = "Pausa";
   } else {
     musica.pause();
     estat.innerHTML = "Reproducció";
   }
 }

 function anarInici() {
   musica.currentTime = 0;
 }

 function anarFinal() {
   musica.currentTime = musica.duration;
 }

 setInterval(mostraTemps, 1000);

 function mostraTemps(){
   temps.innerHTML=musica.currentTime;
 }
