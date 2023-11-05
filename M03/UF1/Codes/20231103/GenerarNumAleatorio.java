import java.util.Scanner;

public class GenerarNumAleatorio {

  public static Integer genNumAl() {
    int nAleatori = (int) (Math.random() * 5 + 1); // (int) is to convert the result to integer.

    return nAleatori;
  }

  public static void main(String[] args) {
    Scanner sc = new Scanner(System.in);
    int nAleatoriOrd = 0, nAleatoriUs = 0;

    nAleatoriOrd = genNumAl();

    while (nAleatoriUs != nAleatoriOrd) {
      System.out.println("Introdueix un número: ");
      nAleatoriUs = sc.nextInt();

      if (nAleatoriUs == nAleatoriOrd) {
        System.out.println(
            "El número introduït (" + nAleatoriUs + ") és el mateix que el generat automàticament.");
      } else if (nAleatoriUs < nAleatoriOrd) {
        System.out.println("El número que has d'introduïr ha de ser més gran.");
      } else {
        System.out.println("El número que has d'introduïr ha de ser més petit.");
      }
    }

    sc.close();
  }
}
