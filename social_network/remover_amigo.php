<?php

	error_reporting(1);
			
	include_once "conecta_bd.php";

	function remover_amigo(&$id_user,&$id_amigo,&$conexao,&$pagina){

		if($conexao->connect_error){
			  echo "Erro de Conexão! <br>".$conexao->connect_error;
	 	}

	 	//Cria comando sql deletando na tabela amizades
	 	$sql = "DELETE FROM `amigos` WHERE ((id_de = '$id_user') and (id_para = '$id_amigo')) or ((id_de = '$id_amigo') and (id_para = '$id_user'))";

	 
			$retorno = $conexao->query($sql);

		
		if ($retorno == false) {
				echo $conexao->error;
		 	}

		 	if ($retorno == true) {

	        echo "<script>
	                alert('Amizade desfeita com sucesso!');";

					if($pagina == "pesquisar"){
	               		echo "location.href='pesquisar_amigo.php';";
	            	}

	            	if($pagina == "amigo"){
	            		echo "location.href='outro_perfil.php?amigo=true&id=$id_amigo';";
	            	}

	        echo "</script>";

			} else {

				 echo "<script>
	    		 	alert('Erro ao desfazer amizade!');
	   			  </script>";

			
			echo $conexao->error;

		}		

	}

	if (isset($_GET['desfazer'])) {

	    $id_user = $_GET["id_user"];
	    $id_amigo = $_GET["id"];
	    $pagina = $_GET["pagina"];

	    if (($id_user == NULL) || ($id_amigo == NULL)){
	        echo "O ID nao foi passado <br>";
	    }

	    desfazer_amizade($id_user,$id_amigo,$conexao,$pagina); 
	}


?>