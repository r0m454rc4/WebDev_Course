import React, { useState } from "react";
import { NavigationContainer } from "@react-navigation/native";
import { createStackNavigator } from "@react-navigation/stack";

import { Home } from "./app/views/Home";
import { Exercici1 } from "./app/views/Exercici1";
import { Exercici2 } from "./app/views/Exercici2";

import { M09_Sqlite } from "./app/views/M09_Sqlite";

/**
 * Modificacions al component principal d'entrada de React
 * per incloure encaminaments, però no components
 * @version 1.0 28.03.2020
 * @author sergi.grau@fje.edu
 */

const Stack = createStackNavigator();

function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator initialRouteName="Home">
        <Stack.Screen name="Home" component={Home} />
        <Stack.Screen name="Exercici1" component={Exercici1} />
        <Stack.Screen name="Exercici2" component={Exercici2} />

        <Stack.Screen name="M09_Sqlite" component={M09_Sqlite} />
      </Stack.Navigator>
    </NavigationContainer>
  );
}

export default App;
