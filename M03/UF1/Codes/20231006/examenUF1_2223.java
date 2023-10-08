import java.util.Scanner;

public class examenUF1_2223 {
  public static void main(String[] args) {
    Scanner sc = new Scanner(System.in);
    byte opcion;
    int[] valores = new int[10]; // I create a new integer array called valores that can have up to 10 elements.
    boolean inicializado = false;
    int nInicio;

    do {
      System.out.println("MENÚ DE OPCIONES:");
      System.out.println("1. Inicializar array");
      System.out.println("2. Añadir al inicio");
      System.out.println("3. Añadir al final");
      System.out.println("4. Añadir posición");
      System.out.println("5. Añadir ver datos");
      System.out.println("6. Salir");
      System.out.println("Elija una opción: ");

      opcion = sc.nextByte();

      switch (opcion) {
        case 1:
          System.out.println("Vamos a inicializar el array.");

          if (!(inicializado)) {
            for (int i = 0; i < 5; i++) {
              valores[i] = (int) (Math.random() * (101 - 1) + 1); // In order to generate a number from 1 to 100.
            }
            inicializado = true;
          } else {
            System.out.println("El array ya está inicializado.");
          }

          break;

        case 2:
          System.out.println("Vamos a añadir un valor al inicio.");

          do {
            System.out.println("Introduzca el número: ");
            nInicio = sc.nextInt();

            if (nInicio < 1 || nInicio > 100) {
              System.out.println("Número fuera de rango.");
            }

          } while (nInicio < 1 || nInicio > 100);

          valores[0] = nInicio;

          break;

        case 3:
          System.out.println("Vamos a añadir un valor al final.");

          for (int i = 0; i < valores.length; i++) {
            if (valores[i] == 0 && i < 10) {
              System.out.println("Introduzca el valor:");
              valores[i] = sc.nextInt();
              i = 11; // In order to exit the conditional without using a break;
            }
            if (i == 10) {
              System.out.println("Array completado.");
            }
          }

          break;

        case 4:
          System.out.println("Añadir valor en posición dada.");

          break;

        case 5:
          System.out.println("Ver contenido del array.");

          for (int i = 0; i < 10; i++) {
            System.out.println(valores[i]);
          }

          break;

        case 6:
          System.out.println("Muchas gracias por usar nuestra aplicación.");

          break;

        default:
          System.out.println("Opción incorrecta, aprendemos a leer?");

          break;
      }

    } while (opcion != 6);
  }
}