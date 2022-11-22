<?php

declare(strict_types=1);
/*001server.php: igual que el ejemplo visto en los apuntes, muestra los valores de 
$_SERVER al ejecutar un script en tu ordenador.
Prueba a pasarle parámetros por GET (y a no pasarle ninguno).*/

echo $_SERVER["PHP_SELF"] . "<br>"; //Muestra el nombre del archivo de script que se ejecuta
echo $_SERVER["SERVER_SOFTWARE"] . "<br>"; //Devuelve la cadena de id del servidor que viene en la cabecera de respuesta
echo $_SERVER["SERVER_NAME"] . "<br>"; // Nombre del host del servidor donde se ejecuta el script
echo $_SERVER["REQUEST_METHOD"] . "<br>"; //Método de petición (GET, POST, HEAD, PUT)
echo $_SERVER["REQUEST_URI"] . "<br>"; //La URI con la que se accedió a la página
echo $_SERVER["QUERY_STRING"] . "<br>"; //Devuelve la cadena de la petición de la página

/*El resultado es el siguiente: CON PARÁMETRO: 
/ud3_php_WEB/001/001server.php
Apache/2.4.53 (Win64) OpenSSL/1.1.1n PHP/8.1.6
localhost
GET
/ud3_php_WEB/001/001server.php?parametro=hola
parametro=hola
*/

/*Sin parámetro: 
/ud3_php_WEB/001/001server.php
Apache/2.4.53 (Win64) OpenSSL/1.1.1n PHP/8.1.6
localhost
GET
/ud3_php_WEB/001/001server.php*/

/*La diferencia está en el QUERY_STRING, que devuelve la cadena de la petición de la página*/

/*Prepara un formulario (001post.html) que haga un envío por POST y compruébalo de 
nuevo.*/

/*El resultado es: 
/ud3_php_WEB/001/001server.php
Apache/2.4.53 (Win64) OpenSSL/1.1.1n PHP/8.1.6
localhost
POST
/ud3_php_WEB/001/001server.php

Vemos que ha cambiado el valor de REQUEST_METHOD. Ha pasado de GET a POST*/

/*Crea una página (001enlace.html) que tenga un enlace a 001server.php y comprueba 
el valor de HTTP_REFERER.*/
echo $_SERVER["HTTP_REFERER"];

/*Cuando entro por el enlace del html aparece: 
http://localhost/ud3_php_WEB/001/001enlace.html

HTTP_REFERER devuelve la dirección de la página que emplea el user agent para la página actual
*/
