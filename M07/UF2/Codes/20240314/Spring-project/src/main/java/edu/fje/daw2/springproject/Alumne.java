package edu.fje.daw2.springproject;

public class Alumne {
    private String nom = "";
    private String cognom = "";
    private Double nota = 0.0;

    public Alumne(String nom, String cognom, Double nota) {
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

    public Double getNota() {
        return nota;
    }

    public void setNota(Double nota) {
        this.nota = nota;
    }
}
