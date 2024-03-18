package edu.fje.daw2.springproject;

public class Resultats {
    private int suma = 0;
    private int resta = 0;
    private int producte = 0;
    private int divisio = 0;

    public Resultats(int n1, int n2) {
        this.suma = n1 + n2;
        this.resta = n1 - n2;
        this.producte = n1 * n2;
        this.divisio = n1 / n2;
    }

    public int getSuma() {
        return suma;
    }

    public void setSuma(int suma) {
        this.suma = suma;
    }

    public int getResta() {
        return resta;
    }

    public void setResta(int resta) {
        this.resta = resta;
    }

    public int getProducte() {
        return producte;
    }

    public void setProducte(int producte) {
        this.producte = producte;
    }

    public int getDivisio() {
        return divisio;
    }

    public void setDivisio(int divisio) {
        this.divisio = divisio;
    }
}
