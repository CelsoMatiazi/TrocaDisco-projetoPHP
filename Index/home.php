<?php
include('../includes/functions.php');


session_start();
$nome = "";
$imagem = "../img/Perfil.jpg";

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
shuffle($produtos);

if($_GET){
		$palavra = $_GET["pesquisa"];
		$Destaques = buscaProduto($palavra);

		if($palavra == '' ){
			$Destaques = $produtos;
		}

	}else{
    $Destaques = $produtos;
  }










 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>
  </head>
  <body>



    <header>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
      <img src="../img/logo.png" alt="">
      <h2>Troca Discos</h2>
      <form class="pesquisa"  method="GET">
        <input type="text" name="pesquisa"  placeholder="Pesquisa">
        <button  type="submit"><img src="../img/lupa.png" alt=""></button>
      </form>
      <h3>Olá <?= $nome ?></h3>
      <a href="../Login/logOut.php"><img id="bt-sair" src="../img/sair.png" alt="sair"></a>
    </header>

    <main>

      <?php foreach($Destaques as $destaque): ?>
      <article>

        <img src="<?= $destaque['Imagem'] ?>" alt="<?= $destaque['Artista'] ?>">
        <div class="box_info">
          <div class="info">
            <h2><?= $destaque['Artista'] ?></h2>
            <h4><?= $destaque['Titulo'] ?></h4>
          </div>
          <div class="preco">
            <h2>R$ <?= $destaque['Valor'] ?></h2>
          </div>
        </div>
        <a href="../Produtos/info-produto.php?id=<?= $destaque["produtoID"] ?>"><button id="bt1" type="button"  name="button">Informações</button> </a>

      </article>
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
