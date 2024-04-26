package edu.fje.daw2.controladors;
import edu.fje.daw2.model.Client;
import edu.fje.daw2.serveis.ClientService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

/**
 * Controlador de clients
 * Verifica el funcionament de curl
 * @author sergi.grau@fje.edu
 * @version 1.0 21.3.19
 * @version 2.0 25.3.24
 */
@Controller
@SessionAttributes("clients")
public class ClientsController {
    @Autowired
    private ClientService cs;

    @GetMapping("/llistarClients")
    public String llistarUsuaris(Model model) {
        model.addAttribute("clients", cs.trobarTots());
        return "llistarClients";
    }

    @GetMapping("/nombreClients")
    public Long comptarClients() {
        return cs.comptar();
    }

    @PostMapping("/esborrarClient")
    public String esborrarClient(
            @RequestParam String id,
            Model model) {

        Long idClient= Long.parseLong(id);
        cs.modificarPerId(idClient);
        model.addAttribute("clients", cs.trobarTots());
        return "llistarClients";
    }

    @PostMapping("/afegirClient")
    public String afegirClient(
            @RequestParam String nom,
            @RequestParam String cognom,
            @RequestParam int volum,

            Model model) {
        cs.afegirClient(nom, cognom, volum);
        model.addAttribute("clients", cs.trobarTots());
        return "llistarClients";
    }
    @PostMapping("/modificarClient")
    public String modificarClient(
            @RequestParam String id,
            @RequestParam String nom,
            @RequestParam String cognom,
            @RequestParam int volum,
            Model model) {

        Long idUsuari = Long.parseLong(id);
        Client client = cs.trobarPerId(idUsuari);
        client.setNom(nom);
        client.setCognom(cognom);
        client.setVolumCompres(volum);
        cs.afegirClient(client);
        model.addAttribute("clients", cs.trobarTots());
        return "llistarClients";
    }
}
