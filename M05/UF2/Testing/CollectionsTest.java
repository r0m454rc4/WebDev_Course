import org.junit.Before;
import org.junit.Test;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

import static org.junit.Assert.*;

public class CollectionsTest {
  private List<Integer> list;

  @Before
  public void setup() {
    list = new ArrayList<>();
    list.add(3);
    list.add(1);
    list.add(2);
  }

  @Test
  public void testSort() {
    Collections.sort(list);
    assertEquals(Integer.valueOf(1), list.get(0));
    assertEquals(Integer.valueOf(2), list.get(1));
    assertEquals(Integer.valueOf(3), list.get(2));
  }

  @Test
  public void testMax() {
    assertEquals(Integer.valueOf(3), Collections.max(list));
  }

  @Test
  public void testMin() {
    assertEquals(Integer.valueOf(1), Collections.min(list));
  }

  @Test
  public void testReverse() {
    Collections.reverse(list);
    assertEquals(Integer.valueOf(2), list.get(0));
    assertEquals(Integer.valueOf(1), list.get(1));
    assertEquals(Integer.valueOf(3), list.get(2));
  }
}
