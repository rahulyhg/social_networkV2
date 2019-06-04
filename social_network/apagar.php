<?php
error_reporting(1);
include_once "conecta_bd.php";

  $id_post = $_GET["id_post"];
  if ($id_post == NULL) {
    echo "O ID não foi passado! <br><br>";
  }

  $sql = "DELETE FROM postagem
          WHERE id_post = $id_post";
  $sql_2 = "DELETE FROM comentario
          WHERE id_post = $id_post";

  $retorno = $con->query( $sql );

  $retorno_2 = $con->query( $sql_2 );

  if ($retorno == true && $retorno_2 == true) {
    echo "<script>
    alert('Post Deletado!');
    location.href = 'perfil.php';
    </script>";
  } else {
    echo "<script>
    alert('Erro ao deletar!');
    </script>";
  }
?>
