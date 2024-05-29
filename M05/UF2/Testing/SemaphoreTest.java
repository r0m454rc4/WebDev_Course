import org.junit.Before;
import org.junit.Test;

import java.util.concurrent.Semaphore;

import static org.junit.Assert.*;

public class SemaphoreTest {
  private Semaphore semaphore;

  @Before
  public void setup() {
    semaphore = new Semaphore(1);
  }

  @Test
  public void testSemaphoreNotNull() {
    assertNotNull(semaphore);
  }

  @Test
  public void testSemaphoreAcquireAndRelease() throws InterruptedException {
    semaphore.acquire();
    assertEquals(0, semaphore.availablePermits());
    semaphore.release();
    assertEquals(1, semaphore.availablePermits());
  }

  @Test
  public void testSemaphoreDrainPermits() {
    semaphore.drainPermits();
    assertEquals(0, semaphore.availablePermits());
  }
}
