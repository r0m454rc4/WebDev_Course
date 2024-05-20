package edu.fje.daw2.repositoris;

import edu.fje.daw2.model.Moneda;
import org.springframework.data.mongodb.repository.MongoRepository;
import java.util.List;

public interface MonedaRepositori extends MongoRepository<Moneda, String> {
    Moneda findByDescripcio(String descripcio);

    List<Moneda> findByCodi(String codi);

    List<Moneda> findByCotitzacio(double cotitzacio);
}