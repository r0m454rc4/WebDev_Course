package edu.fje.daw2.model;

import jakarta.persistence.*;

import java.util.Objects;

/**
 * Classe entitat que representa un client.
 * Es tracta d'una classe del model que es farà persistent
 * @author sergi.grau@fje.edu
 * @version  1.0 4.4.2019
 */
@Entity
@Access(AccessType.FIELD)
public class Client {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    public String nom;
    public String cognom;
    public int volumCompres;

    public Client() {}

    public Client(String nom, String cognom, int volumCompres) {
        this.nom = nom;
        this.cognom = cognom;
        this.volumCompres=volumCompres;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
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