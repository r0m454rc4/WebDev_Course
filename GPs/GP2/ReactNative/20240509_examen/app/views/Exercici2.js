import React from "react";
import { StyleSheet, Button, Text, View } from "react-native";
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
    marginTop: 100,
    marginLeft: 60,
    marginRight: 60,
  },
});

export class Exercici2 extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      dadesTaula: [],
    };

    // Here I open the db.
    db = SQLite.openDatabase("daw2.db");
    this.insertarPelis();
    this.mostrarPelis();
  }

  insertarPelis = () => {
    db.transaction((tx) => {
      try {
        tx.executeSql(
          // The name of the table is items.
          "CREATE TABLE IF NOT EXISTS pelis (nomPeli, director TEXT, any TEXT);"
        );
        // console.log("Taula creada");

        tx.executeSql(
          "INSERT INTO pelis (nomPeli, director, any) VALUES ('Corpse Bride', 'Tim Burton', '2005')"
        );
        tx.executeSql(
          "INSERT INTO pelis (nomPeli, director, any) VALUES ('Corpse Bride', 'Tim Burton', '2005')"
        );
        tx.executeSql(
          "INSERT INTO pelis (nomPeli, director, any) VALUES ('LOTR: Fellowship of the ring', 'Peter Jackson', '2001')"
        );

        console.log("Dades pelis");

        tx.executeSql("select * from pelis", [], (_, { rows }) =>
          console.log(JSON.stringify(rows))
        );

        // console.log("Dades insertades a la taula.");

        // this.setState((prevState) => ({
        //   dadesTaula: [...prevState.dadesTaula, "Dades insertades a la taula."],
        // }));
      } catch (error) {
        console.log(error);
        throw Error(`Error a l'insertar dades ${error}`);
      }
    });
  };

  mostrarPelis = () => {
    db.transaction((tx) => {
      try {
        console.log("Dades de la taula:");
        tx.executeSql("SELECT * FROM pelis", [], (_, { rows }) => {
          // Here I have 24 as it's the default size of rows when it's empty, can be checked with: JSON.stringify(rows).length.
          console.log(JSON.stringify(rows).length);
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

  render() {
    return (
      <View style={{ flex: 1, alignpelis: "center", justifyContent: "center" }}>
        <Text>Autor {JSON.stringify(this.props.route.params.nom)}</Text>
        <Text>Exercici {JSON.stringify(this.props.route.params.exercici)}</Text>

        <View style={estils.resultatTaula}>
          {this.state.dadesTaula.map(
            (item, index) => (
              <Text key={index}>{item}</Text>
            ),

            // Clear the previous state.
            (this.state.dadesTaula = "")
          )}
        </View>

        <Button
          title="Tornar a Home"
          onPress={() => this.props.navigation.navigate("Home")}
        />
      </View>
    );
  }
}
