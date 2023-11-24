package edu.fje.daw2.joc;

import jakarta.ws.rs.*;
import jakarta.ws.rs.core.MediaType;

import java.util.ArrayList;

/**
 * WebService que representa un joc de tres en ratlla
 * 
 * @author sergi.grau@fje.edu
 * @version 1.0
 * @date 9.11.23
 */
@Path("/")
public class JocWebService {
    private static ArrayList<String> llistaPartides = new ArrayList<>();

    /**
     * Crea una partida amb un valor aleatori entre 1 i 10
     */
    @POST
    @Path("/crearPartida")
    @Produces(MediaType.TEXT_PLAIN)
    public byte crearPartida() {
        if (llistaPartides.size() < 11)
            llistaPartides.add("000000000");
        return (byte) llistaPartides.size();
    }

    /**
     * recupera totes les posicions del joc 3 en ratlla
     * el codi de la partida comença per 1, caldrà -1 per accedir a la posició del
     * ArrayList
     * 
     * @return una cadena en forma de 3x3 amb les posicions
     */
    @GET
    @Path("/recuperarEstat/{codiPartida}")
    @Produces(MediaType.TEXT_PLAIN)
    public String recuperarEstat(@PathParam("codiPartida") int codiPartida) {
        return llistaPartides.get(codiPartida - 1);
    }

    /**
     * Mètode que retorna qui ha gunyat una partida
     * 
     * @param codi de la partida
     * @return cadena que indica quin jugador ha guanyat
     */
    @GET
    @Path("/saberQuiGuanya/{codiPartida}")
    @Produces(MediaType.TEXT_PLAIN)
    public String saberQuiGuanya(@PathParam("codiPartida") int codi) {
        return "guanya el jugador 1";
    }

    /**
     * Mètode que esborra una partida
     * 
     * @param codiPartida de la partida
     */
    @DELETE
    @Path("/esborrarPartida")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    public void esborrarPartida(@FormParam("codiPartida") int codiPartida) {
        llistaPartides.remove(codiPartida - 1);
        System.out.println("partida esborrada " + codiPartida);
    }

    /**
     * Mètode que fa un moviment d'un jugador
     * 
     * @param codiPartida codi de la partida passat com a form-url-encoded
     * @param codiJugador codi del jugador passat com a form-url-encoded
     * @param fila        fila de la tirada com a form-url-encoded
     * @param columna     columna de la tirada com a form-url-encoded
     * @return una cadena en forma de 3x3 amb les posicions
     */
    @PUT
    @Path("/ferMoviment")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.TEXT_PLAIN)
    public String ferMoviment(@FormParam("codiPartida") int codiPartida,
            @FormParam("codiJugador") int codiJugador,
            @FormParam("fila") int fila,
            @FormParam("columna") int columna) {
        String partida = llistaPartides.get(codiPartida - 1);
        char[] posicions = partida.toCharArray();
        posicions[columna * 2 + fila] = Character.forDigit(codiJugador, 10);
        llistaPartides.set(codiPartida - 1, String.copyValueOf(posicions));
        return recuperarEstat(codiPartida);
    }
}
