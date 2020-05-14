<?php

// Instantiate the class responsible for implementing a micro application
$app = new \Phalcon\Mvc\Micro();

// Routes
$app->get('/say/date', 'currentDate');
$app->get('/say/hello/{name}', 'greeting');
$app->get('/customers', 'getCustomers');
$app->get('/customers/{name}', 'getCustomer');

$app->notFound('notFound');

function sendResponse($statusCode, $response) {
  http_response_code($statusCode);
  header("Content-Type: application/json");
  echo json_encode($response); 
}

// Handlers
function currentDate() {
  $response = array("date" => date('Y-m-d'));
  sendResponse(200, $response);
}

function greeting($name) {
  $response = array("greeting" => "Hello $name");
  sendResponse(200, $response);
}

function getCustomers() {
  $conexion = mysqli_connect("mysql", "root", "secret", "SG");

  $cadenaSQL = "select * from s_customer";
  $sentencia = mysqli_prepare($cadenaSQL);
  $resultado = mysqli_query($conexion, $cadenaSQL);
  $response = array();

  while ($fila = mysqli_fetch_object($resultado)) {
    $customer = [
      "name" => $fila->name,
      "credit_rating" => $fila->credit_rating,
      "address" => $fila->address, 
      "city" => $fila->city,
      "state" => $fila->state,
      "country" => $fila->country,
      "zip_code" => $fila->zip_code
    ];
    $response[] = $customer;
 }

 sendResponse(200, $response);
 mysqli_close($conexion);
} 

function getCustomer($name) {
  $conexion = mysqli_connect("mysql", "root", "secret", "SG");

  $cadenaSQL = "select * from s_customer where name = '" . $name . "'";
  $sentencia = mysqli_prepare($cadenaSQL);
  $resultado = mysqli_query($conexion, $cadenaSQL);
  $response = array();

  while ($fila = mysqli_fetch_object($resultado)) {
    $customer = [
      "name" => $fila->name,
      "credit_rating" => $fila->credit_rating,
      "address" => $fila->address, 
      "city" => $fila->city,
      "state" => $fila->state,
      "country" => $fila->country,
      "zip_code" => $fila->zip_code
    ];
    $response[] = $customer;
 }

 sendResponse(200, $response);
 mysqli_close($conexion);
} 

function notFound() {
  $response = array("error" => "Endpoint not found");
  sendResponse(404, $response);
}

// Handle the request
$app->handle();

?>