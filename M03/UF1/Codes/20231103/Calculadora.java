import java.util.Scanner;

public class Calculadora {
  // Function that is used to enter the numbers.
  // double[] is to be able to store the numbers on an array.
  public static double[] IntroducirNum(double n1, double n2) {
    Scanner sc = new Scanner(System.in);

    System.out.println("Introduca el primer número: ");
    n1 = sc.nextDouble();

    System.out.println("Introduca el segundo número: ");
    n2 = sc.nextDouble();

    sc.close();

    // return n1, n2;
    return new double[] { n1, n2 }; // Here I return both numbers using the array.
  }

  public static void main(String[] args) {
    Scanner sc = new Scanner(System.in); // System.in = system input.
    double n1 = 0, n2 = 0;

    System.out.println("Indica la opción deseada: ");
    System.out.println("s.) Suma ");
    System.out.println("r.) Resta ");
    System.out.println("p.) Producto ");
    System.out.println("d.) División ");

    Character opcio = sc.next().charAt(0);
    opcio = Character.toLowerCase(opcio);

    switch (opcio) {
      case 's':
        System.out.println("Vamos a realizar una suma: ");
        double[] suma = IntroducirNum(n1, n2);
        System.out.println("El resultado de la suma es: " + (suma[0] + suma[1]));
        break;

      case 'r':
        System.out.println("Vamos a realizar una resta: ");
        double[] resta = IntroducirNum(n1, n2);
        System.out.println("El resultado de la resta es: " + (resta[0] - resta[1]));
        break;

      case 'p':
        System.out.println("Vamos a realizar el producto: ");
        double[] producto = IntroducirNum(n1, n2);
        System.out.println("El resultado del producto es: " + (producto[0] * producto[1]));
        break;

      case 'd':
        System.out.println("Vamos a realizar la división: ");
        double[] division = IntroducirNum(n1, n2);
        System.out.println("El resultado de la división es: " + (division[0] / division[1]));
        break;

      default:
        System.out.println("Introduzca una opción valida.");
        break;
    }

    sc.close();
  }
}
