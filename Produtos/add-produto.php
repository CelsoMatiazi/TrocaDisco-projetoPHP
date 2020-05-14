<?php

include('../includes/functions.php');

session_start();
$nome = "";
$imagem = "../img/Perfil.jpg";

if($_SESSION){

  $nome = $_SESSION['nome'];

  if(strlen($_SESSION['imagem']) < 31){
    $imagemP = "../img/Perfil.jpg";

  }else{
  $imagemP = $_SESSION['imagem'];
  }
}

if(!$_SESSION){

  header('location: ../Login/login.php');
}


$artista = '';
$titulo = '';
$valor = '';
$descricao = '';
$imagem = '';


$artistaOK = true;
$tituloOK = true;
$valorOK = true;
$imagemOk = true;


if($_POST){

  $artista = $_POST['artista'];
  $titulo = $_POST['titulo'];
  $valor = $_POST['valor'];
  $descricao = $_POST['descricao'];


if($_FILES){

  $tempName = $_FILES['foto']['tmp_name'];
  $fileName = uniqid() . '-'.$_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];

  move_uploaded_file($tempName, '../img/img-produto/'.$fileName);

  $imagem = '../img/img-produto/'.$fileName;
}else{
  $imagemOk = false;
}

if(strlen($_POST['artista']) < 2){
  $artistaOK = false;
}

if(strlen($_POST['titulo']) < 1){
  $tituloOK = false;
}


if( strlen ($_POST['valor']) < 1  ){
		$valorOK = false;

	}


if($artistaOK && $tituloOK && $valorOK && $imagemOk){

    $produtoID = uniqid();

    //session_start();
    $userID = $_SESSION['userID'];
		cadastraProduto($userID, $produtoID, $artista, $titulo, $descricao, $valor, $imagem);
    header('location: show-produtos.php');
  }
}


 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/add-produto.css">
    <title>Home</title>
  </head>
  <body>



    <header>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      <img src="../img/logo.png" alt="logo">
      <h2>Troca Discos</h2>
      <div class="">

      </div>
      <h3>Olá <?= $nome ?></h3>
      <a href="../Login/logOut.php"><img id="bt-sair" src="../img/sair.png" alt="sair"></a>
    </header>

    <main>
      <h1>CADASTRO DE PRODUTO</h1>

      <div class="mensagem">
          <?php
            if($artistaOK == false){
              echo ('<span class="erro">Preencha o campo ARTISTA');
            }else {
              if($tituloOK == false){
                echo ('<span class="erro">Preencha o campo TITULO corretamente');
              }else{
                if($valorOK == false){
                  echo ('<span class="erro">Preencha o campo VALOR corretamente');
                }else{
                  if($imagemOk == false){
                    echo ('<span class="erro">ESCOLHA UMA IMAGEM');
                  }
                }
              }
            }
           ?>


         </div>
      <section>
        <div class="">

          <div class="Cadastro">
            <form class=""  method="POST" enctype="multipart/form-data">
              <input type="text" name="artista" value="<?= $artista ?>" placeholder="Artista">
              <input type="text" name="titulo" value="<?= $titulo ?>" placeholder="Titulo">
              <input type="number" name="valor" value="<?= $valor ?>" placeholder="Valor">
              <textarea name="descricao" rows="8" cols="40" placeholder="Descrição"></textarea>
          </div>
          <div class="img">
            <img src="../img/upload.jpg" alt="">
            <button type="button" name="button">Enviar Foto</button>
            <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png, .gif">
          </div>
        </div>
        <button id="bt-cad" type="submit" >Cadastrar</button>

          </form>
      </section>


    </main>


    <div id="mySidenav" class="sidenav">
    <img src="<?= $imagemP ?>" alt="">
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
