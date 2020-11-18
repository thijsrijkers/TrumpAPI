<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

//GET Request 
$app->get('/get/{databasename}/{function}/{userinfo}', function (Request $request, Response $response, array $args) 
{
	//Maakt variablen uit info van de URL
	$function = $request->getAttribute('function');
	$userinfo = $request->getAttribute('userinfo');
	$databaseName = $request->getAttribute('databasename');
	$table = "";

	require "get.php";

	//Kijkt als function overheen komt
	if($function == "GetData" )
	{
		$g = new GET();
		$g->GetData($databaseName, $table);	
	}
});

//DELETE Request 
$app->delete('/delete/{userinfo}', function (Request $request, Response $response) 
{	
	//Maakt variablen uit info van de URL
	$userinfo = $request->getAttribute('userinfo');
	$databaseName = $request->getAttribute('databasename');
	$table = "";

	require "delete.php";
	
	//Kijkt als function overheen komt
	if($function == "DeleteData" )
	{
		$g = new DELETE();
		$g->DeleteData($databaseName, $table);	
	}
});

//PUT Request 
$app->put('/put/{userinfo}/{remove}', function (Request $request, Response $response) 
{
	//Maakt variablen uit info van de URL
	$userinfo = $request->getAttribute('userinfo');
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
$app->post('/post/{userinfo}', function (Request $request, Response $response) 
{
	//Maakt variablen uit info van de URL
	$userinfo = $request->getAttribute('userinfo');
	$databaseName = $request->getAttribute('databasename');
	$table = "";

	require "post.php";
	
	//Kijkt als function overheen komt
	if($function == "InsertData" )
	{
		$g = new POST();
		$g->InsertData($databaseName, $table);	
	}	
});


echo "BRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR";

$app->run();
?>