package edu.fje.daw2.daw2223;

import java.util.Objects;

/**
 * Classe que representa un alumne.
 * 
 * 
 * @version 1.0, 02/11/2023
 * @author sergi.grau@fje.edu
 *
 */
public class Alumne {
    private int codi;
    private String nom;

    /**
     * 
     * Constructor amb dos paràmetres de la classe Alumne
     * 
     * @param codi codi associat a un alumne
     * @param nom  nom nom d'alumne
     */
    public Alumne(int codi, String nom) {
        this.codi = codi;
        this.nom = nom;
    }

    public int getCodi() {
        return codi;
    }

    public void setCodi(int codi) {
        this.codi = codi;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    @Override
    public String toString() {
        return "Alumne{" +
                "codi=" + codi +
                ", nom='" + nom + '\'' +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (this == o)
            return true;
        if (o == null || getClass() != o.getClass())
            return false;
        Alumne alumne = (Alumne) o;
        return codi == alumne.codi;
    }

    @Override
    public int hashCode() {
        return Objects.hash(codi);
    }
}
