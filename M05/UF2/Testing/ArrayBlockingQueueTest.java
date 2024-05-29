import org.junit.Before;
import org.junit.Test;

import java.util.concurrent.ArrayBlockingQueue;

import static org.junit.Assert.*;

public class ArrayBlockingQueueTest {
  private ArrayBlockingQueue<String> queue;

  @Before
  public void setup() {
    queue = new ArrayBlockingQueue<>(3);
    queue.add("A");
    queue.add("B");
    queue.add("C");
  }

  @Test
  public void testArrayBlockingQueueNotNull() {
    assertNotNull(queue);
  }

  @Test
  public void testArrayBlockingQueueAddAndPoll() {
    assertEquals("A", queue.poll());
    assertEquals("B", queue.poll());
    assertEquals("C", queue.poll());
  }

  @Test
  public void testArrayBlockingQueueSize() {
    assertEquals(3, queue.size());
  }
}
