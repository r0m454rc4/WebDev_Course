import org.junit.Before;
import org.junit.Test;

import java.util.Properties;

import static org.junit.Assert.*;

public class PropertiesTest {
  private Properties properties;

  @Before
  public void setup() {
    properties = new Properties();
    properties.setProperty("key1", "value1");
    properties.setProperty("key2", "value2");
  }

  @Test
  public void testPropertiesNotNull() {
    assertNotNull(properties);
  }

  @Test
  public void testPropertiesGetProperty() {
    assertEquals("value1", properties.getProperty("key1"));
    assertEquals("value2", properties.getProperty("key2"));
  }

  @Test
  public void testPropertiesSize() {
    assertEquals(2, properties.size());
  }
}
