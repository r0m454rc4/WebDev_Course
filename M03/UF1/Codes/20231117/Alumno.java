public class Alumno {
  private String nombre;
  private String club_futbol;
  private boolean pelota;

  public Alumno(String nom, String club, boolean pel) {
    this.nombre = nom;
    this.club_futbol = club;
    this.pelota = pel;
  }

  public String getNombre() {
    return nombre;
  }

  public void setNombre(String nombre) {
    this.nombre = nombre;
  }

  public String club_getFutbol() {
    return club_futbol;
  }

  public void club_setFutbol(String club_futbol) {
    this.club_futbol = club_futbol;
  }

  public boolean isPelota() {
    return pelota;
  }

  public void setPelota(boolean pelota) {
    this.pelota = pelota;
  }

  @Override
  public String toString() {
    return "Alumne [nombre=" + nombre + ", futbol=" + club_futbol + ", pelota=" + pelota + "]";
  }
}
