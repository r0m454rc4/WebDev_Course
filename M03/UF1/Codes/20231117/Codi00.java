
// Compile Codi00.java -> javac Codi00.java
import java.util.*;

public class Codi00 {
  static Alumno a;
  static ArrayList<Alumno> alumnos = new ArrayList<>();

  public static void main(String[] args) {
    Scanner sc = new Scanner(System.in);

    byte opcio;
    String nombre;
    String futbol;
    Boolean pelota = false;

    do {
      opcio = menu(sc);

      switch (opcio) {
        case 1:
          System.out.println("Vamos a añadir objetos.");
          System.out.println("Introduzca el nombre del alumno");
          nombre = sc.next();

          System.out.println("Introduzca el club del alumno");
          futbol = sc.next();

          System.out.println("És un pelota?");
          pelota = sc.nextBoolean();

          a = new Alumno(nombre, futbol, pelota);
          alumnos.add(a); // Add the alumn to the ArrayList.
          break;
        case 2:
          System.out.println("Visualizar objetos.");

          for (int i = 0; i < alumnos.size(); i++) {
            System.out.println(alumnos.get(i)); // alumnos.get(i) is to get the content from the ArrayList.
          }

          break;
        case 3:
          System.out.println("Salir.");
          break;

        default:
          System.out.println("Opcioón incorrecta.");
          break;
      }

    } while (opcio != 3);
  }

  static byte menu(Scanner pp) {
    byte op;
    System.out.println("Menú de opciones:");
    System.out.println("1.) Añadir objetos.");
    System.out.println("2.) Listar objetos.");
    System.out.println("3.) Salir.");
    System.out.println("Escoja opción:");
    op = pp.nextByte();

    return op;
  }
}