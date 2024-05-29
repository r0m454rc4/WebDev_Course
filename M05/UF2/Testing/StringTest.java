import org.junit.Test;
import static org.junit.Assert.*;

public class StringTest {
  @Test
  public void testLength() {
    String str = "Hello";
    assertEquals(5, str.length());
  }

  @Test
  public void testCharAt() {
    String str = "Hello";
    assertEquals('H', str.charAt(0));
    assertEquals('o', str.charAt(4));
  }

  @Test(expected = IndexOutOfBoundsException.class)
  public void testCharAtInvalidIndex() {
    String str = "Hello";
    str.charAt(5); // Should throw IndexOutOfBoundsException
  }

  @Test
  public void testSubstring() {
    String str = "Hello World";
    assertEquals("Hello", str.substring(0, 5));
    assertEquals("World", str.substring(6));
  }

  @Test
  public void testContains() {
    String str = "Hello World";
    assertTrue(str.contains("World"));
    assertFalse(str.contains("Java"));
  }

  @Test
  public void testEquals() {
    String str1 = "Hello";
    String str2 = "Hello";
    String str3 = "World";
    assertTrue(str1.equals(str2));
    assertFalse(str1.equals(str3));
  }

  @Test
  public void testIsEmpty() {
    String str = "";
    assertTrue(str.isEmpty());
    str = "Hello";
    assertFalse(str.isEmpty());
  }

  @Test
  public void testToUpperCase() {
    String str = "Hello";
    assertEquals("HELLO", str.toUpperCase());
  }

  @Test
  public void testToLowerCase() {
    String str = "Hello";
    assertEquals("hello", str.toLowerCase());
  }

  @Test
  public void testTrim() {
    String str = "  Hello  ";
    assertEquals("Hello", str.trim());
  }

  @Test
  public void testReplace() {
    String str = "Hello World";
    assertEquals("Hello Java", str.replace("World", "Java"));
  }

  @Test
  public void testSplit() {
    String str = "a,b,c";
    String[] parts = str.split(",");
    assertEquals(3, parts.length);
    assertEquals("a", parts[0]);
    assertEquals("b", parts[1]);
    assertEquals("c", parts[2]);
  }
}
