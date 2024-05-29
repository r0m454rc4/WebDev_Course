import org.junit.Before;
import org.junit.Test;

import java.util.Optional;

import static org.junit.Assert.*;

public class OptionalTest {
  private Optional<String> optional;

  @Before
  public void setup() {
    optional = Optional.of("Test");
  }

  @Test
  public void testIsPresent() {
    assertTrue(optional.isPresent());
  }

  @Test
  public void testGet() {
    assertEquals("Test", optional.get());
  }

  @Test
  public void testOrElse() {
    assertEquals("Test", optional.orElse("Default"));
  }

  @Test
  public void testIfPresent() {
    optional.ifPresent(value -> assertEquals("Test", value));
  }
}
