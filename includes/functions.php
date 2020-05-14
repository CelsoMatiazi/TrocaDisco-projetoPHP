<?php


function carregaUsuarios(){
      //ler o arquivo para uma variavel string
      $strJson = file_get_contents("../includes/usuarios.json");

      //transfora a string em um array associativo
      $usuarios = json_decode($strJson, true);

      // retorna o array associativo
      return $usuarios;
    }


function cadastraUsuario($userID, $nome, $endereco, $telefone, $email, $senha, $imagem){


    $usuarios = carregaUsuarios();

    $novoUsuario = [
          'userID'=>$userID,
          'nome'=>$nome,
          'telefone'=>$telefone,
          'email'=>$email,
          'endereço'=>$endereco,
          'senha'=>password_hash($senha, PASSWORD_DEFAULT),
          'imagem'=>$imagem,
        ];

        $usuarios[] = $novoUsuario;

        $stringJson = json_encode($usuarios);

        if($stringJson){

          //salva a string json no arquivo usuarios.json
          file_put_contents('../includes/usuarios.json', $stringJson);

        }
}



function carregaProdutos(){
      //ler o arquivo para uma variavel string
      $strJson2 = file_get_contents("../includes/produtos.json");

      //transfora a string em um array associativo
      $produtos = json_decode($strJson2, true);

      // retorna o array associativo
      return $produtos;
    }



function cadastraProduto($userID, $produtoID, $artista, $titulo, $descricao, $valor, $imagem){

    $produtos = carregaProdutos();

    $novoProduto = [
          'userID'=>$userID,
          'produtoID'=>$produtoID,
          'Artista'=>$artista,
          'Titulo'=>$titulo,
          'Descrição'=>$descricao,
          'Valor'=>$valor,
          'Imagem'=>$imagem,
        ];

        $produtos[] = $novoProduto;

        $stringJson2 = json_encode($produtos);

        if($stringJson2){

          //salva a string json no arquivo usuarios.json
          file_put_contents('../includes/produtos.json', $stringJson2);

        }
}


function buscaProduto($palavra){
        $produtos = carregaProdutos();
        $resultado = [];
        foreach ($produtos as $produto){
            if (stripos ($produto['Artista'], $palavra) !== false){
                $resultado[] = $produto;
            }
        }
        return $resultado;
    }

function editaProduto($produtoID, $artista, $titulo, $valor, $imagem, $descricao){

      $produtos = carregaProdutos();

      for($i=0; $i < count($produtos) ; $i++){
        if($produtoID == $produtos[$i]['produtoID']){
          $produtos[$i]['Artista'] = $artista;
          $produtos[$i]['Titulo'] = $titulo;
          $produtos[$i]['Valor'] = $valor;
          $produtos[$i]['Imagem'] = $imagem;
          $produtos[$i]['Descrição'] = $descricao;
        }
      }

            $stringJson2 = json_encode($produtos);

            if($stringJson2){
              //salva a string json no arquivo usuarios.json
              file_put_contents('../includes/produtos.json', $stringJson2);

            }
    }



function editaUsuario($userID, $nome, $endereco, $telefone, $email,  $senha, $imagem){

      $usuarios = carregaUsuarios();

      for($i=0; $i < count($usuarios) ; $i++){

        if($userID == $usuarios[$i]['userID']){
          $usuarios[$i]['nome'] = $nome;
          $usuarios[$i]['email'] = $email;
          $usuarios[$i]['endereço'] = $endereco;
          $usuarios[$i]['telefone'] = $telefone;
          $usuarios[$i]['senha'] = password_hash($senha, PASSWORD_DEFAULT);
          $usuarios[$i]['imagem'] = $imagem;

        }
      }

            $stringJson = json_encode($usuarios);

            if($stringJson){

              //salva a string json no arquivo usuarios.json
              file_put_contents('../includes/usuarios.json', $stringJson);

            }
    }






 ?>
