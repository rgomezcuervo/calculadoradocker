<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

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

$app->get('/suma/{num1}/{num2}', function (Request $request, Response $response, array $args) {
    //$operandos = $args['operandos'];
    $op1 = $args['num1'];
	$op2 = $args['num2'];
	try{
		//if(!strpos($operandos, ":")){
		if((!$op1 || !$op2) && ($op1!==0 && $op2!==0)){
			throw new Exception("No podemos operar con un solo número: op1={$op1} op2={$op2}");
		}
		//$arOperandos = explode(":", $operandos);
		//$stOperandos = str_replace(":", " + ", $operandos);
		$suma = 0;
		$suma = $op1 + $op2;
		//foreach ($arOperandos as $key => $value) {
		//	$suma += $value;
		//}
	    $response->getBody()->write($suma);
	}catch (Exception $e){
		$response->getBody()->write("ERROR: Ha ocurrido un error: {$e->getMessage()}");
	}
    return $response;
});

$app->get('/resta/{num1}/{num2}', function (Request $request, Response $response, array $args) {
    $op1 = $args['num1'];
	$op2 = $args['num2'];
	try{
		if((!$op1 || !$op2) && ($op1!==0 && $op2!==0)){
			throw new Exception("No podemos operar con un solo número: op1={$op1} op2={$op2}");
		}
		$resta = $op1 - $op2;
		
		$response->getBody()->write($resta);
	}catch (Exception $e){
		$response->getBody()->write("ERROR: Ha ocurrido un error: {$e->getMessage()}");
	}
    return $response;
});

$app->get('/multiplica/{num1}/{num2}', function (Request $request, Response $response, array $args) {
    $op1 = $args['num1'];
	$op2 = $args['num2'];
	try{
		if((!$op1 || !$op2) && ($op1!==0 && $op2!==0)){
			throw new Exception("No podemos operar con un solo número: op1={$op1} op2={$op2}");
		}
		$multiplica = $op1 * $op2;
		$response->getBody()->write($multiplica);
	}catch (Exception $e){
		$response->getBody()->write("ERROR: Ha ocurrido un error: {$e->getMessage()}");
	}
    return $response;
});

$app->get('/divide/{num1}/{num2}', function (Request $request, Response $response, array $args) {
    $op1 = $args['num1'];
	$op2 = $args['num2'];
	try{
		//if((!$op1 || !$op2) && ( $op1!==0)){
		//	throw new Exception("No podemos operar con un solo número: op1={$op1} op2={$op2}");
		//}
		if($op2 == 0){
			throw new Exception("Para dividir el divisor debe ser diferente de cero: {$stOperandos}");
		}
		$divide = $op1/$op2;
		
	    $response->getBody()->write($divide);
	}catch (Exception $e){
		$response->getBody()->write("ERROR: Ha ocurrido un error: {$e->getMessage()}");
	}
    return $response;
});

$app->run();
