public class Producte {
  private String dataCaducitat;
  private int numLot;

  public Producte(String dataCaducitat, int numLot) {
    this.dataCaducitat = dataCaducitat;
    this.numLot = numLot;
  }

  public String getdataCaducitat() {
    return dataCaducitat;
  }

  public void setdataCaducitat(String dataCaducitat) {
    this.dataCaducitat = dataCaducitat;
  }

  public int getnumLot() {
    return numLot;
  }

  public void setnumLot(int numLot) {
    this.numLot = numLot;
  }

  @Override
  public String toString() {
    return "Data caducidad: " + dataCaducitat +
        "\nNumero Lote: " + numLot;

  }
}