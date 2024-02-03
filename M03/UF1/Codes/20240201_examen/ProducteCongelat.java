// I create a subclass using "extends Empleado".
// Empleado is the superclass.
public class ProducteCongelat extends Producte {
  private Double tempCongelacion;

  public ProducteCongelat(String dataCaducitat, int numLot, 
  Double tempCongelacion) {
    super(dataCaducitat, numLot);
    this.tempCongelacion = tempCongelacion;
  }

  public Double gettempCongelacion() {
    return tempCongelacion;
  }

  public void settempCongelacion(Double tempCongelacion) {
    this.tempCongelacion = tempCongelacion;
  }

  @Override
  public String toString() {
    return super.toString() +
        "\nTemperatura cong: " + tempCongelacion;
  }
}
