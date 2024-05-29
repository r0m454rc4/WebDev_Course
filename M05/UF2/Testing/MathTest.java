import org.junit.Before;
import org.junit.Test;

import static org.junit.Assert.*;

public class MathTest {

  @Before
  public void setup() {
    // No setup needed for Math class
  }

  @Test
  public void testAbs() {
    assertEquals(5, Math.abs(-5));
  }

  @Test
  public void testMax() {
    assertEquals(10, Math.max(5, 10));
  }

  @Test
  public void testMin() {
    assertEquals(5, Math.min(5, 10));
  }

  @Test
  public void testPow() {
    assertEquals(100.0, Math.pow(10, 2), 0.0);
  }

  @Test
  public void testSqrt() {
    assertEquals(5.0, Math.sqrt(25), 0.0);
  }

  @Test
  public void testRandom() {
    double randomValue = Math.random();
    assertTrue(randomValue >= 0.0 && randomValue < 1.0);
  }
}
