<?php
session_start();//INICIALIZA A SESSAO
include_once("conexao.php");

//AQUI EU NAO VOU MAIS ESCREVER NADA, LEMBRE-SE DOS CODIGOS ANTERIORES 
$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);//aqui ele esta buscando o id enviado na pagina index.php(ele recebe pelo metodo GET pois está recebendo pela url)
$result_usuario = "DELETE FROM estaciona WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

	//se ele afetou alguma linha nessa conexao, entao ele apagou com sucesso
	if (mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style ='color: green;'>Apagado com sucesso</p>";
		header ("Location: index.php");
	} else{
		$_SESSION['msg'] = "<p style ='color: red;'>Não foi apagado com sucesso</p>";
		header ("Location: index.php");
	}


?>