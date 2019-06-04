<?php
include_once "conecta_bd.php";
session_start();

  if ($_SESSION["logado"] != "ok") {
    header("Location: login.php");
  }

  $filtro_sql = "";

  if ($_POST != NULL){
    $filtro = $_POST["filtro"];

    $filtro_sql = "WHERE nome LIKE '%$filtro%'
                   OR sobrenome LIKE '%$filtro%'";
  }


 ?>

<html>

<title> Pesquisa Amigos | Soccer Field </title>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href="img/favicon.png">
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="css/w3_2.css">
<link rel="stylesheet" href="css/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>

<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large" style="vertical-align: middle;">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d2"><i class="far fa-futbol"></i> Soccer Field</a>
  <a href="perfil.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i style="padding-top:9px;" class="fa fa-user"></i></a>
   <!--Logoff ta aqui-->
  <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Sair"><i style="padding-top:9px;" class="fa fa-power-off"></i></a>
  <a href="pesquisar_amigos.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Pesquisar Amigos"><i style="padding-top:9px;" class="fa fa-search"></i></a>
 </div>
</div>

<!-- Navbar responsiva -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">

  <a href="pesquisar.php" class="w3-bar-item w3-button w3-padding-large">Pesquisar Pessoas</a>
  <a href="perfil.php" class="w3-bar-item w3-button w3-padding-large">Meu Perfil</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">

    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <!-- Colocar o nome do usuario da sessão-->
         <h4 class="w3-center"> <?php echo $_SESSION["nome_user"]." ".$_SESSION["sobrenome_user"];?> </h4>
         <h4 class="w3-center"><?php echo '<img src="' . $_SESSION["foto_user"]. '" width="150px">';?> </h4>

         <hr>
         <!-- Pegar do Banco de Dados-->
         <p><i class="fa fa-heartbeat fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION["time_user"];?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php  echo $_SESSION["cidade_user"].', '.$_SESSION["estado_user"];?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION["aniversario_user"]; ?></p>
        </div>
      </div>
      <br>

    <!-- End Left Column -->
    </div>

    <!-- pesquisa de usuarios -->
    <div class="w3-col m7">

      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
          <form method="post">
            <div class="w3-container w3-padding" align="center">
              <input type="text" name="filtro" class="w3-border w3-padding" style="width:50%;" placeholder="Pesquisar Usuario">
              <button type="submit" class="w3-border w3-theme-d2" style="height:40px; background-color:#0b501b "><i class="fa fa-search"></i></button>
            </div>
          </form>
          </div>
        </div>
      </div>


<?php

  $sql = "SELECT *
          FROM usuario
          $filtro_sql";

  $retorno = $con->query( $sql );

  while ( $registro = $retorno->fetch_array() ){
    $id = $registro["id_user"];
    $nome = $registro["nome"];
    $sobrenome = $registro["sobrenome"];
    $foto = $registro["foto"];

    echo "<div class='w3-container w3-card w3-white w3-round w3-margin'><br>
      <img src=$foto alt='Avatar' class='w3-left w3-margin-right' style='width:60px;height:80px;'>
      <h4>$nome $sobrenome</h4><br>
      <span class='w3-right w3-margin-left'><a href='outro_perfil.php?id=$id'><button type='submit'class='w3-button'>Ver Perfil</button></a></span>
      <hr class='w3-clear'>
    </div>";

  			
        //ver se existe relação entre os bruxos
        $sql_amizade = "SELECT *
          FROM amigos
          WHERE ((id_de = '$id_user') and (id_para = '$id_amigo')) or ((id_de = '$id_amigo') and (id_para = '$id_user'))";

        $retornoAmizade = $conexao->query($sql_amizade);

        if($retornoAmizade == false){
          echo $conexao->error;
        }

        $registroAmizade = $retornoAmizade->fetch_array();
        $status = $registroAmizade["status"];


        //Se é amigo
        if($status == "1"){
          echo "<td><a href='remover_amigo.php?desfazer=true&id_user=$id_user&id=$id_amigo&pagina=$pagina'>Remover amigo</a></td>";

        //Se usuário não aceitou solicitação
        } else if($status == "0"){
          //echo "<td>amizade pedente</td>";

          include_once "conecta_bd.php";	

          $sql_pendente = "SELECT *
            FROM amigos
            WHERE ((id_de = '$id_user') and (id_para = '$id_amigo'))";

          $retorno_pendente = $conexao->query($sql_pendente);

          if($retorno_pendente == false){
            echo $conexao->error;
          }

          if($registro_pendente = $retorno_pendente->fetch_array()){
            $solicitou = $id_user;
          } else {
            $solicitou = $id_amigo;
          }

          //Se usuário que solicitou amizade
          if($solicitou == $id_user){
            echo "<td><a href='cancelar_solicitacao.php?cancelar=true&id_user=$id_user&id=$id_amigo&pagina=$pagina'>cancelar solicitação</a></td>";
          } else {								

            echo "<td><a href='aceitar.php?aceitar=true&id_user=$id_user&id=$id_amigo&pagina=$pagina'>aceitar</a> | <a href='recusar.php?recusar=true&id_user=$id_user&id=$id_amigo&pagina=$pagina'>recusar</a></td>";
          }	

        //Se não for amigo mostra icone para ADD
        } else {
          echo"<td align='center'><a href='solicitacao.php?solicitar=true&id_user=$id_user&id=$id_amigo&pagina=$pagina' title='Enviar solicitação'><img src='https://static.vecteezy.com/system/resources/previews/000/379/115/non_2x/add-user-vector-icon.jpg' width='35px' height='35px'></a></td>";					
        }

      }
?>
    <!-- End Middle Column -->
    </div>


    <br>


    <!-- End Grid -->
    </div>

    <!-- End Page Container -->
    </div>
    <br>

    <!-- Footer -->
    <footer class="w3-container w3-theme-d3 w3-padding-16">
    <h5>Footer</h5>
    </footer>

    <footer class="w3-container w3-theme-d5">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>

    <script>
    // Accordion
    function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
    } else {
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className =
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
    }

    // Used to toggle the menu on smaller screens when clicking on the menu button
    function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    } else {
    x.className = x.className.replace(" w3-show", "");
    }
    }
    </script>

    </body>
    </html> 		