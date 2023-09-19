function suma(x, y) {
    return x + y;
}

window.onload = function () {
    document.getElementById("calculaSuma")
        .addEventListener("click", function () {  // To detect if I click on the button.
            console.log("Has fet click");
            document.getElementById("estilResultat")
                .innerHTML += "El resultat és <b>" + suma(2, 3) + "</b><br>"  // I add a div with this content.
        })
}