import org.junit.Before;
import org.junit.Test;

import java.util.HashSet;
import java.util.Set;

import static org.junit.Assert.*;

public class SetTest {
  private Set<String> set;

  @Before
  public void setup() {
    set = new HashSet<>();
    set.add("A");
    set.add("B");
  }

  @Test
  public void testSetNotNull() {
    assertNotNull(set);
  }

  @Test
  public void testSetAdd() {
    set.add("C");
    assertTrue(set.contains("C"));
  }

  @Test
  public void testSetSize() {
    assertEquals(2, set.size());
  }
}
