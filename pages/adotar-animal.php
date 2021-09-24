<?php
	$url = explode('/',$_GET['url']);
	$verifica_categoria = Mysql::conectar()->prepare("SELECT * FROM `tb_adotar.categorias` WHERE slug = ?");
	$verifica_categoria->execute(array($url[0]));
	if($verifica_categoria->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'adotar');
	}
	$categoria_info = $verifica_categoria->fetch();

	$post = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE slug = ? AND categoria_id = ?");
	$post->execute(array($url[1],'2'));
	if($post->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'adotar');
	}

	$post = $post->fetch();
?>
<div class="container fundo-doar">

	<div class="title-section">
		<div class="png-txt"></div>
		<h2><?php echo $infoSiteAdotar['titulo_pagina']?></h2>
		<p><?php echo $infoSiteAdotar['subtitulo_pagina']?></p>
	</div><!--title-section-->

</div><!--container-->

<div class="container-principal">

	<div class="container">

		<?php
			if(isset($_POST['acao'])){
				$nome_animal = $_POST['animal'];
				$descricao = $_POST['descricao'];
				$adotador = $_POST['nome_adocao'];
				$email = $_POST['email_adocao'];
				$telefone = $_POST['whatsapp_adocao'];
				$slug = $_POST['slug'];
				$imagem = $_POST['foto_animal'];
				$data = date('Y-m-d');
				$id = $_POST['id_animal'];
					
				if($adotador == '' || $email == '' || $telefone == ''){
					Painel::alert('erro','Campos Vazios não são permitidos!');
				}else{
					$arr = ['nome'=>$nome_animal,'foto'=>$imagem,'slug'=>$slug,'descricao'=>$descricao,'categoria_id'=>'1','nome_tabela'=>'tb_site.adotar','adotador'=>$adotador,'email'=>$email,'telefone'=>$telefone,'order_id'=>$id,'data'=>$data,'id'=>$id];
					Painel::update($arr);
					Painel::alert('sucesso','Parabéns Pela Adoção '.$adotador.', Temos certeza de que '.$nome_animal.' Vai fazer sua fámilia mais feliz &#128516; Entraremos em contato pelo WhatsApp');
					//Painel::redirect(INCLUDE_PATH.'apadrinhar-animais');
					}
			}
		?>

		<div class="flex container-historia container-doar">
				
				<div class="historia-txt w50">
					<h3>OI MEU NOME É <span style="text-transform: uppercase;"><?php echo $post['nome']?></span></h3>
					<p style="font-size: 16px;line-height: 20px;"><?php echo $post['descricao']?>.</p>
				</div><!--historia-txt-->
				<div class="historia-img w50">
					<div class="background-img"></div>
					<div class="wraper-img-container">
						<div class="job-parent parent-img-ajuda">
						<div class="nav-galeria">
							<div class="img-wraper" style="width:100%;">
								<div class="wraper-img" style="width:100%;">
									<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $post['foto']?>');border: 4px solid #9d7d35;"></div>
								</div>
							</div><!--nav-galeria-wraper-->
						</div><!--nav-galeria-->
						</div><!--job-parent-->
					</div><!--wraper-img-container-->
				</div><!--historia-img-->
			</div><!--flex container-historia-->

		<div class="wraper-doar">
			<h3><?php echo $infoSiteAdotar['titulo_pagina_2']?></h3>

			<p><?php echo $infoSiteAdotar['subtitulo_pagina_2']?> </p>
		</div><!--wraper-doar-->

		<div class="wraper-doar">
			<p><?php echo $post['nome']?> agradece sua adoção <span style="color: red;font-size: 20px;">&hearts;</span>, <b style="color:#FDCB58;">preencha o formulário abaixo</b>, entraremos em contato &#128516;</p>
			
			<form method="POST" class="form-doar">
				<p>Nome do Animal</p>
				<input type="text" disabled name="nome_animal" value="<?php echo $post['nome']?>">
				<p>Seu nome*</p>
				<input type="text" name="nome_adocao" required>
				<p>Seu e-mail*</p>
				<input type="text" name="email_adocao" required>
				<p>Seu whatsapp*</p>
				<input class="text" type="text" name="whatsapp_adocao" required>
				<p>*Campos Obrigatórios</p>
				<input type="hidden" name="foto_animal" value="<?php echo $post['foto'];?>">
				<input type="hidden" name="animal" value="<?php echo $post['nome']?>">
				<input type="hidden" name="descricao" value="<?php echo $post['descricao']?>">
				<input type="hidden" name="id_animal" value="<?php echo $post['id'];?>">
				<input type="hidden" name="slug" value="<?php echo $post['slug']?>">
				<input class="btn-doar" type="submit" name="acao" value="ENVIAR">
			</form>
		</div><!--wraper-doar-->


	</div><!--container-->

</div><!--container-principal-->