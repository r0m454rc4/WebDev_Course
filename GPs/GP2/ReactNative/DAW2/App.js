import { StatusBar } from "expo-status-bar";
import { Button, StyleSheet, Text, View } from "react-native";

// Import created component.
import { Home } from "./app/views/Home";

export default function App() {
  return (
    <View style={styles.principal}>
      <Text style={styles.textos}>DAW2</Text>
      <Button title="Pulsa" onPress={() => alert("Pulsado")}>
        Pulsa
      </Button>

      {/* Use created component. */}
      <Home></Home>
      <StatusBar style="auto" />
    </View>
  );
}

const styles = StyleSheet.create({
  principal: {
    flex: 1,
    backgroundColor: "lightgrey",
    alignItems: "center",
    justifyContent: "center",
  },

  textos: {
    color: "red",
    fontWeight: "bold",
  },
});
