import org.junit.Before;
import org.junit.Test;

import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;

import static org.junit.Assert.*;

public class BufferedWriterTest {
  private BufferedWriter bufferedWriter;
  private Path filePath;

  @Before
  public void setup() throws IOException {
    filePath = Paths.get("test.txt");
    bufferedWriter = new BufferedWriter(new FileWriter(filePath.toFile()));
  }

  @Test
  public void testBufferedWriterNotNull() {
    assertNotNull(bufferedWriter);
  }

  @Test
  public void testBufferedWriterWrite() throws IOException {
    bufferedWriter.write("Hello World");
    bufferedWriter.close();
    String content = Files.readString(filePath);
    assertEquals("Hello World", content);
  }

  @Test
  public void testBufferedWriterFlush() throws IOException {
    bufferedWriter.write("Hello World");
    bufferedWriter.flush();
    String content = Files.readString(filePath);
    assertEquals("Hello World", content);
  }

  @Test
  public void testBufferedWriterClose() throws IOException {
    bufferedWriter.write("Hello World");
    bufferedWriter.close();
    assertTrue(Files.exists(filePath));
  }
}
