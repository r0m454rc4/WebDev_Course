import java.util.Scanner;

public class OperacionsAritmetiques {
  // Here I declare two functions that check if a number is negative or not.

  static Number compNumNeg(double base, double altura) {
    if (base < 0 || altura < 0) {
      System.out.println("Error, la base " + base + " o la altura " + altura + " es negativa.");
      return 1;

    }
    return null;
  }

  static Number compRadNeg(double radio) {
    if (radio < 0) {
      System.out.println("El radio introducido " + radio + " es negativo.");
      return 1;
    }

    return null;
  }

  public static void main(String[] args) {
    Scanner sc = new Scanner(System.in);

    char opcion;
    double area = 0, radio = 0, base = 0, altura = 0;

    do {
      System.out.println("MENÚ DE OPCIONES:");
      System.out.println("1. Calcular el área de un cuadrado.");
      System.out.println("2. Calcular el área de un triángulo.");
      System.out.println("3. Calcular el área de un círculo.");
      System.out.println("'l' o 'L'. Limpiar consola.");
      System.out.println("'5' o 's'. Finalizar.");
      System.out.println("Elija una opción: ");

      opcion = sc.next().charAt(0);
      opcion = Character.toUpperCase(opcion);
      // System.out.println("Opción: " + opcion);

      switch (opcion) {
        case '1':
          System.out.println("Vamos a calcular el área de un cuadrado.");
          System.out.println("Base del cuadrado: ");
          base = sc.nextDouble();
          System.out.println("Altura del cuadrado: ");
          altura = sc.nextDouble();

          // compNumNeg is the method I use to check if is a positive or negative number
          if (compNumNeg(base, altura) != null) {
            continue;
          } else {
            area = base * altura;
            System.out.println("El área del cuadrado es: " + area);
          }

          break;

        case '2':
          System.out.println("Vamos a calcular el área de un triángulo.");
          System.out.println("Base del triángulo: ");
          base = sc.nextDouble();
          System.out.println("Altura del triángulo: ");
          altura = sc.nextDouble();

          if (compNumNeg(base, altura) != null) {
            continue;
          } else {
            area = base * altura;
            System.out.println("El área del cuadrado es: " + area);
          }

          break;

        case '3':
          System.out.println("Vamos a calcular el área de un círculo.");
          System.out.println("Radio: ");
          radio = sc.nextDouble();

          if (compRadNeg(radio) != null) {
            continue;
          } else {
            area = Math.PI * (Math.pow(radio, 2));
            System.out.println("El área del círculo es: " + area);
          }

          break;

        case 'L':
          System.out.print("\033\143"); // With this I clear the screen.
          break;

        case '5':
        case 'S': {
          System.out.println("Acabar el juego.");

          break;
        }

        default:
          System.out.println("Opción incorrecta, aprendemos a leer?");

          break;
      }

    } while (opcion != '5' && opcion != 'S');

    sc.close();
  }
}