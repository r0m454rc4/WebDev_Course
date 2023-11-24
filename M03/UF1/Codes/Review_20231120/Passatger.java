import java.util.Objects;

public class Passatger {
    private String nom = "";
    private String dni = "";
    private int edat;

    public Passatger() {
        this.edat = 18;
    }

    public Passatger(String nom, String dni, int edat) {
        this.nom = nom;
        this.dni = dni;
        this.edat = edat;
    }

    @Override
    public String toString() {
        return "Passatger amb nom " + nom + " y dni " + dni + " y edat " + edat;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o)
            return true;
        if (o == null || getClass() != o.getClass())
            return false;
        Passatger passatger = (Passatger) o;
        return dni.equals(passatger.dni);
    }

    @Override
    public int hashCode() {
        return Objects.hash(dni);
    }

    public boolean esMenorEdat() {
        if (edat < 18)
            return true;
        return false;
    }

    public String getDni() {
        return dni;
    }
}
