package com.projecte.projecte.models;

public class Session {

    private static Session instance;
    private String rol;

    private Session() {
        // Constructor privado para evitar la creación de instancias externas
    }

    public static Session getInstance() {
        if (instance == null) {
            instance = new Session();
        }
        return instance;
    }

    public String getRol() {
        return rol;
    }

    public void setRol(String rol) {
        this.rol = rol;
    }
}