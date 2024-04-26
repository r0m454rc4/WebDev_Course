package edu.fje.daw2;

import org.springframework.data.annotation.Id;

public class Alumne {

    private Id id;
    private String nom;
    private String cognom;
    private int nota;

    public Alumne(String nom, String cognom, int nota) {
        this.nom = nom;
        this.cognom = cognom;
        this.nota = nota;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getCognom() {
        return cognom;
    }

    public void setCognom(String cognom) {
        this.cognom = cognom;
    }

    public int getNota() {
        return nota;
    }

    public void setNota(int nota) {
        this.nota = nota;
    }
}
