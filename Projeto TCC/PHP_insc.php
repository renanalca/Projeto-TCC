<?php
//Conectando ao banco
include_once("PHP_conexao.php");

//traz as variáveis do formulário
$user = $_POST["campo_usuario"];
$senha = $_POST["campo_senha"];


	$sql = ("SELECT * FROM login WHERE rm = '$rm'");
	$resultado = @mysqli_query($conect, $sql);
	if ( @mysqli_num_rows($resultado)==0) {	
	
		//Script para inserir um registro na tabela no Banco de Dados
		$sql = "insert into login (usuario,senha) values ('$usuario','$senha')";

		// executando instrução SQL
		$resultado = @mysqli_query($conect,$sql);

		if (!$resultado) {
			die('Query Inválida: ' . @mysqli_error($conect));  
		} else {
        	mysqli_close($conect);
			echo '<script type="text/javascript">
            alert("Cadastrado com Sucesso! ");
            window.history.go(-2);
        	</script>';
		}
		} else {
			echo '<script type="text/javascript">
            alert("Ops! Algo deu errado.");
			window.history.go(-1);
        	</script>';
	} 

?>