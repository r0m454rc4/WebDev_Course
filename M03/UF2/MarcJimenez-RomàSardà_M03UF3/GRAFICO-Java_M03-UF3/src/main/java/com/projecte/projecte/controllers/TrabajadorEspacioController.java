package com.projecte.projecte.controllers;

import com.projecte.projecte.models.Session;
import com.projecte.projecte.models.TrabajadorEspacio;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TableCell;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;
import javafx.util.Callback;
import services.DataBaseService;

import java.io.IOException;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Arrays;
import java.util.List;

public class TrabajadorEspacioController {

    @FXML
    private VBox vbox;

    @FXML
    private TableView<TrabajadorEspacio> trabajadorEspacioTable;

    @FXML
    private TableColumn<TrabajadorEspacio, String> dniColumn;

    @FXML
    private TableColumn<TrabajadorEspacio, String> nombreColumn;

    @FXML
    private TableColumn<TrabajadorEspacio, String> apellidoColumn;

    @FXML
    private TableColumn<TrabajadorEspacio, Integer> edadColumn;

    @FXML
    private TableColumn<TrabajadorEspacio, String> trabajoAsignadoColumn;

    @FXML
    private TableColumn<TrabajadorEspacio, String> fechaContratacionColumn;

    @FXML
    private TableColumn<TrabajadorEspacio, String> fechaBajaColumn;

    @FXML
    private TableColumn<TrabajadorEspacio, Integer> idEspacioColumn;

    @FXML
    private TableColumn<TrabajadorEspacio, Void> accionesColumn;

    @FXML
    private Button showTrabajadoresEspaciosButton;

    @FXML
    private TextField dniField;

    @FXML
    private TextField nombreField;

    @FXML
    private TextField apellidoField;

    @FXML
    private TextField edadField;

    @FXML
    private TextField trabajoAsignadoField;

    @FXML
    private TextField fechaContratacionField;

    @FXML
    private TextField fechaBajaField;

    @FXML
    private TextField idEspacioField;

    private DataBaseService dataBaseService;

    public TrabajadorEspacioController() {
        this.dataBaseService = new DataBaseService();
    }

    @FXML
    public void initialize() {
        dniColumn.setCellValueFactory(new PropertyValueFactory<>("dni"));
        nombreColumn.setCellValueFactory(new PropertyValueFactory<>("nombre"));
        apellidoColumn.setCellValueFactory(new PropertyValueFactory<>("apellido"));
        edadColumn.setCellValueFactory(new PropertyValueFactory<>("edad"));
        trabajoAsignadoColumn.setCellValueFactory(new PropertyValueFactory<>("trabajoAsignado"));
        fechaContratacionColumn.setCellValueFactory(new PropertyValueFactory<>("fechaContratacion"));
        fechaBajaColumn.setCellValueFactory(new PropertyValueFactory<>("fechaBaja"));
        idEspacioColumn.setCellValueFactory(new PropertyValueFactory<>("idEspacio"));

        addButtonToTable();
    }

    private void addButtonToTable() {
        Callback<TableColumn<TrabajadorEspacio, Void>, TableCell<TrabajadorEspacio, Void>> cellFactory = new Callback<>() {
            @Override
            public TableCell<TrabajadorEspacio, Void> call(final TableColumn<TrabajadorEspacio, Void> param) {
                final TableCell<TrabajadorEspacio, Void> cell = new TableCell<>() {

                    private final Button btnEdit = new Button("Modificar");
                    private final Button btnDelete = new Button("Eliminar");

                    {
                        btnEdit.setOnAction((event) -> {
                            TrabajadorEspacio data = getTableView().getItems().get(getIndex());
                            // Implementar lógica de modificación aquí
                            System.out.println("Modificar: " + data);
                        });
                        btnDelete.setOnAction((event) -> {
                            TrabajadorEspacio data = getTableView().getItems().get(getIndex());
                            eliminarTrabajador(data.getDni());
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

    private void eliminarTrabajador(String dni) {
        dataBaseService.deleteData("Trabajadores_Espacio", "dni", dni);
    }

    @FXML
    protected void mostrarTrabajadoresEspacios() {
        try {
            List<String> columns = Arrays.asList("dni", "nombre", "apellido", "edad", "Trabajo_asignado", "fecha_contratacion", "fecha_baja", "idEspacio");
            ResultSet resultSet = dataBaseService.selectData("Trabajadores_Espacio", columns);

            ObservableList<TrabajadorEspacio> trabajadores = FXCollections.observableArrayList();

            while (resultSet.next()) {
                TrabajadorEspacio trabajador = new TrabajadorEspacio();
                trabajador.setDni(resultSet.getString("dni"));
                trabajador.setNombre(resultSet.getString("nombre"));
                trabajador.setApellido(resultSet.getString("apellido"));
                trabajador.setEdad(resultSet.getInt("edad"));
                trabajador.setTrabajoAsignado(resultSet.getString("Trabajo_asignado"));
                trabajador.setFechaContratacion(resultSet.getString("fecha_contratacion"));
                trabajador.setFechaBaja(resultSet.getString("fecha_baja"));
                trabajador.setIdEspacio(resultSet.getInt("idEspacio"));

                trabajadores.add(trabajador);
            }

            trabajadorEspacioTable.setItems(trabajadores);
        } catch (SQLException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void insertarTrabajador() {
        try {
            // Obtener los valores de los campos del formulario
            String dni = dniField.getText();
            String nombre = nombreField.getText();
            String apellido = apellidoField.getText();
            int edad = Integer.parseInt(edadField.getText());
            String trabajoAsignado = trabajoAsignadoField.getText();
            String fechaContratacion = fechaContratacionField.getText();
            String fechaBaja = fechaBajaField.getText();
            int idEspacio = Integer.parseInt(idEspacioField.getText());

            // Crear una lista de columnas y valores para la inserción
            List<String> columns = Arrays.asList("dni", "nombre", "apellido", "edad", "Trabajo_asignado", "fecha_contratacion", "fecha_baja", "idEspacio");
            List<String> values = Arrays.asList(dni, nombre, apellido, String.valueOf(edad), trabajoAsignado, fechaContratacion, fechaBaja, String.valueOf(idEspacio));

            // Insertar datos en la base de datos
            dataBaseService.insertData("Trabajadores_Espacio", columns, values);

            // Mostrar un mensaje de éxito
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Éxito");
            alert.setHeaderText(null);
            alert.setContentText("Trabajador insertado correctamente.");
            alert.showAndWait();

            // Actualizar la tabla mostrando los nuevos datos
            mostrarTrabajadoresEspacios();

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
        trabajoAsignadoField.clear();
        fechaContratacionField.clear();
        fechaBajaField.clear();
        idEspacioField.clear();
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
