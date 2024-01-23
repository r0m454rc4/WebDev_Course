import java.util.Scanner;

public class Empleado {
  private String nombre;
  private String cedula;
  private int edad;
  private boolean casado;
  private double salario;

  public Empleado(String nombre, String cedula, int edad, boolean casado, double salario) {
    this.nombre = nombre;
    this.cedula = cedula;
    this.edad = edad;
    this.casado = casado;
    this.salario = salario;
  }

  public String getNombre() {
    return nombre;
  }

  public void setNombre(String nombre) {
    this.nombre = nombre;
  }

  public String getCedula() {
    return cedula;
  }

  public void setCedula(String cedula) {
    this.cedula = cedula;
  }

  public int getEdad() {
    return edad;
  }

  public void setEdad(int edad) {
    this.edad = edad;
  }

  public boolean getCasado() {
    return casado;
  }

  public void setCasado(boolean casado) {
    this.casado = casado;
  }

  public double getSalario() {
    return salario;
  }

  public void setSalario(double salario) {
    this.salario = salario;
  }

  public static void mostrarCalificacion(int edad) {
    Scanner sc = new Scanner(System.in);
    edad = sc.nextInt();

    if (edad <= 21) {
      System.out.println("Principiante.");
    } else if (edad >= 22 && edad <= 33) {
      System.out.println("Intermedio.");
    } else {
      System.out.println("Senior.");
    }

    sc.close();
  }

  public String mostrarDadosEmpleado() {
    return "Nombre: " + nombre +
        "\nCedula: " + cedula +
        "\nEdad: " + edad +
        "\nCasado: " + casado +
        "\nSalario: " + salario;
  }

  public void augmentarSalario(double nuevoSalario) {
    Scanner sc = new Scanner(System.in);
    nuevoSalario = sc.nextDouble();
    this.salario = nuevoSalario;

    sc.close();
  }
}