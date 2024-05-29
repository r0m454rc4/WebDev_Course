import org.junit.Before;
import org.junit.Test;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import static org.junit.Assert.*;

public class IteratorTest {
  private List<String> list;
  private Iterator<String> iterator;

  @Before
  public void setup() {
    list = new ArrayList<>();
    list.add("A");
    list.add("B");
    list.add("C");
    iterator = list.iterator();
  }

  @Test
  public void testHasNext() {
    assertTrue(iterator.hasNext());
  }

  @Test
  public void testNext() {
    assertEquals("A", iterator.next());
    assertEquals("B", iterator.next());
    assertEquals("C", iterator.next());
  }

  @Test
  public void testRemove() {
    iterator.next();
    iterator.remove();
    assertFalse(list.contains("A"));
  }
}
