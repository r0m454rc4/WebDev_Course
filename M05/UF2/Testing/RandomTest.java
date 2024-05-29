import org.junit.Before;
import org.junit.Test;

import java.util.Random;

import static org.junit.Assert.*;

public class RandomTest {
  private Random random;

  @Before
  public void setup() {
    random = new Random();
  }

  @Test
  public void testNextInt() {
    int randomInt = random.nextInt();
    assertTrue(randomInt >= Integer.MIN_VALUE && randomInt <= Integer.MAX_VALUE);
  }

  @Test
  public void testNextIntWithBound() {
    int bound = 10;
    int randomInt = random.nextInt(bound);
    assertTrue(randomInt >= 0 && randomInt < bound);
  }

  @Test
  public void testNextDouble() {
    double randomDouble = random.nextDouble();
    assertTrue(randomDouble >= 0.0 && randomDouble < 1.0);
  }

  @Test
  public void testNextBoolean() {
    boolean randomBoolean = random.nextBoolean();
    assertTrue(randomBoolean || !randomBoolean); // Always true
  }

  @Test
  public void testNextLong() {
    long randomLong = random.nextLong();
    assertTrue(randomLong >= Long.MIN_VALUE && randomLong <= Long.MAX_VALUE);
  }

  @Test
  public void testNextFloat() {
    float randomFloat = random.nextFloat();
    assertTrue(randomFloat >= 0.0f && randomFloat < 1.0f);
  }

  @Test
  public void testSetSeed() {
    Random random1 = new Random(12345L);
    Random random2 = new Random(12345L);

    for (int i = 0; i < 1000; i++) {
      assertEquals(random1.nextInt(), random2.nextInt());
    }
  }
}
