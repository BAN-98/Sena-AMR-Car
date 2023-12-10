/* Inicializacion de Modulo de funciones  */
const requestFunctions = {
  /* Funcion para las peticiones parametros url del controlador y formulario de carga de datos */
  request: async (url, formData) => {
    /* Bloque try cath para el manejode de errores */
    try {
      const response = await fetch(url, {
        method: "POST",
        body: formData,
      });

      /* Validacion de las respuestas */
      if (!response.ok) {
        throw new Error("Error en la autenticación: " + response.status);
      }

      /* Retornadode respuestas en formato JSON */
      return await response.json();
    } catch (error) {
      throw new Error("Error en la solicitud: " + error.message);
    }
  },

  /* Funcion para la mostrar mensajes depnediendo la respuesta de las peticiones al servidor */
  showResponse: (message) => {
    /* Validacion de los mensajes y mostrado de los mensajes */
    if (message.success) {
      Swal.fire({
        title: "Good job!",
        text: `${message.success}`,
        icon: "success",
      }).then((result) => {
        /* Redireccionamiento segun el contenido del mensaje */
        result.value && message.redirection
          ? (window.location.href = message.redirection)
          : "";
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: `${message.err}`,
      });
    }
  },

  renderView: async (viewName) => {
    try {
      let element = await fetch(`../Controllers/main.php?action=${viewName}`, {
        method: "GET",
      });

      /* Validacion de las respuestas */
      if (!element.ok) {
        throw new Error("Error en la autenticación: " + response.status);
      }

      /* Retornadode respuestas en formato JSON */
      return await element.json();
    } catch (error) {
      throw new Error("Error en la solicitud: " + error.message);
    }
  },
};

export default requestFunctions;
