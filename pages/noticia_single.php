<?php
	$url = explode('/',$_GET['url']);
	$verifica_categoria = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
	$verifica_categoria->execute(array($url[1]));
	if($verifica_categoria->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'noticias');
	}
	$categoria_info = $verifica_categoria->fetch();

	$post = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ? AND categoria_id = ?");
	$post->execute(array($url[2],$categoria_info['id']));
	if($post->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'noticias');
	}

	$post = $post->fetch();

	$singleUrl = $post['slug'];

?>

<section class="noticias">
		<div class="noticias-topo-banner" style="background-color: #D2B064;height: 130px;">
			<h2 style="padding-top: 30px;color: white;font-weight: bold;">NOTÍCIAS: <?php echo date('d/m/Y',strtotime($post['data']))?> - <?php echo $post['titulo']?></h2>
		</div><!--noticias-topo-->
</section><!--noticias-->

<section class="noticia-single">
	<div class="container">

		<div class="capa-noticia">
			<img src="../../painel/uploads/<?php echo $post['capa']?>">
		</div><!--capa-noticia-->

		<article>
			
			
			<?php echo $post['conteudo']?>
			
		</article>

		<article class="wraper-noticia" style="margin: 50px 0">

		<?php
		@$url = explode('/',$_GET['url']);
		$categoria = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
		$categoria->execute(array(@$url[1]));
		$categoria = $categoria->fetch();
		$porPagina = 4;
			
					echo '<h2 style="font-size: 22px;
    color: #605f5f;">Visualizando Mais Posts em <b style="text-transform:uppercase;">'.$categoria['nome'].'</b></h2>';

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
			$urlPar = explode('/',$_GET['url']);
			foreach($noticias as $key => $value){
			$sql = Mysql::conectar()->prepare("SELECT `slug` FROM `tb_site.categorias` WHERE id = ? ");
			$sql->execute(array($value['categoria_id']));
			$categoriaNome = $sql->fetch()['slug'];
			$sqlFetch = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ?");
			$sqlFetch->execute(array($singleUrl));
			if($sqlFetch->rowCount() == 1){
				//echo 'Visualizado!';
			}/*else{
				echo $singleUrl;
				echo '<br>';
				echo $urlPar[2];
				echo '<br>';
				echo $sqlFetch['slug'];
			}	*/	

		?>
		<div class="noticia-single">
			<h3><?php echo date('d/m/Y',strtotime($value['data']))?> - <?php echo strip_tags($value['titulo'])?></h3>
			<img class="img-noticia" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['capa']?>">
			<p class="p-noticia"><?php echo substr(strip_tags($value['conteudo']),0,350)?>...</p>
			<div class="btn-ver-noticia">
				<a href="<?php echo INCLUDE_PATH?>noticias/<?php echo $categoriaNome;?>/<?php echo $value['slug']?>">Ler Mais</a>
			</div><!--btn-ver-noticia-->
		</div><!--noticia-single-->
		<?php } ?>

	</article><!--wraper-noticia-->

	</div><!--container-->
</section><!--noticia-single-->

<?php include('pages/ajuda.php')?>