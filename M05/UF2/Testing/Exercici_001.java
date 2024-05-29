import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.assertEquals;

import org.junit.Assert;

public class Exercici_001 {

	StringBuffer sb;

	@Before
	public void setup() {
		sb = new StringBuffer("HOLA");
	}

	@Test
	public void testCharAt() {
		assertEquals('H', sb.charAt(0));
		assertEquals('A', sb.charAt(sb.length() - 1));
	}

	@Test
	public void testCharAtLowerIndex() {
		try {
			sb.charAt(-1);
			Assert.fail();
		} catch (IndexOutOfBoundsException ex) {
			Assert.assertTrue(true);
		}
	}

	@Test
	public void testCharAtHigherIndex() {
		try {
			sb.charAt(sb.length());
			Assert.fail();
		} catch (IndexOutOfBoundsException ex) {
			Assert.assertTrue(true);
		}
	}

	@Test
	public void testSetCharAt() {
		sb.setCharAt(1, 'A');

		// OPCIO 1
		Assert.assertEquals("HALA", sb.toString());

		// OPCIO 2
		Assert.assertEquals('A', sb.charAt(1));

		try {
			sb.setCharAt(-1, 'A');
			Assert.fail();
		} catch (IndexOutOfBoundsException ex) {
			Assert.assertTrue(true);
		}

		try {
			sb.setCharAt(sb.length(), 'A');
			Assert.fail();
		} catch (IndexOutOfBoundsException ex) {
			Assert.assertTrue(true);
		}
	}

	@Test
	public void testAppend() {
		int originalLength = sb.length();

		String argument = " QUE TAL";
		int argumentLength = argument.length();

		sb.append(argument);
		Assert.assertEquals("HOLA QUE TAL", sb.toString());
		Assert.assertEquals(originalLength + argumentLength, sb.length());

	}

	@Test
	public void testAppendWithNullString() {
		String nullString = null;
		sb.append(nullString);
		Assert.assertEquals("HOLAnull", sb.toString());

	}
}
