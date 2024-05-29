import org.junit.Before;
import org.junit.Test;

import static org.junit.Assert.*;

public class RunnableTest {
  private Runnable runnable;
  private boolean ran;

  @Before
  public void setup() {
    ran = false;
    runnable = () -> ran = true;
  }

  @Test
  public void testRunnableNotNull() {
    assertNotNull(runnable);
  }

  @Test
  public void testRunnableRun() {
    runnable.run();
    assertTrue(ran);
  }
}
