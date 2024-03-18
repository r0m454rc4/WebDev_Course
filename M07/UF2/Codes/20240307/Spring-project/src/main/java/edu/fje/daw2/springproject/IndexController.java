package edu.fje.daw2.springproject;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class IndexController {
    @GetMapping("/salutacio")
    public String salutar(
            @RequestParam(defaultValue = "William", required = false) String nom,
            Model model) {
        model.addAttribute("usuari", nom);
        return "test";
    }

    // http://localhost:8080/operacions?n1=6&n2=2.
    @GetMapping("/operacions")
    public String operar(
            @RequestParam(defaultValue = "0", required = false) int n1,
            @RequestParam(defaultValue = "0", required = false) int n2,
            Model model) {
        Resultats op = new Resultats(n1, n2);
        model.addAttribute("res", op);
        return "resultatOperacions";
    }

    // To execute it, run http://localhost:8080/formulariSuma.html.
    @GetMapping("/suma")
    public String sumar(
            @RequestParam(defaultValue = "0", required = false) int n1,
            @RequestParam(defaultValue = "0", required = false) int n2,
            Model model) {
        int resultat = n1 + n2;
        model.addAttribute("res", resultat);
        return "resultat";
    }

    @GetMapping("/resta")
    public String restar(
            @RequestParam(defaultValue = "0", required = false) int n1,
            @RequestParam(defaultValue = "0", required = false) int n2,
            Model model) {
        int resultat = n1 - n2;
        model.addAttribute("res", resultat);
        return "resultat";
    }

    @GetMapping("/producte")
    public String multiplicar(
            @RequestParam(defaultValue = "0", required = false) int n1,
            @RequestParam(defaultValue = "0", required = false) int n2,
            Model model) {
        int resultat = n1 * n2;
        model.addAttribute("res", resultat);
        return "resultat";
    }

    @GetMapping("/divisio")
    public String dividir(
            @RequestParam(defaultValue = "0", required = false) int n1,
            @RequestParam(defaultValue = "0", required = false) int n2,
            Model model) {
        int resultat = n1 / n2;
        model.addAttribute("res", resultat);
        return "resultat";
    }
}

