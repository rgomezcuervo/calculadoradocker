# calculadoradocker
Implementación de un servicio de calculadora en Docker y soportado en Slim Framework de php

USO:

localhost/{operacion}/operador1:operador2[:operador3[:operador4[:operadorN]]] <br>

http://localhost/suma/1:0:5:6 <br>
http://localhost/resta/24:5:14  <br>
http://localhost/multiplica/1:2:3:4 <br>
http://localhost/divide/10:2 <br>

Configuración:

1- Docker 
1.1 Configurar ambiente Docker según: https://docs.docker.com/get-started/
1.2 Crear un directorio para el proyecto, para el caso es: php-slim
1.3 En Docker Store, buscar php y elegir una imagen que contenga apache, para el caso hemos usado php:apache , así:
     docker run --rm -p 8000:80 -v $(pwd):/var/www/html php:apache
1.4 Con la imagen php:apache ya en el repositorio, creamos el Dockerfile en el directorio del paso 1.2

2- Slim
2.1 Adicionamos al directorio del proyecto el archivo configure.json
2.2 Creamos, en el directorio del proyecto, el archivo index.php

3 Compilación:
3.1 Compilamos el proyecto:
      docker build -t php_slim .
3.2 Corremos el proyecto:
      docker run --rm -v $(pwd):/var/www/html/ -v /var/www/html/vendor/ -p 80:80 php_slim
