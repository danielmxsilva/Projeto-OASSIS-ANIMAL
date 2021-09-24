
<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/lapis.png">
	<h2>Adicionar Equipe</h2>
	<?php
		if(isset($_POST['acao_adicionar'])){
			$nome = $_POST['nome'];
			$foto = $_FILES['foto'];
			$texto = $_POST['texto'];
	
			if($nome == ''){
				Painel::alert('erro','Adicione um nome para continuar');
			}else if($texto == ''){
				Painel::alert('erro','Adicione um texto para continuar');
			}else{
				if(Painel::imagemValida($foto) == true){
					$foto = Painel::uploadFile($foto);
					$arr = ['foto'=>$foto,'nome_tabela'=>'tb_site.equipe','nome'=>$nome,'texto'=>$texto,'order_id'=>'0'];
					Painel::insert($arr);
					Painel::alert('sucesso','Membro Adicionado Com Sucesso!');
					Painel::redirect(INCLUDE_PATH_PAINEL.'configuracao-equipe');
				}else{
					Painel::alert('erro','O formato da Imagem Não é Valida');
				}

			}
		}
	?>
	<div class="form-editar cadastro-depoimentos">
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<span style="width: 60px;">Foto:</span>
				<input type="file" required name="foto" id="input-img">
				<label for="input-img" name="foto"><img src="<?php echo INCLUDE_PATH_PAINEL?>img/enviar-img.png"></label>
			</div><!--from-group-->
			<div class="group-depoimento">
				<span style="width: 65px;">Nome:</span>
				<input type="text" name="nome" required>
			</div><!--from-group-->
			<div class="group-depoimento group-textarea">
				<span style="vertical-align: top;width: 65px;">Texto:</span>
				<textarea name="texto" required></textarea>
			</div><!--from-group-->
			<div class="group-depoimento">
				<input type="hidden" name="order_id" value="0">
				<input type="hidden" name="nome_tabela" value="tb_site.equipe">
				<input <?php permissaoInput(1,'acao_adicionar','Adicionar')?>>
			
			</div><!--from-group-->
		</form>
	</div><!--form-editar-->

</div><!--box-content-->
