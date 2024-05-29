import org.junit.Before;
import org.junit.Test;

import static org.junit.Assert.*;

public class ExceptionTest {
  private Exception exception;

  @Before
  public void setup() {
    exception = new Exception("Test Exception");
  }

  @Test
  public void testExceptionMessage() {
    assertEquals("Test Exception", exception.getMessage());
  }

  @Test
  public void testExceptionCause() {
    Throwable cause = new Throwable("Cause");
    Exception exceptionWithCause = new Exception("Test Exception", cause);
    assertEquals(cause, exceptionWithCause.getCause());
  }
}
