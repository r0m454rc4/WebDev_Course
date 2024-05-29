import org.junit.Test;

import static org.junit.Assert.*;

public class AssertTest {

  @Test
  public void testAssertEquals() {
    assertEquals("Test", "Test");
  }

  @Test
  public void testAssertTrue() {
    assertTrue(1 < 2);
  }

  @Test
  public void testAssertFalse() {
    assertFalse(1 > 2);
  }

  @Test
  public void testAssertNotNull() {
    assertNotNull(new Object());
  }

  @Test
  public void testAssertNull() {
    assertNull(null);
  }
}
