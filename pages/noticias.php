<?php
	
	@$url = explode('/',$_GET['url']);

	if(!isset($url[2])){

	$categoria = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
	$categoria->execute(array(@$url[1]));
	$categoria = $categoria->fetch();
	
?>
<section class="noticias">
		<div class="noticias-topo-banner" style="<?php

		$url = isset($_GET['url'][0]) ? $_GET['url'] : '';
			
		switch ($url){
			case '':
				echo 'background-image: url(img/fundo-banners-site/fundo-noticia.png);';
			 	break;
			case 'home':
			 	echo 'background-image: url(img/fundo-banners-site/fundo-noticia.png);';
			 	break;
			case 'noticias':
				echo 'background-color: #D2B064;height: 110px;';
				break;
			default: 
				echo 'background-color: #D2B064;height: 110px;';
				break;
		}

		?>">
			<h2 style="<?php

		$url = isset($_GET['url']) ? $_GET['url'] : '';
			
		switch ($url){
			case '':
				echo 'padding-top: 0p;';
				break;
			case 'home':
				echo 'padding-top: 0p;';
				break;
			case 'noticias':
				echo 'padding-top: 40px;';
				break;
			default: 
				echo 'padding-top: 40px;';
				break;;

		}

		?>">NOTÍCIAS</h2>
		</div><!--noticias-topo-->
		<div class="noticia-receber-novidade">
			<div class="container">
				<?php
					if(isset($_POST['novidades'])){
						$email = $_POST['email-novidades'];

						if($email == ''){
							Painel::alert('erro','Adicione um E-mail para continuar');
						}else{
							$arr = ['email'=>$email,'nome_tabela'=>'tb_site.email','order_id'=>'0'];
							Painel::insert($arr);
							Painel::alert('sucesso','Enviado Com Sucesso!');
							Painel::redirect(INCLUDE_PATH.'noticias');
						}
					}
				?>
				<h2>RECEBA NOSSAS NOTÍCIAS</h2>

				<div class="wraper-input flex">
					<form class="flex" style="width:100%;" method="POST">
						<input type="email" name="email-novidades" placeholder="E-mail" required>
						<label class="btn-novidade" for="nov">
							<img src="<?php echo INCLUDE_PATH?>img/enviar-img.png">
						</label>
						<input id="nov" type="submit" name="novidades">
					</form>
				</div><!--wraper-input-->

			</div><!--container-->
		</div><!--noticia-receber-novidade-->
</section><!--noticias-->

<section class="novidades-wraper">

	<div class="container flex">

		<div class="wraper-aside-noticia">

			<aside class="aside-categoria">
				<h2>Selecione a Categoria</h2>

				<form>
					<select class="noticia-select" name="categoria">
						<option value="" selected>Todas as categorias</option>
						<?php
							$url = explode('/',$_GET['url']);
							$categoria = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` ORDER BY order_id ASC");
							$categoria->execute();
							$categoria = $categoria->fetchAll();

							foreach($categoria as $key => $value) {
								
						?>
						<option <?php if($value['slug'] == @$url[1]) echo 'selected';?> value="<?php echo $value['slug']?>"><?php echo $value['nome']?></option>
						<?php } ?>
					</select>
				</form>

			</aside><!--aside-categoria-->

			<aside class="aside-categoria">
				<h2>Insira uma busca</h2>
				<form method="POST">
					<input type="text" name="parametro" placeholder="Buscar">
					<input type="submit" name="busca" value="BUSCAR">
				</form>
			</aside>

			<aside class="aside-autor">
				<h2>Autor das Notícias</h2>
				<div class="wraper-img-noticia">
					<img src="<?php echo INCLUDE_PATH?>img/icone-user.png">
				</div><!--wraper-img-->
				<h3>Daniel Mateus</h3>
				<p>Vivamus in felis metus. Etiam tristique diam orci, quis euismod libero lacinia ut. Proin lobortis vel magna vitae scelerisque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
			</aside>

		</div><!--wraper-aside-noticia-->

		<article class="wraper-noticia">

	<?php
		@$url = explode('/',$_GET['url']);
		$categoria = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
		$categoria->execute(array(@$url[1]));
		$categoria = $categoria->fetch();
		$porPagina = 4;
			if(!isset($_POST['parametro'])){
				if(@$categoria['nome'] == ''){
					echo '<h2>Visualizando Todos os Posts</h2>';
				}else{
					echo '<h2>Visualizando Posts em <b style="text-transform:uppercase;">'.$categoria['nome'].'</b></h2>';
				}
			}else{
				if(@$categoria['nome'] == ''){
					echo '<h2>Mostrando resultados de "'.$_POST['parametro'].'" em todas as categorias.';
				}else{
					echo '<h2>Mostrando resultados de "'.$_POST['parametro'].'" na categoria '.$categoria['nome'].'</h2>';
				}
			}

			$query = "SELECT * FROM `tb_site.noticias` ";
			if(@$categoria['nome'] != ''){
				$categoria['id'] = (int)$categoria['id'];
				$query.="WHERE categoria_id = $categoria[id]";
			}
			if(isset($_POST['parametro'])){
				if(strstr($query,'WHERE') !== false){
					$busca = $_POST['parametro'];
					$query.=" AND titulo LIKE '%$busca%'";
				}else{
					$busca = $_POST['parametro'];
					$query.=" WHERE titulo LIKE '%$busca%'";
				}
			}
			$query2 = "SELECT * FROM `tb_site.noticias` ";
			if(@$categoria['nome'] != ''){
				$categoria['id'] = (int)$categoria['id'];
				$query2.="WHERE categoria_id = $categoria[id]";
			}
			if(isset($_POST['parametro'])){
				if(strstr($query2,'WHERE') !== false){
					$busca = $_POST['parametro'];
					$query2.=" AND titulo LIKE '%$busca%'";
				}else{
					$busca = $_POST['parametro'];
					$query2.=" WHERE titulo LIKE '%$busca%'";
				}
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
			foreach($noticias as $key => $value){
			$sql = Mysql::conectar()->prepare("SELECT `slug` FROM `tb_site.categorias` WHERE id = ? ");
			$sql->execute(array($value['categoria_id']));
			$categoriaNome = $sql->fetch()['slug'];
		?>
		<div class="noticia-single">
			<h3><?php echo date('d/m/Y',strtotime($value['data']))?> - <?php echo strip_tags($value['titulo'])?></h3>
			<img class="img-noticia" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['capa']?>"><p class="p-noticia"><?php echo substr(strip_tags($value['conteudo']),0,350)?>...</p>
			<div class="btn-ver-noticia">
				<a href="<?php echo INCLUDE_PATH?>noticias/<?php echo $categoriaNome;?>/<?php echo $value['slug']?>">Ler Mais</a>
			</div><!--btn-ver-noticia-->
		</div><!--noticia-single-->
		<?php } ?>
		<?php
			

		?>
		<div class="paginacao">
			<?php
				if(!isset($_POST['parametro'])){
					for($i = 1; $i <= $totalPagina; $i++){
						$catStr = (@$categoria['nome'] != '') ? '/'.$categoria['slug'] : '';
						if($pagina == $i){
							echo '<a class="pag-selected" href="'.INCLUDE_PATH.'noticias'.$catStr.'?pagina='.$i.'">'.$i.'</a>';
						}else{
							echo '<a href="'.INCLUDE_PATH.'noticias'.$catStr.'?pagina='.$i.'">'.$i.'</a>';
						}
					}
				}
			?>
			
		</div><!--paginacao-->

		</article><!--wraper-noticia-->

	</div><!--container-->

</section><!--novidades-wraper-->
<br><br><br>
<?php }else{
	include('noticia_single.php');
};?>

<?php
	
	//$url = explode('/',$_GET['url']);

	$url = isset($_GET['url']) ? $_GET['url'] : '';

	
	if($url == 'noticias'){
		include('ajuda.php');
	}else{
		return;
	}
	

?>