import org.junit.Before;
import org.junit.Test;

import java.util.Date;

import static org.junit.Assert.*;

public class DateTest {
  private Date date;

  @Before
  public void setup() {
    date = new Date();
  }

  @Test
  public void testDateInitialization() {
    Date newDate = new Date();
    assertTrue(newDate.getTime() <= System.currentTimeMillis());
  }

  @Test
  public void testGetTime() {
    long time = date.getTime();
    assertTrue(time <= System.currentTimeMillis());
  }

  @Test
  public void testSetTime() {
    long newTime = 1622548800000L; // Example timestamp
    date.setTime(newTime);
    assertEquals(newTime, date.getTime());
  }

  @Test
  public void testBefore() {
    Date earlierDate = new Date(date.getTime() - 1000);
    assertTrue(earlierDate.before(date));
  }

  @Test
  public void testAfter() {
    Date laterDate = new Date(date.getTime() + 1000);
    assertTrue(laterDate.after(date));
  }

  @Test
  public void testEquals() {
    Date anotherDate = new Date(date.getTime());
    assertTrue(date.equals(anotherDate));
  }

  @Test
  public void testToString() {
    String dateString = date.toString();
    assertNotNull(dateString);
  }
}
