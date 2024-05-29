import org.junit.Test;
import static org.junit.Assert.*;

public class SystemTest {

  @Test
  public void testArrayCopy() {
    int[] src = { 1, 2, 3, 4, 5 };
    int[] dest = new int[5];

    System.arraycopy(src, 0, dest, 0, src.length);
    assertArrayEquals(src, dest);
  }

  @Test
  public void testCurrentTimeMillis() {
    long currentTime = System.currentTimeMillis();
    assertTrue(currentTime > 0);
  }

  @Test
  public void testNanoTime() {
    long nanoTime = System.nanoTime();
    assertTrue(nanoTime > 0);
  }

  @Test
  public void testGetProperty() {
    String javaVersion = System.getProperty("java.version");
    assertNotNull(javaVersion);
  }
}
