window.onload = () => {
  let obtenirOperacio = {
    operacio: document.getElementById("operacioARealitzar"),
  };

  // https://thewebdev.info/2022/07/20/how-to-calculate-string-value-in-javascript-without-using-eval/
  obtenirOperacio.transformarNombre = (fn) => {
    return new Function("return " + fn)();
  };

  obtenirOperacio.calcularResultat = function calcularResultat() {
    if (this.operacio.value == "") {
      return alert("Operacio no valida.");
    } else {
      return obtenirOperacio.transformarNombre(this.operacio.value);
    }
  };

  document.getElementById("enviaOperacio").onclick = function () {
    document.getElementById("resultat").innerHTML =
      obtenirOperacio.calcularResultat();
  };
};
