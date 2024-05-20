package com.projecte.projecte.controllers;

import com.projecte.projecte.models.PersonalSanitario;
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

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.control.TableView;

import java.util.List;
import java.sql.ResultSet;
import java.sql.SQLException;

import javafx.util.Callback;
import javafx.scene.layout.HBox;

public class PersonalSanitarioController {

    @FXML
    private VBox vbox;

    @FXML
    private TextField dniField;
    @FXML
    private TextField nombreField;

    @FXML
    private TextField apellidoField;

    @FXML
    private TextField edadField;

    @FXML
    private TextField direccionField;

    @FXML
    private TextField titulacionField;

    @FXML
    private TextField sitio_trabajo;

    @FXML
    private TextField fechaEntradaField;

    @FXML
    private TextField fechaSalidaField;

    @FXML
    private TextField idHabitacionField;

    @FXML
    private TextField idEspacioField;

    @FXML
    private TableView<PersonalSanitario> personalSanitarioTable;

    @FXML
    private TableColumn<PersonalSanitario, Void> accionesColumn;

    @FXML
    private TableColumn<PersonalSanitario, String> dniColumn;

    @FXML
    private TableColumn<PersonalSanitario, String> nombreColumn;

    @FXML
    private TableColumn<PersonalSanitario, String> apellidoColumn;

    @FXML
    private TableColumn<PersonalSanitario, Integer> edadColumn;

    @FXML
    private TableColumn<PersonalSanitario, String> direccionColumn;

    @FXML
    private TableColumn<PersonalSanitario, String> titulacionColumn;

    @FXML
    private TableColumn<PersonalSanitario, String> sitioTrabajoColumn;

    @FXML
    private TableColumn<PersonalSanitario, String> fechaEntradaColumn;

    @FXML
    private TableColumn<PersonalSanitario, String> fechaSalidaColumn;

    @FXML
    private TableColumn<PersonalSanitario, Integer> idHabitacionColumn;

    @FXML
    private TableColumn<PersonalSanitario, Integer> idEspacioColumn;

    private DataBaseService dataBaseService;

    public PersonalSanitarioController() {
        this.dataBaseService = new DataBaseService();
    }

    @FXML
    public void initialize() {
        dniColumn.setCellValueFactory(new PropertyValueFactory<>("dni"));
        nombreColumn.setCellValueFactory(new PropertyValueFactory<>("nombre"));
        apellidoColumn.setCellValueFactory(new PropertyValueFactory<>("apellido"));
        edadColumn.setCellValueFactory(new PropertyValueFactory<>("edad"));
        direccionColumn.setCellValueFactory(new PropertyValueFactory<>("direccion"));
        titulacionColumn.setCellValueFactory(new PropertyValueFactory<>("titulacion"));
        sitioTrabajoColumn.setCellValueFactory(new PropertyValueFactory<>("sitio_trabajo"));
        fechaEntradaColumn.setCellValueFactory(new PropertyValueFactory<>("fecha_entrada"));
        fechaSalidaColumn.setCellValueFactory(new PropertyValueFactory<>("fecha_salida"));
        idHabitacionColumn.setCellValueFactory(new PropertyValueFactory<>("idHabitacion"));
        idEspacioColumn.setCellValueFactory(new PropertyValueFactory<>("idEspacio"));

        addButtonToTable();
    }

    private void addButtonToTable() {
        Callback<TableColumn<PersonalSanitario, Void>, TableCell<PersonalSanitario, Void>> cellFactory = new Callback<>() {
            @Override
            public TableCell<PersonalSanitario, Void> call(final TableColumn<PersonalSanitario, Void> param) {
                final TableCell<PersonalSanitario, Void> cell = new TableCell<>() {

                    private final Button btnEdit = new Button("Modificar");
                    private final Button btnDelete = new Button("Eliminar");

                    {
                        btnEdit.setOnAction((event) -> {
                            PersonalSanitario data = getTableView().getItems().get(getIndex());
                            // Implementar lógica de modificación aquí
                            System.out.println("Modificar: " + data);
                        });
                        btnDelete.setOnAction((event) -> {
                            PersonalSanitario data = getTableView().getItems().get(getIndex());
                            eliminarPersonalSanitario(data.getDni());
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

    private void eliminarPersonalSanitario(String dni) {
        dataBaseService.deleteData("Personal_sanitario", "dni", dni);
    }

    @FXML
    protected void insertarSanitario() {
        try {
            // Obtener los valores de los campos del formulario
            String dni = dniField.getText();
            String nombre = nombreField.getText();
            String apellido = apellidoField.getText();
            Integer edad = Integer.parseInt(edadField.getText());
            String direccion = direccionField.getText();
            String titulacion = titulacionField.getText();
            String sitioTrabajo = sitio_trabajo.getText();
            String fechaEntrada = fechaEntradaField.getText();
            String fechaSalida = fechaSalidaField.getText();
            Integer idHabitacion = Integer.parseInt(idHabitacionField.getText());
            Integer idEspacio = Integer.parseInt(idEspacioField.getText());

            // Crear una lista de columnas y valores para la inserción
            List<String> columns = Arrays.asList("dni", "nombre", "apellido", "edad", "direccion", "titulacion", "sitio_trabajo", "fecha_entrada", "fecha_salida", "idHabitacion", "idEspacio");
            List<String> values = Arrays.asList(dni, nombre, apellido, String.valueOf(edad), direccion, titulacion, sitioTrabajo, fechaEntrada, fechaSalida, String.valueOf(idHabitacion), String.valueOf(idEspacio));

            // Insertar datos en la base de datos
            dataBaseService.insertData("Personal_sanitario", columns, values);

            // Mostrar un mensaje de éxito
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Éxito");
            alert.setHeaderText(null);
            alert.setContentText("Sanitario insertado correctamente.");
            alert.showAndWait();

            // Actualizar la tabla mostrando los nuevos datos
            mostrarPersonalSanitario();

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
        dniField.clear();
        nombreField.clear();
        apellidoField.clear();
        edadField.clear();
        direccionField.clear();
        titulacionField.clear();
        sitio_trabajo.clear();
        fechaEntradaField.clear();
        fechaSalidaField.clear();
        idHabitacionField.clear();
        idEspacioField.clear();
    }

    // Mostrar personal sanitario
    @FXML
    protected void mostrarPersonalSanitario() {
        try {
            List<String> columns = Arrays.asList("dni", "nombre", "apellido", "edad", "direccion", "titulacion", "sitio_trabajo", "fecha_entrada", "fecha_salida", "idHabitacion", "idEspacio");
            ResultSet resultSet = dataBaseService.selectData("Personal_sanitario", columns);

            // Create an ObservableList to store the data
            ObservableList<PersonalSanitario> personalSanitarios = FXCollections.observableArrayList();

            // Iterate over the ResultSet
            while (resultSet.next()) {
                PersonalSanitario personalSanitario = new PersonalSanitario();
                personalSanitario.setDni(resultSet.getString("dni"));
                personalSanitario.setNombre(resultSet.getString("nombre"));
                personalSanitario.setApellido(resultSet.getString("apellido"));
                personalSanitario.setEdad(resultSet.getInt("edad"));
                personalSanitario.setDireccionEdificio(resultSet.getString("direccion"));
                personalSanitario.setTitulacion(resultSet.getString("titulacion"));
                personalSanitario.setSitioTrabajo(resultSet.getString("sitio_trabajo"));
                personalSanitario.setFechaEntrada(resultSet.getString("fecha_entrada"));
                personalSanitario.setFechaSalida(resultSet.getString("fecha_salida"));
                personalSanitario.setIdHabitacion(resultSet.getInt("idHabitacion"));
                personalSanitario.setIdEspacio(resultSet.getInt("idEspacio"));

                personalSanitarios.add(personalSanitario); // Corrected line
            }

            // Set cell value factories
            dniColumn.setCellValueFactory(new PropertyValueFactory<>("dni"));
            nombreColumn.setCellValueFactory(new PropertyValueFactory<>("nombre"));
            apellidoColumn.setCellValueFactory(new PropertyValueFactory<>("apellido"));
            edadColumn.setCellValueFactory(new PropertyValueFactory<>("edad"));
            direccionColumn.setCellValueFactory(new PropertyValueFactory<>("direccionEdificio"));
            titulacionColumn.setCellValueFactory(new PropertyValueFactory<>("titulacion"));
            sitioTrabajoColumn.setCellValueFactory(new PropertyValueFactory<>("sitioTrabajo"));
            fechaEntradaColumn.setCellValueFactory(new PropertyValueFactory<>("fechaEntrada"));
            fechaSalidaColumn.setCellValueFactory(new PropertyValueFactory<>("fechaSalida"));
            idHabitacionColumn.setCellValueFactory(new PropertyValueFactory<>("idHabitacion"));
            idEspacioColumn.setCellValueFactory(new PropertyValueFactory<>("idEspacio"));

            // Add the data to the TableView
            personalSanitarioTable.setItems(personalSanitarios);
        } catch (SQLException e) {
            System.err.println("Error: " + e.getMessage());
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