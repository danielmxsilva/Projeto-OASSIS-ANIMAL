<?php
	$config = Painel::select('tb_site.home',false);
?>
<div class="wraper-titulo">
	<div class="titulo-content">
		<img style="position:relative;top:5px;" src="<?php echo INCLUDE_PATH_PAINEL?>img/config.png">
		<h2>Configuração Home</h2>
	</div><!--titulo-content-->
	<div class="breadcrump">
	<a href="<?php echo INCLUDE_PATH_PAINEL?>index.php">
		<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/home.png">
		<h2>Home</h2>
	</a>
		<span>/</span>
		<img src="<?php echo INCLUDE_PATH_PAINEL?>img/config.png">
		<h2 class="active-btn">Configuração Home</h2>
	</div><!--breadcrump-->
</div><!--wraper-titulo-->

<?php permissaoPagina(1)?>

<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/editar-depoimento-gray.png">
	<h2>Editar Textos Home</h2>

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
				Painel::redirect(INCLUDE_PATH_PAINEL.'configuracao-home');
			}else{
				Painel::alert('Campos Vazios não são permitidos!');
			}
		}
	
	?>

	<div class="form-editar cadastro-depoimentos">
		<form method="POST" enctype="multipart/form-data">
			<div class="group-depoimento group-textarea">
				<span>Sessão 1</span>
				<hr style="width: 70%;display: inline-block;height: 3px;background: gray;">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Título 1:</span>
				<input type="text" name="titulo_1" value="<?php echo $config['titulo_1']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Subtítulo 1:</span>
				<input type="text" name="subtitulo_1" value="<?php echo $config['subtitulo_1']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>título img:</span>
				<input type="text" name="titulo_img" value="<?php echo $config['titulo_img']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span style="vertical-align:top;">Conteúdo:</span>
				<textarea name="conteudo"><?php echo $config['conteudo']?></textarea>
			</div><!--from-group-->

			<div class="group-depoimento group-textarea">
				<span>Sessão 2</span>
				<hr style="width: 70%;display: inline-block;height: 3px;background: gray;">
			</div><!--from-group-->

			<div class="group-depoimento group-textarea">
				<span>Título 2:</span>
				<input type="text" name="titulo_2" value="<?php echo $config['titulo_2']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Subtítulo 2:</span>
				<input type="text" name="subtitulo_2" value="<?php echo $config['subtitulo_2']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span style="vertical-align:top;">Título Icone 1:</span>
				<input type="text" name="titulo_icone_1" value="<?php echo $config['titulo_icone_1']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span style="vertical-align:top;">Texto Icone 1:</span>
				<textarea name="texto_icone_1"><?php echo $config['texto_icone_1']?></textarea>
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span style="vertical-align:top;">Título Icone 2:</span>
				<input type="text" name="titulo_icone_2" value="<?php echo $config['titulo_icone_2']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span style="vertical-align:top;">Texto Icone 2:</span>
				<textarea name="texto_icone_2"><?php echo $config['texto_icone_2']?></textarea>
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span style="vertical-align:top;">Título Icone 3:</span>
				<input type="text" name="titulo_icone_3" value="<?php echo $config['titulo_icone_3']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span style="vertical-align:top;">Texto Icone 3:</span>
				<textarea name="texto_icone_3"><?php echo $config['texto_icone_3']?></textarea>
			</div><!--from-group-->

			<div class="group-depoimento group-textarea">
				<span>Rodapé</span>
				<hr style="width: 70%;display: inline-block;height: 3px;background: gray;">
			</div><!--from-group-->

			<div class="group-depoimento group-textarea">
				<span>Título:</span>
				<input type="text" name="ultimo_titulo" value="<?php echo $config['ultimo_titulo']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Subtítulo:</span>
				<input type="text" name="ultimo_subtitulo" value="<?php echo $config['ultimo_subtitulo']?>">
			</div><!--from-group-->

			<div class="group-depoimento">
				<input type="hidden" name="nome_tabela" value="tb_site.home">
				<input <?php permissaoInput(1,'acao_editar','Editar') ?> />
			
			</div><!--from-group-->

		</form>
	</div><!--form-editar-->

</div><!--box-content-->