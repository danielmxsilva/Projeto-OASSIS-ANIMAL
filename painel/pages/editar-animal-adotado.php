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
		<a href="<?php echo INCLUDE_PATH_PAINEL?>animais-adotados">
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
			<h2>Animais Adotados</h2>
		</a>
			<span>/</span>
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
			<h2 class="active-btn">Editar Adoção</h2>
		</div><!--breadcrump-->
</div><!--wraper-titulo-->

<?php include('pages/listar-animais-adotados.php')?>


<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
	<h2>Editar Conteúdo</h2>
	<?php
		if(isset($_POST['acao_editar'])){
			$nome_animal = $_POST['nome'];
			$descricao = $_POST['descricao'];
			$padrinho = $_POST['nome_padrinho'];
			$email = $_POST['email'];
			$valor = $_POST['valor'];
			$imagem = $_POST['foto_animal'];
			$compra = $_POST['compra'];
			$data = date('Y-m-d');
			$id = $_POST['id_animal'];
				
			if($nome_animal == ''){
				Painel::alert('erro','Campos Vazios não são permitidos!');
			}else{
				$arr = ['nome'=>$nome_animal,'foto'=>$imagem,'slug'=>'','descricao'=>$descricao,'categoria_id'=>'0','nome_tabela'=>'tb_site.apadrinhar','padrinho'=>$padrinho,'email'=>$email,'valor'=>$valor,'compra'=>$compra,'order_id'=>$id,'data'=>$data,'id'=>$id];
				Painel::update($arr);
				Painel::alert('sucesso','Animal Adicionado aos Apadrinhados com Sucesso!');
				Painel::redirect(INCLUDE_PATH_PAINEL.'sem-padrinhos');
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
				<input type="text" name="nome_padrinho" required value="<?php echo $noticia_editar['adotador']?>">
			</div><!--from-group-->
			<div class="form-group cadastrar-categoria">
				<span>E-mail:</span>
				<input type="text" name="email" required value="<?php echo $noticia_editar['email']?>">
			</div><!--from-group-->
			<div class="form-group cadastrar-categoria">
				<span>Telefone:</span>
				<input type="text" name="valor" required value="<?php echo $noticia_editar['telefone']?>">
			</div><!--from-group-->
				<input type="hidden" name="descricao" value="<?php echo $noticia_editar['descricao'] ?>">
				<input type="hidden" name="id_animal" value="<?php echo $id?>">
			
			<div class="form-group">
				
				<input <?php permissaoInput(1,'acao_editar','Adicionar')?>>
			
			</div><!--from-group-->
		</form>
	</div><!--form-editar-->

</div><!--box-content-->