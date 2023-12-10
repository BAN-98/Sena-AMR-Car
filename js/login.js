/* Importacion del modulo de funciones*/
import requestFunctions from "./Functions.js"; // Asegúrate de que la ruta sea correcta y refleje la ubicación real de tu archivo Functions.js

/* Lectura del evento submit y ejecucion de funciones asincronas */
document.getElementById("login").addEventListener("submit", async (e) => {
  e.preventDefault();

  try {
    /* Creacion del objeto formData con un map dentro que tiene valor/llave de los datos del formulario */
    let formData = new FormData(e.target);

    /* Peticion y devuelta de mensaje */
    let message = await requestFunctions.request(
      "../Controllers/main.php?action=login",
      formData
    );

    /* Mostrado del mensaje */
    requestFunctions.showResponse(message); 
  } catch (error) {
    console.error("Error al iniciar sesión:", error.message);
  }
});
