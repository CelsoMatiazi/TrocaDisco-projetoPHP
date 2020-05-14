<?php

include("../includes/functions.php");

$produtos = carregaProdutos();
shuffle($produtos);

for($i = 0 ; $i < 8; $i++){
  $Destaques[] = $produtos[$i];
}


if($_GET){
		$palavra = $_GET["pesquisa"];
		$Destaques = buscaProduto($palavra);

		if($palavra == ''){
			$Destaques = carregaProdutos();
		}
	}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estilo.css">
    <title></title>
  </head>
  <body>

    <header>
      <img src="../img/logo.png" alt="">
      <h2>Troca Discos</h2>
      <form class="pesquisa"  method="GET">
        <input type="text" name="pesquisa"  placeholder="Pesquisa">
        <button  type="submit"><img src="../img/lupa.png" alt=""></button>
      </form>
      <div >  </div>
      <a href="../usuarios/cadastro.php" target="_self" name="button">Cadastro</a>
      <a href="../Login/login.php" target="_self" name="button">Login</a>
    </header>

    <banner>
      <img src="../img/tocaDisco.GIF" alt="">
      <div>
        <!--<h1>TROCA DISCOS</h1>-->
        <img id="bannerLogo"src="../img/logo2.png" alt="">
        <h2>O lugar certo para vender ou comprar o seu vinil.</h2>
      </div>
    </banner>

    <main>
      <?php foreach($Destaques as $destaque): ?>
      <article>

        <img src="<?= $destaque['Imagem'] ?>" alt="<?= $destaque['Artista'] ?>">
        <h2><?= $destaque['Artista'] ?></h2>
        <h4><?= $destaque['Titulo'] ?></h4>

        <!-- <a id="bt-inf"href="../Login/login.php">Informações</button></a> -->
        <button type="button" name="button" ><a href="../Produtos/info-produto.php?id=<?= $destaque["produtoID"] ?>">Informações</a></button>




      </article>
    	<?php endforeach; ?>

    </main>

    <footer>

      <div class="margem">
      </div>

      <div >
        <h2>Siga:</h2>
        <img src="../img/facebook.png" alt="facebook">
        <img src="../img/instagram.png" alt="instagram">

        </div>

        <div >
          <h2>Contatos:</h2>
          <p>contato@trocadiscos.com</p>
        </div>

        <div >
          <p>Quem somos</p>
          <p>Termos contratuais</p>
          <p>Politica de Privacidade</p>
        </div>
    </footer>
