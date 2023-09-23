package jocsetmitg;
import java.util.Scanner;  // I import Scanner class from utuil library of java.

public class jocsetmitg{
  public static void main(String[] args){  // main method.
    char seguir = 's';
    Scanner sc = new Scanner(System.in);  // With "Scanner(System.in)" I declare a new constructor that asks for an input.
    byte carta;
    float puntuacion = 0;

    System.out.println("Bienvenidos al Siete i Medio");
    System.out.println("Te muestro la primera carta");

    do {
      carta = (byte) (Math.random()*12+1);  // In order to generate a number from 1 to 12.
      
      if (!(carta == 8 || carta == 9)) {  // If I don't have an 8 or 9.
        System.out.println("Tu carta es: " + carta);

        if (carta >= 10 && carta <= 12) {
          puntuacion += 0.5;
        }

        puntuacion += carta;
    }
    
      System.out.println("Y tu puntuación es: " + puntuacion);

      if (puntuacion > 7.5) {
        System.out.println("Has perdido, final de la partida.");
        break;
      } else if (puntuacion == 7.5) {
        System.out.println("Has ganado.");
        break;
      } 

      System.out.println("Quieres una carta? (s/n)");
      seguir = sc.next().charAt(0);  // In order to ask for a char, the "0" is to access the first position.
    } while (seguir == 's');
  }
}