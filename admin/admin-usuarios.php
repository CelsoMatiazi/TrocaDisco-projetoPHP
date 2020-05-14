<?php

include('../includes/functions.php');

$produtos = carregaProdutos();
$usuarios = carregaUsuarios();


 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/admin-usuarios.css">
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


                    <h2>Usuarios</h2>

                  <table style="width:100%">
                    <tr style="background:#407294">
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Info</th>
                    </tr>

                  <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                      <td><?= $usuario['userID'] ?></td>
                      <td><?= $usuario['nome'] ?></td>
                      <td><?= $usuario['email'] ?></td>
                      <td><a href="../admin/admin-info.php?id=<?= $usuario['userID'] ?>">Informações</a></td>
                    </tr>
                    <?php endforeach ?>


                  </table>
                  <br>




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
