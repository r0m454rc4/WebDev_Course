package com.projecte.projecte.controllers;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import services.DataBaseService;

import java.io.IOException;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Arrays;
import java.util.List;

public class LoginController {

    @FXML
    private TextField usernameField;

    @FXML
    private PasswordField passwordField;

    private DataBaseService dataBaseService;

    public LoginController() {
        this.dataBaseService = new DataBaseService();
    }

    @FXML
    protected void onSubmitButtonClick() {
        String username = usernameField.getText();
        String password = passwordField.getText();

        try {
            List<String> columns = Arrays.asList("nombre", "contraseña", "rol");
            ResultSet resultSet = dataBaseService.selectData("Usuarios", columns);

            while (resultSet.next()) {
                if (resultSet.getString("nombre").equals(username) && resultSet.getString("contraseña").equals(password)) {
                    System.out.println("Inicio de sesión exitoso");

                    // Redirige a la nueva vista dependiendo del rol
                    String rol = resultSet.getString("rol");
                    String fxmlFile;
                    if ("administrador".equals(rol)) {
                        fxmlFile = "/com/projecte/projecte/menu-administrador.fxml";
                    } else if ("encargado".equals(rol)) {
                        fxmlFile = "/com/projecte/projecte/menu-encargado.fxml";
                    } else {
                        throw new IllegalArgumentException("Rol desconocido: " + rol);
                    }

                    // Cargar la vista de usuario y pasar el rol
                    FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlFile));
                    Parent root = loader.load();

                    // Obtener el controlador de la nueva vista
                    UsuarioController usuarioController = loader.getController();
                    usuarioController.setCurrentUserRole(rol);

                    Scene scene = new Scene(root);
                    Stage stage = (Stage) usernameField.getScene().getWindow();
                    stage.setScene(scene);
                    stage.setMaximized(true);
                    break;
                }
            }
        } catch (SQLException | IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }
}
