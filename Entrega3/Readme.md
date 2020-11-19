## Entrega 3
### Grupos: 2 y 129
### Integrantes:
* Christian Klempau
* Benjamín Lillo
* Eduardo Illanes
* María José Fontanet

[Link página web](http://codd.ing.puc.cl/~grupo2/index.php)

- - - -
**Inicio de sesión**
* `index.php ` o al hacer click "Cerrar sesión"
* Usuario **normal**:
-- Pasaporte: **pasaporte-pedrito**
-- Clave: **123456**
* Usuario **Capitán**:
-- Pasaporte: **O26876875**
-- Clave: **P36OEZHE**
* Usuario **Jefe**:
-- Pasaporte: **41966463-4**
-- Clave: **eYAUBkxN**

**Registro**
* `register.php` o al hacer click "Registrarse"
* Debe contener un pasaporte que **no** exista en la BD
* Los usuarios creados por registro **siempre** son tipo=normal. Los jefes y capitanes fueron creados con anterioridad

**Información Personal**
* `profile.php` o al hacer click "Mi Perfil"
* Muestra el botón para cambiar la contraseña, que lleva a `cambiar_clave.php`
* Muestra toda la info del usuario SIEMPRE. Además:
* SI ES CAPITAN: datos solicitados a mostrar para un jefe **y el formulario/FUNCIONALIDAD ESPECIAL para crear un próximo itinerario** (fecha posterior a "hoy" y nombre del puerto atraque)
* SI ES JEFE: datos solicitados a mostrar para un jefe

**Navegación**
* `home.php` o botón "Inicio"
* Muestra todas las navieras con su nombre e id
* Muestra todos los puertos con nombre e id
* `nav_bar.php` es una barra de navegación que permanece a través de toda la interfaz
* `info_id.php`  se usa para obtener la información de un usuario dado su id.


el procedimiento almacenado se llama `fecha.sql`y está en `grupo2/`, y la tabla de usuarios está en `grupo2e3`.