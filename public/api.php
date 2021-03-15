<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

//GET Request for specific search
$app->get('/{dataType}/{tableValue}/{idValue}', function (Request $request, Response $response, array $args) 
{
	$databaseName = "trumpapi";

	$dataType = $request->getAttribute('dataType');
	$tableValue = $request->getAttribute('tableValue');
	$id = $request->getAttribute('idValue');

	require_once ('GET.php');
	$get = new GET();
	$whereValue = $get->CreateWhereStatement($tableValue, $id);
	$get->GetData($dataType, $databaseName, "*", $tableValue, $whereValue);	
});

//GET Request for getting all of table
$app->get('/{dataType}/{tableValue}', function (Request $request, Response $response, array $args) 
{
	$databaseName = "trumpapi";

	$dataType = $request->getAttribute('dataType');
	$tableValue =$request->getAttribute('tableValue');

	require_once ('GET.php');
	$get = new GET();
	$get->GetData($dataType, $databaseName, "", $tableValue, "");	
});

//DELETE Request 
$app->delete('/{table}/{idValue}', function (Request $request, Response $response) 
{	
	$databaseName = "trumpapi";

	$tableValue = $request->getAttribute('table');
	$id = $request->getAttribute('idValue');
	
	require "delete.php";
	
	$delete = new DELETE();
	$whereValue = $delete->CreateWhereStatement($tableValue, $id);
	$delete->DeleteData($databaseName, $tableValue, $whereValue);	
});

//PUT Request 
$app->put('/{table}/{idValue}', function (Request $request, Response $response) 
{
	$databaseName = "trumpapi";

	$table = $request->getAttribute('table');
	$body = $request->getBody();
	$id = $request->getAttribute('idValue');

	require "put.php";

	$put = new PUT();
	$put->UpdateData($databaseName, $table, $id, $body);	
});

//POST Request 
$app->post('/{table}', function (Request $request, Response $response) 
{
	$databaseName = "trumpapi";

	$table = $request->getAttribute('table');
	$body = $request->getBody();

	require "post.php";
	
	$post = new POST();
	$post->InsertData($databaseName, $table, $body);		
});

$app->run();
?>