/**
 * Card game, 7 & 1/2.
 *
 * @author roma.sarda.casellas373@gmail.com
 * @version 1.0.
 * @date 02.02.24.
 */

package edu.fje.daw2.joccartes;

import java.util.ArrayList;

// This three classes are for adding the generated card to the player.
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

@WebService(serviceName = "WebServiceDAW2")
public class WebServiceDAW2 {
    @WebMethod(operationName = "afegirDispositiu")
    public String iniciarJoc(@WebParam(name = "IPv6") String Inet6Address, @WebParam(name = "nom") String nom, @WebParam(actiu = "actiu") Boolean actiu) {
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
}