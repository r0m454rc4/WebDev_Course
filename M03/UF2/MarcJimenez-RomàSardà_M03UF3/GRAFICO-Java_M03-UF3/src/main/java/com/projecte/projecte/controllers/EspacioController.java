package com.projecte.projecte.controllers;

import com.projecte.projecte.models.Espacio;
import com.projecte.projecte.models.Session;
import com.projecte.projecte.models.TrabajadorEspacio;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import services.DataBaseService;

import java.io.IOException;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Arrays;
import java.util.List;

import javafx.scene.control.Alert.AlertType;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.scene.control.cell.PropertyValueFactory;

import javafx.util.Callback;
import javafx.scene.layout.HBox;

public class EspacioController {

    @FXML
    private VBox vbox;

    @FXML
    private TextField propietarioField;
    @FXML
    private TextField direccionEdificioField;
    @FXML
    private TextField fechaPrestamoInicialField;
    @FXML
    private TextField fechaPrestamoFinalField;
    @FXML
    private TextField numPlantasField;
    @FXML
    private TextField numMetrosCuadradosField;
    @FXML
    private TextField cantidadHabitacionesField;
    @FXML
    private CheckBox comedorField;

    @FXML
    private TableView<Espacio> espacioTable;

    @FXML
    private TableColumn<Espacio, Void> accionesColumn;


    @FXML
    private TableColumn<Espacio, String> propietarioColumn;

    @FXML
    private TableColumn<Espacio, String> direccionColumn;

    @FXML
    private TableColumn<Espacio, String> fechaPrestamoInicialColumn;

    @FXML
    private TableColumn<Espacio, String> fechaPrestamoFinalColumn;

    @FXML
    private TableColumn<Espacio, Integer> numeroPlantasColumn;

    @FXML
    private TableColumn<Espacio, Integer> numeroMetrosCuadradosColumn;

    @FXML
    private TableColumn<Espacio, Integer> cantidadHabitacionesColumn;

    @FXML
    private TableColumn<Espacio, Boolean> comedorColumn;

    private DataBaseService dataBaseService;

    public EspacioController() {
        this.dataBaseService = new DataBaseService();
    }

    @FXML
    public void initialize() {
        propietarioColumn.setCellValueFactory(new PropertyValueFactory<>("propietario"));
        direccionColumn.setCellValueFactory(new PropertyValueFactory<>("direccion"));
        fechaPrestamoInicialColumn.setCellValueFactory(new PropertyValueFactory<>("fecha_prestamo_inicial"));
        fechaPrestamoFinalColumn.setCellValueFactory(new PropertyValueFactory<>("fecha_prestamo_final"));
        numeroPlantasColumn.setCellValueFactory(new PropertyValueFactory<>("num_plantas"));
        numeroMetrosCuadradosColumn.setCellValueFactory(new PropertyValueFactory<>("num_metros_cuadrados"));
        cantidadHabitacionesColumn.setCellValueFactory(new PropertyValueFactory<>("cantidad_habitaciones"));
        comedorColumn.setCellValueFactory(new PropertyValueFactory<>("comedor"));

        addButtonToTable();
    }

    private void addButtonToTable() {
        Callback<TableColumn<Espacio, Void>, TableCell<Espacio, Void>> cellFactory = new Callback<>() {
            @Override
            public TableCell<Espacio, Void> call(final TableColumn<Espacio, Void> param) {
                final TableCell<Espacio, Void> cell = new TableCell<>() {

                    private final Button btnEdit = new Button("Modificar");
                    private final Button btnDelete = new Button("Eliminar");

                    {
                        btnEdit.setOnAction((event) -> {
                            Espacio data = getTableView().getItems().get(getIndex());
                            // Implementar lógica de modificación aquí
                            System.out.println("Modificar: " + data);
                        });
                        btnDelete.setOnAction((event) -> {
                            Espacio data = getTableView().getItems().get(getIndex());
                            eliminarEspacio(data.getPropietario());
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

    private void eliminarEspacio(String propietario) {
        dataBaseService.deleteData("Espacios", "propietario", propietario);
    }

    // Mostrar espacios en la vista:
    @FXML
    protected void mostrarEspacios() {
        try {
            List<String> columns = Arrays.asList("propietario", "direccion", "fecha_prestamo_inicial", "fecha_prestamo_final", "num_plantas", "num_metros_cuadrados", "cantidad_habitaciones", "comedor");
            ResultSet resultSet = dataBaseService.selectData("Espacios", columns);

            // Create an ObservableList to store the data
            ObservableList<Espacio> espacios = FXCollections.observableArrayList();

            // Iterate over the ResultSet
            while (resultSet.next()) {
                Espacio espacio = new Espacio();
                espacio.setPropietario(resultSet.getString("propietario"));
                espacio.setDireccion(resultSet.getString("direccion"));
                espacio.setFecha_prestamo_inicial(resultSet.getString("fecha_prestamo_inicial"));
                espacio.setFecha_prestamo_final(resultSet.getString("fecha_prestamo_final"));
                espacio.setNum_plantas(resultSet.getInt("num_plantas"));
                espacio.setNum_metros_cuadrados(resultSet.getInt("num_metros_cuadrados"));
                espacio.setCantidad_habitaciones(resultSet.getInt("cantidad_habitaciones"));
                espacio.setComedor(resultSet.getBoolean("comedor"));

                espacios.add(espacio);
            }

            // Set cell value factories
            propietarioColumn.setCellValueFactory(new PropertyValueFactory<>("propietario"));
            direccionColumn.setCellValueFactory(new PropertyValueFactory<>("direccion"));
            fechaPrestamoInicialColumn.setCellValueFactory(new PropertyValueFactory<>("fecha_prestamo_inicial"));
            fechaPrestamoFinalColumn.setCellValueFactory(new PropertyValueFactory<>("fecha_prestamo_final"));
            numeroPlantasColumn.setCellValueFactory(new PropertyValueFactory<>("num_plantas"));
            numeroMetrosCuadradosColumn.setCellValueFactory(new PropertyValueFactory<>("num_metros_cuadrados"));
            cantidadHabitacionesColumn.setCellValueFactory(new PropertyValueFactory<>("cantidad_habitaciones"));
            comedorColumn.setCellValueFactory(new PropertyValueFactory<>("comedor"));

            // Add the data to the TableView
            espacioTable.setItems(espacios);
        } catch (SQLException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }



    @FXML
    protected void insertarEspacio() {
        try {
            // Obtener los valores de los campos del formulario
            String propietario = propietarioField.getText();
            String direccionEdificio = direccionEdificioField.getText();
            String fechaPrestamoInicial = fechaPrestamoInicialField.getText();
            String fechaPrestamoFinal = fechaPrestamoFinalField.getText();
            int numPlantas = Integer.parseInt(numPlantasField.getText());
            int numMetrosCuadrados = Integer.parseInt(numMetrosCuadradosField.getText());
            int cantidadHabitaciones = Integer.parseInt(cantidadHabitacionesField.getText());
            boolean comedor = comedorField.isSelected();

            int comedorInt = comedor ? 1 : 0;

            // Crear una lista de columnas y valores para la inserción
            List<String> columns = Arrays.asList("propietario", "direccion", "fecha_prestamo_inicial", "fecha_prestamo_final", "num_plantas", "num_metros_cuadrados", "cantidad_habitaciones", "comedor");
            List<String> values = Arrays.asList(propietario, direccionEdificio, fechaPrestamoInicial, fechaPrestamoFinal, String.valueOf(numPlantas), String.valueOf(numMetrosCuadrados), String.valueOf(cantidadHabitaciones), String.valueOf(comedorInt));

            // Insertar datos en la base de datos
            dataBaseService.insertData("Espacios", columns, values);

            // Mostrar un mensaje de éxito
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Éxito");
            alert.setHeaderText(null);
            alert.setContentText("Espacio insertado correctamente.");
            alert.showAndWait();

            // Actualizar la tabla mostrando los nuevos datos
            mostrarEspacios();

            // Limpiar los campos del formulario después de la inserción
            limpiarCampos();
        } catch (Exception e) {
            // Mostrar un mensaje de error
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Error");
            alert.setHeaderText(null);
            alert.setContentText("Ha ocurrido un error al insertar el trabajador: " + e.getMessage());
            alert.showAndWait();
        }
    }

    private void limpiarCampos() {
        propietarioField.clear();
        direccionEdificioField.clear();
        fechaPrestamoInicialField.clear();
        fechaPrestamoFinalField.clear();
        numPlantasField.clear();
        numMetrosCuadradosField.clear();
        cantidadHabitacionesField.clear();
        comedorField.setSelected(false);
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