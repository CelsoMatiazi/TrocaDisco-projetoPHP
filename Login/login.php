<?php


include("../includes/functions.php");
$loginOK = true;

if($_POST){

$email = $_POST['email'];
$senha = $_POST['senha'];
$usuarios = carregaUsuarios();



if($email == 'admin@admin'){

  if ($senha == '1234567') {

    header('location: ../admin/admin-home.php');
  }

}


foreach ($usuarios as $usuario) {
  if($usuario['email'] == $email){

    if(password_verify($senha, $usuario['senha'])){

      session_start();
        $_SESSION['userID'] = $usuario['userID'];
        $_SESSION['email'] = $email['email'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['imagem'] = $usuario['imagem'];




        header('location: ../Index/home.php');
    }
  }
}
$loginOK = false;
}

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/login.css">
    <title></title>
  </head>
  <body>

    <header>
      <img src="../img/logo.png" alt="">
      <h2>Troca Discos</h2>

      <div >  </div>
      <a href="../usuarios/cadastro.php" target="_self" >Cadastro</a>
      <a href="../Index/index.php" target="_self" >Voltar</a>


    </header>

    <main>
      <h1>LOGIN</h1>
      <div class="mensagem">

          <?= ($loginOK?'':'<span class="erro">LOGIN INVALIDO');?>



      </div>

      <section>
        <div class="">

          <img src="../img/login.png" alt="">
          <form class=""  method="POST">
            <input type="email" name="email" value="" placeholder="email">
            <input type="password" name="senha" value="" placeholder="senha">
            <button type="submit" name="button">Login</button>


          </form>
        </div>
      </section>
    </main>

  </body>
</html>
