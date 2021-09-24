<section class="container-home-bg">
	<div class="container">
		<div class="single-home-txt">
			<h1>OLÁ EU SOU O <span class="h1-home">TITAN</span> <a href="#">descubra</a> como a OASSIS salvou minha VIDA!</h1>
		</div><!--single-home-txt-->
		<div class="single-home-btn">
			<nav>
				<ul>
					<li>
						<a href="<?php echo INCLUDE_PATH?>adotar">
							<img src="<?php echo INCLUDE_PATH;?>img/home/adotar-icone.png">
						ADOTAR
						</a>
					</li>
					<li>
						<a href="<?php echo INCLUDE_PATH?>apadrinhar-animais">
							<img src="<?php echo INCLUDE_PATH;?>img/home/apadrinhar-icone.png">
						APADRINHAR
						</a>
					</li>
					<li>
						<a href="<?php echo INCLUDE_PATH?>doar">
							<img src="<?php echo INCLUDE_PATH;?>img/home/doar-icone.png">
						DOAR
						</a>
					</li>
				</ul>
			</nav>
		</div><!--single-home-btn-->
	</div><!--container-->
</section><!--container-home-->

<section class="nossa-historia">
	<div class="container">

		<div class="title-section">
			<div class="png-txt"></div>
			<h2><?php echo $infoSiteHome['titulo_1'];?></h2>
			<p><?php echo $infoSiteHome['subtitulo_1'];?></p>
		</div><!--title-section-->

		<div class="flex container-historia">
			<div class="historia-txt w50">
				<h3><?php echo $infoSiteHome['titulo_img'];?></h3>
				<p><?php echo $infoSiteHome['conteudo'];?></p>
			</div><!--historia-txt-->
			<div class="historia-img w50">
				<div class="background-img"></div>
				<div class="wraper-img-container">
					<div class="job-parent">
						<div class="arrow-left"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-square-left" class="svg-inline--fa fa-caret-square-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h352c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zM259.515 124.485l-123.03 123.03c-4.686 4.686-4.686 12.284 0 16.971l123.029 123.029c7.56 7.56 20.485 2.206 20.485-8.485V132.971c.001-10.691-12.925-16.045-20.484-8.486z"></path></svg></div>
						<div class="arrow-right"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-square-right" class="svg-inline--fa fa-caret-square-right fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M48 32h352c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48zm140.485 355.515l123.029-123.029c4.686-4.686 4.686-12.284 0-16.971l-123.029-123.03c-7.56-7.56-20.485-2.206-20.485 8.485v246.059c0 10.691 12.926 16.045 20.485 8.486z"></path></svg></div>
					<div class="nav-galeria">
						<div class="nav-galeria-wraper">
							<?php
							$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_foto.home` ORDER BY `order_id` ASC");
							$sql->execute();
							$foto = $sql->fetchAll();
							foreach($foto as $key => $value){
							?>
							<div class="mini-img-wraper">
								<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>');">
								</div>
							</div>
							<?php } ?>
						</div><!--nav-galeria-wraper-->
					</div><!--nav-galeria-->
					</div><!--job-parent-->
				</div><!--wraper-img-container-->
			</div><!--historia-img-->
		</div><!--flex container-historia-->

	</div><!--container-->
</section><!--nossa-historia-->

<section class="descubra">
	<div class="container">

		<div class="title-section">
			<div class="png-txt"></div>
			<h2><?php echo $infoSiteHome['titulo_2']?></h2>
			<p><?php echo $infoSiteHome['subtitulo_2']?></p>
		</div><!--title-section-->

		<div class="wraper-fazemos">
			<div class="fazemos-single">
				<img src="<?php echo INCLUDE_PATH;?>img/sessao-1/conscientizacao-icone.png">
				<h3><?php echo $infoSiteHome['titulo_icone_1']?></h3>
				<p><?php echo $infoSiteHome['texto_icone_1']?></p>
			</div><!--fazemos-single-->
			<div class="fazemos-single">
				<img src="<?php echo INCLUDE_PATH;?>img/sessao-1/castracao-icone.png">
				<h3><?php echo $infoSiteHome['titulo_icone_2']?></h3>
				<p><?php echo $infoSiteHome['texto_icone_2']?></p>
			</div><!--fazemos-single-->
			<div class="fazemos-single">
				<img src="<?php echo INCLUDE_PATH;?>img/sessao-1/adocao-icone.png">
				<h3><?php echo $infoSiteHome['titulo_icone_3']?></h3>
				<p><?php echo $infoSiteHome['texto_icone_3']?></p>
			</div><!--fazemos-single-->
		</div><!--wraper-fazemos-->

	</div><!--container-->
</section><!--descubra-->

<?php include('pages/ajuda.php')?>


<section class="galeria" id="fotos">

	<div class="container">

		<div class="title-section">
			<div class="png-txt"></div>
			<h2><?php echo $infoSiteGaleria['t_home']?></h2>
			<p><?php echo $infoSiteGaleria['p_home']?></p>
		</div><!--title-section-->

		<div class="galeria-flex flex">

			<div class="mural-ong">
				<h2><?php echo $infoSiteGaleria['t_mural']?></h2>
				<div class="galeria-wraper mural-galeria">
					<?php
						$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_foto.mural` ORDER BY `order_id` DESC LIMIT 16");
						$sql->execute();
						$mural = $sql->fetchAll();

						foreach($mural as $key => $value){
					?>

					<a rel="galeria-mural" class="img-galeria-single" href="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $value['foto']?>">
						<img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $value['foto']?>">
					</a>

					<?php } ?>

					<!--
					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-2.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-2.jpg">
					</a>
					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-3.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-3.jpg">
					</a>

					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-4.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-4.jpg">
					</a>

					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-5.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-5.jpg">
					</a>
					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-6.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-6.jpg">
					</a>
					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-7.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-7.jpg">
					</a>

					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-8.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-8.jpg">
					</a>

					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-9.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-9.jpg">
					</a>
					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-10.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-10.jpg">
					</a>
					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-11.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-11.jpg">
					</a>

					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-12.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-12.jpg">
					</a>

					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-13.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-13.jpg">
					</a>
					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-14.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-14.jpg">
					</a>
					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-15.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-15.jpg">
					</a>

					<a rel="galeria-mural" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-16.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/foto-com-moldura/mural-16.jpg">
					</a>-->
					
				</div><!--galeria-wraper-->
			</div><!--mural-ong-->	

			<div class="galeria-ong">	
				<h2><?php echo $infoSiteGaleria['t_galeria']?></h2>
				<div class="galeria-wraper ong-galeria">

					<?php
					$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_foto.galeria` ORDER BY `order_id` DESC LIMIT 16");
					$sql->execute();
					$galeria = $sql->fetchAll();

					foreach($galeria as $key => $value){
					?>

					<a rel="galeria-ong" class="img-galeria-single" href="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $value['foto']?>">
						<img src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $value['foto']?>">
					</a>

					<?php } ?>

					<!--
					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-2.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-2.jpg">
					</a>
					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-3.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-3.jpg">
					</a>

					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-4.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-4.jpg">
					</a>

					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-5.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-5.jpg">
					</a>
					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-6.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-6.jpg">
					</a>
					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-7.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-7.jpg">
					</a>

					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-8.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-8.jpg">
					</a>

					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-9.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-9.jpg">
					</a>
					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-10.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-10.jpg">
					</a>
					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-11.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-11.jpg">
					</a>

					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-12.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-12.jpg">
					</a>

					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-13.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-13.jpg">
					</a>
					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-14.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-14.jpg">
					</a>
					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-15.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-15.jpg">
					</a>

					<a rel="galeria-ong" class="img-galeria-single" href="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-16.jpg">
						<img src="<?php //echo INCLUDE_PATH;?>img/galeria/img-ong-com-moldura/galeria-16.jpg">
					</a>
	-->
				</div>
			</div>

		</div><!--galeria-flex-->

	</div><!--container-->

	<div class="outro-valor">
		<div class="btn-ajuda">
			<a href="<?php echo INCLUDE_PATH?>enviar-foto">ENVIAR FOTO</a>
		</div><!--btn-ajuda-->
	</div><!--outro-valor-->

</section><!--galeria-->


	<?php include('pages/noticias.php')?>


<script src="<?php echo INCLUDE_PATH;?>js/jquery.js"></script>
<script>
	/*
    $(document).ready(function(){
        var atual = -1;
        var maximo = $('.galeria-mural').length -1;
        var timer;
        var animationDelay = 0.5;

        executarAnimacao();
        function executarAnimacao(){
            $('.galeria-mural').hide();
            timer = setInterval(logicaAnim,animationDelay*1000);
        }

        function logicaAnim(){
            atual++;
            if(atual > maximo){
                clearInterval(timer);
                return false;
            }
            $('.galeria-mural').eq(atual).fadeIn();
        }
    })
    */
</script>