package ex1BD;
import java.sql.*;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class ConexionMySQL{

	public static void main(String[] args) throws SQLException{
		// TODO Auto-generated method stub
		try{
			//cargar el driver, para que funcione la conexion. estipula el 
			//lenguaje de comunicacion con la BD
			Class.forName("com.mysql.jdbc.Driver");
			//establecemos la conexion. parametros: donde esta la bd, usuario, contraseña
			Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost/bdclientes","root","");
			//preparamos la consulta
			Statement sentencia = conexion.createStatement();			
			//hacemos la consulta
			ResultSet resul = sentencia.executeQuery("SELECT * FROM clientes");		
			//recorremos el resultado para visualizar cada fila, con un bucle while mientras haya registros
			while(resul.next()){	
				//Sacamos los resultados	
                                System.out.println("CLIENTE NÚMERO "+resul.getString("codCliente"));
                                System.out.println("Nombre: "+resul.getString("nombre"));
                                System.out.println("Apellidos: "+resul.getString("apellido"));
                                System.out.println("DNI: "+resul.getString("dni"));

                                System.out.println("Teléfono: "+resul.getString("telefono"));
                                System.out.println("Correo electrónico: "+resul.getString("email"));
                                System.out.println("-----------------------------------------------\n");				
			}//fin del while
			//cerramos resulSet
			resul.close();
			//cerramos Statement
			sentencia.close();
			//cerramos conexion
			conexion.close();
		}catch(ClassNotFoundException cn){
			cn.printStackTrace();
		}catch(SQLException e){
			e.printStackTrace();
		}//fin del try-catch

	}

}
