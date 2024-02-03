// I create a subclass using "extends Empleado".
// Empleado is the superclass.
public class ProducteRefrigerat extends Producte {
  private int codigoOrganismo;

  public ProducteRefrigerat(String dataCaducitat, int numLot, 
  int codigoOrganismo) {
    super(dataCaducitat, numLot);
    this.codigoOrganismo = codigoOrganismo;
  }

  public int getcodigoOrganismo() {
    return codigoOrganismo;
  }

  public void setcodigoOrganismo(int codigoOrganismo) {
    this.codigoOrganismo = codigoOrganismo;
  }

  @Override
  public String toString() {
    return super.toString() +
        "\nCodigo organismo: " + codigoOrganismo;
  }
}
