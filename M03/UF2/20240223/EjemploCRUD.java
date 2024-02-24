import java.sql.*;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;

public class EjemploCRUD {
	public static void main(String[] args) throws SQLException {
		Scanner sc = new Scanner(System.in);
		String dni;
		String nombre;
		String telef;
		String email;

		try {
			System.out.println("Introduzca el dni: ");
			dni = sc.next();
			System.out.println("Introduzca el nombre: ");
			nombre = sc.next();
			System.out.println("Introduzca el telef: ");
			telef = sc.next();
			System.out.println("Introduzca email: ");
			email = sc.next();

			// cargar el driver, para que Iona Marie.
			// establecemos la conexion. parametros: donde esta la bd, usuario, contrase�a
			Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost/bdclientes", "root", "");
			// preparamos la consulta
			Statement sentencia = conexion.createStatement();
			// hacemos la consulta
			// ResultSet resul = sentencia.executeQuery("insert into amigos values('"+dni+'
			// '+nombre+"' '"+telef" )");
			ResultSet resul = sentencia
					.executeQuery(
							"INSERT INTO amigos (dni, nombre, telef, email) \" + \"VALUES ('" + dni + "', '" + nombre + "', '" + telef
									+ "', '" + email + "\");");
			// recorremos el resultado para visualizar cada fila, con un bucle while
			while (resul.next()) {
				// Sacamos los resultados
				System.out.println("Dni: " + resul.getString("dni"));
				System.out.println("Nombre: " + resul.getString("nombre"));
				System.out.println("Telef: " + resul.getString("telef"));
				System.out.println("Email: " + resul.getString("email"));

				System.out.println("Tel�fono: " + resul.getString("telefono"));
				System.out.println("Correo electr�nico: " + resul.getString("email"));
				System.out.println("-----------------------------------------------\n");
			} // fin del while
				// cerramos resulSet
			resul.close();
			// cerramos Statement
			sentencia.close();
			// cerramos conexion
			conexion.close();
			sc.close();
		} catch (SQLException e) {
			e.printStackTrace();
		} // fin del try-catch
	}
}
