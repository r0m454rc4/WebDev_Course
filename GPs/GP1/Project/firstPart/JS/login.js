window.onload = () => {
  document.getElementById("botoEnvia").onclick = () => {
    let email = document.getElementById("email").value;
    let passwd = document.getElementById("passwd").value;

    localStorage.setItem("userData", JSON.stringify({ email, passwd }));

    console.log(`Email: ${email}, passwd: ${passwd}`);
  };
  // comprobar los datos del local storage
  var userDataString = localStorage.getItem("userData");

  if (userDataString) {
    var userData = JSON.parse(userDataString);
    var emailRecuperado = userData.email;
    var passwdRecuperado = userData.passwd;

    console.log(
      `Email recuperado: ${emailRecuperado}, passwd recuperada: ${passwdRecuperado}`
    );
  } else {
    console.log("No hay datos de usuario almacenados en localStorage.");
  }
};
