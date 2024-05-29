import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;

public class StringBuilderTest {
  private StringBuilder sb;

  @Before
  public void setup() {
    sb = new StringBuilder("Hello");
  }

  @Test
  public void testAppend() {
    sb.append(" World");
    assertEquals("Hello World", sb.toString());
  }

  @Test
  public void testInsert() {
    sb.insert(5, " World");
    assertEquals("Hello World", sb.toString());
  }

  @Test
  public void testDelete() {
    sb.delete(1, 3);
    assertEquals("Hlo", sb.toString());
  }

  @Test
  public void testDeleteCharAt() {
    sb.deleteCharAt(1);
    assertEquals("Hllo", sb.toString());
  }

  @Test
  public void testReplace() {
    sb.replace(0, 5, "Hi");
    assertEquals("Hi", sb.toString());
  }

  @Test
  public void testReverse() {
    sb.reverse();
    assertEquals("olleH", sb.toString());
  }

  @Test
  public void testCapacity() {
    assertTrue(sb.capacity() >= 5);
    sb.ensureCapacity(50);
    assertTrue(sb.capacity() >= 50);
  }

  @Test
  public void testCharAt() {
    assertEquals('H', sb.charAt(0));
    assertEquals('o', sb.charAt(4));
  }

  @Test
  public void testSetCharAt() {
    sb.setCharAt(1, 'a');
    assertEquals("Hallo", sb.toString());
  }

  @Test
  public void testSubstring() {
    assertEquals("Hell", sb.substring(0, 4));
  }
}
