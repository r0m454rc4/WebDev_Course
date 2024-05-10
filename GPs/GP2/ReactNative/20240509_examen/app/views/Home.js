import React from "react";
import { StyleSheet, Button, Text, View } from "react-native";

/**
 * Classe que hereta de Component i que implementa un component
 * independent en l'app. És un component bàsic sense estils
 * Fa servir routing
 * @version 1.0 23.03.2020
 * @author sergi.grau@fje.edu
 */

const estils = StyleSheet.create({
  contenidor: {
    flex: 1,
    backgroundColor: "#0f0",
  },
});

export class Home extends React.Component {
  render() {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <Text>Benvingut a streaming clot!</Text>

        <Button
          title="Exercici 1"
          onPress={() =>
            this.props.navigation.navigate("Exercici1", {
              nom: "Roma Sarda Casellas",
              exercici: "Exercici 1",
            })
          }
        />

        <Button
          title="Exercici 2"
          onPress={() =>
            this.props.navigation.navigate("Exercici2", {
              nom: "Roma Sarda Casellas",
              exercici: "Exercici 2",
            })
          }
        />
      </View>
    );
  }
}
