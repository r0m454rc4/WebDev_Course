import React from "react";
import { Button, Text, View, Image } from "react-native";

let dades = { nomPeli: "Corpse Bride", director: "Tim burton", any: "2005" };

export class Exercici1 extends React.Component {
  render() {
    return (
      <View style={{ flex: 1, alignItems: "center", justifyContent: "center" }}>
        <Text>Autor {JSON.stringify(this.props.route.params.nom)}</Text>
        <Text>Exercici {JSON.stringify(this.props.route.params.exercici)}</Text>

        <Image
          source={require("./img/cb.jpg")}
          style={{ width: 150, height: 200 }}
        />

        <Button
          title="Tornar a Home"
          onPress={() => this.props.navigation.navigate("Home")}
        />
      </View>
    );
  }
}
