import org.junit.Before;
import org.junit.Test;

import java.util.concurrent.Callable;
import java.util.concurrent.ExecutionException;
import java.util.concurrent.FutureTask;

import static org.junit.Assert.*;

public class FutureTaskTest {
  private FutureTask<String> futureTask;

  @Before
  public void setup() {
    Callable<String> callable = () -> "Result";
    futureTask = new FutureTask<>(callable);
  }

  @Test
  public void testFutureTaskNotNull() {
    assertNotNull(futureTask);
  }

  @Test
  public void testFutureTaskRunAndGet() throws ExecutionException, InterruptedException {
    futureTask.run();
    assertEquals("Result", futureTask.get());
  }

  @Test
  public void testFutureTaskIsDone() throws ExecutionException, InterruptedException {
    futureTask.run();
    assertTrue(futureTask.isDone());
  }
}
