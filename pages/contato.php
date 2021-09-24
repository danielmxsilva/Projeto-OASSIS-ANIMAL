<div class="container fundo-doar">

	<div class="title-section">
		<div class="png-txt"></div>
		<h2><?php echo $infoSiteContato['titulo']?></h2>
		<p><?php echo $infoSiteContato['subtitulo']?></p>
	</div><!--title-section-->

</div><!--container-->

<div class="container-principal">

	<div class="container">

		<?php
			if(isset($_POST['acao'])){
				$motivo = $_POST['motivo'];
				$nome = $_POST['nome_contato'];
				$email = $_POST['email_contato'];
				$telefone = $_POST['whatsapp_contato'];
				$data = date('Y-m-d');

				if($nome == ''){
					Painel::alert('erro','Adicione um nome para continuar');
				}else if($email == ''){
					Painel::alert('erro','Adicione um email para continuar');
				}else if($telefone == ''){
					Painel::alert('erro','Adicione um telefone para continuar');
				}else{
					$arr = ['motivo_contato'=>$motivo,'nome'=>$nome,'email'=>$email,'nome_tabela'=>'tb_config.contato','telefone'=>$telefone,'data'=>$data,'order_id'=>'0'];
					Painel::insert($arr);
					Painel::alert('sucesso','Enviado Com Sucesso!');
				}
			}
		?>

		<div class="wraper-doar">
			<h3><?php echo $infoSiteContato['texto']?></h3>
		</div><!--wraper-doar-->

		<div class="wraper-doar">
			<p>Agradecemos seu contato <span style="color: red;font-size: 20px;">&hearts;</span>, <b style="color:#FDCB58;">só preencher o formulário abaixo</b>. &#128516;</p>
			<form method="POST" class="form-doar form-contato">
				<p>Motivo Contato</p>
				<select required name="motivo">
					<option value="Patrocinio">Patrocinio</option>
					<option value="Informações">Informações</option>
					<option value="Sugestão">Sugestões</option>
					<option value="Conhecer a ong">Conhecer a ONG</option>
					<option value="Dúvidas">Dúvidas</option>
					<option value="Solicitar um resgate animal">Solicitar um resgate animal</option>
					<option value="Outro">Outro</option>
				</select>
				<p>Seu nome*</p>
				<input type="text" name="nome_contato" required>
				<p>Seu e-mail*</p>
				<input type="text" name="email_contato" required>
				<p>Seu whatsapp*</p>
				<input class="text" type="text" name="whatsapp_contato" required>
				<p>*Campos Obrigatórios</p>
				<input class="btn-doar" type="submit" name="acao" value="ENVIAR">
			</form>
		</div><!--wraper-doar-->


	</div><!--container-->

</div><!--container-principal-->