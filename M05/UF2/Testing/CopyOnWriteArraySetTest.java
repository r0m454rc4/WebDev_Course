import org.junit.Before;
import org.junit.Test;

import java.util.concurrent.CopyOnWriteArraySet;

import static org.junit.Assert.*;

public class CopyOnWriteArraySetTest {
  private CopyOnWriteArraySet<String> set;

  @Before
  public void setup() {
    set = new CopyOnWriteArraySet<>();
    set.add("A");
    set.add("B");
    set.add("C");
  }

  @Test
  public void testCopyOnWriteArraySetNotNull() {
    assertNotNull(set);
  }

  @Test
  public void testCopyOnWriteArraySetAddAndContains() {
    assertTrue(set.contains("A"));
    assertTrue(set.contains("B"));
    assertTrue(set.contains("C"));
  }

  @Test
  public void testCopyOnWriteArraySetSize() {
    assertEquals(3, set.size());
  }
}
