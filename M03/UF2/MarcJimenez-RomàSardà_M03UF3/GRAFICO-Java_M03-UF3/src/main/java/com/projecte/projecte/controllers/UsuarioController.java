package com.projecte.projecte.controllers;

import com.projecte.projecte.models.Session;
import com.projecte.projecte.models.Usuario;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.HBox;
import javafx.stage.Stage;
import javafx.util.Callback;
import javafx.scene.layout.VBox;
import services.DataBaseService;

import java.io.IOException;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Arrays;
import java.util.List;

public class UsuarioController {

    @FXML
    private VBox vbox;

    @FXML
    private TextField usernameField;

    @FXML
    private PasswordField passwordField;

    @FXML
    private TextField nombreField;

    @FXML
    private TextField contraseñaField;

    @FXML
    private TextField rolField;

    @FXML
    private TableView<Usuario> userTable;

    @FXML
    private TableColumn<Usuario, String> nombreColumn;

    @FXML
    private TableColumn<Usuario, String> rolColumn;

    @FXML
    private TableColumn<Usuario, Void> accionesColumn;

    private DataBaseService dataBaseService;
    private String currentUserRole;

    public UsuarioController() {
        this.dataBaseService = new DataBaseService();
    }

    public void setCurrentUserRole(String role) {
        this.currentUserRole = role;
    }

    @FXML
    protected void onSubmitButtonClick() {
        String username = usernameField.getText();
        String password = passwordField.getText();

        try {
            List<String> columns = Arrays.asList("nombre", "contraseña", "rol"); // Agrega "rol" a la lista de columnas
            ResultSet resultSet = dataBaseService.selectData("Usuarios", columns); // Pasa la lista de columnas al método selectData

            while (resultSet.next()) {
                if (resultSet.getString("nombre").equals(username) && resultSet.getString("contraseña").equals(password)) {
                    System.out.println("Inicio de sesión exitoso");

                    // Guardar el rol en la sesión
                    Session.getInstance().setRol(resultSet.getString("rol"));

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

                    FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlFile));
                    Parent root = loader.load();
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

    @FXML
    public void initialize() {
        if (userTable != null) {
            nombreColumn.setCellValueFactory(new PropertyValueFactory<>("nombre"));
            rolColumn.setCellValueFactory(new PropertyValueFactory<>("rol"));
            addButtonToTable();
        }
    }

    private void addButtonToTable() {
        Callback<TableColumn<Usuario, Void>, TableCell<Usuario, Void>> cellFactory = new Callback<>() {
            @Override
            public TableCell<Usuario, Void> call(final TableColumn<Usuario, Void> param) {
                final TableCell<Usuario, Void> cell = new TableCell<>() {

                    private final Button btnEdit = new Button("Modificar");
                    private final Button btnDelete = new Button("Eliminar");

                    {
                        btnEdit.setOnAction((event) -> {
                            Usuario data = getTableView().getItems().get(getIndex());
                            // Implementar lógica de modificación aquí
                            System.out.println("Modificar: " + data);
                        });
                        btnDelete.setOnAction((event) -> {
                            Usuario data = getTableView().getItems().get(getIndex());
                            eliminarUsuario(data.getNombre());
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

    private void eliminarUsuario(String nombre) {
        dataBaseService.deleteData("Usuarios", "nombre", nombre);
    }

    @FXML
    protected void showUsers() {
        try {
            List<String> columns = Arrays.asList("nombre", "contraseña", "rol");
            ResultSet resultSet = dataBaseService.selectData("Usuarios", columns);

            ObservableList<Usuario> usuarios = FXCollections.observableArrayList();

            while (resultSet.next()) {
                Usuario usuario = new Usuario();
                usuario.setNombre(resultSet.getString("nombre"));
                usuario.setContrasena(resultSet.getString("contraseña"));
                usuario.setRol(resultSet.getString("rol"));

                usuarios.add(usuario);
            }

            userTable.setItems(usuarios);
        } catch (SQLException e) {
            System.err.println("Error: " + e.getMessage());
        }
    }

    @FXML
    protected void insertarUsuario() {
        try {
            // Obtener los valores de los campos del formulario
            String nombre = nombreField.getText();
            String contraseña = contraseñaField.getText();
            String rol = rolField.getText();

            // Verificar que los campos no estén vacíos y que el rol sea válido
            if (nombre.isEmpty() || contraseña.isEmpty() || rol.isEmpty() || (!"administrador".equals(rol) && !"encargado".equals(rol))) {
                // Mostrar una alerta al usuario
                Alert alert = new Alert(Alert.AlertType.WARNING);
                alert.setTitle("Advertencia");
                alert.setHeaderText(null);
                alert.setContentText("Por favor, complete todos los campos y asegúrese de que el rol sea 'administrador' o 'encargado'.");
                alert.showAndWait();
                return;
            }

            // Crear una lista de columnas y valores para la inserción
            List<String> columns = Arrays.asList("nombre", "contraseña", "rol");
            List<String> values = Arrays.asList(nombre, contraseña, rol);

            // Insertar datos en la base de datos
            dataBaseService.insertData("Usuarios", columns, values);

            // Mostrar un mensaje de éxito
            Alert alert = new Alert(Alert.AlertType.INFORMATION);
            alert.setTitle("Éxito");
            alert.setHeaderText(null);
            alert.setContentText("Usuario insertado correctamente.");
            alert.showAndWait();

            // Actualizar la tabla mostrando los nuevos datos
            showUsers();

            // Limpiar los campos del formulario después de la inserción
            limpiarCampos();
        } catch (Exception e) {
            // Mostrar un mensaje de error
            Alert alert = new Alert(Alert.AlertType.ERROR);
            alert.setTitle("Error");
            alert.setHeaderText(null);
            alert.setContentText("Ha ocurrido un error al insertar el usuario: " + e.getMessage());
            alert.showAndWait();
        }
    }

    private void limpiarCampos() {
        nombreField.clear();
        contraseñaField.clear();
        rolField.clear();
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

            // Obtener la etapa actual desde vbox y establecer la nueva escena
            Stage stage = (Stage) vbox.getScene().getWindow();
            stage.setScene(scene);
            stage.setMaximized(true);

        } catch (IOException e) {
            System.err.println("Error: " + e.getMessage());
            e.printStackTrace();
        }
    }
}
