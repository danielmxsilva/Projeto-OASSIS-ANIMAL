<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$slide_editar = Painel::select('tb_config.contato','id = ?',array($id));
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
		<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-fotos">
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
			<h2>Gerenciar Fotos</h2>
		</a>
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/editar-depoimento-gray.png">
			<h2 class="active-btn">Editar Fotos</h2>
		</div><!--breadcrump-->
</div><!--wraper-titulo-->

<?php include('pages/listar-contatos.php')?>

<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
	<h2>Ver Contato</h2>
	<div class="form-editar">
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<span>Motivo:</span>
				<input type="text" name="nome" disabled value="<?php echo $slide_editar['motivo_contato']?>">
			</div><!--from-group-->
			<div class="form-group">
				<span>Nome:</span>
				<input type="text" name="nome" disabled value="<?php echo $slide_editar['nome']?>">
			</div><!--from-group-->
			<div class="form-group">
				<span>E-mail:</span>
				<input type="text" name="nome_animal" disabled value="<?php echo $slide_editar['email']?>">
			</div><!--from-group-->
			<div class="form-group">
				<span>Telefone:</span>
				<input type="text" name="email" disabled value="<?php echo $slide_editar['telefone']?>">
			</div><!--from-group-->
			<div class="form-group">
				<span>Data:</span>
				<input type="text" name="email" disabled value="<?php echo date('d/m/Y',strtotime($slide_editar["data"]))?>">
			</div><!--from-group-->
		</form>
	</div><!--form-editar-->

</div><!--box-content-->