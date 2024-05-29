import org.junit.Before;
import org.junit.Test;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.StringReader;

import static org.junit.Assert.*;

public class BufferedReaderTest {
  private BufferedReader bufferedReader;

  @Before
  public void setup() {
    String data = "Hello, World!\nThis is a test.";
    bufferedReader = new BufferedReader(new StringReader(data));
  }

  @Test
  public void testReadLine() throws IOException {
    assertEquals("Hello, World!", bufferedReader.readLine());
    assertEquals("This is a test.", bufferedReader.readLine());
    assertNull(bufferedReader.readLine());
  }

  @Test
  public void testReady() throws IOException {
    assertTrue(bufferedReader.ready());
    bufferedReader.readLine();
    bufferedReader.readLine();
    assertNull(bufferedReader.readLine());
    assertFalse(bufferedReader.ready());
  }

  @Test
  public void testSkip() throws IOException {
    bufferedReader.skip(7);
    assertEquals(" World!", bufferedReader.readLine());
  }

  @Test
  public void testMarkAndReset() throws IOException {
    bufferedReader.mark(10);
    assertEquals("Hello, World!", bufferedReader.readLine());
    bufferedReader.reset();
    assertEquals("Hello, World!", bufferedReader.readLine());
  }
}
