window.onload = function () {
  let llista1 =
    "Paris Londres Roma Berlin Copenhaguen Viena Lisboa Washington_DC Otawa L'Havana Santiago Lima Montevideo Canberra Wellington Monròvia Abuja Dakar Tunis Tokyo Seül Beijing Taipei";
  llista1.split(" ");

  let llista2 =
    "França UK Itàlia Alemanya Dinamarca Àustria Portugal USA Canada Cuba Xile Perú Uruguay Austràlia Nova_ Zelanda Libèria Nigèria Senegal Tunísia Japó Corea_Sud Xina Taiwan";
  llista2.split(" ");

  let llista3 =
    "Europa Europa Europa Europa Europa Europa Europa Amèrica Amèrica Amèrica Amèrica Amèrica Amèrica Oceania Oceania Àfrica Àfrica Àfrica Àfrica Àsia Àsia Àsia";
  llista3.split(" ");

  // There's a bug because if I don't select anything on the beggining and then I click on the button with id "crearTaula" I won't get anything.
  let qPaisos = (document.getElementById("qPaisos").onchange = function () {
    qPaisos = document.getElementById("qPaisos").value;
  });

  document.getElementById("crearTaula").onclick = function () {
    for (let i = 0; i < qPaisos; i++) {
      // document.getElementById("taulaCapitals") = function(){
      //   // let taula = document.getElementById("taulaCapitals");
      //   // taula.innerHTML = "<tr>";
      //   // // taula.innerHTML = "PEPE"
      //   // taula.innerHTML = "</tr>";
      // }
      console.log("PEPE");
    }
  };
};
