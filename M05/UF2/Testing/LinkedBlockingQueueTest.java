import org.junit.Before;
import org.junit.Test;

import java.util.concurrent.LinkedBlockingQueue;

import static org.junit.Assert.*;

public class LinkedBlockingQueueTest {
  private LinkedBlockingQueue<String> queue;

  @Before
  public void setup() {
    queue = new LinkedBlockingQueue<>();
    queue.add("A");
    queue.add("B");
    queue.add("C");
  }

  @Test
  public void testLinkedBlockingQueueNotNull() {
    assertNotNull(queue);
  }

  @Test
  public void testLinkedBlockingQueueAddAndPoll() {
    assertEquals("A", queue.poll());
    assertEquals("B", queue.poll());
    assertEquals("C", queue.poll());
  }

  @Test
  public void testLinkedBlockingQueueSize() {
    assertEquals(3, queue.size());
  }
}
