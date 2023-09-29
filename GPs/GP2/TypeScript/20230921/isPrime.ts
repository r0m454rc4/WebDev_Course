function esPrimer(num: number) {
  let bEsPrimer = true;

  if (num <= 1) {
    // The number 1 is not prime, and there are no negative primes.
    bEsPrimer = false;
  }

  for (let i = 2; i < num; i += 1) {
    if (num % i == 0) {
      bEsPrimer = false;
      break;
    }
  }

  if (bEsPrimer) {
    console.log("El número és primer");
  } else {
    console.log("El número no és primer");
  }
}

esPrimer(1);
esPrimer(2);
esPrimer(60);
esPrimer(73);
