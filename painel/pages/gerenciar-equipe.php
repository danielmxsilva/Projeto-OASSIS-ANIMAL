<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		$selectImagem = Mysql::conectar()->prepare("SELECT foto FROM `tb_site.equipe` WHERE id = ?");
		$selectImagem->execute(array($_GET['excluir']));
		$imagem = $selectImagem->fetch()['foto'];
		Painel::deleteFile($imagem);
		Painel::deletar('tb_site.equipe',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-equipe');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.equipe',$_GET['order'],$_GET['id']);
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
		<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-equipe">
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
			<h2>Gerenciar Equipe</h2>
		</a>
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
			<h2 class="active-btn">Adicionar Membros</h2>
		</div><!--breadcrump-->
</div><!--wraper-titulo-->

<?php include('pages/listar-equipe.php')?>


<br>

<?php
	
	include('pages/adicionar-equipe.php');

?>