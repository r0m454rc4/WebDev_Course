import javax.swing.*;
import java.sql.*;
import java.io.*;
import java.awt.*;
import java.awt.event.*;

public class Login extends JFrame {
  private JTextField txtUserField, txtPassField;
  private JLabel lblUserLabel, lblPassLabel;
  private JButton btnAceptar, btnCancelar;
  String usuari, contra;

  Login() {
    Container contenedor = getContentPane();
    contenedor.setLayout(new FlowLayout());

    // Crear etiqueta y cuadro de texto.
    txtUserField = new JTextField(20);
    lblUserLabel = new JLabel("Usuario: ");
    txtUserField.setToolTipText("Introdure tu nombre de usuario: ");
    contenedor.add(Box.createVerticalStrut(50));
    contenedor.add(lblUserLabel);
    contenedor.add(txtUserField);

    txtPassField = new JPasswordField(20);
    lblPassLabel = new JLabel("Contrasena: ");
    txtPassField.setToolTipText("Introduzca su contrasena: ");
    contenedor.add(lblPassLabel, txtPassField);

    // Crear y anadir los bototes.
    btnAceptar = new JButton("Aceptar");
    // Establecer boton aceptar por defecto.
    getRootPane().setDefaultButton(btnAceptar);
    // Crear un escuchador al boton aceptar.
    ActionListener escuchadorBtnAceptar = new ActionListener() {
      public void actionPerformed(ActionEvent evt) {
        try {
          if (txtUserField.getText().length() > 0 && txtPassField.getText().length() > 0) {
            if (validarUsuario(txtUserField.getText(), txtPassField.getText())) {
              setVisible(false);
              VentanaPrincipal ventana1 = new VentanaPrincipal();
              ventana1.mostrar();
            } else {
              JOptionPane.showMessageDialog(null, "El nombre o contrasena no son correctos.");
              JOptionPane.showMessageDialog(null, txtUserField.getText() + " " + txtPassField.getText());
              txtUserField.setText("");
              txtPassField.setText("");
              txtUserField.requestFocusInWindow();
            }
          } else {
            JOptionPane.showMessageDialog(null, "Se ha de escribir nombre de usuario y contrasena ");
          }
        } catch (Exception e) {
          e.printStackTrace();
        }
      }
    };

    btnCancelar = new JButton("Cancelar");
    contenedor.add(btnAceptar, btnCancelar);
    ActionListener escuchadorBtnCancelar = new ActionListener() {
      public void actionPerformed(ActionEvent evt) {
        // Terminar programa.
        System.exit(0);
      }
    };

    // Asociar escuchador para boton aceptar y cancelar.
    btnAceptar.addActionListener(escuchadorBtnAceptar);
    btnCancelar.addActionListener(escuchadorBtnCancelar);
    setTitle("Identificacion usuarios.");
    // Tamano del frame.
    setSize(400, 150);
    // Bloquear el canvio de tamano.
    setResizable(false);
    setVisible(true);
  }

  public static void main(String[] args) {
    Login prova = new Login();
    prova.setDefaultCloseOperation(prova.EXIT_ON_CLOSE);
  }
}