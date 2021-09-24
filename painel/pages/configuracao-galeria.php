<?php
	$config = Painel::select('tb_site.galeria',false);
?>
<div class="wraper-titulo">
	<div class="titulo-content">
		<img style="position:relative;top:5px;" src="<?php echo INCLUDE_PATH_PAINEL?>img/config.png">
		<h2>Configuração Galeria</h2>
	</div><!--titulo-content-->
	<div class="breadcrump">
	<a href="<?php echo INCLUDE_PATH_PAINEL?>index.php">
		<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/home.png">
		<h2>Home</h2>
	</a>
		<span>/</span>
		<img src="<?php echo INCLUDE_PATH_PAINEL?>img/config.png">
		<h2 class="active-btn">Configuração Galeria</h2>
	</div><!--breadcrump-->
</div><!--wraper-titulo-->

<?php permissaoPagina(1)?>

<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/editar-depoimento-gray.png">
	<h2>Editar Textos Galeria Home</h2>

	<?php
			/*
			$imagem_autor_novo = $_FILES['imagem_autor_novo'];
			$imagem_autor_atual = $_POST['imagem_autor_atual'];
			$imagem_especial_novo1 = $_FILES['imagem_especial_novo1'];
			$imagem_especial_atual1 = $_POST['imagem_especial_atual1'];
			$titulo_especial1 = $_POST['titulo_especial1'];
			$descricao_especial1 = $_POST['descricao_especial1'];
			$imagem_especial_novo2 = $_FILES['imagem_especial_novo2'];
			$imagem_especial_atual2 = $_POST['imagem_especial_atual2'];
			$titulo_especial2 = $_POST['titulo_especial2'];
			$descricao_especial2 = $_POST['descricao_especial2'];
			$imagem_especial_novo3 = $_FILES['imagem_especial_novo3'];
			$imagem_especial_atual3 = $_POST['imagem_especial_atual3'];
			$titulo_especial3 = $_POST['titulo_especial3'];
			$descricao_especial3 = $_POST['descricao_especial3'];
			$nome_tabela = $_POST['nome_tabela'];

			$titulo = $_POST['titulo'];
			$nome_autor = $_POST['nome_autor'];
			$descricao_autor = $_POST['descricao_autor'];
			$img_autor
			$img_especial1
			$titulo_especial1
			$descricao_especial1
			$img_especial2
			$titulo_especial2
			$descricao_especial2
			$img_especial3
			$titulo_especial3
			$descricao_especial3
			*/
		if(isset($_POST['acao_editar'])){
			if(Painel::updateConfig($_POST)){;
				Painel::alert('sucesso','Site Atualizado com sucesso!');
				Painel::redirect(INCLUDE_PATH_PAINEL.'configuracao-galeria');
			}else{
				Painel::alert('Campos Vazios não são permitidos!');
			}
		}
	
	?>

	<div class="form-editar cadastro-depoimentos">
		<form method="POST" enctype="multipart/form-data">
			<div class="group-depoimento group-textarea">
				<span>Home Galeria</span>
				<hr style="width: 70%;display: inline-block;height: 3px;background: gray;">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Título:</span>
				<input type="text" name="t_home" value="<?php echo $config['t_home']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Subtítulo:</span>
				<input type="text" name="p_home" value="<?php echo $config['p_home']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Título mural:</span>
				<input type="text" name="t_mural" value="<?php echo $config['t_mural']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Título galeria:</span>
				<input type="text" name="t_galeria" value="<?php echo $config['t_galeria']?>">
			</div><!--from-group-->

			<div class="group-depoimento group-textarea">
				<span>Página Enviar Foto 2</span>
				<hr style="width: 70%;display: inline-block;height: 3px;background: gray;">
			</div><!--from-group-->

			<div class="group-depoimento group-textarea">
				<span>Título:</span>
				<input type="text" name="t_foto" value="<?php echo $config['t_foto']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Subtítulo:</span>
				<input type="text" name="p_foto" value="<?php echo $config['p_foto']?>">
			</div><!--from-group-->


			<div class="group-depoimento">
				<input type="hidden" name="nome_tabela" value="tb_site.galeria">
				<input <?php permissaoInput(1,'acao_editar','Editar') ?> />
			
			</div><!--from-group-->

		</form>
	</div><!--form-editar-->

</div><!--box-content-->