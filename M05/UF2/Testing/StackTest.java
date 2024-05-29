import org.junit.Before;
import org.junit.Test;

import java.util.Stack;

import static org.junit.Assert.*;

public class StackTest {
  private Stack<String> stack;

  @Before
  public void setup() {
    stack = new Stack<>();
    stack.push("A");
    stack.push("B");
    stack.push("C");
  }

  @Test
  public void testStackNotNull() {
    assertNotNull(stack);
  }

  @Test
  public void testStackPushAndPop() {
    assertEquals("C", stack.pop());
    assertEquals("B", stack.pop());
    assertEquals("A", stack.pop());
  }

  @Test
  public void testStackSize() {
    assertEquals(3, stack.size());
  }
}
