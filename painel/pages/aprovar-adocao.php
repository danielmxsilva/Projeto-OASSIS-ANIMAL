<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$noticia_editar = Painel::select('tb_site.adotar','id = ?',array($id));
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
		<a href="<?php echo INCLUDE_PATH_PAINEL?>para-adocao">
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
			<h2>Para Adoção</h2>
		</a>
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
			<h2 class="active-btn">Adicionar Animal</h2>
		</div><!--breadcrump-->
</div><!--wraper-titulo-->

<?php include('pages/listar-adocao.php')?>

<?php include('pages/listar-novas-adocao.php')?>

<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
	<h2>Aprovar Adoção</h2>
	<?php
		if(isset($_POST['acao_editar'])){
			$nome_animal = $_POST['nome'];
			$descricao = $_POST['descricao'];
			$pessoa = $_POST['nome_pessoa'];
			$email = $_POST['email'];
			$telefone = $_POST['telefone'];
			$imagem = $_POST['foto_animal'];
			$data = date('Y-m-d');
			$id = $_POST['id_animal'];
				
			if($nome_animal == ''){
				Painel::alert('erro','Campos Vazios não são permitidos!');
			}else{
				$arr = ['nome'=>$nome_animal,'foto'=>$imagem,'slug'=>'','descricao'=>$descricao,'categoria_id'=>'0','nome_tabela'=>'tb_site.adotar','adotador'=>$pessoa,'email'=>$email,'telefone'=>$telefone,'order_id'=>$id,'data'=>$data,'id'=>$id];
				Painel::update($arr);
				Painel::alert('sucesso','Adoção Aprovado com Sucesso!');
				Painel::redirect(INCLUDE_PATH_PAINEL.'para-adocao');
				}
		}
	?>
	<div class="form-editar">
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group cadastrar-categoria">
				<span>Nome/Animal:</span>
				<input type="text" name="nome" required value="<?php echo $noticia_editar['nome']?>">
			</div><!--from-group-->
			<div class="form-group cadastrar-categoria">
				<span>Foto:</span>
				<img style="max-width: 80px;width: 80px; vertical-align: middle;" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $noticia_editar['foto']?>"/>
				<input type="hidden" name="foto_animal" value="<?php echo $noticia_editar['foto'];?>">
			</div><!--from-group-->
			<div class="form-group cadastrar-categoria">
				<span>Pessoa:</span>
				<input type="text" name="nome_pessoa" required value="<?php echo $noticia_editar['adotador']?>">
			</div><!--from-group-->
			<div class="form-group cadastrar-categoria">
				<span>E-mail:</span>
				<input type="text" name="email" value="<?php echo $noticia_editar['email']?>">
			</div><!--from-group-->
			<div class="form-group cadastrar-categoria">
				<span>Telefone:</span>
				<input type="text" name="telefone" required value="<?php echo $noticia_editar['telefone']?>">
			</div><!--from-group-->

				<input type="hidden" name="descricao" value="<?php echo $noticia_editar['descricao'] ?>">
				<input type="hidden" name="id_animal" value="<?php echo $id?>">
			
			<div class="form-group">
				
				<input <?php permissaoInput(1,'acao_editar','Aprovar')?>>
			
			</div><!--from-group-->
		</form>
	</div><!--form-editar-->

</div><!--box-content-->