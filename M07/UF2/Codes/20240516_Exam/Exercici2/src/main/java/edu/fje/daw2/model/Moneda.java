package edu.fje.daw2.model;

import org.springframework.data.annotation.Id;

public class Moneda {
    @Id
    public String id;
    public String descripcio;
    public String codi;
    public double cotitzacio;

    public Moneda() {
    }

    public Moneda(String descripcio, String codi, double cotitzacio) {
        this.descripcio = descripcio;
        this.codi = codi;
        this.cotitzacio = cotitzacio;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getDescripcio() {
        return descripcio;
    }

    public void setDescripcio(String descripcio) {
        this.descripcio = descripcio;
    }

    public String getCodi() {
        return codi;
    }

    public void setCodi(String codi) {
        this.codi = codi;
    }

    public double getCotitzacio() {
        return cotitzacio;
    }

    public void setCotitzacio(double cotitzacio) {
        this.cotitzacio = cotitzacio;
    }

    @Override
    public String toString() {
        return "Moneda{" +
                "id='" + id + '\'' +
                ", descripcio='" + descripcio + '\'' +
                ", codi='" + codi + '\'' +
                ", cotitzacio=" + cotitzacio +
                '}';
    }
}