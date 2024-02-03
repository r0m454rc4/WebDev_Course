// I create a subclass using "extends Empleado".
// Empleado is the superclass.
public class ProducteFresc extends Producte {
  private String dataEnvasamiento;
  private String paisOrigen;

  public ProducteFresc(String dataCaducitat, int numLot, 
  String dataEnvasamiento, String paisOrigen) {
    super(dataCaducitat, numLot);
    this.dataEnvasamiento = dataEnvasamiento;
    this.paisOrigen = paisOrigen;
  }

  public String getdataEnvasamiento() {
    return dataEnvasamiento;
  }

  public void setdataEnvasamiento(String dataEnvasamiento) {
    this.dataEnvasamiento = dataEnvasamiento;
  }

  public String getpaisOrigen() {
    return paisOrigen;
  }

  public void setpaisOrigen(String paisOrigen) {
    this.paisOrigen = paisOrigen;
  }

  @Override
  public String toString() {
    return super.toString() +
        "\nData envase: " + dataEnvasamiento +
        "\nOrigen: " + paisOrigen;
  }
}
