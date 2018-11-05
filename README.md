# calculadoradocker
Implementación de un servicio de calculadora en Docker y soportado en Slim Framework de php

USO:

localhost/{operacion}/{operador1}/{operador2} <br>

http://localhost/suma/1/6 <br>
http://localhost/resta/24/14  <br>
http://localhost/multiplica/1/4 <br>
http://localhost/divide/10/2 <br>

Configuración:

1- Docker <br>
1.1 Configurar ambiente Docker según: https://docs.docker.com/get-started/  <br>
1.2 Crear un directorio para el proyecto, para el caso es: php-slim    <br>
1.3 En Docker Store, buscar php y elegir una imagen que contenga apache, para el caso hemos usado php:apache , así:  <br>
     docker run --rm -p 8000:80 -v $(pwd):/var/www/html php:apache   <br>
1.4 Con la imagen php:apache ya en el repositorio, creamos el Dockerfile en el directorio del paso 1.2  <br>
<br>
2- Slim <br>
2.1 Adicionamos al directorio del proyecto el archivo configure.json <br>
2.2 Creamos, en el directorio del proyecto, el archivo index.php <br>
2.3 Adicionamos, en el mismo directorio, el archivo .htaccess <br>
<br>
3 Compilación:<br>
3.1 Compilamos el proyecto:<br>
      docker build -t rgomezcuervo/calculadora:2.0 .   <br>
3.2 Corremos el proyecto:<br>
      docker run --rm -v $(pwd):/var/www/html/ -v /var/www/html/vendor/ -p 80:80 rgomezcuervo/calculadora:2.0<br>
