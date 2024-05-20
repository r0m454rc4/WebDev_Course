package com.projecte.projecte.models;

public class PersonalSanitario {
    private String dni;
    private String nombre;
    private String apellido;
    private Integer edad;
    private String direccionEdificio;
    private String titulacion;
    private String sitioTrabajo;
    private String fechaEntrada;
    private String fechaSalida;
    private Integer idHabitacion;
    private Integer idEspacio;

    public PersonalSanitario() {}

    public PersonalSanitario(String dni, String nombre, String apellido, Integer edad, String direccionEdificio, String titulacion, String sitioTrabajo, String fechaEntrada, String fechaSalida, Integer idHabitacion, Integer idEspacio) {
        this.dni = dni;
        this.nombre = nombre;
        this.apellido = apellido;
        this.edad = edad;
        this.direccionEdificio = direccionEdificio;
        this.titulacion = titulacion;
        this.sitioTrabajo = sitioTrabajo;
        this.fechaEntrada = fechaEntrada;
        this.fechaSalida = fechaSalida;
        this.idHabitacion = idHabitacion;
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

    public String getDireccionEdificio() {
        return direccionEdificio;
    }

    public void setDireccionEdificio(String direccionEdificio) {
        this.direccionEdificio = direccionEdificio;
    }

    public String getTitulacion() {
        return titulacion;
    }

    public void setTitulacion(String titulacion) {
        this.titulacion = titulacion;
    }

    public String getSitioTrabajo() {
        return sitioTrabajo;
    }

    public void setSitioTrabajo(String sitioTrabajo) {
        this.sitioTrabajo = sitioTrabajo;
    }

    public String getFechaEntrada() {
        return fechaEntrada;
    }

    public void setFechaEntrada(String fechaEntrada) {
        this.fechaEntrada = fechaEntrada;
    }

    public String getFechaSalida() {
        return fechaSalida;
    }

    public void setFechaSalida(String fechaSalida) {
        this.fechaSalida = fechaSalida;
    }

    public Integer getIdHabitacion() {
        return idHabitacion;
    }

    public void setIdHabitacion(Integer idHabitacion) {
        this.idHabitacion = idHabitacion;
    }

    public Integer getIdEspacio() {
        return idEspacio;
    }

    public void setIdEspacio(Integer idEspacio) {
        this.idEspacio = idEspacio;
    }
}