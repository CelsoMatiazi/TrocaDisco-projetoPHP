<?php

include('../includes/functions.php');

$usuarioID = $_GET['id'];

$usuarios = carregaUsuarios();

for($i=0; $i < count($usuarios) ; $i++){
  if($usuarioID == $usuarios[$i]['userID']){
      unset($usuarios[$i]);
  }

  $stringJson2 = json_encode($usuarios);

  if($stringJson2){

    file_put_contents('../includes/usuarios.json', $stringJson2);

  }
  header('location: admin-usuarios.php');
}

 ?>
