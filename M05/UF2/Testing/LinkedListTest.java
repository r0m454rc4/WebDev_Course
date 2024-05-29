import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;

import java.util.LinkedList;

public class LinkedListTest {
  private LinkedList<String> list;

  @Before
  public void setup() {
    list = new LinkedList<>();
  }

  @Test
  public void testAdd() {
    list.add("Hello");
    list.add("World");
    assertEquals(2, list.size());
    assertEquals("Hello", list.get(0));
    assertEquals("World", list.get(1));
  }

  @Test
  public void testAddFirst() {
    list.addFirst("World");
    list.addFirst("Hello");
    assertEquals(2, list.size());
    assertEquals("Hello", list.get(0));
    assertEquals("World", list.get(1));
  }

  @Test
  public void testAddLast() {
    list.addLast("Hello");
    list.addLast("World");
    assertEquals(2, list.size());
    assertEquals("Hello", list.get(0));
    assertEquals("World", list.get(1));
  }

  @Test
  public void testGetFirst() {
    list.add("Hello");
    list.add("World");
    assertEquals("Hello", list.getFirst());
  }

  @Test
  public void testGetLast() {
    list.add("Hello");
    list.add("World");
    assertEquals("World", list.getLast());
  }

  @Test
  public void testRemoveFirst() {
    list.add("Hello");
    list.add("World");
    String removed = list.removeFirst();
    assertEquals("Hello", removed);
    assertEquals(1, list.size());
    assertEquals("World", list.get(0));
  }

  @Test
  public void testRemoveLast() {
    list.add("Hello");
    list.add("World");
    String removed = list.removeLast();
    assertEquals("World", removed);
    assertEquals(1, list.size());
    assertEquals("Hello", list.get(0));
  }

  @Test
  public void testSize() {
    assertEquals(0, list.size());
    list.add("Hello");
    assertEquals(1, list.size());
  }

  @Test
  public void testClear() {
    list.add("Hello");
    list.add("World");
    list.clear();
    assertEquals(0, list.size());
    assertTrue(list.isEmpty());
  }

  @Test
  public void testIsEmpty() {
    assertTrue(list.isEmpty());
    list.add("Hello");
    assertFalse(list.isEmpty());
  }

  @Test
  public void testContains() {
    list.add("Hello");
    assertTrue(list.contains("Hello"));
    assertFalse(list.contains("World"));
  }

  @Test
  public void testIndexOf() {
    list.add("Hello");
    list.add("World");
    assertEquals(0, list.indexOf("Hello"));
    assertEquals(1, list.indexOf("World"));
    assertEquals(-1, list.indexOf("Java"));
  }

  @Test
  public void testLastIndexOf() {
    list.add("Hello");
    list.add("World");
    list.add("Hello");
    assertEquals(2, list.lastIndexOf("Hello"));
    assertEquals(1, list.lastIndexOf("World"));
    assertEquals(-1, list.lastIndexOf("Java"));
  }

  @Test
  public void testSet() {
    list.add("Hello");
    list.set(0, "World");
    assertEquals("World", list.get(0));
  }

  @Test(expected = IndexOutOfBoundsException.class)
  public void testSetInvalidIndex() {
    list.set(0, "World"); // Should throw IndexOutOfBoundsException
  }

  @Test
  public void testToArray() {
    list.add("Hello");
    list.add("World");
    Object[] array = list.toArray();
    assertEquals(2, array.length);
    assertEquals("Hello", array[0]);
    assertEquals("World", array[1]);
  }
}
