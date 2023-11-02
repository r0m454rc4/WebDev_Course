package com.example.prova;

import jakarta.ws.rs.*;
import jakarta.ws.rs.core.MediaType;
import jakarta.ws.rs.core.Response;

import javax.print.attribute.standard.Media;
import java.util.ArrayList;

@Path("/alumnes")
public class Daw2WebService {

    private static ArrayList<Alumne> alumnes = new ArrayList();

    public Daw2WebService() {
        if (alumnes.size() == 0) {
            alumnes.add(new Alumne(1, "SERGI"));
            alumnes.add(new Alumne(2, "ANNA"));
            alumnes.add(new Alumne(3, "JOAN"));
        }
    }

    /**
     * mètode que recupera tots els alumnes
     * 
     * @return tots els alumnes
     */
    @GET
    @Path("/")
    @Produces(MediaType.TEXT_PLAIN)
    public String obtenirTotsAlumnes() {
        return alumnes.toString();
    }

    /**
     * exemple d'ús
     * /api/alumnes/alumne?codi=1
     * 
     * @param codi
     * @return
     */
    @GET
    @Path("/alumnePerConsulta")
    @Produces(MediaType.TEXT_PLAIN)
    public String obtenirUnAlumne(@QueryParam("c") int codi) {
        int pos = alumnes.indexOf(new Alumne(codi, ""));
        return alumnes.get(pos).toString();
    }

    /**
     * exemple d'ús
     * /api/alumnes/alumne/1
     * 
     * @param codi
     * @return
     */
    @Path("/alumne/{codi}")
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String consultarAlumne(@PathParam("codi") int codi) {
        int pos = alumnes.indexOf(new Alumne(codi, ""));
        return alumnes.get(pos).toString();
    }

    @Path("/alumne/{codi}")
    @DELETE
    @Produces(MediaType.TEXT_PLAIN)
    public Response esborrarAlumne(@PathParam("codi") int codi) {
        int pos = alumnes.indexOf(new Alumne(codi, ""));
        alumnes.remove(pos);
        return Response.status(200).entity("alumne esborrat").build();
    }

    @POST
    @Path("/afegirAlumne")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.TEXT_PLAIN)
    public Response afegirAlumne(@FormParam("codi") int codi,
            @FormParam("nom") String nom) {

        alumnes.add(new Alumne(codi, nom));
        return Response.status(200).entity("alumne creat").build();
    }

    @PUT
    @Path("/modificarAlumne/{codiAlumneAcanviar}")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.TEXT_PLAIN)
    public Response modificarAlumne(@PathParam("codiAlumneAcanviar") int codiAlumneAcanviar,
            @FormParam("codi") int codi,
            @FormParam("nom") String nom) {
        int pos = alumnes.indexOf(new Alumne(codiAlumneAcanviar, ""));
        Alumne alumne = alumnes.get(pos);
        alumne.setCodi(codi);
        alumne.setNom(nom);
        return Response.status(200).entity("alumne modificat").build();
    }

}
