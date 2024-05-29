import org.junit.Before;
import org.junit.Test;

import java.nio.file.Path;
import java.nio.file.Paths;

import static org.junit.Assert.*;

public class PathTest {
  private Path path;

  @Before
  public void setup() {
    path = Paths.get("test.txt");
  }

  @Test
  public void testPathNotNull() {
    assertNotNull(path);
  }

  @Test
  public void testPathFileName() {
    assertEquals("test.txt", path.getFileName().toString());
  }

  @Test
  public void testPathToAbsolutePath() {
    assertNotNull(path.toAbsolutePath());
  }
}
