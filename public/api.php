<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

//GET Request 
$app->get('/{dataType}/{tableValue}', function (Request $request, Response $response, array $args) 
{
	$databaseName = "trumpapi";

	$dataType = $request->getAttribute('dataType');
	$tableValue =$request->getAttribute('tableValue');

	$selectValue = $request->getParam('search');

	$id= $request->getParam('id');
	$person= $request->getParam('persons');
	$text= $request->getParam('texts');
	$date= $request->getParam('dates');

	require_once ('GET.php');
	$get = new GET();
	$whereValue = $get->CreateWhereStatement($tableValue, $id, $person, $text, $date);
	$get->GetData($dataType, $databaseName, $selectValue, $tableValue, $whereValue);	
});

//DELETE Request 
$app->delete('/{table}?{userInfo}', function (Request $request, Response $response) 
{	
	//Maakt variablen uit info van de URL
	$userInfo = $request->getAttribute('userInfo');
	$table = $request->getAttribute('table');

	require "delete.php";
	
	$g = new DELETE();
	$g->DeleteData($databaseName, $table, $userInfo);	
});

//PUT Request 
$app->put('/{table}?{setValue}/{whereValue}', function (Request $request, Response $response) 
{
	//Maakt variablen uit info van de URL
	$table = $request->getAttribute('table');
	$setValue = $request->getAttribute('setValue');
	$whereValue = $request->getAttribute('whereValue');

	require "put.php";

	$g = new PUT();
	$g->UpdateData($databaseName, $table, $setValue, $whereValue);	
});

//POST Request 
$app->post('/{table}?{userInfo}', function (Request $request, Response $response) 
{
	//Maakt variablen uit info van de URL
	$userInfo = $request->getAttribute('userInfo');
	$table = $request->getAttribute('table');

	require "post.php";
	
	$g = new POST();
	$g->InsertData($databaseName, $table, $userInfo);		
});

$app->run();
?>