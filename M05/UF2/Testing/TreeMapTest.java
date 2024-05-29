import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;

import java.util.TreeMap;

public class TreeMapTest {
  private TreeMap<String, Integer> map;

  @Before
  public void setup() {
    map = new TreeMap<>();
  }

  @Test
  public void testPut() {
    map.put("one", 1);
    map.put("two", 2);
    assertEquals(2, map.size());
    assertEquals((Integer) 1, map.get("one"));
    assertEquals((Integer) 2, map.get("two"));
  }

  @Test
  public void testGet() {
    map.put("one", 1);
    assertEquals((Integer) 1, map.get("one"));
  }

  @Test
  public void testRemove() {
    map.put("one", 1);
    Integer removed = map.remove("one");
    assertEquals((Integer) 1, removed);
    assertEquals(0, map.size());
  }

  @Test
  public void testSize() {
    assertEquals(0, map.size());
    map.put("one", 1);
    assertEquals(1, map.size());
  }

  @Test
  public void testClear() {
    map.put("one", 1);
    map.put("two", 2);
    map.clear();
    assertEquals(0, map.size());
    assertTrue(map.isEmpty());
  }

  @Test
  public void testIsEmpty() {
    assertTrue(map.isEmpty());
    map.put("one", 1);
    assertFalse(map.isEmpty());
  }

  @Test
  public void testContainsKey() {
    map.put("one", 1);
    assertTrue(map.containsKey("one"));
    assertFalse(map.containsKey("two"));
  }

  @Test
  public void testContainsValue() {
    map.put("one", 1);
    assertTrue(map.containsValue(1));
    assertFalse(map.containsValue(2));
  }

  @Test
  public void testFirstKey() {
    map.put("one", 1);
    map.put("two", 2);
    assertEquals("one", map.firstKey());
  }

  @Test
  public void testLastKey() {
    map.put("one", 1);
    map.put("two", 2);
    assertEquals("two", map.lastKey());
  }

  @Test
  public void testKeySet() {
    map.put("one", 1);
    map.put("two", 2);
    assertTrue(map.keySet().contains("one"));
    assertTrue(map.keySet().contains("two"));
  }

  @Test
  public void testValues() {
    map.put("one", 1);
    map.put("two", 2);
    assertTrue(map.values().contains(1));
    assertTrue(map.values().contains(2));
  }

  @Test
  public void testEntrySet() {
    map.put("one", 1);
    map.put("two", 2);
    assertEquals(2, map.entrySet().size());
  }
}
