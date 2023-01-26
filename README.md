# Sortealotodo

![num-premiado](https://user-images.githubusercontent.com/6242827/214825485-c0c3d33a-312a-4bf8-856c-b42a94539713.png)

Un pequeño programa para <b>crear tu propio sistema con el que realizar sorteos</b> entre diferentes números, que se ha creado con HTML, CSS, MYSQL Y JQUERY.

## Instalación

Para instalar este sencillo programa, solo será necesario clonar este repositorio, o descargarse el código, y pegarlo dentro de nuestro servidor. Tendremos que crear una base de datos MYSQL en nuestro servidor, y llamarla "rifa". Despues solo será necesario importar el archivo que se encuentra en la carpeta SQL que nos habremos descargado con el código.

Tras esto, solo es necesario configurar los datos de acceso a la base de datos en el archivo que encontraremos dentro de la carpeta "conexion".

Una vez realizados todos estos pasos, basta con iniciar el servidor y lanzar el archivo index.php en nuestro navegador web. Lo que nos llevará a ver una pantalla como la siguiente:

![sortealotodo](https://user-images.githubusercontent.com/6242827/214824103-122bbc68-b5a6-4453-8c83-31a15d2b46c1.png)

Como se puede ver en la anterior captura, aquí aparecerán números hasta el 16. Si pulsamos sobre el botón Jugar que aparece en la parte inferior, empezará el sorteo. Aquí encontraremos una opción con la que "incluir o no" en el sorteo los números premiados en los sorteos anteriores. Además también nos mostrará cuantos tickets jugadores entran en el sorteo, los cuales se irán descontando a medida que se realicen sorteos. Cuando se seleccione el número premiado, veremos una ventana como la que se puede ver en la primera de las capturas que se muestran aquí.

Si quieres ver el listado completo de los números que entran en el sorteo, basta con pulsar sobre el enlace "Jugador@s" que encontraremos en el menú superior.

![tickets-nuevos](https://user-images.githubusercontent.com/6242827/214826129-28544946-7202-4693-b7c5-955b9c82df85.png)

En este listado, veremos que cada ticket de participante incluye dos botones. Uno con el que eliminar el ticket y otro con el que podremos editar el contenido de ese ticket. Además, en esta página también podremos añadir nuevos tickets, pulsando en el botón "Añadir ticket".

![add-nuevo-ticket](https://user-images.githubusercontent.com/6242827/214826534-16f0c511-f51e-4a6c-830a-8a81b0b7c819.png)

Todos los premiados en los sorteos, van a aparecer en la sección "Premios", que encontraremos en el menú superior.

![premios](https://user-images.githubusercontent.com/6242827/214826760-941f7901-7150-4c0c-870f-6b21086e2c53.png)

En el momento que queramos volver a empezar los sorteos, podemos pulsar sobre el botón "Eliminar todos los registros" que encontraremos en la parte inferior de esta página. Haciendo esto todos los números volverán a aparecer en la sección "Sorteo".
