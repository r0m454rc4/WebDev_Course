package edu.fje.daw2.springproject;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class IndexController {
    int nCorrectes = 0;

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
            @RequestParam(defaultValue = "0", required = false) int resEntrat,
            Model model) {
        int resultat = 5 + 3;

        if (resultat == resEntrat) {
            nCorrectes++;
        }

        // model.addAttribute("res", resultat);
        return "formulariResta";
    }

    @GetMapping("/resta")
    public String restar(
            @RequestParam(defaultValue = "0", required = false) int resEntrat,
            Model model) {
        int resultat = 3 - 2;

        if (resultat == resEntrat) {
            nCorrectes++;
        }

        // model.addAttribute("res", resultat);
        return "formulariProducte";
    }

    @GetMapping("/producte")
    public String multiplicar(
            @RequestParam(defaultValue = "0", required = false) int resEntrat,
            Model model) {
        int resultat = 2 * 3;

        if (resultat == resEntrat) {
            nCorrectes++;
        }

        // model.addAttribute("res", resultat);
        return "formulariDivisio";
    }

    @GetMapping("/divisio")
    public String dividir(
            @RequestParam(defaultValue = "0", required = false) int resEntrat,
            Model model) {
        int resultat = 10 / 2;

        if (resultat == resEntrat) {
            nCorrectes++;
        }

        model.addAttribute("totalEncerts", nCorrectes);
        return "resultat";
    }
}
