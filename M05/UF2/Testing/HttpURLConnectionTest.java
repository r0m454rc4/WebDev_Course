import org.junit.Before;
import org.junit.Test;

import java.io.IOException;
import java.net.HttpURLConnection;
import java.net.URL;

import static org.junit.Assert.*;

public class HttpURLConnectionTest {
  private HttpURLConnection connection;

  @Before
  public void setup() throws IOException {
    URL url = new URL("https://one.one.one.one/");
    connection = (HttpURLConnection) url.openConnection();
  }

  @Test
  public void testConnectionInitialization() {
    assertNotNull(connection);
  }

  @Test
  public void testResponseCode() throws IOException {
    connection.setRequestMethod("GET");
    int responseCode = connection.getResponseCode();
    assertEquals(HttpURLConnection.HTTP_OK, responseCode);
  }

  @Test
  public void testContentType() throws IOException {
    connection.setRequestMethod("GET");
    String contentType = connection.getContentType();
    assertNotNull(contentType);
  }

  @Test
  public void testDisconnect() {
    connection.disconnect();
    assertNull(connection.getContentEncoding());
  }
}
