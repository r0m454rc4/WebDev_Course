import java.util.Scanner;

public class Empleado {
  private String nombre;
  private String cedula;
  private int edad;
  private boolean casado;
  private double salario;
  private String clasificacion;

  public Empleado(String nombre, String cedula, int edad, boolean casado, double salario) {
    // Call a method from a constructor.
    if (controlEdad(edad)) {
      this.nombre = nombre;
      this.cedula = cedula;
      this.edad = edad;
      this.casado = casado;
      this.salario = salario;
      this.clasificacion = mostrarCalificacion(edad);
    } else {
      System.out.println("Empleado no valido.");
    }
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

  public static boolean controlEdad(int edad) {
    if ((edad >= 18) && (edad <= 45)) {
      return true;
    } else {
      return false;
    }
  }

  public static String mostrarCalificacion(int edad) {
    String clasificacion;

    if (edad <= 21) {
      clasificacion = "Principiante.";
    } else if (edad >= 22 && edad <= 33) {
      clasificacion = "Intermedio.";
    } else {
      clasificacion = "Senior.";
    }

    return clasificacion;
  }

  @Override
  public String toString() {
    {
      return "Nombre: " + nombre +
          "\nCedula: " + cedula +
          "\nEdad: " + edad +
          "\nCasado: " + casado +
          "\nSalario: " + salario;
    }
  }

  public void augmentarSalario(double nuevoSalario) {
    Scanner sc = new Scanner(System.in);
    nuevoSalario = sc.nextDouble();
    this.salario = nuevoSalario;

    sc.close();
  }
}