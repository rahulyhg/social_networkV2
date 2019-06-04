<?php

  $con = new mysqli("localhost", "root","","rede_social");

  if ( $con->connect_error == true ) {
      echo "<script>
      alert('Erro de Conexão');
      </script>";
  }

 ?>
