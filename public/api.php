<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

//GET Request 
$app->get('/get/{databasename}/{selectCount}/{tableCount}/{whereCount}', function (Request $request, Response $response, array $args) 
{
	//Maakt variablen uit info van de URL
	$tableCount = $request->getAttribute('tableCount');
	$selectCount = $request->getAttribute('selectCount');
	$whereCount = $request->getAttribute('whereCount');
	$databaseName = $request->getAttribute('databasename');

	require "get.php";

	$g = new GET();
	$g->GetData($databaseName, $selectCount, $tableCount, $whereCount);	

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
$app->put('/put/{userInfo}/{remove}', function (Request $request, Response $response) 
{
	//Maakt variablen uit info van de URL
	$userInfo = $request->getAttribute('userInfo');
	$databaseName = $request->getAttribute('databasename');
	$table = "";

	require "put.php";
	
	//Kijkt als function overheen komt
	if($function == "UpdateData" )
	{
		$g = new PUT();
		$g->UpdateData($databaseName, $table);	
	}
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