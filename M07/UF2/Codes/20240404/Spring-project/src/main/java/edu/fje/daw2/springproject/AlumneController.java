package edu.fje.daw2.springproject;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

import java.util.ArrayList;
import java.util.Iterator;

@Controller
public class AlumneController {

    ArrayList<Alumne> alumnes = new ArrayList<>();

    // To use it, I have to use formulariAlumne.html, which is located at
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
        // Find the student and update their grade
        for (Alumne al : alumnes) {
            if (al.getNom().equals(nom) && al.getCognom().equals(cognom)) {
                al.setNota(nota);
                model.addAttribute("alumne", al);
                model.addAttribute("llistaAlumnes", alumnes);
                return "mostrarAlumnes";
            }
        }
        return "error"; // If student not found
    }

    @GetMapping("/esborrarAlumne")
    public String esborrarAlumne(
            @RequestParam(required = true) String nom,
            @RequestParam(required = true) String cognom,
            Model model) {
        // Find the student and remove them
        Iterator<Alumne> iterator = alumnes.iterator();
        while (iterator.hasNext()) {
            Alumne al = iterator.next();
            if (al.getNom().equals(nom) && al.getCognom().equals(cognom)) {
                iterator.remove();
                model.addAttribute("llistaAlumnes", alumnes);
                return "mostrarAlumnes";
            }
        }
        return "error"; // If student not found
    }

    @GetMapping("/mostrarAlumnes")
    public String mostrarAlumnes(Model model) {
        model.addAttribute("llistaAlumnes", alumnes);
        return "mostrarAlumnes";
    }
}
