<?php

error_reporting(1);

//Import
include_once "conecta_bd.php";

if ($_POST != null) {
  $email = addslashes( $_POST["email"]);
  $senha = addslashes( $_POST["senha"]);
  $foto = addslashes( $_POST["foto"]);
  $nome = addslashes( $_POST["nome"]);
  $sobrenome = addslashes( $_POST["sobrenome"]);
  $aniversario = addslashes( $_POST["aniversario"]);
  $sexo = addslashes( $_POST["sexo"]);
  $estado = addslashes( $_POST["estado"]);
  $cidade = addslashes( $_POST["cidade"]);
  $time = addslashes( $_POST["time"]);
  $jogador = addslashes( $_POST["jogador"]);

  $sql = "INSERT INTO usuario(email,senha,foto,nome,sobrenome,aniversario,sexo,estado,cidade,time,jogador)
          VALUES ('$email',md5('$senha'),'$foto','$nome','$sobrenome','$aniversario','$sexo','$estado','$cidade','$time','$jogador')";


          $retorno = $con->query( $sql );

  if ($retorno == true) {
    echo "<script>
    alert('Usuario Cadastrado com Sucesso!');
    location.href = 'login.php';
    </script>";
  } else {
    echo "<script>
    alert('Erro ao Cadastrar o Usuario!');
    </script>";
  }
}
 ?>
