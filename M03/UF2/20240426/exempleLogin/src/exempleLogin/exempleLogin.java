package exempleLogin;
import javax.swing.*;
import java.sql.*;
import java.io.*;
import java.awt.*;
import java.awt.Panel;
import java.awt.event.*;

public class exempleLogin extends JFrame{
	private JTextField txtUser, txtPass;
	private JLabel lblUser, lblPass;
	private JButton btnAcceptar, btnCancelar;
	String usuari, contra;
	
	exempleLogin(){
		Container contenedor = getContentPane();
		contenedor.setLayout(new FlowLayout());
		
		// Crear etiqueta y cuadro de texto
		txtUser = new JTextField(20);
		lblUser = new JLabel("Usuari: ");
		txtUser.setToolTipText("Introdueix el teu nom usuari");
		contenedor.add(Box.createVerticalStrut(50));
		contenedor.add(lblUser);
		contenedor.add(txtUser);
		
		txtPass = new JPasswordField(20);
		lblPass = new JLabel("Contrasenya: ");
		txtPass.setToolTipText("Introdueixi la seva contrasenya");
		contenedor.add(lblPass);
		contenedor.add(txtPass);
		
		// Crear y agregar los botones
		btnAcceptar = new JButton("Acceptar");
		// Establecer boton Acceptar por defecto
		getRootPane().setDefaultButton(btnAcceptar);
		
		btnCancelar = new JButton("Cancelar");
		contenedor.add(btnAcceptar);
		contenedor.add(btnCancelar);
		
		// Crear un escuchador al boton Acceptar
		ActionListener escuchadorbtnAcceptar = new ActionListener() {
			public void actionPerformed(ActionEvent evt) {
				try {
					// Ver si el usuario escribe el nombre y su pass
					if(txtUser.getText().length() > 0 && txtPass.getText().length() > 0) {
						//Si el usuario si fue validado correctamente
						/*if(validarUsuario(txtUser.getText(), txtPass.getText())) {
							//C�digo para mostrar la ventana principal
							setVisible(false);
							VentanaPrincipal ventana1 = new VentanaPrincipal();
							ventana1.mostrar();
						}else {*/
							JOptionPane.showMessageDialog(null, "El nom d'usuari o contrasenya no correctes");
							JOptionPane.showMessageDialog(null, txtUser.getText() + " " + txtPass.getText());
							txtUser.setText("");
							txtPass.setText("");
							txtUser.requestFocusInWindow();
						//}
					}else {
						JOptionPane.showMessageDialog(null, "Cal escriure nom d'usuari i contrasenya");
					}
				}catch (Exception e) {
					e.printStackTrace();
				}
			}
		};
		
		//Asociar escuchador para el boton Acceptar
		btnAcceptar.addActionListener(escuchadorbtnAcceptar);
		
		//Agregar escuchador boton cancelar
		ActionListener escuchadorbtnCancelar = new ActionListener() {
			public void actionPerformed(ActionEvent evt) {
				//Terminar programa
				System.exit(0);
			}
		};
		
		//Asociar escuchador para el boton Cancelar
		btnCancelar.addActionListener(escuchadorbtnCancelar);
		setTitle("Identificaci� Usuaris");
		//Tama�o del Frame
		setSize(800,150);
		//Que no se pueda cambiar de tama�o
		setResizable(false);
		setVisible(true);
		
	}
	
	public static void main(String[] args) {
		exempleLogin prova = new exempleLogin();
		prova.setDefaultCloseOperation(prova.EXIT_ON_CLOSE);
	}

}
