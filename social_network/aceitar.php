<?php

	error_reporting(1);
			
	include_once "conecta_bd.php";

	function aceitar(&$id_user,&$id_amigo,&$conexao,&$pagina){

		if($conexao->connect_error){
			  echo "Erro de Conexão! <br>".$conexao->connect_error;
	 	}

	 	//Cria comando sql inserindo na tabela amizades com status pedente
	 	$sql = "UPDATE `amigos` SET `status`='1' WHERE ((id_de=$id_amigo) and (id_para=$id_user))";

	 	
		$retorno = $conexao->query($sql);

		
		if ($retorno == false) {
				echo $conexao->error;
		}

		if ($retorno == true) {

	        echo "<script>
	                alert('Amizade aceita com sucesso!');";

	                if($pagina == "pesquisar"){
	               		echo "location.href='pesquisar_amigos.php';";
	            	}

	            	if($pagina == "notificacao"){
	            		echo "location.href='home.php';";
	            	}

	            	if($pagina == "amigo"){
	            		echo "location.href='outro_perfil.php?amigo=true&id=$id_amigo';";
	            	}
	        echo "</script>";

			} else {

				 echo "<script>
	    		 	alert('Erro ao aceitar amizade!');
	   			  </script>";

				
			echo $conexao->error;

		}		

	}

	if (isset($_GET['aceitar'])) {

	    $id_user = $_GET["id_user"];
	    $id_amigo = $_GET["id"];
	    $pagina = $_GET["pagina"];

	    if (($id_user == NULL) || ($id_amigo == NULL)){
	        echo "O ID nao foi passado <br>";
	    }

	    aceitar($id_user,$id_amigo,$conexao,$pagina); 
	}


?>