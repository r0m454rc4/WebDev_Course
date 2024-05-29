import org.junit.Before;
import org.junit.Test;

import static org.junit.Assert.*;

public class ThreadLocalTest {
  private ThreadLocal<String> threadLocal;

  @Before
  public void setup() {
    threadLocal = ThreadLocal.withInitial(() -> "Initial");
  }

  @Test
  public void testThreadLocalNotNull() {
    assertNotNull(threadLocal);
  }

  @Test
  public void testThreadLocalInitialValue() {
    assertEquals("Initial", threadLocal.get());
  }

  @Test
  public void testThreadLocalSetAndGet() {
    threadLocal.set("New Value");
    assertEquals("New Value", threadLocal.get());
  }

  @Test
  public void testThreadLocalRemove() {
    threadLocal.set("New Value");
    threadLocal.remove();
    assertEquals("Initial", threadLocal.get());
  }
}
