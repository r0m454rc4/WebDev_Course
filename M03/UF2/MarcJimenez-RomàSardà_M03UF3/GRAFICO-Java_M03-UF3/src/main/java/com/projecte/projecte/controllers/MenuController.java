package com.projecte.projecte.controllers;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;

import java.io.IOException;

public class MenuController {

    @FXML
    private VBox vbox;

    @FXML
    protected void onInsertNewUserClick() {
        try {
            // Load the insert user view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/insercion/insertar-usuario.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage from vbox and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void onInsertNewSpaceClick() {
        try {
            // Load the insert user view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/insercion/insertar-espacio.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage from vbox and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void onInsertNewRoomClick() {
        try {
            // Load the insert room view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/insercion/insertar-habitacion.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage from vbox and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void onInsertNewSanitarioClick() {
        try {
            // Load the insert room view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/insercion/insertar-sanitario.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage from vbox and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void onInsertNewTrabajadorEspacioClick() {
        try {
            // Load the insert room view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/insercion/insertar-trabajador.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage from vbox and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void onReadUsersClick() {
        try {
            // Load the insert room view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/lectura/lectura-usuarios.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage from vbox and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void onReadEspaciosClick() {
        try {
            // Load the insert room view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/lectura/lectura-espacios.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage from vbox and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void onReadTrabajadoresEspaciosClick() {
        try {
            // Load the insert room view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/lectura/lectura-trabajadores.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage from vbox and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void onReadPersonalSanitarioClick() {
        try {
            // Load the insert room view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/lectura/lectura-sanitarios.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage from vbox and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void onReadHabitacionesClick() {
        try {
            // Load the insert room view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/lectura/lectura-habitaciones.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage from vbox and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void onLogoutButtonClick() {
        try {
            // Load the login view
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/login.fxml"));
            Parent root = loader.load();
            Scene scene = new Scene(root);

            // Get the current stage and set the new scene
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setFullScreen(true);
        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }
}