<?php

	error_reporting(1);
			
	include_once "conecta_bd.php";

	function solicitacao(&$id_user,&$id_amigo,&$conexao,&$pagina){

		if($conexao->connect_error){
			  echo "Erro de Conexão! <br>".$conexao->connect_error;
	 	}

	 	//Cria comando sql inserindo na tabela amizades com status pedente
	 	$sql = "INSERT INTO `amigos`(`id_de`, `id_para`, `status`) VALUES ('$id_user','$id_amigo','0')";

	
			$retorno = $conexao->query($sql);

		
		if ($retorno == false) {
				echo $conexao->error;
		 	}

		 	if ($retorno == true) {

	        echo "<script>
	                alert('Solicitação enviada com sucesso!');";
	                
	                if($pagina == "pesquisar"){
	               		echo "location.href='pesquisar_amigos.php';";
	            	}

	            	if($pagina == "amigo"){
	            		echo "location.href='outro_perfil.php?amigo=true&id=$id_amigo';";
	            	}

	        echo "</script>";

			} else {

				 echo "<script>
	    		 	alert('Erro ao enviar solicitação!');
	   			  </script>";

				
			echo $conexao->error;

		}		

	}

	if (isset($_GET['solicitar'])) {

	    $id_user = $_GET["id_user"];
	    $id_amigo = $_GET["id"];
	    $pagina = $_GET["pagina"];

	    if (($id_user == NULL) || ($id_amigo == NULL)){
	        echo "O ID nao foi passado <br>";
	    }

	    solicitar_amizade($id_user,$id_amigo,$conexao,$pagina); 
	}


?>