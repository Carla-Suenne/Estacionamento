<?php
//a session serve para aparecer uma msg quando é inserido no bd com sucesso, e para ser usado essa função é primeiro preciso inicializar ela
session_start();// sempre tem que ser colocada no começo da pagina

//conexao da página com o bd
include_once("conexao.php");

//está recebendo dados do usuário
$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);//recebendo os dados do formulário || FILTER_SANITIZE_STRING= limpar os dados que vem do formulário após o envio dos mesmos 
$placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_STRING);


//inserindo no banco de dados e atribuindo na variavel $result_usuario
$result_usuario = "INSERT INTO estaciona (modelo, placa, entrada) VALUES ('$modelo', '$placa', NOW())";

//mysqli_query=para executar a query result_usuario|| ou seja, é necessario esse comando (mysqli_query...) para executar o que é pedido, é necessario colocar a conexao primeiro e depois a variavel que voce deseja fazer o comando e após tudo isso ainda é preciso atribuir a uma variavel para depois ela ser chamada quando for preciso
$resultado_usuario = mysqli_query($conn, $result_usuario);

//serve para verificar se foi salvo com sucesso no bd
//se a conexao retornou com id, significa que foi inserido com sucesso || A função mysqli_insert_id() retorna o ID gerado pela consulta em uma tabela|| ou seja, se existir o id (for atribuido com sucesso) ele cria a variavel global 'msg' para imprimir a mensagem na pagina cadastro
if(mysqli_insert_id($conn)){
	//a variavel global é chamada de msg 
	$_SESSION['msg'] = "<p style='color:green; padding-left:10%'>Veículo cadastrado com sucesso</p>";
	header("Location: index.php");
}else{
	//se nao foi inserido com sucesso ele acessa esse resultado aqui
	$_SESSION['msg'] = "<p style='color:red;'>Veículo não foi cadastrado com sucesso</p>";
	header("Location: index.php");
}
