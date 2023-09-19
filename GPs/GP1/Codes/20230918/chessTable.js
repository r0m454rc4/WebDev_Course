function dibuixar() {  // This function is to execute the canvas when the webpage is loaded.
    let canvas = document.getElementById('areaDibuix');
    let ctx = canvas.getContext('2d');  // ctx (context) is an object.
    let increment = 75;

    ctx.lineWidth = 2;

    for (let i = 0; i < 8; i++, increment += 75) {
        if (i % 6.5 == 0.5) {
            ctx.strokeStyle = "red";
        } else if (i % 6 == 0.5) {
            ctx.strokeStyle = "white";
        }

        ctx.strokeRect(100, 100, increment, 75);
        ctx.strokeRect(100, 175, increment, 75);
        ctx.strokeRect(100, 250, increment, 75);
        ctx.strokeRect(100, 325, increment, 75);
        ctx.strokeRect(100, 400, increment, 75);
        ctx.strokeRect(100, 475, increment, 75);
        ctx.strokeRect(100, 550, increment, 75);
        ctx.strokeRect(100, 625, increment, 75);
    }
}

window.addEventListener('load', dibuixar, true);