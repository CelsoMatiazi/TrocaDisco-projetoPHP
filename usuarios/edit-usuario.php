<?php

include('../includes/functions.php');

session_start();

if($_SESSION){
  $userID = $_SESSION['userID'];
  $nomeREC = $_SESSION['nome'];

  if(strlen($_SESSION['imagem']) < 31){
    $imagemP = "../img/Perfil.jpg";

  }else{
  $imagemP = $_SESSION['imagem'];
  }
}

if(!$_SESSION){
  header('location: ../Login/login.php');
}


$usuarios = carregaUsuarios();

foreach ($usuarios as $usuario) {

  if ($userID == $usuario['userID']) {
    $nomeAT = $usuario['nome'];
    $emailAT = $usuario['email'];
    $telefoneAT = $usuario['telefone'];
    $enderecoAT = $usuario['endereço'];
    $imagemAT = $usuario['imagem'];
    $senhaAT = $usuario['senha'];

  }
}

$nomeOK = true;
$senhaOk = true;
$confSenhaOK = true;
$emailOk = true;
$atualizaOK = false;


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
  $imagemOK = false;



}

if(strlen($_POST['nome']) < 5){
  $nomeOK = false;
}

if(strlen($_POST['email']) == 0){
  $emailOk = false;
}


if(strlen ($_POST['senha']) < 5 ){
		$senhaOk = false;

	}

if($_POST['senha'] != $_POST['confSenha']){

  		$confSenhaOK = false;
  }

  if(strlen ($imagem) < 31){
  		$imagem = $imagemAT;
  	}

  if($senhaOk && $nomeOK && $emailOk && $confSenhaOK){

  // for($i=0; $i < count($usuarios) ; $i++){
  //   if($userID == $usuarios[$i]['userID']){
  //     $usuarios[$i]['nome'] = $nome;
  //     $usuarios[$i]['endereço'] = $endereco;
  //     $usuarios[$i]['telefone'] = $telefone;
  //     $usuarios[$i]['senha'] = $senha;
  //     $usuarios[$i]['imagem'] = $imagem;
  //   }
  // }

    editaUsuario($userID, $nome, $endereco, $telefone, $email,  $senha, $imagem);
    $atualizaOK = true;
    $enderecoAT = $endereco;
    $nomeAT = $nome;
    $emailAT = $email;
    $telefoneAT = $telefone;
    $imagemAT = $imagem;




    //header('location: edit-usuario.php');
  }
}

 ?>



 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../css/edit-usuario.css">
     <title></title>
   </head>
   <body>

     <header>
       <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
       <img src="../img/logo.png" alt="logo">
       <h2>Troca Discos</h2>
       <div ></div>
       <h3>Olá <?= $nomeAT ?></h3>
       <a href="../Login/logOut.php"><img id="bt-sair" src="../img/sair.png" alt="sair"></a>
     </header>


     <main>
       <h1>Editar Perfil</h1>
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
             if($atualizaOK == true){
               echo ('<span class="erro">ATUALIZADO COM SUCESSO!!');
             }


            ?>



       </div>

       <section>
         <div class="">

           <div class="Cadastro">

             <form class="" method="post" enctype="multipart/form-data" >
               <input type="text" name="nome" value="<?= $nomeAT ?>" placeholder="Nome">

               <input type="email" name="email" value="<?= $emailAT ?>" placeholder="E-mail">
               <input type="text" name="endereco" value="<?= $enderecoAT ?>" placeholder="Endereço">
               <input type="number" name="telefone" value="<?= $telefoneAT ?>" placeholder="Telefone">
               <input type="password" name="senha" value="" placeholder="Senha">
               <input type="password" name="confSenha" value="" placeholder="Confirme a Senha">
               <button id="bt-cad" type="submit">Atualizar</button>

           </div>
               <div class="img">
                 <img src="<?= $imagemP ?>" alt="">
                <button type="file" name="foto" accept=".jpg, .jpeg, .png, .gif">Enviar Foto</button>
                <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png, .gif">
               </div>
         </div>
             </form>

       </section>


     </main>


     <div id="mySidenav" class="sidenav">
     <img src="<?= $imagemAT ?>" alt="">
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
