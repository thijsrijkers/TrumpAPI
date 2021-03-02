<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

//GET Request 
$app->get('/get/{databasename}/{selectValue}/{tableValue}/{whereValue}', function (Request $request, Response $response, array $args) 
{
	//Maakt variablen uit info van de URL
	$tableValue = $request->getAttribute('tableValue');
	$selectValue = $request->getAttribute('selectValue');
	$whereValue = $request->getAttribute('whereValue');
	$databaseName = $request->getAttribute('databasename');
	
	require "get.php";

	$g = new GET();
	$g->GetData($databaseName, $selectValue, $tableValue, $whereValue);	

});

//DELETE Request 
$app->delete('/delete/{databasename}/{table}/{userInfo}', function (Request $request, Response $response) 
{	
	//Maakt variablen uit info van de URL
	$userInfo = $request->getAttribute('userInfo');
	$databaseName = $request->getAttribute('databasename');
	$table = $request->getAttribute('table');

	require "delete.php";
	
	$g = new DELETE();
	$g->DeleteData($databaseName, $table, $userInfo);	
});

//PUT Request 
$app->put('/put/{databasename}/{table}/{setValue}/{whereValue}', function (Request $request, Response $response) 
{
	//Maakt variablen uit info van de URL
	$databaseName = $request->getAttribute('databasename');
	$table = $request->getAttribute('table');
	$setValue = $request->getAttribute('setValue');
	$whereValue = $request->getAttribute('whereValue');

	require "put.php";

	$g = new PUT();
	$g->UpdateData($databaseName, $table, $setValue, $whereValue);	
});

//POST Request 
$app->post('/post/{databasename}/{table}/{userInfo}', function (Request $request, Response $response) 
{
	//Maakt variablen uit info van de URL
	$userInfo = $request->getAttribute('userInfo');
	$databaseName = $request->getAttribute('databasename');
	$table = $request->getAttribute('table');

	require "post.php";
	
	$g = new POST();
	$g->InsertData($databaseName, $table, $userInfo);		
});

$app->run();
?>