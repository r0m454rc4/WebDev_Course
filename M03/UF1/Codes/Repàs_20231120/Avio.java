package edu.fje.daw2;

import java.util.ArrayList;

public class Avio {
    private String model;
    private int seients;
    private final String origen ="BCN";
    private String desti;

    private ArrayList<Passatger> llistaPassatgers = new ArrayList<>();

    public Avio(String model, int seients, String desti) {
        this.model = model;
        this.seients=seients;
        this.desti=desti;
    }

    @Override
    public String toString() {
        return "Avio{" +
                "model='" + model + '\'' +
                ", seients=" + seients +
                ", origen='" + origen + '\'' +
                ", desti='" + desti + '\'' +
                '}';
    }

    public void afegirPassatger(Passatger passatger){
        llistaPassatgers.add(passatger);
    }

    public String mostrarPassatgers(){

        String sortida="";
        for (Passatger p: llistaPassatgers){
            sortida += p.getDni()+"\n";

        }
        return sortida;
    }

}
