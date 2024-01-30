public class Principal {
  public static void main(String[] args) {
    Empleado e2 = new Empleado("Roma", "Analista", 23, false, 750);
    // Empleado e3 = new Empleado("Blanca", "Programador", 57, true, 3000);
    System.out.println("Empleado 1:\n" + e2);
    // System.out.println("Empleado 2:\n " + e3);

    System.out.println("--- --- --- ---");

    Programador p1 = new Programador("Victor", "Pica Teclas", 24, true, 275, 5, "Java");

    System.out.println("Programador 1:\n" + p1);
  }
}