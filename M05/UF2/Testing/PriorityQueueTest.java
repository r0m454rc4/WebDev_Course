import org.junit.Before;
import org.junit.Test;

import java.util.PriorityQueue;

import static org.junit.Assert.*;

public class PriorityQueueTest {
  private PriorityQueue<Integer> priorityQueue;

  @Before
  public void setup() {
    priorityQueue = new PriorityQueue<>();
    priorityQueue.add(3);
    priorityQueue.add(1);
    priorityQueue.add(2);
  }

  @Test
  public void testPriorityQueueNotNull() {
    assertNotNull(priorityQueue);
  }

  @Test
  public void testPriorityQueueOrder() {
    assertEquals(Integer.valueOf(1), priorityQueue.poll());
    assertEquals(Integer.valueOf(2), priorityQueue.poll());
    assertEquals(Integer.valueOf(3), priorityQueue.poll());
  }

  @Test
  public void testPriorityQueueSize() {
    assertEquals(3, priorityQueue.size());
  }
}
