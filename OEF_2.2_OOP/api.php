<?php
header('Content-Type: json/application');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$public_access = true;
require_once "lib/autoload.php";

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

$parts = explode("/", $request_uri);
$request_part = $parts[3];

if ( count($parts) > 4 ) $id = $parts[4];

if($method === 'GET')
{
    if (isset($id)) {
        getBtwCode($id);
    } else {
        getBtwCodes();
    }
}

elseif ($method === 'POST') {
addBtw($_POST);
}

elseif ($method === 'PUT') {
    if (isset($id)) {
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        updateBtwCode($data, $id);

    }
}

elseif ($method === 'DELETE') {
    if (isset($id)){
        deleteBtwCode($id);
    }
}




?>


