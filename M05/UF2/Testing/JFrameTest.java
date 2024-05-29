import org.junit.Before;
import org.junit.Test;

import javax.swing.*;

import static org.junit.Assert.*;

public class JFrameTest {
  private JFrame frame;

  @Before
  public void setup() {
    frame = new JFrame();
  }

  @Test
  public void testFrameInitialization() {
    assertNotNull(frame);
  }

  @Test
  public void testTitle() {
    frame.setTitle("Test Frame");
    assertEquals("Test Frame", frame.getTitle());
  }

  @Test
  public void testVisibility() {
    frame.setVisible(true);
    assertTrue(frame.isVisible());
  }

  @Test
  public void testCloseOperation() {
    frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    assertEquals(JFrame.EXIT_ON_CLOSE, frame.getDefaultCloseOperation());
  }
}
