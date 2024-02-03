import java.util.ArrayList;
import java.util.Scanner;

public class examenPOOHerencia {
  static ArrayList productes = new ArrayList<>();

  public static void main(String[] args) {
    ProducteFresc pFresc = new ProducteFresc("01/01/2024", 15565185, "01/02/2024", "Barcelona");
    System.out.println("Producte fresc:\n" + pFresc);
    System.out.println("--- --- --- ---");

    ProducteRefrigerat pRef = new ProducteRefrigerat("01/02/2024", 15565185, 12345);
    System.out.println("Producte refrigerat:\n" + pRef);
    System.out.println("--- --- --- ---");

    ProducteCongelat pCong = new ProducteCongelat("01/02/2024", 15565185, -20.5);
    System.out.println("Producte congelat:\n" + pCong);

    crearProductos();
  }

  public static String crearProductos() {
    Scanner sc = new Scanner(System.in);

    int cantidadProductos;
    String tipoProducto;

    System.out.println("Introduca la cantidad de productos: ");
    cantidadProductos = sc.nextInt();

    System.out.println("Introduca el tipo de producto: ");
    tipoProducto = sc.next();

    String dataCaducitat;
    int numLot;
    String dataEnvasamiento;
    String paisOrigen;

    int codigoOrganismo;
    Double tempCongelacion;

    if (tipoProducto == "fresc") {
      System.out.println("Fecha caducidad:");
      dataCaducitat = sc.next();

      System.out.println("Num lote:");
      numLot = sc.nextInt();

      System.out.println("Data envasamiento:");
      dataEnvasamiento = sc.next();

      System.out.println("Pais origen:");
      paisOrigen = sc.next();

      ProducteFresc pF = new ProducteFresc(dataCaducitat, numLot, dataEnvasamiento, paisOrigen);

      for (int i = 0; i < cantidadProductos; i++) {
        productes.add(pF);
      }

      for (int i = 0; i < productes.size(); i++) {
        System.out.println(productes.get(i));
      }
    } else if (tipoProducto == "refrigerat") {
      System.out.println("Fecha caducidad:");
      dataCaducitat = sc.next();

      System.out.println("Num lote:");
      numLot = sc.nextInt();

      System.out.println("Cod organismo:");
      codigoOrganismo = sc.nextInt();

      ProducteRefrigerat pR = new ProducteRefrigerat(dataCaducitat, numLot, codigoOrganismo);

      for (int i = 0; i < cantidadProductos; i++) {
        productes.add(pR);
      }

      for (int i = 0; i < productes.size(); i++) {
        System.out.println(productes.get(i)); // gossos.get(i) is to get the content from the ArrayList.
      }
    } else if (tipoProducto == "congelat") {
      System.out.println("Fecha caducidad:");
      dataCaducitat = sc.next();

      System.out.println("Num lote:");
      numLot = sc.nextInt();

      System.out.println("Temperatura cong:");
      tempCongelacion = sc.nextDouble();

      ProducteCongelat pC = new ProducteCongelat(dataCaducitat, numLot, tempCongelacion);

      for (int i = 0; i < cantidadProductos; i++) {
        productes.add(pC);
      }

      for (int i = 0; i < productes.size(); i++) {
        System.out.println(productes.get(i)); // gossos.get(i) is to get the content from the ArrayList.
      }
    }

    sc.close();

    return "Producto afegit a la llista correctament.";
  }
}
