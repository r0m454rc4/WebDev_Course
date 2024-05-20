package com.projecte.projecte.controllers;

import com.projecte.projecte.models.Habitacion;
import com.projecte.projecte.models.Session;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import services.DataBaseService;

import javafx.scene.control.Alert.AlertType;

import java.io.IOException;
import java.util.Arrays;

import java.util.List;
import java.sql.ResultSet;
import java.sql.SQLException;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.scene.control.cell.PropertyValueFactory;

import javafx.util.Callback;
import javafx.scene.layout.HBox;

public class HabitacionController {

    @FXML
    private VBox vbox;

    @FXML
    private TextField numeroHabitacionField;
    @FXML
    private TextField direccionField;
    @FXML
    private TextField numMetrosCuadradosField;
    @FXML
    private TextField cantidadCamasField;
    @FXML
    private TextField idEspacioField;

    @FXML
    private TableView<Habitacion> habitacionTable;

    @FXML
    private TableColumn<Habitacion, String> numeroHabitacionColumn;

    @FXML
    private TableColumn<Habitacion, String> direccionColumn;

    @FXML
    private TableColumn<Habitacion, Void> accionesColumn;

    @FXML
    private TableColumn<Habitacion, Float> numMetrosCuadradosColumn;

    @FXML
    private TableColumn<Habitacion, Integer> cantidadCamasColumn;

    @FXML
    private TableColumn<Habitacion, Integer> idEspacioColumn;

    private DataBaseService dataBaseService;

    public HabitacionController() {
        this.dataBaseService = new DataBaseService();
    }

    @FXML
    public void initialize() {
        numeroHabitacionColumn.setCellValueFactory(new PropertyValueFactory<>("numero_habitacion"));
        direccionColumn.setCellValueFactory(new PropertyValueFactory<>("direccion"));
        numMetrosCuadradosColumn.setCellValueFactory(new PropertyValueFactory<>("num_metros_cuadrados"));
        cantidadCamasColumn.setCellValueFactory(new PropertyValueFactory<>("cantidad_camas"));
        idEspacioColumn.setCellValueFactory(new PropertyValueFactory<>("idEspacio"));

        addButtonToTable();
    }

    private void addButtonToTable() {
        Callback<TableColumn<Habitacion, Void>, TableCell<Habitacion, Void>> cellFactory = new Callback<>() {
            @Override
            public TableCell<Habitacion, Void> call(final TableColumn<Habitacion, Void> param) {
                final TableCell<Habitacion, Void> cell = new TableCell<>() {

                    private final Button btnEdit = new Button("Modificar");
                    private final Button btnDelete = new Button("Eliminar");

                    {
                        btnEdit.setOnAction((event) -> {
                            Habitacion data = getTableView().getItems().get(getIndex());
                            // Implementar lógica de modificación aquí
                            System.out.println("Modificar: " + data);
                        });
                        btnDelete.setOnAction((event) -> {
                            Habitacion data = getTableView().getItems().get(getIndex());
                            eliminarHabitacion(data.getNumero_habitacion());
                            getTableView().getItems().remove(data);
                        });
                    }

                    private final HBox pane = new HBox(btnEdit, btnDelete);

                    @Override
                    public void updateItem(Void item, boolean empty) {
                        super.updateItem(item, empty);
                        if (empty) {
                            setGraphic(null);
                        } else {
                            setGraphic(pane);
                        }
                    }
                };
                return cell;
            }
        };

        accionesColumn.setCellFactory(cellFactory);
    }

    private void eliminarHabitacion(String numHabitacion) {
        dataBaseService.deleteData("Habitaciones", "numero_habitacion", numHabitacion);
    }

    @FXML
    protected void mostrarHabitaciones() {
        try {
            List<String> columns = Arrays.asList("numero_habitacion", "direccion", "num_metros_cuadrados", "cantidad_camas", "idEspacio");
            ResultSet resultSet = dataBaseService.selectData("Habitaciones", columns);

            // Create an ObservableList to store the data
            ObservableList<Habitacion> habitaciones = FXCollections.observableArrayList();

            // Iterate over the ResultSet
            while (resultSet.next()) {
                Habitacion habitacion = new Habitacion();
                habitacion.setNumero_habitacion(resultSet.getString("numero_habitacion"));
                habitacion.setDireccion(resultSet.getString("direccion"));
                habitacion.setNum_metros_cuadrados(resultSet.getFloat("num_metros_cuadrados"));
                habitacion.setCantidad_camas(resultSet.getInt("cantidad_camas"));
                habitacion.setIdEspacio(resultSet.getInt("idEspacio"));

                habitaciones.add(habitacion);
            }

            // Set cell value factories
            numeroHabitacionColumn.setCellValueFactory(new PropertyValueFactory<Habitacion, String>("numero_habitacion"));
            direccionColumn.setCellValueFactory(new PropertyValueFactory<Habitacion, String>("direccion"));
            numMetrosCuadradosColumn.setCellValueFactory(new PropertyValueFactory<Habitacion, Float>("num_metros_cuadrados"));
            cantidadCamasColumn.setCellValueFactory(new PropertyValueFactory<Habitacion, Integer>("cantidad_camas"));
            idEspacioColumn.setCellValueFactory(new PropertyValueFactory<Habitacion, Integer>("idEspacio"));

            // Add the data to the TableView
            habitacionTable.setItems(habitaciones);
        } catch (SQLException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void insertHabitacion() {
        String numeroHabitacion = numeroHabitacionField.getText();
        String direccion = direccionField.getText();
        Float numMetrosCuadrados = Float.parseFloat(numMetrosCuadradosField.getText());
        Integer cantidadCamas = Integer.parseInt(cantidadCamasField.getText());
        Integer idEspacio = Integer.parseInt(idEspacioField.getText());

        // Create a new Habitacion object
        Habitacion nuevaHabitacion = new Habitacion(numeroHabitacion, direccion, numMetrosCuadrados, cantidadCamas, idEspacio);

        try {
            // Insert the data
            dataBaseService.insertData("Habitaciones", Arrays.asList("numero_habitacion", "direccion", "num_metros_cuadrados", "cantidad_camas", "idEspacio"), Arrays.asList(nuevaHabitacion.getNumero_habitacion(), nuevaHabitacion.getDireccion(), String.valueOf(nuevaHabitacion.getNum_metros_cuadrados()), String.valueOf(nuevaHabitacion.getCantidad_camas()), String.valueOf(nuevaHabitacion.getIdEspacio())));

            // Show a success message
            Alert alert = new Alert(AlertType.INFORMATION);
            alert.setTitle("Éxito");
            alert.setHeaderText(null);
            alert.setContentText("Habitación insertada correctamente.");
            alert.showAndWait();
        } catch (Exception e) {
            // Show an error message
            Alert alert = new Alert(AlertType.ERROR);
            alert.setTitle("Error");
            alert.setHeaderText(null);
            alert.setContentText("Ha ocurrido un error al insertar la habitación: " + e.getMessage());
            alert.showAndWait();
        }
    }

    @FXML
    protected void onReturnMenuClick() {
        try {
            Session session = Session.getInstance();
            String rol = session.getRol();

            FXMLLoader loader;
            if("administrador".equals(rol)) {
                loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/menu-administrador.fxml"));
            } else if("encargado".equals(rol)) {
                loader = new FXMLLoader(getClass().getResource("/com/projecte/projecte/menu-encargado.fxml"));
            } else {
                throw new IllegalArgumentException("Rol desconocido: " + rol);
            }

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

}