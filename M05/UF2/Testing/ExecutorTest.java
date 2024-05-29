import org.junit.Before;
import org.junit.Test;

import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;
import java.util.concurrent.TimeUnit;

import static org.junit.Assert.*;

public class ExecutorTest {
  private ExecutorService executor;

  @Before
  public void setup() {
    executor = Executors.newSingleThreadExecutor();
  }

  @Test
  public void testExecute() throws InterruptedException {
    Runnable task = () -> System.out.println("Task executed");
    executor.execute(task);
    executor.shutdown();
    assertTrue(executor.awaitTermination(1, TimeUnit.SECONDS));
  }

  @Test
  public void testShutdown() {
    executor.shutdown();
    assertTrue(executor.isShutdown());
  }

  @Test
  public void testTermination() throws InterruptedException {
    executor.shutdown();
    assertTrue(executor.awaitTermination(1, TimeUnit.SECONDS));
  }
}
