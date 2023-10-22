public class Alumno_v01 {
  public static void main(String[] args) {
    Alumno_v00 a1 = new Alumno_v00("Pepe", 30, 'M');
    Alumno_v00 a2 = new Alumno_v00("Josefa", 18, 'F');

    System.out.println(a1.getNombre());
    System.out.println(a2.getNombre());
  }
}
