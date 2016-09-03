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
		<link rel="stylesheet" href="css/estilo2.css" />
		<!--<script type="text/javascript" crc="js/jquery.js"></script>
		<script type="text/javascript" crc="js/jquery.maskedinput.js"></script> 
		<script type="text/javascript">
		jQuery(function($){
		   $("#telefone").mask("(99) 999-9999");
		   $("#cep").mask("99999-999");
		</script>-->

	</head>
	<body>
		<div class="header">
			<div class="linha">
				
			</div>
		</div>
		<div class="linha">
			<section>
				<div id="box" class="coluna col10 contato">
					<div id="conteudo_curriculum">
						<?php
							/**echo $_SESSION['USER'];**/
						?>
						<h2>Cadastre seu curriculum</h2>
						<form name="curriculum2" method="post" action="" enctype="multipart/form-data">
							<fieldset>
							<legend>Cursos</legend>
								<label>
									<select name="Curso" >
										<option value="" selected="selected">Selecione o curso...</option>
										<option value="administracao">Administração</option>
										<option value="auditoria">Auditoria</option>
										<option value="compras">Compras</option>
										<option value="informatia">Informática</option>
										<option value="juridico">Juridico</option>
										<option value="mecanico">Mecânico</option>
										<option value="instrutor">Instrutor</option>
										<option value="qualidade">Qualidade</option>
									</select>
								</label>
								<label>
									<select name="ano_curso" >
										<?php
											$a = date('Y');
											$a = $a + 1;
											for($i = 30; $i >=0; $i--){
												$a = $a - 1;
												echo '<option value="'.$a.'">'.$a.'</option>';
											}
										?>
									</select>								
								</label>
								<label>
									<select name="ano2_curso" >
										<?php
											$a = date('Y');
											$a = $a + 1;
											for($i = 30; $i >=0; $i--){
												$a = $a - 1;
												echo '<option value="'.$a.'">'.$a.'</option>';
											}
										?>
									</select>								
								</label>
								<label>
									<textarea type="text" name="cursos" placeholder="deixe um comentário"></textarea>
								</label>
							</fieldset>
						</form>
					</div>
					<div id="experiencia">
						<form name="experiencia" method="post" action="">	
							<fieldset>
								<legend>Experiência Profissional</legend>
									<label>
										<select name="ano_experi">
											<option value="" selected="selected">De...</option>
											<?php
											$a = date('Y');
											$a = $a + 1;
											for($i = 30; $i >=0; $i--){
												$a = $a - 1;
												echo '<option value="'.$a.'">'.$a.'</option>';
											}
										?>
										</select>								
									</label>
									<label>
										<select name="ano2_experi">
											<option value="" selected="selected">Até...</option>
											<?php
											$a = date('Y');
											$a = $a + 1;
											for($i = 30; $i >=0; $i--){
												$a = $a - 1;
												echo '<option value="'.$a.'">'.$a.'</option>';
											}
										?>
										</select>								
									</label>
									<label>
										<textarea type="text" name="experiencia" placeholder="deixe um comentário"></textarea>
									</label>
									<input type="submit" name="salvar" value="salvar" class="btn">
							</fieldset>
						</form>
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