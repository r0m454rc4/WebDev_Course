package edu.fje.daw2;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class IndexController {
    @GetMapping("/salutacio")
    public String salutar(
            @RequestParam(defaultValue = "sergi", required = false) String nom,
            Model model) {
        model.addAttribute("usuari", nom);
        return "prova";
    }
    @GetMapping("/operacions")
    public String operar(
            @RequestParam(defaultValue = "0", required = false) int n1,
            @RequestParam(defaultValue = "0", required = false) int n2,
            Model model) {
        Resultats op = new Resultats(n1, n2);
        model.addAttribute("res", op);
        return "resultatOperacions";
    }

    @GetMapping("/suma")
    public String sumar(
            @RequestParam(defaultValue = "0", required = false) int n1,
            @RequestParam(defaultValue = "0", required = false) int n2,
            Model model) {
        int resultat = n1+n2;
        model.addAttribute("res", resultat);
        return "resultat";
    }
    @GetMapping("/resta")
    public String restar(
            @RequestParam(defaultValue = "0", required = false) int n1,
            @RequestParam(defaultValue = "0", required = false) int n2,
            Model model) {
        int resultat = n1-n2;
        model.addAttribute("res", resultat);
        return "resultat";
    }
}
