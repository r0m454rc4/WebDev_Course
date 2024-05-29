import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;

import java.util.Calendar;
import java.util.GregorianCalendar;

public class CalendarTest {
  private Calendar calendar;

  @Before
  public void setup() {
    calendar = new GregorianCalendar(2024, Calendar.MAY, 22);
  }

  @Test
  public void testGet() {
    assertEquals(2024, calendar.get(Calendar.YEAR));
    assertEquals(Calendar.MAY, calendar.get(Calendar.MONTH));
    assertEquals(22, calendar.get(Calendar.DAY_OF_MONTH));
  }

  @Test
  public void testAdd() {
    calendar.add(Calendar.DAY_OF_MONTH, 10);
    assertEquals(1, calendar.get(Calendar.DAY_OF_MONTH));
  }

  @Test
  public void testSet() {
    calendar.set(Calendar.YEAR, 2024);
    assertEquals(2024, calendar.get(Calendar.YEAR));
  }

  @Test
  public void testRoll() {
    calendar.roll(Calendar.DAY_OF_MONTH, 10);
    assertEquals(1, calendar.get(Calendar.DAY_OF_MONTH));
  }

  @Test
  public void testGetTime() {
    assertNotNull(calendar.getTime());
  }
}
