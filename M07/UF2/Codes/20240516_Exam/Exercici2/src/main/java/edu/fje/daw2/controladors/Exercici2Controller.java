package edu.fje.daw2.controladors;

import edu.fje.daw2.model.Moneda;
import edu.fje.daw2.repositoris.MonedaRepositori;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@Controller
@SessionAttributes("appCanvi")
public class Exercici2Controller {

    @Autowired
    private MonedaRepositori repositori;

    @RequestMapping(value = { "/consultaMoneda" })
    String mostrarFormulariModificar() {
        return "consultaMoneda";
    }

    @RequestMapping(value = "/consulta", method = RequestMethod.POST)
    String modificarClient(@SessionAttribute("clients") List<Moneda> monedes,
            @RequestParam(defaultValue = "") String id,
            @RequestParam(defaultValue = "") String descripcio,
            @RequestParam(defaultValue = "") String codi,
            @RequestParam(defaultValue = "") double cotitzacio,
            ModelMap model) {
        Moneda m = repositori.findById(descripcio).orElse(null);

        if (m != null) {
            m.setDescripcio(descripcio);
            m.setCodi(codi);
            m.setCotitzacio(cotitzacio);
            repositori.save(m);
        }

        return "llistarClients";
    }
}
