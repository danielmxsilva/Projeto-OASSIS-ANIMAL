

<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
	<h2>Adicionar Animal Para Adoção</h2>
	<?php
		if(isset($_POST['acao_adicionar'])){
			$nome = $_POST['nome'];
			$descricao = $_POST['descricao'];
			$foto = $_FILES['foto'];

			if($nome == '' || $descricao == ''){
				Painel::alert('erro','Campos vazios não são permitidos!');
			}else if($foto['tmp_name'] == ''){
				Painel::alert('erro','A imagem precisa ser selecionada.');
			}else{
				if(Painel::imagemValida($foto)){
					$verifica = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE nome = ?");
					$verifica->execute(array($nome));
					if($verifica->rowCount() == 0){
						$foto = Painel::uploadFile($foto);
						$slug = Painel::generateSlug($nome);
						$arr = ['nome'=>$nome,'foto'=>$foto,'slug'=>$slug,'descricao'=>$descricao,'categoria_id'=>'2','adotador'=>'','email'=>'','telefone'=>'','data'=>'','order_id'=>'0','nome_tabela'=>'tb_site.adotar'];
						if(Painel::insert($arr)){
							Painel::alert('sucesso','O cadastro do animal foi realizado com sucesso!');
							Painel::redirect(INCLUDE_PATH_PAINEL.'para-adocao');
						}

					}else{
						Painel::alert('erro','Já Existe um animal com esse nome!');
					}
				}else{
					Painel::alert('erro','Selecione uma imagem válida!');
				}
			}
		}
	?>
	<div class="form-editar cadastro-depoimentos">
		<form method="POST" enctype="multipart/form-data">
			<!--
			<div class="group-depoimento">
				<span>Categoria:</span>
				<select name="categoria_id" required>
					<?php
 						/*$categoria = Painel::selectAll('tb_site.categorias');
 						foreach($categoria as $key => $value){
					?>
					<option <?php if($value['id'] == @$_POST['categoria_id']) echo 'selected'?> value="<?php echo $value['id']?>"><?php echo $value['nome']?></option>
					<?php }*/?>
				</select>
			</div>-->
			<div class="group-depoimento">
				<span>Nome/Animal:</span>
				<input type="text" name="nome" required="" value="<?php echo recoverPost('nome')?>">
			</div><!--from-group-->
			<div class="form-group">
				<span>Foto:</span>
				<input style="width: calc(100% - 120px)" type="file" required name="foto" id="input-img" value="<?php echo $_SESSION['img'];?>">
				<label style="left: 110px;" for="input-img" name="foto"><img src="<?php echo INCLUDE_PATH_PAINEL?>img/enviar-img.png"></label>
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span style="vertical-align: top;">Descrição:</span>
				<textarea name="descricao" required><?php echo recoverPost('descricao')?></textarea>
			</div><!--from-group-->
			
			<div class="group-depoimento">
				<input type="hidden" name="order_id" value="0">
				<input type="hidden" name="nome_tabela" value="tb_site.adotar">
				<input <?php permissaoInput(1,'acao_adicionar','Adicionar')?>>
			
			</div><!--from-group-->
		</form>
	</div><!--form-editar-->

</div><!--box-content-->

