<?php
	//$conn = mysqli_connect('localhost', 'root', '', 'teste') or die ('ERRO:'.mysqli_error);
		
		$pdo = new PDO('mysql:host=localhost;dbname=cr',"root", "");
	
		/*Pega os dados que foram setados nos campos e salva no banco*/
		if(isset($_POST['altera'])){
			
			$id = $_POST['codigo'];
			$nome = $_POST['nome'];
			$sexo = $_POST['sexo'];
			$cpf = $_POST['cpf'];
			$cidade = $_POST['cidade'];
			$bairro = $_POST['bairro'];
			$endereco = $_POST['endereco'];
			$numeroCasa = $_POST['numeroCasa'];
			$telefone = $_POST['telefone'];
			$telRecado = $_POST['telefoneRecado'];
			$email = $_POST['email'];
			
			$stmt = $pdo->prepare("UPDATE cadastros SET nome=?, sexo=?, cpf=?, cidade=?, bairro=?, endereco=?, numero_casa=?, telefone=?, telefone_recado=?, email=? WHERE cpf=?");
			
			$stmt->bindParam(1, $nome);
			$stmt->bindParam(2, $sexo);
			$stmt->bindParam(3, $cpf);
			$stmt->bindParam(4, $cidade);
			$stmt->bindParam(5, $bairro);
			$stmt->bindParam(6, $endereco);
			$stmt->bindParam(7, $numeroCasa);
			$stmt->bindParam(8, $telefone);
			$stmt->bindParam(9, $telRecado);
			$stmt->bindParam(10, $email);
			$stmt->bindParam(11, $cpf);
			
			$stmt->execute();
			
			header('location:tabela.php');
		}
		
		/*Exclui todos os dados que foram setados nos campos, referente ao CPF*/
		
		if(isset($_POST['excluir'])){
			
			$cpf = $_POST['cpf'];
			
			$stmt = $pdo->prepare('DELETE FROM cadastros WHERE cpf=?');
			$stmt->bindParam(1, $cpf);
			$stmt->execute();
			
			header('location:tabela.php');
		}
						
?>		