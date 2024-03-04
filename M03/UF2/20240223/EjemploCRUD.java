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
			String consulta = "INSERT INTO amigos (dni, nombre, telef, email) VALUES (?, ?, ?, ?)";
			PreparedStatement sentencia = conexion.prepareStatement(consulta);
			sentencia.setString(1, dni);
			sentencia.setString(2, nombre);
			sentencia.setString(3, telef);
			sentencia.setString(4, email);

			// Execute the query.
			int filasInsertadas = sentencia.executeUpdate();
			if (filasInsertadas > 0) {
				System.out.println("Una nueva fila ha sido insertada!");
			}

			// Close resources.
			sentencia.close();
			conexion.close();
			sc.close();
		} catch (SQLException e) {
			System.out.println("Error: " + e.getMessage());
		}
	}
}
