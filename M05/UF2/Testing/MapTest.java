import org.junit.Before;
import org.junit.Test;

import java.util.HashMap;
import java.util.Map;

import static org.junit.Assert.*;

public class MapTest {
  private Map<String, Integer> map;

  @Before
  public void setup() {
    map = new HashMap<>();
    map.put("key1", 1);
    map.put("key2", 2);
  }

  @Test
  public void testMapNotNull() {
    assertNotNull(map);
  }

  @Test
  public void testMapPutAndGet() {
    map.put("key3", 3);
    assertEquals(Integer.valueOf(3), map.get("key3"));
  }

  @Test
  public void testMapSize() {
    assertEquals(2, map.size());
  }
}
