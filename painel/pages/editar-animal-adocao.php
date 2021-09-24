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
			<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/editar-depoimento-gray.png">
			<h2 class="active-btn">Editar Animal</h2>
		</div><!--breadcrump-->
</div><!--wraper-titulo-->

<?php include('pages/listar-adocao.php')?>

<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
	<h2>Editar Animal</h2>
	<?php
		if(isset($_POST['acao_editar'])){
			$nome = $_POST['nome'];
			$descricao = $_POST['descricao'];
			$imagem_atual = $_POST['imagem_atual'];
			$imagem = $_FILES['imagem'];

			$verificar = Mysql::conectar()->prepare("SELECT `id` FROM `tb_site.adotar` WHERE nome = ? AND id != ?");
			$verificar->execute(array($nome,$id));
			if($verificar->rowCount() == 0){
				
			if($imagem['name'] != ''){
				if(Painel::imagemValida($imagem)){
					$slug = Painel::generateSlug($_POST['nome']);
					Painel::deleteFile($imagem_atual);
					$imagem = Painel::uploadFile($imagem);
					$arr = ['nome'=>$nome,'foto'=>$imagem,'nome_tabela'=>'tb_site.adotar','slug'=>$slug,'descricao'=>$descricao,'categoria_id'=>'2','adotador'=>'','email'=>'','telefone'=>'','data'=>'','id'=>$id,'order_id'=>$id];
					Painel::update($arr);
					Painel::alert('sucesso','Animal Editado Com Sucesso!');
					$noticia_editar = Painel::select('tb_site.adotar','id = ?',array($id));
					Painel::redirect(INCLUDE_PATH_PAINEL.'editar-animal-adocao?id='.$id);
				}else{
					Painel::alert('erro','O formato da imagem não é valida');
					}
				}else{
					$slug = Painel::generateSlug($_POST['nome']);
					$imagem = $imagem_atual;
					$arr = ['nome'=>$nome,'foto'=>$imagem,'nome_tabela'=>'tb_site.adotar','slug'=>$slug,'descricao'=>$descricao,'categoria_id'=>'2','adotador'=>'','email'=>'','telefone'=>'','data'=>'','id'=>$id,'order_id'=>$id];
					Painel::update($arr);
					Painel::alert('sucesso','Animal Editado Com Sucesso!');
					$noticia_editar = Painel::select('tb_site.adotar','id = ?',array($id));
					Painel::redirect(INCLUDE_PATH_PAINEL.'editar-animal-adocao?id='.$id);
				}
			}else{
				Painel::alert('erro','Já existe um animal com este nome no banco!');
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
				<img style="max-width: 70px; vertical-align: middle;" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $noticia_editar['foto']?>"/>
				<input style="width: calc(100% - 180px)" type="file" name="imagem" id="input-img" value="">
				<input type="hidden" name="imagem_atual" value="<?php echo $noticia_editar['foto'];?>">
				<label style="left: 142px;" for="input-img" name="imagem"><img src="<?php echo INCLUDE_PATH_PAINEL?>img/enviar-img.png"></label>
			</div><!--from-group-->
			<div class="group-depoimento group-textarea cadastrar-categoria">
				<span style="vertical-align: top;">Descrição:</span>
				<textarea name="descricao" required><?php echo $noticia_editar['descricao'] ?></textarea>
			</div><!--from-group-->
			
			<div class="form-group">
				
				<input <?php permissaoInput(1,'acao_editar','Editar')?>>
			
			</div><!--from-group-->
		</form>
	</div><!--form-editar-->

</div><!--box-content-->