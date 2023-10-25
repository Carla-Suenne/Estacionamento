<?php

session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<style type="text/css">
			td,th{
				padding:25px;
				border:1px;
				
				border-color: white;

			}
		</style>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="form.css">
		<link rel="stylesheet" type="text/css" href="sist-estaciona.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<title>Estacionamento</title>		
	</head>
	<body>
		<p style=" font-size: 50px;font-family: Bodoni MT Condensed;  letter-spacing: 3px;position: absolute;color: #D90000;left: 45%">Cadastrar Veículo</p>
		<hr style="color: gray">
		<hr style="color: white; margin-top: 7%;">

		<?php
		//se existir essa variavel global, então ele acessa a variavel e imprime o valor (a mensagem que ta escrita)
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);//destroi a variavel global para imprimir somente uma vez
		}
		?>
		<br><br><br>
		<div class="junbotron">
		
			<form method="POST" action="processa.php" style="margin-left: 10%;">
				<label style="width: 5%;">Modelo: </label>
				<input type="text" name="modelo" placeholder="Digite o modelo "><br><br>
			
				<label style="width: 5%">Placa: </label>
				<input type="text" name="placa" placeholder="Digite a placa"><br><br>
			
				<input type="submit" value="Cadastrar"  style="background-color: #D90000; /* red*/
  				border: none;
  				color: white;
  				padding: 10px 22px;
  				text-align: center;
  				text-decoration: none;
  				display: inline-block;
  				font-size: 16px;
  				margin: 4px 0%;
  				cursor: pointer;
  				-webkit-transition-duration: 0.4s; /* Safari */
  				transition-duration: 0.4s;
  				box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 12px 50px 0 rgba(0,0,0,0.19);">
				<br>
				<br>
				<br>
		</form>
		</div>
		<p style=" font-size: 40px;font-family: Bodoni MT Condensed;  letter-spacing: 3px;position: absolute;color: black;left:70%; padding-top: 10%;">Estacionamento</p>
		<img src="desenho.jpg" style="float:right;margin-top: -10%; margin-right: -10%;">
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}

		$seleciona_usuarios = "SELECT * FROM estaciona";

		//mysqli_query=para executar a query result_usuario|| ou seja, é necessario esse comando (mysqli_query...) para executar o que é pedido, é necessario colocar a conexao primeiro e depois a variavel que voce deseja fazer o comando e após tudo isso ainda é preciso atribuir a uma variavel para depois ela ser chamada quando for preciso
		$resutado_usuarios = mysqli_query($conn, $seleciona_usuarios);
		?>
		<div class="container">
				<table class="tabela" style="background-color: #D90000;">
					<thead>
						<tr>
							<th>Modelo</th>
							<th>Placa</th>
							<th>Entrada</th>
						</tr>
					</thead>
					<tbody>

			<?php
			//este while é criado para percorrer o array (varias linhas no bd) ou seja, quando ele passar uma vez na linha 1, ele terá os valores daquela linha e assim por diante e quem faz isso (ler e retornar a linha obtida) é a função mysqli_fetch_assoc
		while ($linha_usuario = mysqli_fetch_assoc($resutado_usuarios)) {

			?>
			<tr><!-- com o uso do while ele percorre todo o array, você pode imprimir o valor de tudo que está contido no bd (incluindo o id mas isso nao é necessario) || ele está imprimindo o modelo pq ele está buscando no bd a tabela que tem o nome modelo-->
				<td><?php echo "Modelo: " . $linha_usuario['modelo']; ?></td>
				<td><?php echo "Placa: " . $linha_usuario['placa']; ?> </td>
				<td><?php echo "Entrada: " . $linha_usuario['entrada']; ?> </td>
				<td><button type="submit" style="background-color: white;
  border: none;
  color: white;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 0%;
  cursor: pointer;
  -webkit-transition-duration: 0.4s;   transition-duration: 0.4s;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 12px 50px 0 rgba(0,0,0,0.19);"><?php echo "<a href='apagar.php?id=" . $linha_usuario['id'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a>"; 
  		//Aqui ele busca qual id eu estou querendo excluir, ele faz isso usando a função linha_usuario e envia o id para a pagina apagar.php
  	?>
  	
  </button></td>

			</tr>
			<?php
			/*
			echo "Modelo: " . $linha_usuario['modelo'] . "<br>";
			echo "Placa: " . $linha_usuario['placa'] . "<br>";
			echo "Entrada: " . $linha_usuario['entrada'] . "<br>";
		
			echo "<a href='apagar.php?id=" . $linha_usuario['id'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br><hr>";*/

		}
		?>
				</tbody>
			</table>
			<br>
			<?php

		?>

		</div>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="js/personalizado.js"></script>	
	</body>
</html>