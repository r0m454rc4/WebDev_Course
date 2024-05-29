import org.junit.Test;
import static org.junit.Assert.*;

public class ObjectTest {
  private static class TestObject extends Object {
    private int value;

    public TestObject(int value) {
      this.value = value;
    }

    @Override
    public boolean equals(Object obj) {
      if (this == obj)
        return true;
      if (obj == null || getClass() != obj.getClass())
        return false;
      TestObject that = (TestObject) obj;
      return value == that.value;
    }

    @Override
    public int hashCode() {
      return Integer.hashCode(value);
    }

    @Override
    public String toString() {
      return "TestObject{" +
          "value=" + value +
          '}';
    }
  }

  @Test
  public void testEquals() {
    TestObject obj1 = new TestObject(1);
    TestObject obj2 = new TestObject(1);
    TestObject obj3 = new TestObject(2);

    assertEquals(obj1, obj2);
    assertNotEquals(obj1, obj3);
  }

  @Test
  public void testHashCode() {
    TestObject obj1 = new TestObject(1);
    TestObject obj2 = new TestObject(1);

    assertEquals(obj1.hashCode(), obj2.hashCode());
  }

  @Test
  public void testToString() {
    TestObject obj = new TestObject(1);
    assertEquals("TestObject{value=1}", obj.toString());
  }
}
