/**
 * Card game, 7 & 1/2.
 *
 * @author roma.sarda.casellas373@gmail.com
 * @version 1.0.
 * @date 09.11.23.
 */

package edu.fje.daw2.joccartes;

import jakarta.ws.rs.*;
import jakarta.ws.rs.core.MediaType;

import java.util.ArrayList;

@Path("/")
public class JocCarta {
    /**
     * Create a new game using codiPartida as an URL parameter.
     * http://localhost:8888/jocCartes_war_exploded/api/iniciarJoc/1.
     *
     * @param codiPartida
     * @return True if codiPartida has been iniciated, or false if it hasn't.
     */

    // Here I declare some global variables.
    private static ArrayList<Integer> partidaIniciada = new ArrayList<>();

    // This I have two ArrayList because I'll have a nested ArrayList.
    private static ArrayList<ArrayList<String>> totalCartes = new ArrayList<>();

    Integer codiPartida = 0, numJug = 0, quantitatPuntsIni = 100;

    @POST
    @Path("/iniciarJoc/{codiPartida}")
    @Produces(MediaType.TEXT_PLAIN)
    public String iniciarJoc(@PathParam("codiPartida") Integer codiPartida) {
        /*
         * partidaIniciada.contains(codiPartida) is to search there's codiPartida in the
         * array.
         */
        if (!partidaIniciada.contains(codiPartida)) {
            partidaIniciada.add(codiPartida); // This is to add codiPartida to the arraylist.

            return "La partida amb codi " + codiPartida + " ha estat inicialitzada correctament.";
        }

        return "La partida amb codi " + codiPartida + " prèviament ja ha estat inicialitzada.";
    }

    /**
     * Method that will get a random card for the player.
     * http://localhost:8888/jocCartes_war_exploded/api/obtenirCarta/1/1.
     * 
     * @param codiPartida
     * @param numJug
     * @return Random card for the player.
     */

    // Array that has the possible types of cards.
    String tipusCarta[] = { "ors", "espases", "copes", "bastons" };

    // Function that generates a random card, from 1 to 12.
    String generarCarta(String[] tpCartaAl) {
        int cartaAleatoria = (int) Math.floor(Math.random() * 12) + 1; // (int) Math.floor is to transform the double to
                                                                       // int.
        int cartaIndex = (int) Math.floor(Math.random() * tipusCarta.length);

        tpCartaAl[0] = tipusCarta[(int) cartaIndex];

        String cartaAl = Integer.toString(cartaAleatoria) + " de " + tpCartaAl[0];

        return cartaAl;
    }

    @GET
    @Path("/obtenirCarta/{codiPartida}/{numJug}")
    @Produces(MediaType.TEXT_PLAIN)
    public String obtenirCarta(@PathParam("codiPartida") Integer codiPartida, @PathParam("numJug") int numJug) {
        if (partidaIniciada.contains(codiPartida)) {
            partidaIniciada.add(codiPartida); // This is to add codiPartida to the arraylist.
            for (int i = totalCartes.size(); i <= numJug; i++) {
                totalCartes.add(new ArrayList<>());
            }

            String cartaTirada = generarCarta(tipusCarta);

            totalCartes.get(numJug).add(cartaTirada);

            return "El jugador " + numJug + " ha obtingut " + cartaTirada + " i té " + totalCartes;
        }

        return "La partida amb codi " + codiPartida + " encara no ha estat inicialitzada.";
    }

    /**
     * Method that will show the cards that the player has.
     * http://localhost:8888/jocCartes_war_exploded/api/mostrarCartes/1/1.
     *
     * @param codiPartida
     * @param numJug
     * @return The cards the the player has.
     */
    @GET
    @Path("/mostrarCartes/{codiPartida}/{numJug}")
    @Produces(MediaType.TEXT_PLAIN)
    public String mostrarCartes(@PathParam("codiPartida") Integer codiPartida, @PathParam("numJug") int numJug) {
        return "El jugador " + numJug + " de la partida " + codiPartida + " ha té moltes cartes.";
    }

    /**
     * Method that will throw a card from the player.
     * http://localhost:8888/jocCartes_war_exploded/api/tirarCarta/1/1/1.
     *
     * @param codiPartida
     * @param numJug
     * @param carta
     * @return Thow a card from the player.
     */
    @PUT
    @Path("/tirarCarta/{codiPartida}/{numJug}/{carta}")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.TEXT_PLAIN)
    public String tirarCarta(@PathParam("codiPartida") Integer codiPartida, @PathParam("numJug") int numJug,
            @PathParam("carta") int carta) {

        return "El jugador " + numJug + " de la partida " + codiPartida + " tira la carta " + carta + ".";
    }

    /**
     * Method to bet points on a game.
     * http://localhost:8888/jocCartes_war_exploded/api/moureJugador/1/1/aposta/30.
     *
     * @param codiPartida
     * @param numJug
     * @param quantitat
     * @return Bet amount from the player.
     */
    @PUT
    @Path("/moureJugador/{codiPartida}/{numJug}/aposta/{quantitat}")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.TEXT_PLAIN)
    public String apostar(@PathParam("codiPartida") Integer codiPartida, @PathParam("numJug") int numJug,
            @PathParam("quantitat") int quantitat) {

        return "El jugador " + numJug + " de la partida " + codiPartida + " aposta " + quantitat + " fitxes.";
    }

    /**
     * Method for the user to say that don't want to play on the turn.
     * http://localhost:8888/jocCartes_war_exploded/api/moureJugador/1/1/passa.
     *
     * @param codiPartida
     * @param numJug *
     * @return True if a player doesn't want to play, false if wants to play.
     */
    @PUT
    @Path("/moureJugador/{codiPartida}/{numJug}/passa")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    @Produces(MediaType.TEXT_PLAIN)
    public String passar(@PathParam("codiPartida") Integer codiPartida, @PathParam("numJug") int numJug) {

        return "El jugador " + numJug + " de la partida " + codiPartida + " decideix passar en aquest torn.";
    }

    /**
     * Method to emd a game.
     * http://localhost:8888/jocCartes_war_exploded/api/acabarJoc/1
     *
     * @param codiPartida
     * @return End the game.
     */
    @DELETE
    @Path("/acabarJoc/{codiPartida}")
    @Consumes(MediaType.APPLICATION_FORM_URLENCODED)
    public String esborrarPartida(@PathParam("codiPartida") Integer codiPartida) {
        if (partidaIniciada.contains(codiPartida)) {
            partidaIniciada.remove(codiPartida);

            return "La partida amb codi " + codiPartida + " ha estat acabada correctament.";
        }

        return "La partida amb codi " + codiPartida + " encara no ha estat inicialitzada.";
    }
}
