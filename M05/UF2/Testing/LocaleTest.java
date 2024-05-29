import org.junit.Before;
import org.junit.Test;

import java.util.Locale;

import static org.junit.Assert.*;

public class LocaleTest {
  private Locale locale;

  @Before
  public void setup() {
    locale = new Locale("en", "US");
  }

  @Test
  public void testLocaleNotNull() {
    assertNotNull(locale);
  }

  @Test
  public void testLocaleLanguage() {
    assertEquals("en", locale.getLanguage());
  }

  @Test
  public void testLocaleCountry() {
    assertEquals("US", locale.getCountry());
  }

  @Test
  public void testLocaleDisplayName() {
    assertEquals("English (United States)", locale.getDisplayName());
  }
}
