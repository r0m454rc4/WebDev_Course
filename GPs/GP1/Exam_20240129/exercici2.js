// To cancel the timer at end of play
var intervalId;

var estat = document.getElementById("estat");
var temps = document.getElementById("temps");

var videoIniciat = false;
var video = document.getElementById("movies");

function iniciVideo() {
  // posa en marxa el timer només el primer cop
  if (videoIniciat) return;
  videoIniciat = true;
}

// atura la creació d'instantànies
function parar() {
  clearInterval(intervalId);
}

document.getElementById("estatReproduit").addEventListener("click", reprodueix, true);
document.getElementById("estatParat").addEventListener("click", parar, true);
document.getElementById("inici").addEventListener("click", anarInici, true);
document.getElementById("final").addEventListener("click", anarFinal, true);

function anarInici() {
  video.currentTime = 0;
}

function anarFinal() {
  video.currentTime = video.duration;
}

function reprodueix() {
  video.play();
  estatReproduit.innerHTML = "Reprodueix";
}

function pausa() {
  video.pause();
  estatParat.innerHTML = "Pausa";
}

setInterval(mostraTemps, 1000); // To execute mostraTemps every second.

function mostraTemps() {
  temps.innerHTML = video.currentTime;
}
