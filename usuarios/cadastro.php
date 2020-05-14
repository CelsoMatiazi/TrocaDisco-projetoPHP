<?php

include('../includes/functions.php');



//valores padrão
$nome = '';
$endereco = '';
$email = '';
$senha = '';
$confSenha = '';
$telefone = '';

$nomeOK = true;
$senhaOk = true;
$confSenhaOK = true;
$emailOk = true;


if($_POST){

  $nome = $_POST['nome'];
  $endereco = $_POST['endereco'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $senha = $_POST['senha'];
  $confSenha = $_POST['confSenha'];


if($_FILES){

  $tempName = $_FILES['foto']['tmp_name'];
  $fileName = uniqid() . '-'.$_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];

  move_uploaded_file($tempName, '../img/usuarios/'.$fileName);

  $imagem = '../img/usuarios/'.$fileName;
}else{
  $imagem = null;
}

if(strlen($_POST['nome']) < 5){
  $nomeOK = false;
}

if(strlen($_POST['email']) == 0){
  $emailOk = false;
}


if( strlen ($_POST['senha']) < 5 ){
		$senhaOk = false;

	}

  if( $_POST['senha'] != $_POST['confSenha']){

  		$confSenhaOK = false;
  	}

  if($senhaOk && $nomeOK && $emailOk && $confSenhaOK){

      $userID = date('jmYGisms');
  		cadastraUsuario($userID, $nome, $endereco, $telefone, $email,  $senha, $imagem);
      header('location: ../Index/home.php');
  }
}


 ?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title></title>
  </head>
  <body>

    <header>
      <img src="../img/logo.png" alt="">
      <h2>Troca Discos</h2>

      <div >  </div>
      <a href="../Index/index.php" target="_self" >Voltar</a>
      <a href="../Login/login.php" target="_self" >Login</a>



    </header>


    <main>
      <h1>CADASTRO</h1>
      <div class="mensagem">
          <?php
            if($nomeOK == false){
              echo ('<span class="erro">Preencha o campo NOME corretamente');
            }else {
              if($emailOk == false){
                echo ('<span class="erro">Preencha o campo EMAIL corretamente');
              }else{
                if($senhaOk == false){
                  echo ('<span class="erro">SENHA INVALIDA');
                }else{
                  if($confSenhaOK == false){
                    echo ('<span class="erro">SENHAS NÃO CONFEREM');
                  }
                }
              }
            }


           ?>



      </div>

      <section>
        <div class="">

          <div class="Cadastro">

            <form class="" method="post" enctype="multipart/form-data" >
              <input type="text" name="nome" value="<?= $nome ?>" placeholder="Nome">

              <input type="email" name="email" value="<?= $email ?>" placeholder="E-mail">
              <input type="text" name="endereco" value="" placeholder="Endereço">
              <input type="number" name="telefone" value="" placeholder="Telefone">
              <input type="password" name="senha" value="<?= $senha ?>" placeholder="Senha">
              <input type="password" name="confSenha" value="" placeholder="Confirme a Senha">
              <button id="bt-cad" type="submit">Cadastrar</button>

          </div>
              <div class="img">
                <img src="../img/Perfil.jpg" alt="">
               <button type="file" name="foto" accept=".jpg, .jpeg, .png, .gif">Enviar Foto</button>
               <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png, .gif">
              </div>
        </div>
            </form>

      </section>


    </main>


  </body>
</html>
