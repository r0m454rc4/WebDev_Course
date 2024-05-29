import org.junit.Before;
import org.junit.Test;

import java.util.LinkedList;
import java.util.Queue;

import static org.junit.Assert.*;

public class QueueTest {
  private Queue<String> queue;

  @Before
  public void setup() {
    queue = new LinkedList<>();
    queue.add("A");
    queue.add("B");
  }

  @Test
  public void testQueueNotNull() {
    assertNotNull(queue);
  }

  @Test
  public void testQueueAddAndRemove() {
    queue.add("C");
    assertEquals("A", queue.remove());
  }

  @Test
  public void testQueueSize() {
    assertEquals(2, queue.size());
  }
}
