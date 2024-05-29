import org.junit.Before;
import org.junit.Test;

import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.IOException;

import static org.junit.Assert.*;

public class StreamTest {

  private ByteArrayOutputStream outputStream;
  private ByteArrayInputStream inputStream;

  @Before
  public void setup() {
    outputStream = new ByteArrayOutputStream();
  }

  @Test
  public void testOutputStream() throws IOException {
    String data = "Hello, World!";
    outputStream.write(data.getBytes());
    assertArrayEquals(data.getBytes(), outputStream.toByteArray());
  }

  @Test
  public void testInputStream() {
    String data = "Hello, World!";
    inputStream = new ByteArrayInputStream(data.getBytes());
    byte[] buffer = new byte[data.length()];
    try {
      inputStream.read(buffer);
    } catch (IOException e) {
      e.printStackTrace();
    }
    assertArrayEquals(data.getBytes(), buffer);
  }
}
