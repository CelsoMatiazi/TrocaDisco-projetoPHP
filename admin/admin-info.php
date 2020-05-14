<?php

include('../includes/functions.php');

$produtos = carregaProdutos();
$usuarios = carregaUsuarios();

$userID = $_GET['id'];

foreach ($usuarios as $usuario) {
  if($userID == $usuario['userID']){
    $nome = $usuario['nome'];
    $endereco = $usuario['endereço'];
    $telefone = $usuario['telefone'];
    $email = $usuario['email'];
    $imagem = $usuario['imagem'];

  }
}


 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/admin-info.css">
    <title>Home</title>
  </head>
  <body>



    <header>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      <img src="../img/logo.png" alt="">
      <h2>Troca Discos</h2>

      <h3>ADMINISTRAÇÃO</h3>
      <a href="../Login/logOut.php"><img id="bt-sair" src="../img/sair.png" alt="sair"></a>
    </header>

    <main>


        <h2>Dados do Usuario</h2>
        <section>
          <article class="">
            <img src="<?= $imagem ?>" alt="">
          </article>

          <article class="">
            <h4>Nome:  <?= $nome ?></h4>
            <h4>Email:  <?= $email ?></h4>
            <h4>Telefone:  <?= $telefone ?></h4>
            <h4>Endereço:  <?= $endereco ?></h4>
            <h4>UserID:  <?= $userID ?></h4>
            <a href="admin-excluiUser.php?id=<?= $usuario['userID'] ?>"> <button id="bt2" type="button" name="button">Excluir Usuario</button></a>
          </article>
        </section>





    </main>


    <div id="mySidenav" class="sidenav">
    <img src="../img/admin.jpg" alt="">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../admin/admin-home.php">Home</a>
  <a href="../admin/admin-usuarios.php">Usuarios</a>
  <a href="../admin/admin-produtos.php">Produtos</a>
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
