import org.junit.Before;
import org.junit.Test;

import java.nio.ByteBuffer;

import static org.junit.Assert.*;

public class ByteBufferTest {
  private ByteBuffer byteBuffer;

  @Before
  public void setup() {
    byteBuffer = ByteBuffer.allocate(10);
  }

  @Test
  public void testByteBufferCapacity() {
    assertEquals(10, byteBuffer.capacity());
  }

  @Test
  public void testByteBufferPutAndGet() {
    byteBuffer.put((byte) 1);
    byteBuffer.flip();
    assertEquals((byte) 1, byteBuffer.get());
  }

  @Test
  public void testByteBufferPosition() {
    byteBuffer.put((byte) 1);
    assertEquals(1, byteBuffer.position());
  }
}
