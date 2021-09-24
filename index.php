<?php include('config.php');?>
<?php Site::updateUsuarioOnline();?>
<?php Site::contador();?>
<?php Painel::limparApadrinhado()?>
<?php
	$infoSiteHome = Mysql::conectar()->prepare('SELECT * FROM `tb_site.home`');
	$infoSiteHome->execute();
	$infoSiteHome = $infoSiteHome->fetch();


	$infoSiteAjuda = Mysql::conectar()->prepare("SELECT * FROM `tb_site.ajuda`");
	$infoSiteAjuda->execute();
	$infoSiteAjuda = $infoSiteAjuda->fetch();

	$infoSiteContato = Mysql::conectar()->prepare("SELECT * FROM `tb_site.contato`");
	$infoSiteContato->execute();
	$infoSiteContato = $infoSiteContato->fetch();

	$infoSiteGaleria = Mysql::conectar()->prepare("SELECT * FROM `tb_site.galeria`");
	$infoSiteGaleria->execute();
	$infoSiteGaleria = $infoSiteGaleria->fetch();

	$infoSiteDoar = Mysql::conectar()->prepare("SELECT * FROM `tb_config.doar`");
	$infoSiteDoar->execute();
	$infoSiteDoar = $infoSiteDoar->fetch();

	$infoSiteApadrinhar = Mysql::conectar()->prepare("SELECT * FROM `tb_config.apadrinhar`");
	$infoSiteApadrinhar->execute();
	$infoSiteApadrinhar = $infoSiteApadrinhar->fetch();

	$infoSiteAdotar = Mysql::conectar()->prepare("SELECT * FROM `tb_config.adotar`");
	$infoSiteAdotar->execute();
	$infoSiteAdotar = $infoSiteAdotar->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
	<?php 
		@$url = explode('/', $_GET['url']);
		
		if($url[0] == 'noticias'){
			if(isset($url[2])){
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ?");
				$sql->execute(array($url[2]));
				$conteudo = $sql->fetchAll();
				foreach($conteudo as $key => $value){
					echo substr(strip_tags($value['titulo']),0,255);
				}
			}else{
				echo 'ONG - Oassis Animal';
			}
		}else{
			echo 'ONG - Oassis Animal';
		}
		
	?>
	</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
	<meta name="author" content="damix.code">
	<meta name="description" content="
	<?php 
		@$url = explode('/', $_GET['url']);
		
		if($url[0] == 'noticias'){
			if(isset($url[1])){
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ?");
				$sql->execute(array($url[2]));
				$conteudo = $sql->fetchAll();
				foreach($conteudo as $key => $value){
					echo substr(strip_tags($value['conteudo']),0,255);
				}
				}else{
					echo 'Resgate,Conscientização,Adoção,Castração, Somos uma ONG privada atuamos com proteção e saúde de animais, Venha nos conhecer, Faça uma doação, Apadrinhe ou adote, Precisamos da sua ajuda, conheça nossa história, descubra como atuamos na cidade, nossos feitos e ajudas... ';
				}	
		}else{
			echo 'Resgate,Conscientização,Adoção,Castração, Somos uma ONG privada atuamos com proteção e saúde de animais, Venha nos conhecer, Faça uma doação, Apadrinhe ou adote, Precisamos da sua ajuda, conheça nossa história, descubra como atuamos na cidade, nossos feitos e ajudas... ';
		}
		
	?>
	 ">
	<meta name="og:title" content="<?php 
		@$url = explode('/', $_GET['url']);
		
		if($url[0] == 'noticias'){
			if(isset($url[2])){
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ?");
				$sql->execute(array($url[2]));
				$conteudo = $sql->fetchAll();
				foreach($conteudo as $key => $value){
					echo substr(strip_tags($value['titulo']),0,255);
				}
			}else{
				echo 'ONG - Oassis Animal';
			}
		}else{
			echo 'ONG - Oassis Animal';
		}
		
	?>">
	<meta name="og:description" content="<?php 
		@$url = explode('/', $_GET['url']);
		
		if($url[0] == 'noticias'){
			if(isset($url[1])){
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ?");
				$sql->execute(array($url[2]));
				$conteudo = $sql->fetchAll();
				foreach($conteudo as $key => $value){
					echo substr(strip_tags($value['conteudo']),0,255);
				}
				}else{
					echo 'Resgate,Conscientização,Adoção,Castração, Somos uma ONG privada atuamos com proteção e saúde de animais, Venha nos conhecer, Faça uma doação, Apadrinhe ou adote, Precisamos da sua ajuda, conheça nossa história, descubra como atuamos na cidade, nossos feitos e ajudas... ';
				}	
		}else{
			echo 'Resgate,Conscientização,Adoção,Castração, Somos uma ONG privada atuamos com proteção e saúde de animais, Venha nos conhecer, Faça uma doação, Apadrinhe ou adote, Precisamos da sua ajuda, conheça nossa história, descubra como atuamos na cidade, nossos feitos e ajudas... ';
		}
		
	?>">
	<meta name="og:image" content="<?php 
		@$url = explode('/', $_GET['url']);
		
		if($url[0] == 'noticias'){
			if(isset($url[1])){
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ?");
				$sql->execute(array($url[2]));
				$conteudo = $sql->fetchAll();
				foreach($conteudo as $key => $value){
					echo INCLUDE_PATH_PAINEL.'uploads/'.$value['capa'];
				}
			}else{
				echo INCLUDE_PATH.'img/logo-oasis-single.png';
			}	
		}else{
			echo INCLUDE_PATH.'img/logo-oasis-single.png';
		}
		
	?>">
	<meta name="og:url" content="<?php echo INCLUDE_PATH.@$_GET['url']?>">
	<link href="<?php echo INCLUDE_PATH;?>css/slick.css" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH;?>css/jquery.fancybox.css" rel="stylesheet" type="text/css">
	<link href="<?php echo INCLUDE_PATH;?>css/style.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="icon/png" href="<?php echo INCLUDE_PATH;?>img/logo-oasis-cor-branco.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gluten:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<script src="<?php echo INCLUDE_PATH;?>js/jquery.js"></script>
</head>
<body>

	<?php

	$url = isset($_GET['url']) ? $_GET['url'] : 'home';
	switch ($url) {
		case 'ajuda-home':
			echo '<target target="ajuda-home">';
			break;
		case 'fotos':
			echo '<target target="fotos">';
			break;
	}

	?>

	<header <?php
		$url = isset($_GET['url'][0]) ? $_GET['url'] : '';
		@$urlPar = explode('/',$_GET['url']);
		switch($urlPar[0]){
			case 'apadrinhar-animal':
				echo 'style="background-image: url(../img/fundo-banners-site/fundo-header.png);"';
				break;
			case 'adotar-animal':
				echo 'style="background-image: url(../img/fundo-banners-site/fundo-header.png);!important;"';
				break;
		}
		switch ($url) {
			case 'home':
				echo 'style="background-color: #D2B064;"';
				break;
			case '':
				echo 'style="background-color: #D2B064;"';
				break;
			case 'noticias':
				echo 'style="background-color: #D2B064;"';
				break;
			case 'ajuda-home':
				echo 'style="background-color: #D2B064;"';
				break;
			case 'fotos':
				echo 'style="background-color: #D2B064;"';
				break;
			case 'doar':
				echo 'style="background-image: url(img/fundo-banners-site/fundo-header.png);"';
				break;
			case 'enviar-foto':
				echo 'style="background-image: url(img/fundo-banners-site/fundo-header.png);"';
				break;
			case 'apadrinhar-animais':
				echo 'style="background-image: url(img/fundo-banners-site/fundo-header.png);"';
				break;
			case 'adotar':
				echo 'style="background-image: url(img/fundo-banners-site/fundo-header.png);"';
				break;
			case 'contato':
				echo 'style="background-image: url(img/fundo-banners-site/fundo-header.png);"';
				break;
			case 'apadrinhar':
				echo 'style="background-image: url(img/fundo-banners-site/fundo-header.png);"';
				break;
			default:
				echo 'style="background-color: #D2B064;"';
				break;
		};
		
	?>>
		<div class="icone-menu"></div>
		<nav class="menu-mobile">
			<img class="logo-header" src="<?php echo INCLUDE_PATH;?>img/logo-oasis-cor.png">
			<ul>
				<li><a href="<?php echo INCLUDE_PATH;?>home">HOME</a></li>
				<span></span>
				<li><a href="<?php echo INCLUDE_PATH?>ajuda-home">AJUDAR</a></li>
				<span></span>
				<li><a href="<?php echo INCLUDE_PATH;?>noticias">NOTICIAS</a></li>
				<span></span>
				<li><a href="<?php echo INCLUDE_PATH?>fotos">FOTOS</a></li>
				<span></span>
				<li><a href="<?php echo INCLUDE_PATH?>noticias/dicas">DICAS</a></li>
				<span></span>
				<li><a href="<?php echo INCLUDE_PATH;?>contato">CONTATO</a></li>
			</ul>
		</nav><!--menu-mobile-->

		<div class="container-header">
			<div class="menu-desktop direita-nav">
				<nav class="nav-direita">
					<ul>
						<li><a href="<?php echo INCLUDE_PATH;?>home">HOME</a></li>
						<span></span>
						<li><a href="<?php echo INCLUDE_PATH?>ajuda-home">AJUDAR</a></li>
						<span></span>
						<li><a href="<?php echo INCLUDE_PATH;?>noticias">NOTICIAS</a></li>
					</ul>
				</nav><!--nav-direita-->
			</div><!--menu-desktop-->
			<img class="logo-header img-desktop" src="<?php echo INCLUDE_PATH;?>img/home/logo-oasis.png">
			<div class="menu-desktop esquerda-nav">
				<nav class="nav-esquerda">
					<ul>
						<li><a href="<?php echo INCLUDE_PATH?>fotos">FOTOS</a></li>
						<span></span>
						<li><a href="<?php echo INCLUDE_PATH?>noticias/dicas">DICAS</a></li>
						<span></span>
						<li><a href="<?php echo INCLUDE_PATH;?>contato">CONTATO</a></li>
					</ul>
				</nav><!--nav-esquerda-->
			</div><!--menu-desktop-->
		</div><!--container-header-->
	</header>

	<div class="container-principal">
			<?php
			
				$url = isset($_GET['url']) ? $_GET['url'] : 'home';
				if(file_exists('pages/'.$url.'.php')){
					include('pages/'.$url.'.php');
				}else{
					$urlPar = explode('/',$url)[0];
					if($urlPar != 'noticias' && $urlPar != 'apadrinhar-animal' && $urlPar != 'adotar-animal'){
						$pageof = true;
						include('pages/home.php');
					}else{
						if($urlPar == 'apadrinhar-animal'){
							include('pages/apadrinhar.php');
						}else if($urlPar == 'adotar-animal'){
							include('pages/adotar-animal.php');
						}else{
							include('pages/noticias.php');
						}		
					}

					
				}
				
			?>
	</div><!--container-principal-->

	<footer class="footer-banner">

		<div class="container">

			<div class="footer-equipe">

				<h3>NOSSA EQUIPE</h3>

				<div class="equipe-single">

				<?php
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.equipe` ORDER BY order_id ASC LIMIT 3");
				$sql->execute();
				$equipe = $sql->fetchAll();
				foreach($equipe as $key => $value){
				?>
					<div class="wraper-equipe">
						<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>"><div class="equipe-wraper">
							<p><?php echo $value['nome']?></p><p><?php echo $value['texto']?></p>
						</div><!--equipe-wraper-->
					</div><!--wraper-equipe-->
				<?php } ?>

				</div><!--equipe-single-->

			</div><!--footer-equipe--><div class="social-footer">

				<div class="ong-footer">
					<img src="<?php echo INCLUDE_PATH?>img/logo-oasis-cor-branco.png"><div class="ong-wraper">
						<h3><?php echo $infoSiteHome['ultimo_titulo'];?></h3>
						<p><?php echo $infoSiteHome['ultimo_subtitulo'];?></p>
					</div><!--ong-wraper-->
				</div><!--ong-footer-->

				<div class="ong-footer-social">
					<a href=""><img src="<?php echo INCLUDE_PATH?>img/icon-insta.png"></a>
					<a href=""><img src="<?php echo INCLUDE_PATH?>img/icon-mail.png"></a>
					<a href=""><img src="<?php echo INCLUDE_PATH?>img/icon-whats.png"></a>
					<a href=""><img src="<?php echo INCLUDE_PATH?>img/icon-facebook.png"></a>
				</div><!--ong-footer-p-->

			</div><!--social-footer-->

		</div><!--container-->

	</footer><!--footer-banner-->

	<footer class="footer-last">
		<div class="container">
			<a href=""><img src="<?php echo INCLUDE_PATH?>img/logo-white.png"></a>
		</div><!--container-->
	</footer><!--footer-last-->

	<script src="<?php echo INCLUDE_PATH;?>js/jquery.fancybox.js"></script>
	<script src="<?php echo INCLUDE_PATH?>js/jquery.mask.js"></script>
	<script>
        $(document).ready(function(){

        	$('body').click(function(e){
        		e.stopPropagation();
        		$('.info-plus').fadeOut();
        	})

        	$('.info-mais').click(function(e){
        		e.stopPropagation();
        		$('.info-plus').fadeIn();
        	})
        	
        	if($('target').length > 0){
				var elemento = '#'+$('target').attr('target');

				var divScroll = $(elemento).offset().top;

				$('html,body').animate({scrollTop:divScroll},2000);
			};

            $('.img-galeria-single').fancybox({
                'openEffect':'elastic',
                arrows:true
            });

            $('.img-adotar-single').fancybox({
            	'openEffect':'elastic',
                arrows:true
            });

            $('input[name=valor_doar]').mask('0000000000');
        })
    </script>
	<script src="<?php echo INCLUDE_PATH;?>js/slider-pagina.js"></script>
	<script src="<?php echo INCLUDE_PATH;?>js/slider.js"></script>
	<script src="<?php echo INCLUDE_PATH;?>js/menu.js"></script>
	<script>
		$(function(){
			var url = 'http://localhost/ong_site/';
			$('.noticia-select').change(function(){
				location.href=url+"noticias/"+$(this).val();
			})
		})
	</script>
	
	<?php
	
		@$urlPage = $_GET['url'];

		if($urlPage == 'apadrinhar-animais' || $urlPage == 'adotar'){
			echo '<script src="'.INCLUDE_PATH.'js/galeria-js.js"></script>';
		}

	?>


</body>
</html>