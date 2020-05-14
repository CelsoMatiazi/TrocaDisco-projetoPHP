<?php

include('../includes/functions.php');

$produtoID = $_GET['id'];

$produtos = carregaProdutos();

foreach ($produtos as $produto) {

  if ($produtoID == $produto['produtoID']) {
    $userID = $produto['userID'];

    $artistaAT = $produto['Artista'];
    $tituloAT = $produto['Titulo'];
    $valorAT = $produto['Valor'];
    $descricaoAT = $produto['Descrição'];
    $imagemAT = $produto['Imagem'];
  }
}


session_start();

if($_SESSION){

  $nome = $_SESSION['nome'];
  $status = true;

  if(strlen($_SESSION['imagem']) < 31){
    $imagem = "../img/Perfil.jpg";

  }else{
  $imagem = $_SESSION['imagem'];
  }
}

if(!$_SESSION){

  //header('location: ../Login/login.php');
  $status = false;
}


 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../css/info-produto.css">
     <title>Meus Discos</title>
   </head>
   <body>

     <header>
       <?php
       if($status == true){
         echo ('<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>');
       }
        ?>

       <img src="../img/logo.png" alt="logo">
       <h2>Troca Discos</h2>
       <div > </div>
       <?php
          if($status == true){
            echo ('<h3>Olá ');
            echo ($nome);
            echo ('</h3>');
          }else{
            echo ('<h3>    </h3>');
          }
        ?>

       <a href="../Login/logOut.php"><img id="bt-sair" src="../img/sair.png" alt="sair"></a>
     </header>

     <main>


         <section>

           <h1><?= $artistaAT; ?></h1>

           <div>
             <img src="<?= $imagemAT; ?>" alt="">
             <div class="info">
               <h3>Artista: <?= $artistaAT ?></h3>
               <h3>Titulo: <?= $tituloAT ?></h3>
               <h3>Descrição: <?= $descricaoAT ?></h3>
               <h2>R$ <?= $valorAT ?></h2>
             </div>
           </div>
           <div class="botao">

             <?php
             if($status == false){
              echo ('<a href="../Index/index.php"><button id="bt1" type="button"  name="button">Voltar</button> </a>');
            }else{
              echo ('<a href="../Index/home.php"><button id="bt1" type="button"  name="button">Voltar</button> </a>');
            }
              ?>

             <?php
             if($status == true){
               echo ('<a href=""> <button id="bt2" type="button" name="button">Comprar</button></a>');
             }

              ?>

           </div>
         </section>



     </main>

     <div id="mySidenav" class="sidenav">
     <img src="<?= $imagem ?>" alt="">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <a href="../Index/home.php">Home</a>
   <a href="../Produtos/show-produtos.php">Meus Discos</a>
   <a href="../Produtos/add-produto.php">Anuncie já</a>
   <a href="../usuarios/edit-usuario.php">Perfil</a>
   <a href="../Login/logOut.php">Sair</a>
 </div>




 <script>
 function openNav() {
   document.getElementById("mySidenav").style.width = "250px";
 }

 function closeNav() {
   document.getElementById("mySidenav").style.width = "0";
 }
 </script>

   </body>
 </html>
