<div class="container fundo-doar">

	<div class="title-section">
		<div class="png-txt"></div>
		<h2><?php echo $infoSiteApadrinhar['titulo_1']?></h2>
		<p><?php echo $infoSiteApadrinhar['texto_1']?></p>
	</div><!--title-section-->

</div><!--container-->

<br>

<section class="galeria">

	<div class="container">

		<div class="title-section">
			<div class="png-txt"></div>
			<h2><?php echo $infoSiteApadrinhar['titulo_2']?></h2>
			<p><?php echo $infoSiteApadrinhar['texto_2']?></p>
		</div><!--title-section-->

		<div class="galeria-flex flex">

			<div class="mural-ong">
				<h2><?php echo $infoSiteApadrinhar['titulo_apadrinhado']?></h2>
				<div class="galeria-wraper mural-galeria">
	
				
				<?php 
					$sqlMural = Mysql::conectar()->prepare("SELECT * FROM `tb_site.apadrinhar` WHERE categoria_id = ?");
					$sqlMural->execute(array('0'));
					$unico = $sqlMural->fetchAll();
					foreach($unico as $key => $value) {
						echo '<a rel="galeria-mural-'.$key.'" class="img-galeria-single mural-apadrinhado-'.$key.'" href="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
								<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
							</a>
							<div class="info-apadrinhado foto-'.$key.'">
								<h2 style="color:white;">Nome do Animal: '.$value['nome'].'</h2>
								<h2 style="color:white;">Padrinho: '.$value['padrinho'].'</h2>
								<p>Ajuda: '.$value['valor'].',00R$</p>
								<p>O que foi adquirido, com a ajuda do '.$value['padrinho'].': '.$value['compra'].'</p>
								<p>Somos Gratos '.$value['padrinho'].', '.$value['nome'].' agradece :)</p>
								<div class="btn-close"></div>
							</div>
							<script>
								$(function(){
									$(".mural-apadrinhado-'.$key.'").click(function(e){
										e.stopPropagation();
										$(".foto-'.$key.'").slideToggle();
									})
								})
							</script>
							'
							;
					}
					/*
					for($i = 1; $i < 2; $i++){
						echo '<a rel="galeria-mural'.$i.'" class="img-galeria-single galeria-apadrinhado" href="'.INCLUDE_PATH.'img/galeria/foto-com-moldura/mural-2.jpg">
								<img src="'.INCLUDE_PATH.'img/galeria/foto-com-moldura/mural-2.jpg">
							</a>
							<div class="info-apadrinhado">
								<h2 style="color:white;">Nome do Animal: LILY</h2>
								<h2 style="color:white;">Padrinho: Lucas</h2>
								<p>Ajuda: 100,00R$</p>
								<p>O que foi adquirido, com a ajuda do Lucas: Ração, Medicamentos, Vacina.</p>
								<p>Obrigada Lucas, a LILY agradece :)</p>
								<div class="btn-close"></div>
							</div>';
					}*/
				?>
					

					<!--
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
				<h2><?php echo $infoSiteApadrinhar['titulo_sem_padrinho']?></h2>
				<div class="galeria-wraper ong-galeria">
					<?php

						$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.apadrinhar` WHERE categoria_id = ?");
						$sql->execute(array('2'));
						$single = $sql->fetchAll();

						foreach($single as $key => $value){
							$sql = Mysql::conectar()->prepare("SELECT `slug` FROM `tb_apadrinhar.categorias` WHERE id = ? ");
							$sql->execute(array('2'));
							$categoriaNome = $sql->fetch()['slug'];
							echo '<a rel="galeria-ong-'.$key.'" class="img-galeria-single galeria-apadrinhar-'.$key.'" href="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
								<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
							</a>
							<div class="info-apadrinhar slide-'.$key.'">
								<h2 style="color:white;">Nome do Animal: '.$value['nome'].'</h2>
								<a style="color:white;font-size:15px;font-weight:bold;" href="'.INCLUDE_PATH.''.$categoriaNome.'/'.$value['slug'].'">QUERO APADRINHAR</a>
								<div class="btn-close"></div>
							</div>
							<script>
								$(function(){
									$(".galeria-apadrinhar-'.$key.'").click(function(e){
										e.stopPropagation();
										$(".slide-'.$key.'").slideToggle();
									})
								})
							</script>

							';
						}
					?>
					
					<!--
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
					</a>-->

				</div>
			</div>

		</div><!--galeria-flex-->

	</div><!--container-->

	<div class="outro-valor">
		<div class="btn-ajuda">
			<a href="<?php echo INCLUDE_PATH?>doar">DOAR PARA A ONG</a>
		</div><!--btn-ajuda-->
	</div><!--outro-valor-->

</section><!--galeria-->