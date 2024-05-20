package com.projecte.projecte.models;

public class TrabajadorEspacio {
    private String dni;
    private String nombre;
    private String apellido;
    private Integer edad;
    private String trabajoAsignado;
    private String fechaContratacion;
    private String fechaBaja;
    private Integer idEspacio;

    public TrabajadorEspacio() {}

    public TrabajadorEspacio(String dni, String nombre, String apellido, Integer edad, String trabajoAsignado, String fechaContratacion, String fechaBaja, Integer idEspacio) {
        this.dni = dni;
        this.nombre = nombre;
        this.apellido = apellido;
        this.edad = edad;
        this.trabajoAsignado = trabajoAsignado;
        this.fechaContratacion = fechaContratacion;
        this.fechaBaja = fechaBaja;
        this.idEspacio = idEspacio;
    }

    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido() {
        return apellido;
    }

    public void setApellido(String apellido) {
        this.apellido = apellido;
    }

    public Integer getEdad() {
        return edad;
    }

    public void setEdad(Integer edad) {
        this.edad = edad;
    }

    public String getTrabajoAsignado() {
        return trabajoAsignado;
    }

    public void setTrabajoAsignado(String trabajoAsignado) {
        this.trabajoAsignado = trabajoAsignado;
    }

    public String getFechaContratacion() {
        return fechaContratacion;
    }

    public void setFechaContratacion(String fechaContratacion) {
        this.fechaContratacion = fechaContratacion;
    }

    public String getFechaBaja() {
        return fechaBaja;
    }

    public void setFechaBaja(String fechaBaja) {
        this.fechaBaja = fechaBaja;
    }

    public Integer getIdEspacio() {
        return idEspacio;
    }

    public void setIdEspacio(Integer idEspacio) {
        this.idEspacio = idEspacio;
    }
}