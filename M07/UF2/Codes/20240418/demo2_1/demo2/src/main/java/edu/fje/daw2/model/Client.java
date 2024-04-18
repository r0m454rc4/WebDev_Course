package edu.fje.daw2.model;


import org.springframework.data.annotation.Id;

/**
 * Classe entitat que representa un client.
 * Es tracta d'una classe del model que es farà persistent
 * @author sergi.grau@fje.edu
 * @version  1.0 4.4.2019
 */
public class Client {
    @Id
    public String id;
    public String nom;
    public String cognom;
    public int volumCompres;

    public Client() {}

    public Client(String nom, String cognom, int volumCompres) {
        this.nom = nom;
        this.cognom = cognom;
        this.volumCompres=volumCompres;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
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

    public int getVolumCompres() {
        return volumCompres;
    }

    public void setVolumCompres(int volumCompres) {
        this.volumCompres = volumCompres;
    }

    @Override
    public String toString() {
        return "Client{" +
                "id='" + id + '\'' +
                ", nom='" + nom + '\'' +
                ", cognom='" + cognom + '\'' +
                ", volumCompres=" + volumCompres +
                '}';
    }
}