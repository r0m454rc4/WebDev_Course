import org.junit.Before;
import org.junit.Test;

import java.util.concurrent.ConcurrentHashMap;

import static org.junit.Assert.*;

public class ConcurrentHashMapTest {
  private ConcurrentHashMap<String, Integer> map;

  @Before
  public void setup() {
    map = new ConcurrentHashMap<>();
    map.put("key1", 1);
    map.put("key2", 2);
  }

  @Test
  public void testConcurrentHashMapNotNull() {
    assertNotNull(map);
  }

  @Test
  public void testConcurrentHashMapPutAndGet() {
    map.put("key3", 3);
    assertEquals(Integer.valueOf(3), map.get("key3"));
  }

  @Test
  public void testConcurrentHashMapSize() {
    assertEquals(2, map.size());
  }
}
