<div class="container fundo-doar">

	<div class="title-section">
		<div class="png-txt"></div>
		<h2><?php echo $infoSiteGaleria['t_foto']?></h2>
		<p><?php echo $infoSiteGaleria['p_foto']?></p>
	</div><!--title-section-->

</div><!--container-->

<div class="container-principal">

	<div class="container">

		<div class="wraper-doar">
			<h3>Nos mande uma foto de alta qualidade, do seu animal, de você e ele, como preferir.<span style="color: red;font-size: 30px;">&hearts;</span> Sua Foto será colocada na nossa página do Facebook, no nosso Instagram, e claro, no nosso site &#128516;</h3>
		</div><!--wraper-doar-->

		<div class="wraper-doar">
			<p><b style="font-size: 18px;color: gray;">Você só precisa preencher o formulário abaixo</b></p>
			<?php
				if(isset($_POST['acao'])){
					$nome = $_POST['nome_pessoa_enviar'];
					$nome_animal = $_POST['nome_animal_enviar'];
					$email = $_POST['email_enviar'];
					$imagem = $_FILES['foto_post'];

					if($nome == ''){
						Painel::alert('erro','Adicione um nome para continuar');
					}else if($nome_animal == ''){
						Painel::alert('erro','Adicione o nome do seu Animal');
					}else if($email != ''){
						if(Painel::imagemValida($imagem) == true){
							$imagem = Painel::uploadFile($imagem);
							$arr = ['nome'=>$nome,'nome_animal'=>$nome_animal,'email'=>$email,'nome_tabela'=>'tb_foto.recebida','foto'=>$imagem,'order_id'=>'0'];
							Painel::insert($arr);
							Painel::alert('sucesso','Foto Enviada Com Sucesso!');
							Painel::redirect(INCLUDE_PATH.'enviar-foto');
						}else{
							Painel::alert('erro','O formato da Imagem Não é Valida');
						}
					}
					else{
						if(Painel::imagemValida($imagem) == true){
							$email = '';
							$imagem = Painel::uploadFile($imagem);
							$arr = ['nome'=>$nome,'nome_animal'=>$nome_animal,'email'=>$email,'nome_tabela'=>'tb_foto.recebida','foto'=>$imagem,'order_id'=>'0'];
							Painel::insert($arr);
							Painel::alert('sucesso','Foto Enviada Com Sucesso!');
							Painel::redirect(INCLUDE_PATH.'enviar-foto');
						}else{
							Painel::alert('erro','O formato da Imagem Não é Valida');
						}
					}
				}
			?>
			<form method="POST" class="form-doar form-contato" enctype="multipart/form-data">
				<p>Seu nome*</p>
				<input type="text" name="nome_pessoa_enviar" required>
				<p>Nome do Animal*</p>
				<input type="text" name="nome_animal_enviar" required>
				<p class="info-hidden">Seu e-mail <span class="info-plus">Esse Campo É Opcional. <br> Se você optar por colocar seu e-mail, recebera uma notificação quando sua foto for postada nas nossas mídias &#128516;</span> <span class="info-mais">?</span></p>
				<input type="text" name="email_enviar">
				<p>Sua Foto*</p>
				<input class="text" type="file" name="foto_post" required>
				<p>*Campos Obrigatórios</p>
				<input class="btn-doar" type="submit" name="acao" value="ENVIAR">
			</form>
		</div><!--wraper-doar-->


	</div><!--container-->

</div><!--container-principal-->