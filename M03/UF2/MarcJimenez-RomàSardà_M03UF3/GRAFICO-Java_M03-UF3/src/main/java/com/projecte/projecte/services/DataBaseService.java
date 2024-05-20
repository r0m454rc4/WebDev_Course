package services;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;

public class DataBaseService {
    private static final String DATABASE_URL = "jdbc:mysql://localhost/Projecte_M03";
    private static final String DATABASE_USER = "root";
    private static final String DATABASE_PASSWORD = "";

    public Connection getConnection() throws SQLException {
        return DriverManager.getConnection(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD);
    }

    public ResultSet selectData(String tableName, List<String> columns) throws SQLException {
        StringBuilder query = new StringBuilder("SELECT ");

        for (int i = 0; i < columns.size(); i++) {
            query.append(columns.get(i));
            if (i < columns.size() - 1) {
                query.append(", ");
            }
        }

        query.append(" FROM ").append(tableName);

        Connection connection = getConnection();
        PreparedStatement preparedStatement = connection.prepareStatement(query.toString());

        return preparedStatement.executeQuery();
    }

    public void insertData(String tableName, List<String> columns, List<String> values) {
        if (columns.size() != values.size()) {
            System.err.println("El número de columnas no coincide con el número de valores.");
            return;
        }

        StringBuilder query = new StringBuilder("INSERT INTO " + tableName + " (");

        for (int i = 0; i < columns.size(); i++) {
            query.append(columns.get(i));
            if (i < columns.size() - 1) {
                query.append(", ");
            }
        }

        query.append(") VALUES (");

        for (int i = 0; i < values.size(); i++) {
            query.append("?");
            if (i < values.size() - 1) {
                query.append(", ");
            }
        }

        query.append(")");

        try (Connection connection = getConnection();
             PreparedStatement preparedStatement = connection.prepareStatement(query.toString())) {

            for (int i = 0; i < values.size(); i++) {
                preparedStatement.setString(i + 1, values.get(i));
            }

            preparedStatement.executeUpdate();
        } catch (SQLException e) {
            System.err.println("Error al insertar datos: " + e.getMessage());
        }
    }

    public void updateData(String tableName, List<String> columns, List<String> values, String conditionColumn, String conditionValue) {
        if (columns.size() != values.size()) {
            System.err.println("El número de columnas no coincide con el número de valores.");
            return;
        }

        StringBuilder query = new StringBuilder("UPDATE " + tableName + " SET ");

        for (int i = 0; i < columns.size(); i++) {
            query.append(columns.get(i)).append(" = ?");
            if (i < columns.size() - 1) {
                query.append(", ");
            }
        }

        query.append(" WHERE ").append(conditionColumn).append(" = ?");

        try (Connection connection = getConnection();
             PreparedStatement preparedStatement = connection.prepareStatement(query.toString())) {

            for (int i = 0; i < values.size(); i++) {
                preparedStatement.setString(i + 1, values.get(i));
            }
            preparedStatement.setString(values.size() + 1, conditionValue);

            preparedStatement.executeUpdate();
        } catch (SQLException e) {
            System.err.println("Error al actualizar datos: " + e.getMessage());
        }
    }

    public void deleteData(String tableName, String conditionColumn, String conditionValue) {
        String query = "DELETE FROM " + tableName + " WHERE " + conditionColumn + " = ?";

        try (Connection connection = getConnection();
             PreparedStatement preparedStatement = connection.prepareStatement(query)) {

            preparedStatement.setString(1, conditionValue);

            preparedStatement.executeUpdate();
        } catch (SQLException e) {
            System.err.println("Error al eliminar datos: " + e.getMessage());
        }
    }
}
