package edu.fje.daw2;

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

        OkHttpClient client = new OkHttpClient().newBuilder().build();
        Request peticio;
        Response resposta;

        while (!finalitzar) {
            System.out.println(red + "MENU" + reset);
            System.out.println(green + "1. Crear partida" + reset);
            System.out.println(green + "2. RecuperarEstat" + reset);
            System.out.println(green + "3. Sortir" + reset);
            System.out.print(yellow + "Tria opció: " + reset);

            int choice = entrada.nextInt();

            switch (choice) {
                case 1:
                    MediaType mediaType = MediaType.parse("text/plain");
                    RequestBody cos = RequestBody.create(mediaType, "");
                    peticio = new Request.Builder()
                            .url("http://localhost:8080/joc_war_exploded/api/crearPartida")
                            .method("POST", cos)
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
                            .url("http://localhost:8080/joc_war_exploded/api/recuperarEstat/1")
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