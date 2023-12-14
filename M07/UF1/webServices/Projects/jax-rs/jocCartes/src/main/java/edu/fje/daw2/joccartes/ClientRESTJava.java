package edu.fje.daw2.joccartes;

import okhttp3.*;

import java.io.IOException;
import java.util.Scanner;

public class ClientRESTJava {
    public static void main(String[] args) {
        String red = "\033[0;31m";
        String green = "\033[0;32m";
        String yellow = "\033[0;33m";
        String reset = "\033[0m";

        Scanner entrada = new Scanner(System.in);
        boolean finalitzar = false;
        int codiPartida, numJug, cartaTirada, quantitatApostada;

        OkHttpClient client = new OkHttpClient().newBuilder().build();
        Request peticio;
        Response resposta;

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

                    MediaType mediaType = MediaType.parse("application/x-www-form-urlencoded");
                    RequestBody cos = RequestBody.create("codiPartida=" + codiPartida, mediaType);

                    peticio = new Request.Builder()
                            .url("http://localhost:8888/jocCartes_war_exploded/api/iniciarJoc")
                            .method("POST", cos)
                            .addHeader("Content-Type", "application/x-www-form-urlencoded")
                            .build();
                    try {
                        resposta = client.newCall(peticio).execute();
                        System.out.println(green + resposta.body().string() + reset);
                    } catch (IOException e) {
                        e.printStackTrace();
                    }
                    break;
                case 2:
                    peticio = new Request.Builder()
                            .url("http://localhost:8888/jocCartes_war_exploded/api/obtenirCarta/1/1")
                            .method("GET", null)
                            .build();
                    try {
                        resposta = client.newCall(peticio).execute();
                        System.out.println(green + resposta.body().string() + reset);
                    } catch (IOException e) {
                        e.printStackTrace();
                    }
                    break;
                case 3:
                    peticio = new Request.Builder()
                            .url("http://localhost:8888/jocCartes_war_exploded/api/mostrarCartes/1/1")
                            .method("GET", null)
                            .build();
                    try {
                        resposta = client.newCall(peticio).execute();
                        System.out.println(green + resposta.body().string() + reset);
                    } catch (IOException e) {
                        e.printStackTrace();
                    }
                    break;
                case 4:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();
                    System.out.println("Codi del jugador:");
                    numJug = entrada.nextInt();
                    System.out.println("Número de carta a tirar:");
                    cartaTirada = entrada.nextInt();

                    MediaType mediaType4 = MediaType.parse("application/x-www-form-urlencoded");
                    RequestBody cos4 = RequestBody.create(
                            "codiPartida=" + codiPartida + "&numJug=" + numJug + "&carta=" + cartaTirada, mediaType4);
                    peticio = new Request.Builder()
                            .url("http://localhost:8888/jocCartes_war_exploded/api/tirarCarta")
                            .method("PUT", cos4)
                            .addHeader("Content-Type", "application/x-www-form-urlencoded")
                            .build();
                    try {
                        resposta = client.newCall(peticio).execute();
                        System.out.println(green + resposta.body().string() + reset);
                    } catch (IOException e) {
                        e.printStackTrace();
                    }
                    break;
                case 5:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();
                    System.out.println("Codi del jugador:");
                    numJug = entrada.nextInt();
                    System.out.println("Quantitat a apostar:");
                    quantitatApostada = entrada.nextInt();

                    MediaType mediaType5 = MediaType.parse("application/x-www-form-urlencoded");
                    RequestBody cos5 = RequestBody.create(
                            "codiPartida=" + codiPartida + "&numJug=" + numJug + "&quantitatApostada="
                                    + quantitatApostada,
                            mediaType5);
                    peticio = new Request.Builder()
                            .url("http://localhost:8888/jocCartes_war_exploded/api/moureJugador/aposta")
                            .method("PUT", cos5)
                            .addHeader("Content-Type", "application/x-www-form-urlencoded")
                            .build();
                    try {
                        resposta = client.newCall(peticio).execute();
                        System.out.println(green + resposta.body().string() + reset);
                    } catch (IOException e) {
                        e.printStackTrace();
                    }
                    break;
                case 6:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();
                    System.out.println("Codi del jugador:");
                    numJug = entrada.nextInt();

                    MediaType mediaType6 = MediaType.parse("application/x-www-form-urlencoded");
                    RequestBody cos6 = RequestBody.create("codiPartida=" + codiPartida + "&numJug=" + numJug,
                            mediaType6);
                    peticio = new Request.Builder()
                            .url("http://localhost:8888/jocCartes_war_exploded/api/moureJugador/passa")
                            .method("PUT", cos6)
                            .addHeader("Content-Type", "application/x-www-form-urlencoded")
                            .build();
                    try {
                        resposta = client.newCall(peticio).execute();
                        System.out.println(green + resposta.body().string() + reset);
                    } catch (IOException e) {
                        e.printStackTrace();
                    }
                    break;
                case 7:
                    System.out.println("Codi de la partida:");
                    codiPartida = entrada.nextInt();

                    MediaType mediaType7 = MediaType.parse("application/x-www-form-urlencoded");
                    RequestBody cos7 = RequestBody.create("codiPartida=" + codiPartida, mediaType7);
                    peticio = new Request.Builder()
                            .url("http://localhost:8888/jocCartes_war_exploded/api/acabarJoc")
                            .method("DELETE", cos7)
                            .addHeader("Content-Type", "application/x-www-form-urlencoded")
                            .build();
                    try {
                        resposta = client.newCall(peticio).execute();
                        System.out.println(green + resposta.body().string() + reset);
                    } catch (IOException e) {
                        e.printStackTrace();
                    }

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
}