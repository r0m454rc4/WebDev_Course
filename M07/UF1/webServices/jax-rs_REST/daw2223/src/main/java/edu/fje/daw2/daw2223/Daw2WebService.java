package edu.fje.daw2.daw2223;

import jakarta.ws.rs.*;
import jakarta.ws.rs.core.MediaType;
import jakarta.ws.rs.core.Response;

import java.util.ArrayList;

// http://localhost:8888/daw2223_war_exploded/api/alumnes
@Path("/alumnes")
public class Daw2WebService {

    // private static is to share the class between all of the objects.
    private static ArrayList<Alumne> alumnes = new ArrayList();

    public Daw2WebService() {
        // If is the 1rst time, I create this alumns.

        if (alumnes.size() == 0) {
            alumnes.add(new Alumne(1, "SERGI"));
            alumnes.add(new Alumne(2, "ANNA"));
            alumnes.add(new Alumne(3, "JOAN"));
        }
    }

    // Recover all of the alumns.
    @Path("/")
    @GET
    @Produces(MediaType.TEXT_PLAIN) // The same as "text/plain"
    public String obtenirTotsAlumnes() {
        return alumnes.toString();
    }

    // http://localhost:8888/daw2223_war_exploded/api/alumnes/alumne?codi=1
    // Recover an alumn using its code as a parameter.
    @GET
    @Path("/alumnePerConsulta")
    @Produces(MediaType.TEXT_PLAIN)
    public String obtenirUnAlumne(@QueryParam("c") int codi) {
        int pos = alumnes.indexOf(new Alumne(codi, ""));
        return alumnes.get(pos).toString();
    }

    // http://localhost:8888/daw2223_war_exploded/api/crearAlumne
    @Path("/crearAlumne")
    @POST
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.TEXT_PLAIN)
    public Response crearAlumne(@FormParam("codi") int codi,
            @FormParam("nom") String nom) {

        alumnes.add(new Alumne(codi, nom));
        return Response.status(200).entity("alumne creat").build();
    }
}
