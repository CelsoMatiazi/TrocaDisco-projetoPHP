<?php

session_start(); // inicia a session

//testar se o usuario tem a session
// if(!$_SESSION){
//   //se nao estiver logado redireciona para a pagina de login
//
//   header('location: ../index.php');
// }

include('../includes/functions.php');

//carregando usuarios e mostra na imageinterlace

$usuarios = carregaUsuarios();

 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <h1>Seja bem vindo, <?= $_SESSION['nome']?></h1>

     <?php
         //mostrar na imageinterla
         echo "<pre>";
         print_r($usuarios);
         echo "</pre>";
      ?>


   </body>
 </html>