<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$slide_editar = Painel::select('tb_foto.home','id = ?',array($id));
	}else{
		Painel::alert('erro','Você Precisa Passar o ID!');
		die();
	}
?>

<div class="wraper-titulo">
		<div class="titulo-content">
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/notebook.png">
			<h2>Painel de Controle</h2>
		</div><!--titulo-content-->
		<div class="breadcrump">
		<a href="<?php echo INCLUDE_PATH_PAINEL?>index.php">
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/home.png">
			<h2>Home</h2>
		</a>
		<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-home">
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
			<h2>Gerenciar Home</h2>
		</a>
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/editar-depoimento-gray.png">
			<h2 class="active-btn">Adicionar Fotos</h2>
		</div><!--breadcrump-->
</div><!--wraper-titulo-->

<?php include('pages/listar-fotos-home.php')?>

<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
	<h2>Editar Imagem</h2>
	<?php
		if(isset($_POST['acao_editar'])){
			$nome = $_POST['nome'];
			$imagem_atual = $_POST['imagem_atual'];
			$imagem = $_FILES['imagem'];

			if($imagem['name'] != ''){
				if(Painel::imagemValida($imagem)){
					Painel::deleteFile($imagem_atual);
					$imagem = Painel::uploadFile($imagem);
					$arr = ['foto'=>$imagem,'nome'=>$nome,'nome_tabela'=>'tb_foto.home','id'=>$id];
					Painel::update($arr);
					Painel::alert('sucesso','Imagem Editada Com Sucesso!');
					$slide_editar = Painel::select('tb_foto.home','id = ?',array($id));
					Painel::redirect(INCLUDE_PATH_PAINEL.'editar-home?id='.$id);
				}else{
					Painel::alert('erro','O formato da imagem não é valida');
				}
			}else{
				$imagem = $imagem_atual;
				$arr = ['foto'=>$imagem,'nome'=>$nome,'nome_tabela'=>'tb_foto.home','id'=>$id];
				Painel::update($arr);
				Painel::alert('sucesso','Nome editado com sucesso!');
				$slide_editar = Painel::select('tb_foto.home','id = ?',array($id));
				Painel::redirect(INCLUDE_PATH_PAINEL.'editar-home?id='.$id);
			}
		}
	?>
	<div class="form-editar">
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<span>Nome:</span>
				<input type="text" name="nome" required value="<?php echo $slide_editar['nome']?>">
			</div><!--from-group-->
			<div class="form-group">
				<span>Imagen:</span>
				<img style="width: 50px; vertical-align: middle;" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $slide_editar['foto']?>"/>
				<input style="width: calc(100% - 120px)" type="file" name="imagem" id="input-img" value="">
				<input type="hidden" name="imagem_atual" value="<?php echo $slide_editar['foto'];?>">
				<label style="left: 125px;" for="input-img" name="imagem"><img src="<?php echo INCLUDE_PATH_PAINEL?>img/enviar-img.png"></label>
			</div><!--from-group-->
			<div class="form-group">
				
				<input <?php permissaoInput(1,'acao_editar','Editar')?>>
			
			</div><!--from-group-->
		</form>
	</div><!--form-editar-->

</div><!--box-content-->