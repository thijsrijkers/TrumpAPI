<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

//GET Request for specific search
$app->get('/{tableValue}/{idValue}', function (Request $request, Response $response, array $args) 
{
	$databaseName = "trumpapi";

	$dataType = $request->getHeader('Accept');
	$tableValue = $request->getAttribute('tableValue');
	$id = $request->getAttribute('idValue');

	if($dataType[0] == 'application/json' || $dataType[0] == 'application/xml')
	{
		require_once ('GET.php');
		$get = new GET();
		$whereValue = $get->CreateWhereStatement($tableValue, $id);
		$get->GetData($dataType[0], $databaseName, "*", $tableValue, $whereValue);	
	}
});

//GET Request for getting all of table
$app->get('/{tableValue}', function (Request $request, Response $response, array $args) 
{
	$databaseName = "trumpapi";

	$dataType = $request->getHeader('Accept');
	$tableValue =$request->getAttribute('tableValue');

	if($dataType[0] == 'application/json' || $dataType[0] == 'application/xml')
	{
		require_once ('GET.php');
		$get = new GET();
		$get->GetData($dataType[0], $databaseName, "", $tableValue, "");	
	}
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

	$dataType = $request->getHeader('Content-Type');
	$table = $request->getAttribute('table');
	$body = $request->getBody();
	$id = $request->getAttribute('idValue');

	// if($dataType[0] == 'application/json')
	// {
	// 	$validator = new JsonSchema\Validator();
    //     $data = json_decode($body, true);
    //     $validator->validate($data, (object) ['$ref' => 'file://' . realpath('Schema/json_schema.json')]);

	// 	if ($validator->isValid()) {
	// 		require "put.php";

	// 		$put = new PUT();
	// 		$put->UpdateData($databaseName, $table, $id, $body);	
	// 	}

	// }

	if($dataType[0] == 'application/xml')
	{
		$xml = new DOMDocument('1.0', 'iso-8859-1');
		$xml->loadXML($body);
		if ($xml->schemaValidate("Schema/schema_XML_put.xsd")) 
		{
		
		} 
	}
});

//POST Request 
$app->post('/{table}', function (Request $request, Response $response) 
{
	$databaseName = "trumpapi";

	$dataType = $request->getHeader('Content-Type');
	$table = $request->getAttribute('table');
	$body = $request->getBody();

	if($dataType[0] == 'application/json')
	{
		$validator = new JsonSchema\Validator();
        $data = json_decode($body, true);
        $validator->validate($data, (object) ['$ref' => 'file://' . realpath('Schema/json_schema.json')]);

		if ($validator->isValid()) {
			require "post.php";
		
			$post = new POST();
			$post->InsertData($databaseName, $table, $body);	
		}

	}

	if($dataType[0] == 'application/xml')
	{
		$xml = new DOMDocument('1.0', 'iso-8859-1');
		$xml->loadXML($body);
		if ($xml->schemaValidate("Schema/schema_XML_post.xsd")) 
		{

		} 
	}
});

$app->run();
?>