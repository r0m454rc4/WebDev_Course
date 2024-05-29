import org.junit.Before;
import org.junit.Test;

import java.util.Timer;
import java.util.TimerTask;
import java.util.concurrent.CountDownLatch;
import java.util.concurrent.TimeUnit;

import static org.junit.Assert.*;

public class TimerTest {
  private Timer timer;
  private CountDownLatch latch;

  @Before
  public void setup() {
    timer = new Timer();
    latch = new CountDownLatch(1);
  }

  @Test
  public void testTimerNotNull() {
    assertNotNull(timer);
  }

  @Test
  public void testTimerSchedule() throws InterruptedException {
    TimerTask task = new TimerTask() {
      @Override
      public void run() {
        latch.countDown();
      }
    };
    timer.schedule(task, 100);
    assertTrue(latch.await(200, TimeUnit.MILLISECONDS));
  }

  @Test
  public void testTimerCancel() {
    timer.cancel();
    assertTrue(timer.purge() == 0);
  }
}
