<div class="container fundo-doar">

	<div class="title-section">
		<div class="png-txt"></div>
		<h2><?php echo $infoSiteDoar['titulo_1']?></h2>
		<p><?php echo $infoSiteDoar['subtitulo_1']?></p>
	</div><!--title-section-->

</div><!--container-->

<div class="container-principal">

	<div class="container">

		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome_doar'];
				$email = $_POST['email_doar'];
				$valor = $_POST['valor'];
				$data = date('Y-m-d');

				if($nome == ''){
					Painel::alert('erro','Adicione um nome para continuar');
				}else if($email == ''){
					$arr = ['nome'=>$nome,'email'=>$email,'nome_tabela'=>'tb_site.doador','valor_doado'=>$valor,'data'=>$data,'order_id'=>'0'];
					Painel::insert($arr);
					Painel::alert('sucesso','Enviado Com Sucesso!');
					Painel::redirect(INCLUDE_PATH.'doar');
				}
				else{
					$arr = ['nome'=>$nome,'email'=>$email,'nome_tabela'=>'tb_site.doador','valor_doado'=>$valor,'data'=>$data,'order_id'=>'0'];
					Painel::insert($arr);
					Painel::alert('sucesso','Enviado Com Sucesso!');
					Painel::redirect(INCLUDE_PATH.'doar');
				}
			}
		?>

		<div class="wraper-doar">
			<h3><?php echo $infoSiteDoar['titulo_2']?></h3>

			<p><?php echo $infoSiteDoar['subtitulo_2']?></p>
		</div><!--wraper-doar-->



		<div class="wraper-doar">
			<p>Agradeçemos sua ajuda <span style="color: red;font-size: 20px;">&hearts;</span>, Você pode nos ajudar em qualquer uma de nossas contas e com qualquer quantia:&#128516; <br> <b style="color:#FDCB58;"><?php echo $infoSiteDoar['cnpj']?></b></p>
		</div><!--wraper-doar-->

		<div class="wraper-doar">
			<img src="<?php echo INCLUDE_PATH?>img/pix.png">
			<p><b style="color:#32BCAD;">Ajudar - </b><?php echo $infoSiteDoar['pix']?></p>
		</div><!--wraper-doar-->

		<div class="wraper-doar">
			<img src="<?php echo INCLUDE_PATH?>img/paypal.png">
			<p><b style="color:#07368B;">Ajudar - </b><?php echo $infoSiteDoar['paypal']?></p>
		</div><!--wraper-doar-->

		<div class="wraper-doar">
			<img src="<?php echo INCLUDE_PATH?>img/picpay.png">
			<br>
			<img src="<?php echo INCLUDE_PATH?>img/frame.png">
		</div><!--wraper-doar-->

		<div class="wraper-doar">
			<p><?php echo $infoSiteDoar['texto_form']?></p>
			<form method="POST" class="form-doar form-contato">
				<p>Seu nome*</p>
				<input type="text" name="nome_doar" required>
				<p class="info-hidden">Seu e-mail <span class="info-plus">Esse Campo É Opcional. <br> Se você optar por colocar seu e-mail, recebera uma noticação de como sua doação foi usada com fotos, relatórios e mais brindes &#128516; <a style="color:white;" href="">Saiba Mais</a></span> <span class="info-mais">?</span></p>
				<input type="text" name="email_doar">
				<p>Valor doação*</p>
				<select required name="valor">
					<option value="ate 10R$">Até 10R$</option>
					<option value="ate 50R$">Até 50R$</option>
					<option value="ate 100R$">Até 100R$</option>
					<option value="ate 300R$">Até 300R$</option>
					<option value="ate 500R$">Até 500R$</option>
					<option value="500R$ mais">Mais de 500R$</option>
				</select>
				<p>*Campos Obrigatórios</p>
				<input class="btn-doar" type="submit" name="acao" value="ENVIAR">
			</form>
		</div><!--wraper-doar-->


	</div><!--container-->

</div><!--container-principal-->