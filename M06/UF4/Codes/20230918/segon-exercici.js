window.onload = function () {
    console.log("Funciona");

    let boto = document.getElementById('boto');
    boto.addEventListener('click', calculaProducte);

    function calculaProducte() {
        let n1 = document.getElementById('n1').value;  // .value = property.
        let n2 = document.getElementById('n2').value;
        console.log(n1 * n2);

        document.getElementById('resultat').innerHTML = 'El resultat és ' + n1 * n2;
    }
}