package edu.fje.daw2.joccartes;

public class ObtenirCarta {
  String tipusCarta[] = { "ors", "espases", "copes", "bastons" };

  // Function that generates a random card, from 1 to 12.
  String generarCarta(String[] tpCartaAl) {
    int cartaAleatoria = (int) Math.floor(Math.random() * 12) + 1; // Generate a random number.
    int cartaIndex = (int) Math.floor(Math.random() * tipusCarta.length);

    tpCartaAl[0] = tipusCarta[(int) cartaIndex];

    String cartaAl = Integer.toString(cartaAleatoria) + " de " + tpCartaAl[0];

    return cartaAl;
  }
}
