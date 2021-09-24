<div class="container fundo-doar">

	<div class="title-section">
		<div class="png-txt"></div>
		<h2><?php echo $infoSiteAdotar['titulo_1']?></h2>
		<p><?php echo $infoSiteAdotar['subtitulo_1']?></p>
	</div><!--title-section-->

</div><!--container-->

<br>

<section class="galeria">

	<div class="container">

		<div class="title-section">
			<div class="png-txt"></div>
			<h2><?php echo $infoSiteAdotar['titulo_2']?></h2>
			<p><?php echo $infoSiteAdotar['subtitulo_2']?></p>
		</div><!--title-section-->

		<div class="galeria-flex flex">

			<div class="mural-ong">
				<h2><?php echo $infoSiteAdotar['titulo_adotados']?></h2>
				<div class="galeria-wraper mural-galeria">
		
				<?php 

				$sqlAdotado = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE categoria_id = ?");
				$sqlAdotado->execute(array('0'));
				$mural = $sqlAdotado->fetchAll();
				foreach($mural as $key => $value) {
					echo '<a rel="galeria-mural-'.$key.'" class="img-galeria-single mural-adotado-'.$key.'" href="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
							<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
						</a>
						<div class="info-apadrinhado result-'.$key.'">
							<h2 style="color:white;">Nome: '.$value['nome'].'</h2>
							<h2 style="color:white;">Adotou: '.$value['adotador'].'</h2>
							<p>Data Adoção: '.date('d/m/Y',strtotime($value['data'])).'</p>
							<p>Somos Gratos '.$value['adotador'].', '.$value['nome'].' agradece :)</p>
							<div class="btn-close"></div>
						</div>
						<script>
							$(function(){
								$(".mural-adotado-'.$key.'").click(function(e){
									e.stopPropagation();
									$(".result-'.$key.'").slideToggle();
								})
							})
						</script>
						'
						;
				}
				/*

				$sqlMural = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE categoria_id = ?");
				$sqlMural->execute(array('0'));
				$unico = $sqlMural->fetchAll();
				foreach($unico as $key => $value) {
					echo '<a rel="galeria-mural-'.$key.'" class="img-galeria-single mural-apadrinhado-'.$key.'" href="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
							<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
						</a>
						<div class="info-apadrinhado foto-'.$key.'">
							<h2 style="color:white;">Nome do Animal: Daniel</h2>
							<h2 style="color:white;">Padrinho:</h2>
							<p>Ajuda: ,00R$</p>
							<p>O que foi adquirido, com a ajuda do : </p>
							<p>Somos Gratos agradece :)</p>
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
				
					$sqlAdotado = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE categoria_id = ?");
					$sqlAdotado->execute(array('0'));
					$mural = $sqlAdotado->fetchAll();
					foreach($mural as $key => $value) {
						echo '<a rel="galeria-mural-'.$key.'" class="img-galeria-single mural-apadrinhado-'.$key.'" href="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
								<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
							</a>
							<div class="info-apadrinhado foto-'.$key.'">
								<h2 style="color:white;">Nome do Animal: Titan</h2>
								<h2 style="color:white;">Adotador: Daniel</h2>
								<p>Data Adoção: 20/09/2021</p>
								<p>Somos Gratos Daniel, Titan agradece :)</p>
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
					$sqlMural = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE categoria_id = ?");
					$sqlMural->execute(array('0'));
					$unico = $sqlMural->fetchAll();
					foreach($unico as $key => $value){
						echo '<a rel="galeria-mural'.$key.'" class="img-galeria-single galeria-apadrinhado" href="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
								<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
							</a>
							<div class="info-apadrinhado">
								<h2 style="color:white;">Animal Adotado: LYLI</h2>
								<h2 style="color:white;">Adotador: Lucas</h2>
								<p>Adotado dia 08/09/2021</p>
								<p>Obrigada Lucas, a LILY agradece :)</p>
								<div class="btn-close"></div>
							</div>';
					}
				*/
				?>

				<?php 
				/*
					$sqlMural = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE categoria_id = ?");
					$sqlMural->execute(array('0'));
					$unico = $sqlMural->fetchAll();
					foreach($unico as $key => $value) {
						echo '<a rel="galeria-mural'.$key.'" class="img-galeria-single galeria-apadrinhado" href="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
								<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
							</a>
							<div class="info-apadrinhado">
								<h2 style="color:white;">Animal Adotado: LYLI</h2>
								<h2 style="color:white;">Adotador: Lucas</h2>
								<p>Adotado dia 08/09/2021</p>
								<p>Obrigada Lucas, a LILY agradece :)</p>
								<div class="btn-close"></div>
							</div>';
						
						echo '<a rel="galeria-mural-'.$key.'" class="img-galeria-single galeria-apadrinhado-'.$key.'" href="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
								<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
							</a>
							<div class="info-apadrinhado foto-'.$key.'">
								<h2 style="color:white;">Nome do Animal: '.$value['nome'].'</h2>
								<h2 style="color:white;">Adotador: '.$value['adotador'].'</h2>
								<p>Data Adoção: '.date('d/m/Y',strtotime($value['data'])).',00R$</p>
								<p>Somos Gratos '.$value['adotador'].', '.$value['nome'].' agradece :)</p>
								<div class="btn-close"></div>
							</div>
							<script>
								$(function(){
									$(".galeria-apadrinhado-'.$key.'").click(function(e){
										e.stopPropagation();
										$(".foto-'.$key.'").slideToggle();
									})
								})
							</script>
							'
							;
							
					}
					*/
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
				<h2><?php echo $infoSiteAdotar['titulo_adocao']?></h2>
				<div class="galeria-wraper ong-galeria">

					<?php

					$sqlAdotar = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE categoria_id = ?");
					$sqlAdotar->execute(array('2'));
					$adotar = $sqlAdotar->fetchAll();
					foreach($adotar as $key => $value) {
						$sql = Mysql::conectar()->prepare("SELECT `slug` FROM `tb_adotar.categorias` WHERE id = ? ");
						$sql->execute(array('2'));
						$categoriaNome = $sql->fetch()['slug'];
						echo '<a rel="adotar-ong-'.$key.'" class="img-galeria-single info-adotar-'.$key.'" href="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
								<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
							</a>
							<div class="info-apadrinhado infoAdotar-'.$key.'">
								<h2 style="color:white;">Nome do Animal: '.$value['nome'].'</h2>
								<a style="color:white;font-size:15px;font-weight:bold;" href="'.INCLUDE_PATH.''.$categoriaNome.'/'.$value['slug'].'">QUERO ADOTAR</a>
								<div class="btn-close"></div>
							</div>
							<script>
								$(function(){
									$(".info-adotar-'.$key.'").click(function(e){
										e.stopPropagation();
										$(".infoAdotar-'.$key.'").slideToggle();
									})
								})
							</script>
							'
							;
					}
					
						
					
					?>

					<?php
/*

						for($i = 1; $i < 5; $i++){
							echo '<a rel="galeria-ong'.$i.'" class="img-galeria-single galeria-apadrinhar" href="'.INCLUDE_PATH.'img/galeria/img-ong-com-moldura/galeria-1.jpg">
								<img src="'.INCLUDE_PATH.'img/galeria/img-ong-com-moldura/galeria-1.jpg">
							</a>
							<div class="info-apadrinhar">
								<h2 style="color:white;">Nome do Animal: LILY</h2>
								<a style="color:white;font-size:15px;font-weight:bold;" href="'.INCLUDE_PATH.'adotar-animal">QUERO ADOTAR</a>
								<div class="btn-close"></div>
							</div>';
						}

						$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE categoria_id = ?");
						$sql->execute(array('2'));
						$single = $sql->fetchAll();

						foreach($single as $key => $value){
							$sql = Mysql::conectar()->prepare("SELECT `slug` FROM `tb_adotar.categorias` WHERE id = ? ");
							$sql->execute(array('2'));
							$categoriaNome = $sql->fetch()['slug'];
							echo '<a rel="galeria-ong-'.$key.'" class="img-galeria-single galeria-apadrinhar-'.$key.'" href="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
								<img src="'.INCLUDE_PATH_PAINEL.'uploads/'.$value['foto'].'">
							</a>
							<div class="info-apadrinhar slide-'.$key.'">
								<h2 style="color:white;">Nome do Animal: '.$value['nome'].'</h2>
								<a style="color:white;font-size:15px;font-weight:bold;" href="'.INCLUDE_PATH.''.$categoriaNome.'/'.$value['slug'].'">VER MAIS SOBRE '.$value['nome'].'</a>
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
						}*/
					?>
					
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