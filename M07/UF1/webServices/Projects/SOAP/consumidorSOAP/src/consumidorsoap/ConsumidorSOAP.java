/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package consumidorsoap;

import java.util.Scanner;

/**
 *
 * @author r0m454rc4
 */
public class ConsumidorSOAP {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        String red = "\033[0;31m";
        String green = "\033[0;32m";
        String yellow = "\033[0;33m";
        String reset = "\033[0m";

        Scanner entrada = new Scanner(System.in);
        boolean finalitzar = false;
        int codiPartida, numJug, cartaTirada, quantitatApostada;

        while (!finalitzar) {
            System.out.println(red + "MENU" + reset);
            System.out.println(green + "1. Iniciar joc" + reset);
            System.out.println(green + "2. Obtenir carta" + reset);
            System.out.println(green + "3. Mostrar cartes" + reset);
            System.out.println(green + "4. Tirar carta" + reset);
            System.out.println(green + "5. Apostar fitxes" + reset);
            System.out.println(green + "6. Passar" + reset);
            System.out.println(green + "7. Acabar joc" + reset);
            System.out.print(yellow + "Tria opció: " + reset);

            int opcio = entrada.nextInt();

            switch (opcio) {
                case 1:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();

                    System.out.println(iniciarJoc(codiPartida));
                    break;
                case 2:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();
                    System.out.println("Codi del jugador:");
                    numJug = entrada.nextInt();

                    System.out.println(obtenirCarta(codiPartida, numJug));
                    break;
                case 3:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();
                    System.out.println("Codi del jugador:");
                    numJug = entrada.nextInt();

                    System.out.println(mostrarCartesCodiPartidaNumJug(codiPartida, numJug));
                    break;
                case 4:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();
                    System.out.println("Codi del jugador:");
                    numJug = entrada.nextInt();
                    System.out.println("Número de carta a tirar:");
                    cartaTirada = entrada.nextInt();

                    System.out.println(tirarCarta(codiPartida, numJug, cartaTirada));
                    break;
                case 5:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();
                    System.out.println("Codi del jugador:");
                    numJug = entrada.nextInt();
                    System.out.println("Quantitat a apostar:");
                    quantitatApostada = entrada.nextInt();

                    System.out.println(moureJugadorAposta(codiPartida, numJug, quantitatApostada));
                    break;
                case 6:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();
                    System.out.println("Codi del jugador:");
                    numJug = entrada.nextInt();

                    System.out.println(moureJugadorPassa(codiPartida, numJug));
                    break;
                case 7:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();

                    System.out.println(acabarJoc(codiPartida));
                    finalitzar = true;
                    break;
                default:
                    System.out.println(red + "Opció incorrecta" + reset);
                    break;
            }
        }

        entrada.close();
        System.out.println(red + "Tancant el programa..." + reset);
    }

    private static String iniciarJoc(java.lang.Integer codiPartida) {
        edu.fje.daw2.joccartes.WebServiceDAW2_Service service = new edu.fje.daw2.joccartes.WebServiceDAW2_Service();
        edu.fje.daw2.joccartes.WebServiceDAW2 port = service.getWebServiceDAW2Port();
        return port.iniciarJoc(codiPartida);
    }

    private static String obtenirCarta(java.lang.Integer codiPartida, java.lang.Integer numJug) {
        edu.fje.daw2.joccartes.WebServiceDAW2_Service service = new edu.fje.daw2.joccartes.WebServiceDAW2_Service();
        edu.fje.daw2.joccartes.WebServiceDAW2 port = service.getWebServiceDAW2Port();
        return port.obtenirCarta(codiPartida, numJug);
    }

    private static String mostrarCartesCodiPartidaNumJug(java.lang.Integer codiPartida, java.lang.Integer numJug) {
        edu.fje.daw2.joccartes.WebServiceDAW2_Service service = new edu.fje.daw2.joccartes.WebServiceDAW2_Service();
        edu.fje.daw2.joccartes.WebServiceDAW2 port = service.getWebServiceDAW2Port();
        return port.mostrarCartesCodiPartidaNumJug(codiPartida, numJug);
    }

    private static String tirarCarta(java.lang.Integer codiPartida, java.lang.Integer numJug, java.lang.Integer carta) {
        edu.fje.daw2.joccartes.WebServiceDAW2_Service service = new edu.fje.daw2.joccartes.WebServiceDAW2_Service();
        edu.fje.daw2.joccartes.WebServiceDAW2 port = service.getWebServiceDAW2Port();
        return port.tirarCarta(codiPartida, numJug, carta);
    }

    private static String moureJugadorAposta(java.lang.Integer codiPartida, java.lang.Integer numJug,
            java.lang.Integer quantitatApostada) {
        edu.fje.daw2.joccartes.WebServiceDAW2_Service service = new edu.fje.daw2.joccartes.WebServiceDAW2_Service();
        edu.fje.daw2.joccartes.WebServiceDAW2 port = service.getWebServiceDAW2Port();
        return port.moureJugadorAposta(codiPartida, numJug, quantitatApostada);
    }

    private static String moureJugadorPassa(java.lang.Integer codiPartida, java.lang.Integer numJug) {
        edu.fje.daw2.joccartes.WebServiceDAW2_Service service = new edu.fje.daw2.joccartes.WebServiceDAW2_Service();
        edu.fje.daw2.joccartes.WebServiceDAW2 port = service.getWebServiceDAW2Port();
        return port.moureJugadorPassa(codiPartida, numJug);
    }

    private static String acabarJoc(java.lang.Integer codiPartida) {
        edu.fje.daw2.joccartes.WebServiceDAW2_Service service = new edu.fje.daw2.joccartes.WebServiceDAW2_Service();
        edu.fje.daw2.joccartes.WebServiceDAW2 port = service.getWebServiceDAW2Port();
        return port.acabarJoc(codiPartida);
    }
}
