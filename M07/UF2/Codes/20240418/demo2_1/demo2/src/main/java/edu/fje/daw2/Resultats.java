package edu.fje.daw2;

public class Resultats {
    private int suma=0;
    private int resta=0;


    public Resultats(int n1, int n2){
        this.suma=n1+n2;
        this.resta=n1-n2;
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
}
