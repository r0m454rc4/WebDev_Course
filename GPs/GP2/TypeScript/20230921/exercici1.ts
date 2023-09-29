// Primer programa en TS.

let fet: boolean = true;
let x: number = 2;
let y: number = 4;
let sortida: string = `El resultat de sumar ${x} més ${y} és ${x + y}`;

console.log(sortida);

let llista: number[] = [1, 3, 5, 7];  // If I used any, I could use a boolean, a string inside the array.

enum curs { ASIX, DAW, DAM };
let curs1; curs.DAW;

let num: any = "pepe"  // Could be a bool, number or string.
console.log((num as string).length);


// FUNCTION TEST

function sumar(n1: number, n2: number) {
    return n1 + n2;
}

console.log(sumar(3, 9));

// Anonymous function.

let suma = function (n1: number, n2: number) {
    return n1 + n2;
}

console.log(suma(1, 2));

// FUNCTION TEST with optional parameters.

function salutar(nom: string, salutacio?: string): string {
    if (!salutacio) salutacio = "Hola";  // If I don't have "salutacio":
    return `${salutacio}`;
}

console.log(salutar("Pepe", "Benvingut"));
console.log(salutar("Pepe"));  // I'll get "Hola".

// FUNCTION TEST 3.

function salutar1(nom: string, ...cognom: string[]) {  // The ellipsis is to be able to add more than one parameter (cognom), because is an array.
    return `${nom}, ${cognom}`;
}

console.log(salutar1("Pepe", "Garcia", "López"));