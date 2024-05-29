import org.junit.Before;
import org.junit.Test;

import java.util.TreeSet;

import static org.junit.Assert.*;

public class TreeSetTest {
  private TreeSet<String> treeSet;

  @Before
  public void setup() {
    treeSet = new TreeSet<>();
    treeSet.add("B");
    treeSet.add("A");
    treeSet.add("C");
  }

  @Test
  public void testTreeSetNotNull() {
    assertNotNull(treeSet);
  }

  @Test
  public void testTreeSetOrder() {
    assertEquals("A", treeSet.first());
    assertEquals("C", treeSet.last());
  }

  @Test
  public void testTreeSetSize() {
    assertEquals(3, treeSet.size());
  }
}
