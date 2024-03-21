package edu.fje.daw2.springproject;

import java.util.ArrayList;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class AlumneController {
  ArrayList<Alumne> alumnes = new ArrayList<>();

  @GetMapping("/afegirAlumne")
  public String dividir(
      @RequestParam(required = true) String nom,
      @RequestParam(required = true) String cognom,
      @RequestParam(defaultValue = "0", required = true) Double nota,
      Model model) {
    if (nota < 0 || nota >= 10) {
      return "Error en el sistema.";
    }
    Alumne al = new Alumne(nom, cognom, nota);
    model.addAttribute("al", al);
    
    return "al";
  }
}
