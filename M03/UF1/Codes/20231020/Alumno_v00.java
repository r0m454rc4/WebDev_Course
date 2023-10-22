public class Alumno_v00 {
  private String nombre;
  private int edad;
  private char sexo;

  public Alumno_v00(String nombre, int edat, char sexo) {
    this.nombre = nombre;
    this.edad = edat;
    this.sexo = sexo;
  }

  public String getNombre() {
    return nombre;
  };

  public void setNombre(String nombre) {
    this.nombre = nombre;
  }

  public int edad() {
    return edad;
  };

  public void setEdad(int edad) {
    this.edad = edad;
  }

  public char getSexo() {
    return sexo;
  };

  public void setSexo(char sexo) {
    this.sexo = sexo;
  }

  // @Override
  // public String toString() {
  //   return "Alumno_v00 [nombre + nombre + edad + ]";
  // }
}
