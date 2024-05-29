// Roma Sarda Casellas.
// 20240522.

import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;

import java.util.ArrayList;

public class ArrayListTest {
  private ArrayList<String> llista;

  // Creo la llista.
  @Before
  public void setup() {
    llista = new ArrayList<>();
  }

  // Conte a la llista.
  @Test
  public void testContains() {
    llista.add("Hola em dic Roma.");
    assertTrue(llista.contains("Hola em dic Roma."));

    // Comprovar si no conte "Pepe".
    assertFalse(llista.contains("Pepe"));
  }

  // Creo la llista.
  @Before
  public void setup1() {
    llista = new ArrayList<>();
  }

  // Esta buit.
  @Test
  public void testIsEmpty() {
    assertTrue(llista.isEmpty());
    llista.add("Manuel");

    // Comprovar si la llista no esta buida.
    assertFalse(llista.isEmpty());
  }

  @Before
  public void setup2() {
    llista = new ArrayList<>();
  }

  // Afegir a la llista.
  @Test
  public void testAdd() {
    llista.add("Pepe");
    llista.add("Colla2");
    assertEquals(2, llista.size());
    assertEquals("Pepe", llista.get(0));
    assertEquals("Colla2", llista.get(1));
  }

  @Before
  public void setup3() {
    llista = new ArrayList<>();
  }

  // Probar si esta fora de l'index.
  @Test(expected = IndexOutOfBoundsException.class)
  public void testAddAtInvalidIndex() {
    llista.add(1, "Aaron Costa");
  }

  @Before
  public void setup4() {
    llista = new ArrayList<>();
  }

  // Aconseguir index.
  @Test
  public void testIndexOf() {
    llista.add("Pepe");
    llista.add("Botellas");
    assertEquals(0, llista.indexOf("Pepe"));
    assertEquals(1, llista.indexOf("Botellas"));

    // Probar si no existeix aquest valor a l'array.
    assertEquals(-1, llista.indexOf("AAAAAAAAAA"));
  }
}
