package edu.fje.daw2.springproject;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.ArrayList;

@Controller
public class AlumneController {

    ArrayList<Alumne> alumnes = new ArrayList<>();

    // To use it, I have te use formulariAlumne.html, which is located at
    // resources/static.
    @GetMapping("/afegirAlumne")
    public String afegirAlumne(
            @RequestParam(required = true) String nom,
            @RequestParam(required = true) String cognom,
            @RequestParam(defaultValue = "0", required = false) int nota,
            Model model) {
        // The mark must be in this interval..
        if (nota < 0 || nota > 10) {
            return "error";
        }
        Alumne al = new Alumne(nom, cognom, nota);
        System.out.println(al);
        alumnes.add(al);
        model.addAttribute("alumne", al);
        model.addAttribute("llistaAlumnes", alumnes);

        return "mostrarAlumnes";
    }

    @GetMapping("/modificarAlumne")
    public String modificarAlumne(
            @RequestParam(required = true) String nom,
            @RequestParam(required = true) String cognom,
            @RequestParam(defaultValue = "0", required = false) int nota,
            Model model) {
        // The mark must be in this interval..
        if (nota < 0 || nota > 10) {
            return "error";
        }
        Alumne al = new Alumne(nom, cognom, nota);
        System.out.println(al);
        alumnes.add(al);
        model.addAttribute("alumne", al);
        model.addAttribute("llistaAlumnes", alumnes);

        return "mostrarAlumnes";
    }

    @GetMapping("/esborrarAlumne")
    public String esborrarAlumne(
            @RequestParam(required = true) String nom,
            @RequestParam(required = true) String cognom,
            @RequestParam(defaultValue = "0", required = false) int nota,
            Model model) {
        // The mark must be in this interval..
        if (nota < 0 || nota > 10) {
            return "error";
        }
        Alumne al = new Alumne(nom, cognom, nota);
        System.out.println(al);
        alumnes.add(al);
        model.addAttribute("alumne", al);
        model.addAttribute("llistaAlumnes", alumnes);

        return "mostrarAlumnes";
    }

    @GetMapping("/mostrarAlumnes")
    public String mostrarAlumnes(
            Model model) {
        model.addAttribute("llistaAlumnes", alumnes);

        return "mostrarAlumnes";
    }
}
