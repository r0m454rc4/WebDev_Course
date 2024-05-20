package com.projecte.projecte.models;

public class Espacio {
    private String propietario;
    private String direccion;
    private String fecha_prestamo_inicial;
    private String fecha_prestamo_final;
    private int num_plantas;
    private int num_metros_cuadrados;
    private int cantidad_habitaciones;
    private boolean comedor;

    public Espacio() {}

    public Espacio(String propietario, String direccion, String fecha_prestamo_inicial, String fecha_prestamo_final, int num_plantas, int num_metros_cuadrados, int cantidad_habitaciones, boolean comedor) {
        this.propietario = propietario;
        this.direccion = direccion;
        this.fecha_prestamo_inicial = fecha_prestamo_inicial;
        this.fecha_prestamo_final = fecha_prestamo_final;
        this.num_plantas = num_plantas;
        this.num_metros_cuadrados = num_metros_cuadrados;
        this.cantidad_habitaciones = cantidad_habitaciones;
        this.comedor = comedor;
    }

    public String getPropietario() {
        return propietario;
    }

    public void setPropietario(String propietario) {
        this.propietario = propietario;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public String getFecha_prestamo_inicial() {
        return fecha_prestamo_inicial;
    }

    public void setFecha_prestamo_inicial(String fecha_prestamo_inicial) {
        this.fecha_prestamo_inicial = fecha_prestamo_inicial;
    }

    public String getFecha_prestamo_final() {
        return fecha_prestamo_final;
    }

    public void setFecha_prestamo_final(String fecha_prestamo_final) {
        this.fecha_prestamo_final = fecha_prestamo_final;
    }

    public int getNum_plantas() {
        return num_plantas;
    }

    public void setNum_plantas(int num_plantas) {
        this.num_plantas = num_plantas;
    }

    public int getNum_metros_cuadrados() {
        return num_metros_cuadrados;
    }

    public void setNum_metros_cuadrados(int num_metros_cuadrados) {
        this.num_metros_cuadrados = num_metros_cuadrados;
    }

    public int getCantidad_habitaciones() {
        return cantidad_habitaciones;
    }

    public void setCantidad_habitaciones(int cantidad_habitaciones) {
        this.cantidad_habitaciones = cantidad_habitaciones;
    }

    public boolean isComedor() {
        return comedor;
    }

    public void setComedor(boolean comedor) {
        this.comedor = comedor;
    }
}
