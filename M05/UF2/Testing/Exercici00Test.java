import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.assertTrue;
import static org.junit.Assert.assertFalse;
import static org.junit.Assert.assertEquals;
import static org.junit.Assert.assertNull;

public class Exercici00Test {
	Exercici00<Object> pila;

	@Before
	public void clean() {
		// En aquest mètode hi posarem el que volguem que succeeixi abans de CADA test.
		// D'aquesta manera ens estalviem la línia de codi en cada funció de test.
		pila = new Exercici00<Object>();
	}

	@Test
	public void testPush() {
		// Necessitarem una nova pila si executem tots els tests simultàniament
		// pila = new Pila<Object>();

		// Anem afegint elements fins a omplir la pila, verificant que es poden afegir
		for (int i = 0; i < pila.getSize(); i++)
			assertTrue(pila.push(i));

		// Quan la pila estigui la plena el següent push hauria de retornar fals
		assertFalse(pila.push(666));
	}

	@Test
	public void testPop() {
		// Necessitarem una nova pila si executem tots els tests simultàniament
		// pila = new Pila<Object>();

		// Afegim un element i fem un pop per verificar que retorna el que toca
		pila.push(1);
		assertEquals(1, (int) pila.pop());

		// Quan la pila està buida ha de retornar null
		assertNull(pila.pop());
	}

	@Test
	public void testIsEmpty() {
		// Necessitarem una nova pila si executem tots els tests simultàniament
		// pila = new Pila<Object>();

		// Comprovem que la pila inicialment està buida
		assertTrue(pila.isEmpty());

		// Comprovem que la pila ja no ho està després d'afegir-hi un element
		pila.push(1);
		assertFalse(pila.isEmpty());
	}

	@Test
	public void testGetSize() {
		// Necessitarem una nova pila si executem tots els tests simultàniament
		// pila = new Pila<Object>();

		// Comprovem que hi ha una mida màxima vàlida de la Pila
		assertTrue(pila.getSize() > 0);
	}
}
