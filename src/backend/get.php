<?php

  function pre($a){
    echo '<pre style="background: #DADADA;padding: 20px;">';
    print_r($a);
    echo '</pre>';
  }
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: access");
  header("Access-Control-Allow-Methods: POST");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  if (isset($_SERVER['HTTP_ORIGIN'])) { 
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}

  try{
    $bdd = new PDO('mysql:host=localhost;dbname=react-data;charset=utf8', 'root', 'root');
  }
  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }
  $array = [];
  $data = $bdd->query('SELECT * FROM users');
  while($reponse = $data->fetch()){
    // print_r($reponse);
    $json[] = $reponse;
    // array_push($array, $reponse);
  }

  foreach($json as $s){
    unset($s[0]);
    unset($s[1]);
    unset($s[2]);
    unset($s[3]);
    array_push($array, $s);
  }

  echo json_encode($array);

  // if(!isset($_POST)){
  //   echo 'no post !';
  // }
  // else{
  //   echo 'post !';
  // }


?>