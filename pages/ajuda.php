
<section class="ajuda" id="ajuda-home">
	<div class="container">

		<div class="title-section">
			<div class="png-txt"></div>
			<h2><?php echo $infoSiteAjuda['titulo_1'];?></h2>
			<p><?php echo $infoSiteAjuda['subtitulo_1'];?></p>
		</div><!--title-section-->

	</div><!--container-->

	<div class="bg-ajuda">
		
		<div class="btn-ajuda-wraper">
			<div class="container">

				<div class="btn-single doar-btn btn-selected">
					<img src="<?php echo INCLUDE_PATH;?>img/home/doar-icone.png"><!--img-btn-->
					<p class="txt-btn">DOAR</p>
				</div><!--btn-single-->

				<div class="btn-single apadrinhar-btn">
					<img src="<?php echo INCLUDE_PATH;?>img/home/apadrinhar-icone.png"><!--img-btn-->
					<p class="txt-btn">APADRINHAR</p>
				</div><!--btn-single-->

				<div class="btn-single adotar-btn">
					<img src="<?php echo INCLUDE_PATH;?>img/home/adotar-icone.png"><!--img-btn-->
					<p class="txt-btn">ADOTAR</p>
				</div><!--btn-single-->

			</div><!--container-->
		</div><!--btn-ajuda-wraper-->
		
	</div><!--bg-ajuda-->

	<section class="doar-section">
		<div class="container">

				<div class="title-section doar-title">
					<h2><?php echo $infoSiteAjuda['titulo_doar_1'];?></h2>
					<p><?php echo $infoSiteAjuda['subtitulo_doar_1'];?></p>
				</div><!--title-section-->

			<div class="flex container-historia container-doar">
				
				<div class="historia-txt w50">
					<h3><?php echo $infoSiteAjuda['titulo_foto_1'];?></h3>
					<p><?php echo $infoSiteAjuda['texto_foto_1'];?></p>
				</div><!--historia-txt-->
				<?php
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_foto.ajuda` WHERE order_id = 1");
				$sql->execute();
				$foto = $sql->fetch();
				?>
				<div class="historia-img w50">
					<div class="background-img"></div>
					<div class="wraper-img-container">
						<div class="job-parent parent-img-ajuda">
						<div class="nav-galeria">
							<div class="img-wraper" style="width:100%;">
								<div class="wraper-img" style="width:100%;">
									<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $foto['foto']?>');border: 4px solid #9d7d35;"></div>
								</div>
							</div><!--nav-galeria-wraper-->
						</div><!--nav-galeria-->
						</div><!--job-parent-->
					</div><!--wraper-img-container-->
				</div><!--historia-img-->
			</div><!--flex container-historia-->

			<div class="title-section title-ajuda">
				<h2><?php echo $infoSiteAjuda['titulo_final_1'];?></h2>
				<p><?php echo $infoSiteAjuda['texto_final_1'];?></p>
			</div><!--title-section-->

			<div class="wraper-ajuda">

				<?php 
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.doar` WHERE order_id = ?");
				$sql->execute(array('1'));
				$info = $sql->fetchAll();
				foreach($info as $key => $value){
				?>

				<div class="ajuda-single">
					<div class="historia-img w50">
						<div class="background-img fundo-ajuda"></div>
						<div class="wraper-img-container">
							<div class="job-parent parent-img-ajuda">
							<div class="nav-galeria">
								<div class="img-wraper" style="width:100%;">
									<div class="wraper-img" style="width:100%;">
										<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>');border: 4px solid #9d7d35;"></div>
									</div>
								</div><!--nav-galeria-wraper-->
							</div><!--nav-galeria-->
							</div><!--job-parent-->
						</div><!--wraper-img-container-->
					</div><!--historia-img-->

					<div class="title-section title-ajuda">
						<h2><?php echo $value['valor']?></h2>
						<p><?php echo $value['descricao']?></p>
					</div><!--title-section-->

					<div class="btn-ajuda">
						<a href="<?php echo INCLUDE_PATH?>doar">DOAR</a>
					</div><!--btn-ajuda-->

				</div><!--ajuda-single-->

				<?php }?>

				<?php 
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.doar` WHERE order_id = ?");
				$sql->execute(array('2'));
				$info = $sql->fetchAll();
				foreach($info as $key => $value){
				?>

				<div class="ajuda-single">
					<div class="historia-img w50">
						<div class="background-img fundo-ajuda"></div>
						<div class="wraper-img-container">
							<div class="job-parent parent-img-ajuda">
							<div class="nav-galeria">
								<div class="img-wraper" style="width:100%;">
									<div class="wraper-img" style="width:100%;">
										<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>');border: 4px solid #9d7d35;"></div>
									</div>
								</div><!--nav-galeria-wraper-->
							</div><!--nav-galeria-->
							</div><!--job-parent-->
						</div><!--wraper-img-container-->
					</div><!--historia-img-->

					<div class="title-section title-ajuda">
						<h2><?php echo $value['valor']?></h2>
						<p><?php echo $value['descricao']?></p>
					</div><!--title-section-->

					<div class="btn-ajuda">
						<a href="<?php echo INCLUDE_PATH?>doar">DOAR</a>
					</div><!--btn-ajuda-->

				</div><!--ajuda-single-->

				<?php }?>

				<?php 
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.doar` WHERE order_id = ?");
				$sql->execute(array('3'));
				$info = $sql->fetchAll();
				foreach($info as $key => $value){
				?>

				<div class="ajuda-single">
					<div class="historia-img w50">
						<div class="background-img fundo-ajuda"></div>
						<div class="wraper-img-container">
							<div class="job-parent parent-img-ajuda">
							<div class="nav-galeria">
								<div class="img-wraper" style="width:100%;">
									<div class="wraper-img" style="width:100%;">
										<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>');border: 4px solid #9d7d35;"></div>
									</div>
								</div><!--nav-galeria-wraper-->
							</div><!--nav-galeria-->
							</div><!--job-parent-->
						</div><!--wraper-img-container-->
					</div><!--historia-img-->

					<div class="title-section title-ajuda">
						<h2><?php echo $value['valor']?></h2>
						<p><?php echo $value['descricao']?></p>
					</div><!--title-section-->

					<div class="btn-ajuda">
						<a href="<?php echo INCLUDE_PATH?>doar">DOAR</a>
					</div><!--btn-ajuda-->

				</div><!--ajuda-single-->

				<?php }?>

				<?php 
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.doar` WHERE order_id = ?");
				$sql->execute(array('4'));
				$info = $sql->fetchAll();
				foreach($info as $key => $value){
				?>

				<div class="ajuda-single">
					<div class="historia-img w50">
						<div class="background-img fundo-ajuda"></div>
						<div class="wraper-img-container">
							<div class="job-parent parent-img-ajuda">
							<div class="nav-galeria">
								<div class="img-wraper" style="width:100%;">
									<div class="wraper-img" style="width:100%;">
										<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>');border: 4px solid #9d7d35;"></div>
									</div>
								</div><!--nav-galeria-wraper-->
							</div><!--nav-galeria-->
							</div><!--job-parent-->
						</div><!--wraper-img-container-->
					</div><!--historia-img-->

					<div class="title-section title-ajuda">
						<h2><?php echo $value['valor']?></h2>
						<p><?php echo $value['descricao']?></p>
					</div><!--title-section-->

					<div class="btn-ajuda">
						<a href="<?php echo INCLUDE_PATH?>doar">DOAR</a>
					</div><!--btn-ajuda-->

				</div><!--ajuda-single-->

				<?php }?>

				<?php 
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.doar` WHERE order_id = ?");
				$sql->execute(array('5'));
				$info = $sql->fetchAll();
				foreach($info as $key => $value){
				?>

				<div class="ajuda-single">
					<div class="historia-img w50">
						<div class="background-img fundo-ajuda"></div>
						<div class="wraper-img-container">
							<div class="job-parent parent-img-ajuda">
							<div class="nav-galeria">
								<div class="img-wraper" style="width:100%;">
									<div class="wraper-img" style="width:100%;">
										<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>');border: 4px solid #9d7d35;"></div>
									</div>
								</div><!--nav-galeria-wraper-->
							</div><!--nav-galeria-->
							</div><!--job-parent-->
						</div><!--wraper-img-container-->
					</div><!--historia-img-->

					<div class="title-section title-ajuda">
						<h2><?php echo $value['valor']?></h2>
						<p><?php echo $value['descricao']?></p>
					</div><!--title-section-->

					<div class="btn-ajuda">
						<a href="<?php echo INCLUDE_PATH?>doar">DOAR</a>
					</div><!--btn-ajuda-->

				</div><!--ajuda-single-->

				<?php }?>

			</div><!--wraper-ajuda-->

			<div class="outro-valor">
				<div class="btn-ajuda">
					<a href="<?php echo INCLUDE_PATH?>doar">DOAR OUTRO VALOR</a>
				</div><!--btn-ajuda-->
			</div><!--outro-valor-->

		</div><!--container-->
	</section><!--doar-section-->

	<section class="apadrinhar-section">

		<div class="title-section doar-title">
			<h2><?php echo $infoSiteAjuda['titulo_apadrinhar_2'];?></h2>
			<p><?php echo $infoSiteAjuda['subtitulo_apadrinhar_2'];?></p>
		</div><!--title-section-->

		<div class="container">

			<div class="flex container-historia container-doar">
				<div class="historia-txt w50">
					<h3><?php echo $infoSiteAjuda['titulo_foto_2'];?></h3>
					<p><?php echo $infoSiteAjuda['texto_foto_2'];?></p>
				</div><!--historia-txt-->
				<div class="historia-img w50">
					<div class="background-img"></div>
					<div class="wraper-img-container">
						<div class="job-parent parent-img-ajuda">

						<?php
						$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_foto.ajuda` WHERE order_id = 2");
						$sql->execute();
						$foto = $sql->fetch();
						?>

						<div class="nav-galeria">
							<div class="img-wraper" style="width:100%;">
								<div class="wraper-img" style="width:100%;">
									<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $foto['foto']?>');border: 4px solid #9d7d35;"></div>
								</div>
							</div><!--nav-galeria-wraper-->
						</div><!--nav-galeria-->
						</div><!--job-parent-->
					</div><!--wraper-img-container-->
				</div><!--historia-img-->
			</div><!--flex container-historia-->

			<div class="title-section title-ajuda">
				<h2><?php echo $infoSiteAjuda['titulo_final_2'];?></h2>
				<p><?php echo $infoSiteAjuda['texto_final_2'];?></p>
			</div><!--title-section-->

			<div class="wraper-ajuda">

				<?php
					$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.apadrinhar` WHERE categoria_id = ? ORDER BY order_id DESC LIMIT 5");
					$sql->execute(array('2'));
					$single = $sql->fetchAll();
					foreach($single as $key => $value){
						$sql = Mysql::conectar()->prepare("SELECT `slug` FROM `tb_apadrinhar.categorias` WHERE id = ? ");
						$sql->execute(array('2'));
						$categoriaNome = $sql->fetch()['slug'];
				?>

				<div class="ajuda-single">
					<div class="historia-img w50">
						<div class="background-img fundo-ajuda"></div>
						<div class="wraper-img-container">
							<div class="job-parent parent-img-ajuda">
							<div class="nav-galeria">
								<div class="img-wraper" style="width:100%;">
									<div class="wraper-img" style="width:100%;">
										<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>');border: 4px solid #9d7d35;"></div>
									</div>
								</div><!--nav-galeria-wraper-->
							</div><!--nav-galeria-->
							</div><!--job-parent-->
						</div><!--wraper-img-container-->
					</div><!--historia-img-->

					<div class="title-section title-ajuda">
						<h2><?php echo $value['nome']?></h2>
						<p><?php echo substr($value['descricao'],0,23)?><br>Campanha de adoção</p>
					</div><!--title-section-->

					<div class="btn-ajuda">
						<a href="<?php echo INCLUDE_PATH ?><?php echo $categoriaNome?>/<?php echo $value['slug']?>" class="size-a-small">APADRINHAR</a>
					</div><!--btn-ajuda-->

				</div><!--ajuda-single-->

				<?php } ?>

			</div><!--wraper-ajuda-->

			<div class="outro-valor">
				<div class="btn-ajuda">
					<a href="<?php echo INCLUDE_PATH?>apadrinhar-animais">VER MAIS ANIMAIS</a>
				</div><!--btn-ajuda-->
			</div><!--outro-valor-->

		</div><!--container-->

	</section><!--apadrinhar-section-->

	<section class="adotar-section">

		<div class="title-section doar-title">
			<h2><?php echo $infoSiteAjuda['titulo_adotar_3'];?></h2>
			<p><?php echo $infoSiteAjuda['subtitulo_adotar_3'];?></p>
		</div><!--title-section-->

		<div class="container">

			<div class="flex container-historia container-doar">
				<div class="historia-txt w50">
					<h3><?php echo $infoSiteAjuda['titulo_foto_3'];?></h3>
					<p><?php echo $infoSiteAjuda['texto_foto_3'];?></p>
				</div><!--historia-txt-->
				<div class="historia-img w50">
					<div class="background-img"></div>
					<div class="wraper-img-container">

						<?php
						$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_foto.ajuda` WHERE order_id = 3");
						$sql->execute();
						$foto = $sql->fetch();
						?>

						<div class="job-parent parent-img-ajuda">
						<div class="nav-galeria">
							<div class="img-wraper" style="width:100%;">
								<div class="wraper-img" style="width:100%;">
									<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $foto['foto']?>');border: 4px solid #9d7d35;"></div>
								</div>
							</div><!--nav-galeria-wraper-->
						</div><!--nav-galeria-->
						</div><!--job-parent-->
					</div><!--wraper-img-container-->
				</div><!--historia-img-->
			</div><!--flex container-historia-->

			<div class="title-section title-ajuda">
				<h2><?php echo $infoSiteAjuda['titulo_final_3'];?></h2>
				<p><?php echo $infoSiteAjuda['texto_final_3'];?></p>
			</div><!--title-section-->

			<div class="wraper-ajuda">

				<?php
					$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE categoria_id = ? ORDER BY order_id DESC LIMIT 5");
					$sql->execute(array('2'));
					$single = $sql->fetchAll();
					foreach($single as $key => $value){
						$sql = Mysql::conectar()->prepare("SELECT `slug` FROM `tb_adotar.categorias` WHERE id = ? ");
						$sql->execute(array('2'));
						$categoriaNome = $sql->fetch()['slug'];
				?>

				<div class="ajuda-single">
					<div class="historia-img w50">
						<div class="background-img fundo-ajuda"></div>
						<div class="wraper-img-container">
							<div class="job-parent parent-img-ajuda">
							<div class="nav-galeria">
								<div class="img-wraper" style="width:100%;">
									<div class="wraper-img" style="width:100%;">
										<div class="mini-img" style="background-image: url('<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>');border: 4px solid #9d7d35;"></div>
									</div>
								</div><!--nav-galeria-wraper-->
							</div><!--nav-galeria-->
							</div><!--job-parent-->
						</div><!--wraper-img-container-->
					</div><!--historia-img-->

					<div class="title-section title-ajuda">
						<h2><?php echo $value['nome']?></h2>
						<p><?php echo substr($value['descricao'],0,65)?>..</p>
					</div><!--title-section-->

					<div class="btn-ajuda">
						<a href="<?php echo INCLUDE_PATH ?><?php echo $categoriaNome?>/<?php echo $value['slug']?>">VER</a>
					</div><!--btn-ajuda-->

				</div><!--ajuda-single-->

				<?php } ?>

			</div><!--wraper-ajuda-->

			<div class="outro-valor">
				<div class="btn-ajuda">
					<a href="<?php echo INCLUDE_PATH?>adotar">VER TODOS ANIMAIS</a>
				</div><!--btn-ajuda-->
			</div><!--outro-valor-->

		</div><!--container-->

	</section><!--apadrinhar-section-->

</section><!--ajuda-->