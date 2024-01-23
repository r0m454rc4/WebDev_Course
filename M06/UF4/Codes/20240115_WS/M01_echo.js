/*
 * comunicacions amb backend amb Node i WebSockets
 * @author  sergi.grau@fje.edu
 * @version 1.0 24.03.2021
 * format del document UTF-8
 *
 * CHANGELOG
 * 24.03.2021
 * - comunicacions amb backend amb Node i WebSockets
 *
 * NOTES
 * ORIGEN
 * Desenvolupament Aplicacions Web. Jesuïtes el Clot
 */
const socket = io();

// dadesDesDelClient is the key.
socket.emit("dadesDesDelClient", {
  dades: "123456",
});

// socket.on() is the callback.
// Each time the server gets new data.
socket.on("dadesDesDelServidor", function (data) {
  console.log("CLIENT -> dades rebudes del servidor->" + data.dades);
});
