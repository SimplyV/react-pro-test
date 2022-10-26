<?php

  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: access");
  header("Access-Control-Allow-Methods: POST");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  try{
    $bdd = new PDO('mysql:host=localhost;dbname=react-data;charset=utf8', 'root', 'root');
  }
  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }
  echo json_encode($_POST);

  // if(!isset($_POST)){
  //   echo 'no post !';
  // }
  // else{
  //   echo 'post !';
  // }


?>