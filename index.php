<?php
	include("config.php");
	ob_start();
	session_start();
	/**if ($conn) {
		echo 'conectado';
	}**/
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<title>Curriculum</title>
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/estilo.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.maskedinput.js"></script>

	</head>
	<body>
		<div class="header">
			<div class="linha">
				
			</div>
		</div>
		<div class="linha">
			<section>
				<div id="box" class="coluna col10 contato">
					<div id="curriculum">
						<h2>Deixe seu currículo</h2>
						<?php
							if(isset($_POST['salvar'])){
								$c['email'] 	= $_POST['email'];
								$c['senha'] 	= md5 ($_POST['senha']);
								$senha2 		= md5 ($_POST['senha2']);
								$c['nome'] 		= $_POST['nome'];
								$c['sobrenome'] = $_POST['sobrenome'];
								$c['telefone'] 	= $_POST['telefone'];
								$c['cep'] 		= $_POST['cep'];
								$c['interesse'] = $_POST['interesse'];
								$c['jornada'] 	= $_POST['jornada'];
								$arq			= $_FILES['arq'];
								
								$_SESSION['USER'] = $c['email'];
								$pegaCadastro = "SELECT * FROM curriculum WHERE email = '$c[email]'";
								$executa = mysqli_query($conn, $pegaCadastro)or die(mysqli_error());
								$r = mysqli_num_rows($executa);
								/**echo $r;**/
								if($r >= '1'){ 
									echo '<div class="erro"><p>Usuário já Cadastrado <img src="icone/alert.png" /></p></div>';
								}else{
									if(in_array('', $c)){
									echo '<div class="erro">
										<p>É nescessário preencher todos os campos <img src="icone/alert.png" /></p>
										</div>';
									}else{
										if(!filter_var($c['email'],FILTER_VALIDATE_EMAIL)){
											echo '<div class="erro">
											<p>E-mail inválido <img src="icone/alert.png" /></p>
											</div>';
									}else{
										if ($c["senha"] != $senha2){
										echo '<div class="erro">
										<p>As senhas não conferem <img src="icone/alert.png" /></p>
										</div>';
									}else{
										$sql = "INSERT INTO curriculum(email, senha, nome, sobrenome, foto, telefone, cep, area, objetivo)value('$c[email]','$c[senha]','$c[nome]','$c[sobrenome]','$nomeFoto','$c[telefone]','$c[cep]','$c[interesse]','$c[jornada]')";
										$execucao = mysqli_query($conn, $sql)or die(mysqli_error());

										/**echo '<pre>';
										print_r($arq);**/
										$permissao = array('image/jpeg', 'image/pjpeg', 'image/png');
										$tipo = ($arq['type'] == 'image/jpeg' || $arq['type'] == 'image/pjpeg' ? '.jpeg' : '.png');
										$size = 1024 * 1024 * 4;

										if($arq['size'] > $size){
											echo '<div class="erro"><p>Tamanho da imagen não permitido</p>
												</div>';

										}else if(!in_array($arq['type'], $permissao)){
													echo'<div class="erro">
													<p>Tipo de imagem não permitido</p>
													</div>';
										}else{
											$pasta = 'foto';
											$nomeFoto = time().$tipo;
										(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nomeFoto));

										header('Location: pagina2.php');
										}
									}
								}
							}
						}	
						}
						?>
						<form name="curriculum" method="post" action="" enctype="multipart/form-data">
							<fieldset><!--monta a estrutura da tabela em específico-->
							<legend>Dados do login</legend>
								<label>
									<span>E-mail</span>
									<input type="text" name="email">
								</label>
								<label>
									<span>Senha</span>
									<input type="password" name="senha">
								</label>
								<label>
									<span>Repita sua senha</span>
									<input type="password" name="senha2">
								</label>
							</fieldset>
							<fieldset>
							<legend>Dados Pessoais</legend>
								<label>
									<span>Nome</span>
									<input type="text" name="nome">
								</label>
								<label>
									<span>Sobrenome</span>
									<input type="text" name="sobrenome">
								</label>
								<label>
									<span>CPF</span>
									<input type="text" name="cpf" id="cpf">
								</label>
								<label>
									<span>foto</span>
									<input type="file" name="arq" value="" class="arquivo" />
								</label>
								<label>
									<span>Telefone</span>
									<input type="text" name="telefone" id="telefone">
								</label>
								<label>
									<span>cep</span>
									<input type="text" name="cep" id="cep">
								</label>
							</fieldset>
								
							<fieldset>
							<legend>Área de interesse</legend>
								<label>
									<select name="interesse" >
										<option value="" selected="selected">Selecione área desejada...</option>
										<option value="administracao">Administração</option>
										<option value="auditoria">Auditoria</option>
										<option value="compras">Compras</option>
										<option value="informatia">Informática</option>
										<option value="juridico">Juridico</option>
										<option value="mecanico">Mecânico</option>
										<option value="instrutor">Instrutor</option>
										<option value="qualidade">Qualidade</option>
									</select>								
								</label><br><br>
							</fieldset>
							<fieldset>
								<legend>Objetivo profissional</legend>
									<label>
										<select name="jornada">
											<option value="" selected="selected">Selecione a jornada...</option>
											<option value="estagio">Estagio</option>
											<option value="integral">Integral</option>
											<option value="noturno">Noturno</option>
											<option value="manha">Manhã</option>
											<option value="tarde">Tarde</option>
										</select>								
									</label><br><br>
								<input type="submit" name="salvar" value="salvar" class="btn" />
							</fieldset>
						</form>
						<script type="text/javascript">
							jQuery(function($){
							   $("#date").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
							   $("#telefone").mask("(99) 9999-9999");
							   $("#cpf").mask("999.999.999-99");
							   $("#cep").mask("99999-999");
							});
						</script>
					</div>
				</div>
			</section>
		</div>
		<div class="footer">
			<div class="linha">
				<footer>
					
				</footer>
			</div>
		</div>
	</body>
</html>