<?php

include('../includes/functions.php');

$produtoID = $_GET['id'];

$produtos = carregaProdutos();

for($i=0; $i < count($produtos) ; $i++){
  if($produtoID == $produtos[$i]['produtoID']){
      unset($produtos[$i]);
  }

  $stringJson2 = json_encode($produtos);

  if($stringJson2){
    //salva a string json no arquivo usuarios.json
    file_put_contents('../includes/produtos.json', $stringJson2);

  }
  header('location: show-produtos.php');
}

//editaProduto($produtos);



 ?>
