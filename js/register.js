/* Importacion del modulo de funciones*/
import requesFunctions from "./Functions.js";

/* Lectura del evento submit y ejecucion de funciones asincronas */
document.getElementById("register").addEventListener("submit", async (e) => {
  e.preventDefault();

  try {
    /* Creacion del objeto formData con un map dentro que tiene valor/llave de los datos del formulario */
    let formData = new FormData(e.target);

    /* Peticion y devuelta de mensaje */
    let message = await requesFunctions.request(
      "../Controllers/main.php?action=login",
      formData
    );
    
    /* Mostrado del mensaje */
    requesFunctions.showResponse(message);
  } catch (error) {
    console.error("Error al iniciar sesión:", error.message);
  }
});
