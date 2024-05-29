import org.junit.Before;
import org.junit.Test;

import static org.junit.Assert.*;

public class StringBufferTest {
  private StringBuffer stringBuffer;

  @Before
  public void setup() {
    stringBuffer = new StringBuffer("Initial");
  }

  @Test
  public void testStringBufferNotNull() {
    assertNotNull(stringBuffer);
  }

  @Test
  public void testStringBufferAppend() {
    stringBuffer.append(" Value");
    assertEquals("Initial Value", stringBuffer.toString());
  }

  @Test
  public void testStringBufferInsert() {
    stringBuffer.insert(7, " Inserted");
    assertEquals("Initial Inserted", stringBuffer.toString());
  }

  @Test
  public void testStringBufferDelete() {
    stringBuffer.delete(0, 7);
    assertEquals("", stringBuffer.toString());
  }
}
