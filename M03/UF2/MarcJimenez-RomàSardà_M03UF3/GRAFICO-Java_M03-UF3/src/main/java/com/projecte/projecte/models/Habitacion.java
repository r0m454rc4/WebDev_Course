package com.projecte.projecte.models;

public class Habitacion {
    private String numero_habitacion;
    private String direccion;
    private Float num_metros_cuadrados;
    private Integer cantidad_camas;
    private Integer idEspacio;

    public Habitacion() {}

    public Habitacion(String numero_habitacion, String direccion, Float num_metros_cuadrados, Integer cantidad_camas, Integer idEspacio) {
        this.numero_habitacion = numero_habitacion;
        this.direccion = direccion;
        this.num_metros_cuadrados = num_metros_cuadrados;
        this.cantidad_camas = cantidad_camas;
        this.idEspacio = idEspacio;
    }

    public String getNumero_habitacion() {
        return numero_habitacion;
    }

    public void setNumero_habitacion(String numero_habitacion) {
        this.numero_habitacion = numero_habitacion;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public Float getNum_metros_cuadrados() {
        return num_metros_cuadrados;
    }

    public void setNum_metros_cuadrados(Float num_metros_cuadrados) {
        this.num_metros_cuadrados = num_metros_cuadrados;
    }

    public Integer getCantidad_camas() {
        return cantidad_camas;
    }

    public void setCantidad_camas(Integer cantidad_camas) {
        this.cantidad_camas = cantidad_camas;
    }

    public Integer getIdEspacio() {
        return idEspacio;
    }

    public void setIdEspacio(Integer idEspacio) {
        this.idEspacio = idEspacio;
    }
}
