Descripcion de archivos:

Vista:

- cabecera:
    Crea la cabecera de las paginas. Se incluye en las visibles para mostrarla

- landing:
    Es la pagina basica a la que se llega al acceder a la web

- leer:
    Incluye el archivo listadoHistorias para mostrar las historias disponibles

- login:
    Pagina con los campos necesarios para inciar sesion, y un enlace al registro de nuevos

- registroUsu:
    Pagina con los campos necesarios para registrar un nuevo usuario. Envia los datos a nuevoUsu para añadirlo a la BBDD

- menuHistoria:
    Pagina que muestra los datos de una historia seleccionada y permite iniciar la lectura de esta

- usuario:
    Menu de usuario

- verHistoria:
    Muestra la pagina de la historia en la que se encuentra el usuario, generando las opciones necesarias.     -- Igual se revisa sacando codigo a la parte de modelo --

- personajes:
    Muestra una lista de los personajes del usuario, y lleva a la pagina de creacion de estos



Modelo:

- conexion:
    Crea la conexion a la BBDD. Se incluye en toda las pagians donde se vayan a hacer consultas

- listadoHistorias:
    Obtiene todas las historias y las muestra donde se incluya.     -- Falta añadir funciones como busqueda por nombre, etc --

- listadoPersonajes:
    Obtiene todos los personajes del usuario si esta registrado y las muestra donde se incluya.     -- Falta añadir funciones como busqueda por nombre, etc --

- nuevoUsu:
    Recibe los datos de registroUsu, y si no hay problemas añade el usuario a la BBDD

- verificarLogin:
    Comprueba que los datos de login sean correctos, y de serlo, inicia la sesion con estos