import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.Scanner;

// javac -cp .:mysql-connector-j-8.3.0.jar EjemploCRUD.java
// java -cp .:mysql-connector-j-8.3.0.jar EjemploCRUD

public class EjemploCRUD {
	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);

		try {
			System.out.println("Introduzca el dni: ");
			String dni = sc.next();
			System.out.println("Introduzca el nombre: ");
			String nombre = sc.next();
			System.out.println("Introduzca el telef: ");
			String telef = sc.next();
			System.out.println("Introduzca email: ");
			String email = sc.next();

			// Establish connection
			Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost/amigos", "root", "");

			// Prepare statement
			String query = "INSERT INTO amigos (dni, nombre, telef, email) VALUES (?, ?, ?, ?)";
			PreparedStatement statement = conexion.prepareStatement(query);
			statement.setString(1, dni);
			statement.setString(2, nombre);
			statement.setString(3, telef);
			statement.setString(4, email);

			// Execute the query.
			int rowsInserted = statement.executeUpdate();
			if (rowsInserted > 0) {
				System.out.println("Una nova dada ha estat introduida!");
			}

			// Close resources.
			statement.close();
			conexion.close();
			sc.close();
		} catch (SQLException e) {
			System.out.println("Error: " + e.getMessage());
		}
	}
}
