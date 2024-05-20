package Testing;

import static org.junit.Assert.assertEquals;
import org.junit.Test;

public class Exemple0Test {
    @Test
    public void testMostraMissatge() {
        // Arrange.
        String missatge = "Hello, world!";
        Exemple0 exemple = new Exemple0(missatge);

        // Act.
        String resultat = exemple.mostraMissatge();

        // Assert.
        assertEquals(missatge, resultat);
    }
}
