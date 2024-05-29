import org.junit.Before;
import org.junit.Test;

import java.util.Scanner;

import static org.junit.Assert.*;

public class ScannerTest {
  private Scanner scanner;

  @Before
  public void setup() {
    scanner = new Scanner("Hello world 123");
  }

  @Test
  public void testScannerInitialization() {
    assertNotNull(scanner);
  }

  @Test
  public void testHasNext() {
    assertTrue(scanner.hasNext());
  }

  @Test
  public void testNext() {
    assertEquals("Hello", scanner.next());
  }

  @Test
  public void testNextInt() {
    scanner.next();
    scanner.next();
    assertEquals(123, scanner.nextInt());
  }

  @Test
  public void testClose() {
    scanner.close();
    try {
      scanner.hasNext();
      fail("Expected IllegalStateException to be thrown after closing the scanner.");
    } catch (IllegalStateException e) {
    }
  }
}
