import React from "react";
import { StyleSheet, Text, View, Button } from "react-native";
import * as SQLite from "expo-sqlite";

const estils = StyleSheet.create({
  sqliteTitol: {
    color: "blue",
    fontWeight: "bold",
    fontSize: 30,
  },
  pagina: {
    paddingTop: 10,
    paddingBottom: 10,
    backgroundColor: "#FA0",
  },
  resultatTaula: {
    marginTop: 50,
    marginLeft: 60,
    marginRight: 60,
  },
});

export class M09_Sqlite extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      path: null,
      dadesTaula: [],
    };

    // Here I open the db.
    db = SQLite.openDatabase("daw2.db");
  }

  insertarDades = () => {
    db.transaction((tx) => {
      try {
        tx.executeSql(
          // The name of the table is items.
          "CREATE TABLE IF NOT EXISTS items (id INTEGER PRIMARY KEY NOT NULL, done INT, value TEXT);"
        );
        // console.log("Taula creada");

        tx.executeSql("INSERT INTO items (done, value) VALUES (0, ?)", [
          "primer",
        ]);
        tx.executeSql("INSERT INTO items (done, value) VALUES (1, ?)", [
          "segon",
        ]);
        tx.executeSql("INSERT INTO items (done, value) VALUES (2, ?)", [
          "tercer",
        ]);

        // console.log("Dades insertades a la taula.");

        this.setState((prevState) => ({
          dadesTaula: [...prevState.dadesTaula, "Dades insertades a la taula."],
        }));
      } catch (error) {
        console.log(error);
        throw Error(`Error a l'insertar dades ${error}`);
      }
    });
  };

  mostrarDades = () => {
    db.transaction((tx) => {
      try {
        // console.log("Dades de la taula:");
        tx.executeSql("SELECT * FROM items", [], (_, { rows }) => {
          // Here I have 24 as it's the default size of rows when it's empty, can be checked with: JSON.stringify(rows).length.
          if (JSON.stringify(rows).length > 24) {
            // console.log(JSON.stringify(rows));

            this.setState((prevState) => ({
              dadesTaula: [...prevState.dadesTaula, JSON.stringify(rows)],
            }));
          } else {
            this.setState((prevState) => ({
              dadesTaula: [...prevState.dadesTaula, "La taula esta buida."],
            }));
          }
        });
      } catch (error) {
        console.log(error);
        throw Error(`Error al mostrar dades ${error}`);
      }
    });
  };

  modificarDades = () => {
    db.transaction((tx) => {
      try {
        tx.executeSql("SELECT * FROM items WHERE id = 1", [], (_, { rows }) => {
          // Here I have 24 as it's the default size of rows when it's empty, can be checked with: JSON.stringify(rows).length.
          if (JSON.stringify(rows).length > 24) {
            console.log(JSON.stringify(rows));
          } else {
            this.setState((prevState) => ({
              dadesTaula: [
                ...prevState.dadesTaula,
                "No es pot modificar el registre, ja que la taula esta buida.",
              ],
            }));
          }
        });

        tx.executeSql(
          "UPDATE items SET done = 'pepe' WHERE id = 1",
          [],
          (_, { rows }) => {
            // Here I have 24 as it's the default size of rows when it's empty, can be checked with: JSON.stringify(rows).length.
            if (JSON.stringify(rows).length > 24) {
              console.log(JSON.stringify(rows));
            }
          }
        );
      } catch (error) {
        console.log(error);
        throw Error(`Error al mostrar dades ${error}`);
      }

      console.log("Dades abans i despres de modificar:");

      tx.executeSql("SELECT * FROM items WHERE id = 1", [], (_, { rows }) => {
        // Here I have 24 as it's the default size of rows when it's empty, can be checked with: JSON.stringify(rows).length.
        if (JSON.stringify(rows).length > 24) {
          // console.log(JSON.stringify(rows));
          this.setState((prevState) => ({
            dadesTaula: [...prevState.dadesTaula, JSON.stringify(rows)],
          }));
        }
      });
    });
  };

  borrarDades = () => {
    db.transaction((tx) => {
      try {
        // console.log("Borrant dades.");
        tx.executeSql(
          "DELETE FROM items",
          [],
          (_, { rows }) => console.log(JSON.stringify(rows)),
          this.setState((prevState) => ({
            dadesTaula: [
              ...prevState.dadesTaula,
              "Totes les dades han estat borrades de la taula.",
            ],
          }))
        );
      } catch (error) {
        console.log(error);
        throw Error(`Error al borrar dades ${error}`);
      }
    });
  };

  render() {
    return (
      <View>
        <View style={estils.pagina}>
          <Text style={estils.sqliteTitol}> SQLITE </Text>
        </View>

        <View>
          <Button title="Insertar dades" onPress={this.insertarDades}>
            Insertar dades
          </Button>
          <Button title="Mostrar dades" onPress={this.mostrarDades}>
            Mostrar dades
          </Button>
          <Button title="Modificar dades" onPress={this.modificarDades}>
            Modificar dades
          </Button>
          <Button title="Borrar dades" onPress={this.borrarDades}>
            Borrar dades
          </Button>
        </View>

        <View style={estils.resultatTaula}>
          {this.state.dadesTaula.map(
            (item, index) => (
              <Text key={index}>{item}</Text>
            ),

            // Clear the previous state.
            (this.state.dadesTaula = "")
          )}
        </View>
      </View>
    );
  }
}
