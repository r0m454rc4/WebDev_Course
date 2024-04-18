package edu.fje.daw2.repositoris;

import edu.fje.daw2.model.Client;
import org.springframework.data.mongodb.repository.MongoRepository;
import java.util.List;

/**
 * Interficie de persistència amb Spring Data i MongoDB.
 * @author sergi.grau@fje.edu
 * @version  1.0 4.4.2019
 */

public interface ClientRepositori extends MongoRepository<Client, String> {

    Client findByNom(String nom);
    List<Client> findByCognom(String cognom);
    List<Client> findByVolumCompres(int volumCompres);

}