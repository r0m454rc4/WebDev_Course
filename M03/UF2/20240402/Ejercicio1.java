import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;

// javac -cp .:mysql-connector-j-8.3.0.jar Ejercicio1.java
// java -cp .:mysql-connector-j-8.3.0.jar Ejercicio1

public class Ejercicio1 {
	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
		byte opcio = menu(sc);

		switch (opcio) {
			case 1:
				System.out.println("Introduzca el dni: ");
				String dni = sc.next();
				System.out.println("Introduzca el nombre: ");
				String nombre = sc.next();
				System.out.println("Introduzca los apellidos: ");
				String apellidos = sc.next();
				System.out.println("Introduzca el telef: ");
				String telef = sc.next();
				System.out.println("Introduzca email: ");
				String email = sc.next();

				try {
					// Establish connection
					Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost/contactos", "root", "");

					// Prepare statement
					String consulta = "INSERT INTO contactos (dni, nombre, apellidos, telef, email) VALUES (?, ?, ?, ?, ?)";
					PreparedStatement sentencia = conexion.prepareStatement(consulta);
					sentencia.setString(1, dni);
					sentencia.setString(2, nombre);
					sentencia.setString(3, apellidos);
					sentencia.setString(4, telef);
					sentencia.setString(5, email);

					// Execute the query.
					int filasInsertadas = sentencia.executeUpdate();
					if (filasInsertadas > 0) {
						System.out.println("Un nuevo amigo ha sido insertado!");
					}

					// Close resources.
					sentencia.close();
					conexion.close();
					sc.close();
				} catch (SQLException e) {
					System.out.println("Error: " + e.getMessage());
				}

			case 2:
				try {
					Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost/contactos", "root", "");
					// Prepare the select.
					Statement sentencia = conexion.createStatement();
					ResultSet resul = sentencia.executeQuery("SELECT * FROM contactos");

					// While I have values on the table.
					while (resul.next()) {
						// Sacamos los resultados
						System.out.println("Dni " + resul.getString("dni"));
						System.out.println("Nombre: " + resul.getString("nombre"));
						System.out.println("Apellidos: " + resul.getString("apellidos"));
						System.out.println("Telef: " + resul.getString("telef"));
						System.out.println("Email: " + resul.getString("email"));
						System.out.println("-----------------------------------------------\n");
					}
					resul.close();

					sentencia.close();
					conexion.close();
				} catch (SQLException e) {
					e.printStackTrace();
				}

			case 3:
				break;
		}
	}

	static byte menu(Scanner opcion) {
		byte op;
		System.out.println("Menú d'opcions:");
		System.out.println("1.) Insertar amigo.");
		System.out.println("2.) Listar amigos.");
		System.out.println("3.) Salir.");
		System.out.println("Opción: ");
		op = opcion.nextByte();

		return op;
	}
}
