<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		$selectImagem = Mysql::conectar()->prepare("SELECT foto FROM `tb_site.apadrinhar` WHERE id = ?");
		$selectImagem->execute(array($_GET['excluir']));
		$imagem = $selectImagem->fetch()['foto'];
		Painel::deleteFile($imagem);
		Painel::deletar('tb_site.apadrinhar',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'sem-padrinhos');
	}else if(isset($_GET['excluir-padrinho'])){
		$idExcluir = intval($_GET['excluir-padrinho']);
		$selectImagem = Mysql::conectar()->prepare("SELECT foto FROM `tb_site.apadrinhar` WHERE id = ?");
		$selectImagem->execute(array($_GET['excluir-padrinho']));
		$imagem = $selectImagem->fetch()['foto'];
		$selectNome = Mysql::conectar()->prepare("SELECT nome FROM `tb_site.apadrinhar` WHERE id = ?");
		$selectNome->execute(array($_GET['excluir-padrinho']));
		$nome = $selectNome->fetch()['nome'];
		$slug = Painel::generateSlug($nome);
		$selectDescricao = Mysql::conectar()->prepare("SELECT descricao FROM `tb_site.apadrinhar` WHERE id = ?");
		$selectDescricao->execute(array($_GET['excluir-padrinho']));
		$descricao = $selectDescricao->fetch()['descricao'];
		$arr = ['nome'=>$nome,'foto'=>$imagem,'nome_tabela'=>'tb_site.apadrinhar','slug'=>$slug,'descricao'=>$descricao,'categoria_id'=>'2','padrinho'=>'','email'=>'','valor'=>'','compra'=>'','data'=>'','id'=>$idExcluir,'order_id'=>$idExcluir];
		Painel::update($arr);
		Painel::redirect(INCLUDE_PATH_PAINEL.'sem-padrinhos');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.apadrinhar',$_GET['order'],$_GET['id']);
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
		<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-padrinhos">
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
			<h2>Com Padrinhos</h2>
		</a>
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
			<h2 class="active-btn">Editar Padrinhos</h2>
		</div><!--breadcrump-->
</div><!--wraper-titulo-->

<?php include('pages/listar-animais-padrinhos.php')?>

<br>
