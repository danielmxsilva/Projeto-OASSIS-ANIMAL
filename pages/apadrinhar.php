<?php
	$url = explode('/',$_GET['url']);
	$verifica_categoria = Mysql::conectar()->prepare("SELECT * FROM `tb_apadrinhar.categorias` WHERE slug = ?");
	$verifica_categoria->execute(array($url[0]));
	if($verifica_categoria->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'apadrinhar-animais');
	}
	$categoria_info = $verifica_categoria->fetch();

	$post = Mysql::conectar()->prepare("SELECT * FROM `tb_site.apadrinhar` WHERE slug = ? AND categoria_id = ?");
	$post->execute(array($url[1],'2'));
	if($post->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'apadrinhar-animais');
	}

	$post = $post->fetch();
?>

<div class="container fundo-doar">

	<div class="title-section">
		<div class="png-txt"></div>
		<h2><?php echo $infoSiteApadrinhar['titulo_pagina']?></h2>
		<p><?php echo $infoSiteApadrinhar['subtitulo_pagina']?></p>
	</div><!--title-section-->

</div><!--container-->

<div class="container-principal">

	<div class="container">

		<?php
			if(isset($_POST['acao_editar'])){
				$nome_animal = $_POST['animal'];
				$descricao = $_POST['descricao'];
				$padrinho = $_POST['nome_apadrinhar'];
				$email = $_POST['email_apadrinhar'];
				$valor = $_POST['valor_apadrinhar'];
				$slug = $_POST['slug'];
				$imagem = $_POST['foto_animal'];
				$data = date('Y-m-d');
				$id = $_POST['id_animal'];
					
				if($padrinho == '' || $email == '' || $valor == ''){
					Painel::alert('erro','Campos Vazios não são permitidos!');
				}else{
					$arr = ['nome'=>$nome_animal,'foto'=>$imagem,'slug'=>$slug,'descricao'=>$descricao,'categoria_id'=>'1','nome_tabela'=>'tb_site.apadrinhar','padrinho'=>$padrinho,'email'=>$email,'valor'=>$valor,'compra'=>'','order_id'=>$id,'data'=>$data,'id'=>$id];
					Painel::update($arr);
					Painel::alert('sucesso','Obrigado Por sua ajuda '.$padrinho.', nós e '.$nome_animal.' somos gratos &#128516;');
					}
			}
		?>

		<div class="flex container-historia container-doar">
				
				<div class="historia-txt w50">
					<h3>OI MEU NOME É <span style="text-transform: uppercase;"><?php echo $post['nome']?></span></h3>
					<p><?php echo $post['descricao']?></p>
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
			<h3><?php echo $infoSiteApadrinhar['texto_pagina']?></h3>

			<p><?php echo $infoSiteApadrinhar['mais_pagina']?></p>
		</div><!--wraper-doar-->



		<div class="wraper-doar">
			<p>Você pode nos ajudar em qualquer uma de nossas contas e com qualquer quantia: <br> <b style="color:#FDCB58;"><?php echo $infoSiteDoar['cnpj']?></b></p>
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
			<br>
			
			<form method="POST" class="form-doar">
				<p>Nome do Animal</p>
				<input type="text" disabled name="nome_animal" value="<?php echo $post['nome']?>">
				<p>Seu nome*</p>
				<input type="text" name="nome_apadrinhar" required>
				<p>Seu e-mail*</p>
				<input type="text" name="email_apadrinhar" required>
				<p>Valor doação*</p>
				<input class="valor-rs" type="text" name="valor_apadrinhar" required>
				<p>*Campos Obrigatórios</p>
				<input type="hidden" name="foto_animal" value="<?php echo $post['foto'];?>">
				<input type="hidden" name="animal" value="<?php echo $post['nome']?>">
				<input type="hidden" name="descricao" value="<?php echo $post['descricao']?>">
				<input type="hidden" name="id_animal" value="<?php echo $post['id'];?>">
				<input type="hidden" name="slug" value="<?php echo $post['slug']?>">
				<input class="btn-doar" type="submit" name="acao_editar" value="ENVIAR">
			</form>
		</div><!--wraper-doar-->


	</div><!--container-->

</div><!--container-principal-->

<article class="wraper-noticia" style="margin: 50px 0">

	<?php
	@$url = explode('/',$_GET['url']);
	$categoria = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
	$categoria->execute(array(@$url[0]));
	$categoria = $categoria->fetch();
	$porPagina = 4;
		
				echo '<h2 style="font-size: 22px;
color: #605f5f;">Visualizando Posts em <b style="text-transform:uppercase;">'.$categoria['nome'].'</b></h2>';

		$query = "SELECT * FROM `tb_site.noticias` ";
		if(@$categoria['nome'] != ''){
			$categoria['id'] = (int)$categoria['id'];
			$query.="WHERE categoria_id = $categoria[id]";
		}

		$query2 = "SELECT * FROM `tb_site.noticias` ";
		if(@$categoria['nome'] != ''){
			$categoria['id'] = (int)$categoria['id'];
			$query2.="WHERE categoria_id = $categoria[id]";
		}
		$totalPagina = Mysql::conectar()->prepare($query2);
		$totalPagina->execute();
		$totalPagina = ceil($totalPagina->rowCount() / $porPagina);
		if(!isset($_POST['parametro'])){
			if(isset($_GET['pagina'])){
				$pagina = (int)$_GET['pagina'];
				if($pagina > $totalPagina)
					$pagina = 1;
				$queryPg = ($pagina - 1) * $porPagina;
				$query.=" ORDER BY order_id DESC LIMIT $queryPg,$porPagina";
			}else{
				$pagina = 1;
				$query.=" ORDER BY order_id DESC LIMIT 0,$porPagina";
			}
		}else{
			$query.=" ORDER BY order_id DESC";
		}
		$sql = Mysql::conectar()->prepare($query);
		$sql->execute();
		$noticias = $sql->fetchAll();
	?>
	<?php
		@$urlPar = explode('/',$_GET['url']);
		foreach($noticias as $key => $value){
		$sql = Mysql::conectar()->prepare("SELECT `slug` FROM `tb_site.categorias` WHERE id = ? ");
		$sql->execute(array($value['categoria_id']));
		$categoriaNome = $sql->fetch()['slug'];
		$sqlFetch = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE categoria_id = ?");
		$sqlFetch->execute(array($value['categoria_id']));
		$urlSingle = $sqlFetch->fetch()['slug'];
		if($urlSingle == @$urlPar[2]){
			continue;
		}
	?>
	<div class="noticia-single">
		<h3><?php echo date('d/m/Y',strtotime($value['data']))?> - <?php echo strip_tags($value['titulo'])?></h3>
		<img style="float: left;max-width: 110px;border:3px solid #ccc;margin-right: 8px;" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['capa']?>">
		<p><?php echo substr(strip_tags($value['conteudo']),0,350)?>...</p>
		<div class="btn-ver-noticia">
			<a href="<?php echo INCLUDE_PATH?>noticias/<?php echo $categoriaNome;?>/<?php echo $value['slug']?>">Ler Mais</a>
		</div><!--btn-ver-noticia-->
	</div><!--noticia-single-->
	<?php } ?>

</article><!--wraper-noticia-->