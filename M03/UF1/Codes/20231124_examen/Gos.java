public class Gos {
  private String Nom;
  private String Raza;
  private String Sexe;
  private Integer AnyNaixement;

  public Gos(String Nom, String Raza, String Sexe, Integer AnyNaixement) {
    this.Nom = Nom;
    this.Raza = Raza;
    this.Sexe = Sexe;
    this.AnyNaixement = AnyNaixement;
  }

  public String getNom() {
    return Nom;
  }

  public void setNom(String Nom) {
    this.Nom = Nom;
  }

  public String club_getRaza() {
    return Raza;
  }

  public void club_setFutbol(String Raza) {
    this.Raza = Raza;
  }

  public String getSexe() {
    return Sexe;
  }

  public void setSexe(String Sexe) {
    this.Sexe = Sexe;
  }

  public Integer getAnyNaixement() {
    return AnyNaixement;
  }

  public void setAnyNaixement(Integer AnyNaixement) {
    this.AnyNaixement = AnyNaixement;
  }

  @Override
  public String toString() {
    return "Nom: " + Nom +
        "\nRaça: " + Raza +
        "\nSexe: " + Sexe +
        "\nAny Naixement: " + AnyNaixement;
  }
}
