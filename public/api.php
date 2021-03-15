<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

//GET Request for specific search
$app->get('/{dataType}/{tableValue}/search', function (Request $request, Response $response, array $args) 
{
	$databaseName = "trumpapi";

	$dataType = $request->getAttribute('dataType');
	$tableValue =$request->getAttribute('tableValue');

	$id= $request->getParam('id');
	$person= $request->getParam('person');
	$text= $request->getParam('text');
	$date= $request->getParam('date');

	require_once ('GET.php');
	$get = new GET();
	$whereValue = $get->CreateWhereStatement($tableValue, $id, $person, $text, $date);
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
$app->delete('/{table}/delete', function (Request $request, Response $response) 
{	
	$databaseName = "trumpapi";

	$tableValue = $request->getAttribute('table');

	$id= $request->getParam('id');
	$person= $request->getParam('person');
	$text= $request->getParam('text');
	$date= $request->getParam('date');
	
	require "delete.php";
	
	$delete = new DELETE();
	$whereValue = $delete->CreateWhereStatement($tableValue, $id, $person, $text, $date);
	$delete->DeleteData($databaseName, $tableValue, $whereValue);	
});

//PUT Request 
$app->put('/{table}/update', function (Request $request, Response $response) 
{
	$databaseName = "trumpapi";

	$table = $request->getAttribute('table');

	$setValue= $request->getParam('set');
	$whereValue= $request->getParam('where');

	require "put.php";

	$put = new PUT();
	$setValue = $put->CreateSet($setValue);
	$whereValue = $put->CreateWhere($whereValue);
	$put->UpdateData($databaseName, $table, $setValue, $whereValue);	
});

//POST Request 
$app->post('/{table}/insert', function (Request $request, Response $response) 
{
	$databaseName = "trumpapi";

	$table = $request->getAttribute('table');

	$id= $request->getParam('id');
	$person= $request->getParam('person');
	$text= $request->getParam('text');
	$date= $request->getParam('date');

	require "post.php";
	
	$post = new POST();
	$post->InsertData($databaseName, $table, $id, $person, $text, $date);		
});

$app->run();
?>