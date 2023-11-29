
// Compile Codi00.java -> javac Codi00.java
import java.util.*;

public class Codi00 {
  static Gos g;
  static ArrayList<Gos> gossos = new ArrayList<>();

  public static void main(String[] args) {
    Scanner sc = new Scanner(System.in);

    byte opcio;
    String Nom;
    String Raza;
    String Sexe;
    Character UsuariAccepta;
    Integer AnyNaixement;

    do {
      opcio = menu(sc);

      switch (opcio) {
        case 1:
          System.out.println("Anem a afegir un gos.");
          System.out.println("Intodueix el nom del gos");
          Nom = sc.next();

          System.out.println("Intodueix la raça del gos");
          Raza = sc.next();

          System.out.println("Intodueix el sexe del gos (m/f)");
          Sexe = sc.next().toUpperCase();

          System.out.println("Intodueix l'any de naixemnet del gos");
          AnyNaixement = sc.nextInt();

          if (AnyNaixement >= 2000) {
            g = new Gos(Nom, Raza, Sexe, AnyNaixement);

            System.out.println("Dades introduïdes: ");
            System.out.println("Nom: " + Nom);
            System.out.println("Raça: " + Raza);
            System.out.println("Sexe: " + Sexe);
            System.out.println("Any: " + AnyNaixement);

            System.out.println("Acceptes que les dades siguin correctes?(s/n)");
            UsuariAccepta = sc.next().toUpperCase().charAt(0);

            while (UsuariAccepta != 'S') {
              System.out.println("Anem a afegir un gos.");
              System.out.println("Intodueix el nom del gos");
              Nom = sc.next();

              System.out.println("Intodueix la raça del gos");
              Raza = sc.next();

              System.out.println("Intodueix el sexe del gos");
              sc.next().toUpperCase().charAt(0);

              System.out.println("Intodueix l'any de naixemnet del gos");
              AnyNaixement = sc.nextInt();

              if (AnyNaixement >= 2000) {
                g = new Gos(Nom, Raza, Sexe, AnyNaixement);
                System.out.println(g);
                System.out.println("Acceptes que les dades siguin correctes?(s/n)");
                UsuariAccepta = sc.next().toUpperCase().charAt(0);
              }
            }

            if (UsuariAccepta == 'S') {
              gossos.add(g); // Add the dog to the ArrayList.
              break;
            } else {
              System.out.println("Opció no vàlida");
            }
          } else {
            System.out.println("Has d'introduïr un any superior o igual al 2000.");
          }
          break;

        case 2:
          System.out.println("Anem a llistar tots els gossos.");

          for (int i = 0; i < gossos.size(); i++) {
            System.out.println(gossos.get(i)); // gossos.get(i) is to get the content from the ArrayList.
          }
          break;

        case 3:
          System.out.println("Anem a llistar tots els gossos per raça.");

          for (int i = 0; i < gossos.size(); i++) {
            System.out.println(gossos.get(i)); // gossos.get(i) is to get the content from the ArrayList.
          }
          break;

        case 4:
          System.out.println("Sortir.");
          break;

        default:
          System.out.println("Opció incorrecta.");
          break;
      }

    } while (opcio != 4);
  }

  static byte menu(Scanner pp) {
    byte op;
    System.out.println("Menú d'opcions:");
    System.out.println("1.) Afegir un nou gos.");
    System.out.println("2.) Listar els gossos.");
    System.out.println("3.) Llistar els gossos per raça.");
    System.out.println("4.) Sortir.");
    System.out.println("Escull opció:");
    op = pp.nextByte();

    return op;
  }
}