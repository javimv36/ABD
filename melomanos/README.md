# Práctica Ampliación Bases de Datos
## Universidad Complutense de Madrid
## Javier Martín Villarreal
---

# Memoria práctica individual

La práctica consiste en realizar una web de mensajería para melómanos. En la web los usuarios registrados y logueados, podrán enviar mensajes públicos, mensajes a un sólo usuario del sistema y mensajes a los grupos a los que pertenezca.

Estos grupos, vendrán definidos por un tipo de música y un rango de edades.

Los usuarios administradores podrán crear nuevos grupos desde una página a parte.

## 1. Arquitectura de la aplicación

La aplicación web se ejecuta sobre un servidor apache conectada a una base de datos MySQL mediante PHP con consultas que recogen los datos de la base de datos y generan el HTML.

Cada página de la web, abre y cierra la conexión con la base de datos una sola vez para evitar esperas innecesarias.

La web requiere de login para funcionar, éste login comprueba si se han introducido bien los datos de usuario y contraseña, el campo contraseña se comprueba con su hash MD5.

Si no se dispone de una cuenta, el usuario se puede registrar en la página de registro aportando al sistema un nombre de usuario, una contraseña, su edad y podrá elegir entre los tipos de música de los que existan grupos en la base de datos (el sistema le añadirá a los que son posibles según su edad), además el usuario deberá adjuntar una foto en JPG o PNG que se almacenará en la ruta img/users/[nombre de usuario].png.

Una vez logueado, se muestra una barra de menú superior con las opciones que dispone el usuario (distintas si es administrador, se ha logueado el usuario o no), un cuerpo central con una barra lateral izquierda en las páginas que es necesario y un pie de página con los datos del alumno.

Para navegar por la web se usará el menú superior.

En la variable $_SESSION se almacena el nombre de usuario, si es administrador o no lo es y se pone a verdadero la variable login para saber que el usuario se ha logueado correctamente.


## 2. Diseño de la base de datos


La base de datos consta de dos entidades: usuarios y grupos y dos relaciones: mensaje y pertenece.

![Esquema relacional](https://github.com/javimv36/ABD/blob/master/melomanos/img/files/relacion.png?raw=true)

Las entidades usuarios y grupos tienen la siguiente estructura:

- Usuarios:
    - User: nombre del usuario y clave privada de la entidad.
    - Pass: contraseña almacenada en MD5 para mejorar la seguridad.
    - Edad: número entero con la edad del usuario.
    - Admin: booleano para identificar si el usuario es administrador o no.
- Grupos:
    - Id: número entero clave primaria del grupo, podría haber dos grupos distintos con el mismo tipo de música y rangos de edad. Se autoincrementa.
    - Tipo: enumerado con los distintos tipos de música que se pueden elegir para crear los grupos. Identifica el tipo de música de cada grupo.
    - Min y max: enteros que determinan la edad mínima y máxima de los usuarios que pueden pertenecer al grupo.

Las relaciones mensajes y pertenece tienen la siguiente estructura:

- Mensajes:
    - Id:  número entero clave primaria del mensaje, un mismo usuario puede enviar mensajes al mismo usuario y al mismo grupo. Se autoincrementa.
    - Mensaje: atributo de la entidad de tipo longtext en el que se almacena el contenido del mensaje.
    - Origen: referencia a la clave primaria nombre del usuario que envía el mensaje.
    - Destino: referencia a la clave primaria  nombre del usuario que recibe el mensaje. Se deja vacío si el mensaje no es a un usuario.
    - idGrupo: referencia al atributo id de una tupla de la entidad grupos. Se deja a 0 si no es para un grupo.

* Si no hay destino y el grupo es 0, el mensaje se muestra como público.

- Pertenece:
    - User: referencia a la clave primaria del usuario. Clave primaria de la relación.
    - Grupo: referencia a la clave primaria de un grupo. Clave primaria de la relación.
* En el proceso de registro, se insertan las tuplas que cumplan los requisitos de edad y gustos del usuario.

### Ejemplo de contenido de las tablas

Usuarios: 
![Imagen de la tabla usuarios](https://github.com/javimv36/ABD/blob/master/melomanos/img/files/tablaUser.png =250x)

Grupos:
![Imagen de la tabla grupos](https://github.com/javimv36/ABD/blob/master/melomanos/img/files/tablaGrupos.png?raw=true =250x)

Pertenece:
![Imagen de la tabla pertenece](https://github.com/javimv36/ABD/blob/master/melomanos/img/files/tablaPertenece.png?raw=true =250x)

Mensajes:
![Imagen de la tabla mensajes](https://github.com/javimv36/ABD/blob/master/melomanos/img/files/tablaMensajes.png?raw=true =250x)