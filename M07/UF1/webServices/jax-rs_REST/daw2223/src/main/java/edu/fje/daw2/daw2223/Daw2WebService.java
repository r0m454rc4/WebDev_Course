package edu.fje.daw2.daw2223;

import jakarta.ws.rs.*;
import jakarta.ws.rs.core.MediaType;
import jakarta.ws.rs.core.Response;

import java.util.ArrayList;

@Path("/alumnes") // Here I say that the base path will be "/alumnes".
public class Daw2WebService {

    // private static is to share the class between all of the objects.
    private static ArrayList<Alumne> alumnes = new ArrayList();

    public Daw2WebService() {
        // If it's the 1rst time, I create this alumns.

        if (alumnes.size() == 0) {
            alumnes.add(new Alumne(1, "SERGI"));
            alumnes.add(new Alumne(2, "ANNA"));
            alumnes.add(new Alumne(3, "JOAN"));
        }
    }

    // Get a list of the alumns.
    // http://localhost:8888/daw2223_war_exploded/api/alumnes
    @GET
    @Path("/")
    @Produces(MediaType.TEXT_PLAIN) // The same as "text/plain"
    public String obtenirTotsAlumnes() {

        return alumnes.toString();
    }

    // Recover an alumn using its code as a query string parameter.
    // http://localhost:8888/daw2223_war_exploded/api/alumnes/alumnePerConsulta?codi=1

    @GET
    @Path("/alumnePerConsulta")
    @Produces(MediaType.TEXT_PLAIN)
    public String obtenirUnAlumne(@QueryParam("c") int codi) {
        int pos = alumnes.indexOf(new Alumne(codi, ""));

        return alumnes.get(pos).toString();
    }

    // Recover an alumn using its code as a path parameter.
    // http://localhost:8888/daw2223_war_exploded/api/alumnes/alumne/1
    @GET
    @Path("/alumne/{codi}")
    @Produces(MediaType.TEXT_PLAIN)
    public String consultarAlumne(@PathParam("codi") int codi) {
        int pos = alumnes.indexOf(new Alumne(codi, ""));

        return alumnes.get(pos).toString();
    }

    // Add (create) a new alumn using x-www-form-encoded as parameters in Postman.
    // http://localhost:8888/daw2223_war_exploded/api/alumnes/crearAlumne
    @POST
    @Path("/crearAlumne")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED) // This is used to codify the parameters from the URL.
    @Produces(MediaType.TEXT_PLAIN)
    public Response crearAlumne(@FormParam("codi") int codi,
            @FormParam("nom") String nom) {
        alumnes.add(new Alumne(codi, nom));

        return Response.status(200).entity("Alumne amb codi " + codi + " i nom " + nom + " ha estat creat.").build();
    }

    // Modify the name and code of alumn using x-www-form-encoded as parameters.
    // http://localhost:8888/daw2223_war_exploded/api/alumnes/modificarAlumne/1
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

        return Response.status(200).entity(
                "L'alumne amb el codi anterior: " + codiAlumneAcanviar + ", ara té el nou codi " + codi + " i nom "
                        + nom + ".")
                .build();
    }

    // Delete an alumn using its code as a path parameter.
    // http://localhost:8888/daw2223_war_exploded/api/alumnes/alumne/1
    @DELETE
    @Path("/alumne/{codi}")
    @Produces(MediaType.TEXT_PLAIN)
    public Response esborrarAlumne(@PathParam("codi") int codi) {
        int pos = alumnes.indexOf(new Alumne(codi, ""));
        alumnes.remove(pos);

        return Response.status(200).entity("L'alumne amb codi " + codi + " ha estat esborrat.").build();
    }
}