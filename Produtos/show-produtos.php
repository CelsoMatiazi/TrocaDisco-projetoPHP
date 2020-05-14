<?php

include('../includes/functions.php');

session_start();

if($_SESSION){

  $nome = $_SESSION['nome'];

  if(strlen($_SESSION['imagem']) < 31){
    $imagem = "../img/Perfil.jpg";

  }else{
  $imagem = $_SESSION['imagem'];
  }
}

if(!$_SESSION){

  header('location: ../Login/login.php');
}

$produtos = carregaProdutos();

foreach($produtos as $produtosUser) {
  if($produtosUser['userID'] ==  $_SESSION['userID']){
    $produtosID[] = $produtosUser;
  }
}



 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/show-produtos.css">
    <title>Meus Discos</title>
  </head>
  <body>

    <header>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      <img src="../img/logo.png" alt="logo">
      <h2>Troca Discos</h2>
      <div class=""></div>
      <!-- <form class="pesquisa" action="index.html" method="post">
        <input type="text" name="login" value="" placeholder="Pesquisa">
      </form> -->
      <h3>Olá <?= $nome ?></h3>
      <a href="../Login/logOut.php"><img id="bt-sair" src="../img/sair.png" alt="sair"></a>
    </header>

    <main>

      <?php foreach($produtosID as $produto): ?>
        <section>

          <h1><?= $produto['Artista']; ?></h1>

          <div>
            <img src="<?= $produto['Imagem']; ?>" alt="">
            <div class="info">
              <h3>Artista: <?= $produto['Artista'] ?></h3>
              <h3>Titulo: <?= $produto['Titulo'] ?></h3>
              <h3>Descrição: <?= $produto['Descrição'] ?></h3>
              <h2>R$ <?= $produto['Valor'] ?></h2>
            </div>
          </div>
          <div class="botao">
            <a href="edit-produto.php?id=<?= $produto["produtoID"] ?>"><button id="bt1" type="button"  name="button">Editar</button> </a>
            <a href="exclui-produto.php?id=<?= $produto["produtoID"] ?>"> <button id="bt2" type="button" name="button">Excluir</button></a>


          </div>
        </section>
      <?php endforeach; ?>



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
