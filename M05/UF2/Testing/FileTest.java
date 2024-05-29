import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;

import java.io.File;
import java.io.IOException;

public class FileTest {

  private File file;

  @Before
  public void setup() {
    file = new File("testFile.txt");
  }

  @Test
  public void testCreateNewFile() throws IOException {
    if (file.exists()) {
      file.delete();
    }
    assertTrue(file.createNewFile());
    assertTrue(file.exists());
  }

  @Test
  public void testDelete() {
    if (!file.exists()) {
      try {
        file.createNewFile();
      } catch (IOException e) {
        e.printStackTrace();
      }
    }
    assertTrue(file.delete());
    assertFalse(file.exists());
  }

  @Test
  public void testIsDirectory() {
    assertFalse(file.isDirectory());
    File dir = new File("testDir");
    if (!dir.exists()) {
      dir.mkdir();
    }
    assertTrue(dir.isDirectory());
    dir.delete();
  }

  @Test
  public void testGetName() {
    assertEquals("testFile.txt", file.getName());
  }

  @Test
  public void testGetAbsolutePath() {
    assertNotNull(file.getAbsolutePath());
  }
}
