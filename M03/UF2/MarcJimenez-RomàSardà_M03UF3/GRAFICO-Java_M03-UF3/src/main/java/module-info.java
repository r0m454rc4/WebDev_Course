module com.projecte.projecte {
    requires javafx.controls;
    requires javafx.fxml;
    requires java.sql;
    requires mysql.connector.java;

    opens com.projecte.projecte.controllers to javafx.fxml;
    opens com.projecte.projecte.models to javafx.base;
    exports com.projecte.projecte;
}