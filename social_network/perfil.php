<?php
session_start();

  if ($_SESSION["logado"] != "ok") {
    header("Location: login.php");
  }

 ?>

<html>

<title> Meu Perfil | Soccer Field</title>
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
<div class="w3-top" style="background-color:#0b501b;">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
   <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
   <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d2"><i class="far fa-futbol"></i> Soccer Field</a>
   <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white" title=""><i style="padding-top:9px;" class="fa fa-globe"></i></a>
   <a href="perfil.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i style="padding-top:9px;" class="fa fa-user"></i></a>
   <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i style="margin-top:9px;" class="fa fa-envelope"></i></a>
  <!--Logoff ta aqui-->
   <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Sair"><i style="padding-top:9px;" class="fa fa-power-off"></i></a>
   <a href="pesquisar_amigos.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="Pesquisar Amigos"><i style="padding-top:9px;" class="fa fa-search"></i></a>
 </div>
</div>

<!-- Navbar responsiva -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="home.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <!-- Colocar o nome do usuario da sessão-->
         <h4 class="w3-center"> <?php echo $_SESSION["nome_user"]." ".$_SESSION["sobrenome_user"];?> </h4>
         <!-- Pegar a imagem do banco e colocar no src-->
         <h4 class="w3-center"><img width="150px" src='<?php echo $_SESSION["foto_user"];?>'></h4>
         <hr>
        
         <!-- Pegar do Banco de Dados-->
         <p><i class="fa fa-heartbeat fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION["time_user"];?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION["cidade_user"].", ".$_SESSION["estado_user"];?></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION["aniversario_user"]; ?></p>
         <p><i class="fas fa-running fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION["jogador"]; ?></p>
         <p><i class="fas fa-venus-mars fa-fw w3-margin-right w3-text-theme"></i> <?php echo $_SESSION["sexo"]; ?></p>
        </div>
      </div>
      <br>    
   

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img width="150px" src='<?php echo $_SESSION["foto_user"];?>' class="w3-left w3-circle w3-margin-right" style="width:60px">
        <!-- vê questão do tempo-->
        <span class="w3-right w3-opacity">32 min</span>
        <h4><?php echo $_SESSION["nome_user"]." ".$_SESSION["sobrenome_user"];?></h4><br>
        <br>
        <p>Have you seen this?</p>
         <hr class="w3-clear">
        <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
      </div>

    <!-- End Middle Column -->
    </div>

    <!-- Right Column -->


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
