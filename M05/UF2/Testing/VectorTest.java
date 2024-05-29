import org.junit.Before;
import org.junit.Test;

import java.util.Vector;

import static org.junit.Assert.*;

public class VectorTest {
  private Vector<String> vector;

  @Before
  public void setup() {
    vector = new Vector<>();
    vector.add("A");
    vector.add("B");
    vector.add("C");
  }

  @Test
  public void testVectorNotNull() {
    assertNotNull(vector);
  }

  @Test
  public void testVectorAddAndGet() {
    assertEquals("A", vector.get(0));
    assertEquals("B", vector.get(1));
    assertEquals("C", vector.get(2));
  }

  @Test
  public void testVectorSize() {
    assertEquals(3, vector.size());
  }
}
