<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello, worl from image");

    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->get('/suma/{operandos}', function (Request $request, Response $response, array $args) {
    $operandos = $args['operandos'];
	try{
		if(!strpos($operandos, ":")){
			throw new Exception("No podemos operar con un solo número: {$operandos}");
		}
		$arOperandos = explode(":", $operandos);
		$stOperandos = str_replace(":", " + ", $operandos);
		$suma = 0;
		foreach ($arOperandos as $key => $value) {
			$suma += $value;
		}
	    $response->getBody()->write("Sumar: $stOperandos => $suma");
	}catch (Exception $e){
		$response->getBody()->write("ERROR: Ha ocurrido un error: {$e->getMessage()}");
	}
    return $response;
});

$app->get('/resta/{operandos}', function (Request $request, Response $response, array $args) {
    $operandos = $args['operandos'];
	try{
		if(!strpos($operandos, ":")){
			throw new Exception("No podemos operar con un solo número: {$operandos}");
		}
		$arOperandos = explode(":", $operandos);
		$stOperandos = str_replace(":", " - ", $operandos);
		$resta = 0;$i = 0;
		foreach ($arOperandos as $key => $value) {
			if($i == 0){
				$resta = $value;
			}else{
				$resta -= $value;
			}
			$i++;
		}
	    $response->getBody()->write("Restar: $stOperandos => $resta");
	}catch (Exception $e){
		$response->getBody()->write("ERROR: Ha ocurrido un error: {$e->getMessage()}");
	}
    return $response;
});

$app->get('/multiplica/{operandos}', function (Request $request, Response $response, array $args) {
    $operandos = $args['operandos'];
	try{
		if(!strpos($operandos, ":")){
			throw new Exception("No podemos operar con un solo número: {$operandos}");
		}
		$arOperandos = explode(":", $operandos);
		$stOperandos = str_replace(":", " * ", $operandos);
		$multiplica = 0;$i = 0;
		foreach ($arOperandos as $key => $value) {
			if($i == 0){
				$multiplica = $value;
			}else{
				$multiplica = $multiplica * $value;
			}
			$i++;
		}
	    $response->getBody()->write("Multiplicar: $stOperandos => $multiplica");
	}catch (Exception $e){
		$response->getBody()->write("ERROR: Ha ocurrido un error: {$e->getMessage()}");
	}
    return $response;
});

$app->get('/divide/{operandos}', function (Request $request, Response $response, array $args) {
    $operandos = $args['operandos'];
	try{
		if(!strpos($operandos, ":")){
			throw new Exception("No podemos operar con un solo número: {$operandos}");
		}
		$arOperandos = explode(":", $operandos);
		if(count($arOperandos)!=2){
			throw new Exception("Para dividir solo se permiten 2 operandos: {$operandos}");
		}
		$stOperandos = str_replace(":", " / ", $operandos);
		if($arOperandos[1] == 0){
			throw new Exception("Para dividir el divisor debe ser diferente de cero: {$stOperandos}");
		}
		$stOperandos = str_replace(":", " / ", $operandos);
		$divide = $arOperandos[0]/$arOperandos[1];
		
	    $response->getBody()->write("Dividir: $stOperandos => $divide");
	}catch (Exception $e){
		$response->getBody()->write("ERROR: Ha ocurrido un error: {$e->getMessage()}");
	}
    return $response;
});

$app->run();
