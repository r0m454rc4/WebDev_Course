import org.junit.Before;
import org.junit.Test;

import java.util.ArrayList;
import java.util.List;

import static org.junit.Assert.*;

public class ListTest {
  private List<String> list;

  @Before
  public void setup() {
    list = new ArrayList<>();
    list.add("A");
    list.add("B");
  }

  @Test
  public void testListNotNull() {
    assertNotNull(list);
  }

  @Test
  public void testListAdd() {
    list.add("C");
    assertEquals("C", list.get(2));
  }

  @Test
  public void testListSize() {
    assertEquals(2, list.size());
  }
}
