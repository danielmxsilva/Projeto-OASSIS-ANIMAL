<?php
	$config = Painel::select('tb_config.apadrinhar',false);
?>
<div class="wraper-titulo">
	<div class="titulo-content">
		<img style="position:relative;top:5px;" src="<?php echo INCLUDE_PATH_PAINEL?>img/config.png">
		<h2>Configuração Apadrinhar</h2>
	</div><!--titulo-content-->
	<div class="breadcrump">
	<a href="<?php echo INCLUDE_PATH_PAINEL?>index.php">
		<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/home.png">
		<h2>Home</h2>
	</a>
		<span>/</span>
		<img src="<?php echo INCLUDE_PATH_PAINEL?>img/config.png">
		<h2 class="active-btn">Configuração Apadrinhar</h2>
	</div><!--breadcrump-->
</div><!--wraper-titulo-->

<?php permissaoPagina(1)?>

<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/editar-depoimento-gray.png">
	<h2>Editar Textos Página Principal</h2>

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
				Painel::redirect(INCLUDE_PATH_PAINEL.'configuracao-apadrinhar');
			}else{
				Painel::alert('Campos Vazios não são permitidos!');
			}
		}
	
	?>

	<div class="form-editar cadastro-depoimentos">
		<form method="POST" enctype="multipart/form-data">
			<div class="group-depoimento group-textarea">
				<span>Título:</span>
				<input type="text" name="titulo_1" value="<?php echo $config['titulo_1']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Subtitulo:</span>
				<input type="text" name="texto_1" value="<?php echo $config['texto_1']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Título 2:</span>
				<input type="text" name="titulo_2" value="<?php echo $config['titulo_2']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Texto:</span>
				<input type="text" name="texto_2" value="<?php echo $config['texto_2']?>">
			</div><!--from-group-->

			<div class="group-depoimento group-textarea">
				<span>TXT Apadrinhado:</span>
				<input type="text" name="titulo_apadrinhado" value="<?php echo $config['titulo_apadrinhado']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>TXT Apadrinhar:</span>
				<input type="text" name="titulo_sem_padrinho" value="<?php echo $config['titulo_sem_padrinho']?>">
			</div><!--from-group-->


			<div class="group-depoimento">
				<input type="hidden" name="nome_tabela" value="tb_config.apadrinhar">
				<input <?php permissaoInput(1,'acao_editar','Editar') ?> />
			
			</div><!--from-group-->

		</form>
	</div><!--form-editar-->

</div><!--box-content-->

<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/editar-depoimento-gray.png">
	<h2>Editar Textos Página Secundaria</h2>

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
				Painel::redirect(INCLUDE_PATH_PAINEL.'configuracao-apadrinhar');
			}else{
				Painel::alert('Campos Vazios não são permitidos!');
			}
		}
	
	?>

	<div class="form-editar cadastro-depoimentos">
		<form method="POST" enctype="multipart/form-data">
			<div class="group-depoimento group-textarea">
				<span>Título:</span>
				<input type="text" name="titulo_pagina" value="<?php echo $config['titulo_pagina']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Subtitulo:</span>
				<input type="text" name="subtitulo_pagina" value="<?php echo $config['subtitulo_pagina']?>">
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span>Texto:</span>
				<input type="text" name="texto_pagina" value="<?php echo $config['texto_pagina']?>">
			</div><!--from-group-->

			<div class="group-depoimento group-textarea">
				<span>Texto:</span>
				<input type="text" name="mais_pagina" value="<?php echo $config['mais_pagina']?>">
			</div><!--from-group-->

			<div class="group-depoimento">
				<input type="hidden" name="nome_tabela" value="tb_config.apadrinhar">
				<input <?php permissaoInput(1,'acao_editar','Editar') ?> />
			
			</div><!--from-group-->

		</form>
	</div><!--form-editar-->

</div><!--box-content-->