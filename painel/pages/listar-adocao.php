<?php
	
	$paginaAtual = isset($_GET['pagina']) ? (INT)$_GET['pagina'] : 1;
	$porPagina = 8;
	$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE categoria_id = ?");
	$sql->execute(array(2));

	$noticia = $sql->fetchAll();

?>
<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
	<h2>Animais Cadastrados</h2>
	<div class="table-wraper">
		<table class="lista-noticias">
			<thead class="titulo-tabela">
				<th>Nome</th>
				<th>Foto</th>
				<th class="btn-green">Editar</th>
				<th class="btn-red">Deletar</th>
				<th style="width: 2%;">#</th>
				<th style="width: 2%;">#</th>
			</thead>
		<?php
			foreach($noticia as $key => $value){
		?>
			<tbody>
				<td><?php echo $value['nome']?></td>
				<td class="slide-img"><img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>"/></td>
				<td class="tb-editar">
						<a href="<?php echo INCLUDE_PATH_PAINEL?>editar-animal-adocao?id=<?php echo $value['id']?>"><img src="img/editar-depoimento-verde.png"></a>
				</td>
				<td class="tb-excluir">
						<a <?php
							if($_SESSION['cargo'] >= 1){
						  ?>
						  actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL?>para-adocao?excluir=<?php echo $value["id"]?>"
						  <?php }else{ ?> 
						  	actionBtn="negado" href="#"
						  <?php } ?>
						  >

						<img src='img/excluir-depoimento-red.png'></a>
					</td>
				<td class="arrow"><a 
					<?php
						if($_SESSION['cargo'] >= 1){
					  ?> href="<?php echo INCLUDE_PATH_PAINEL?>para-adocao?order=up&id=<?php echo $value["id"]?>"
					  <?php }else{ ?> 
					  	actionBtn="negado" href="#"
					  <?php } ?>
					><img src="<?php echo INCLUDE_PATH_PAINEL?>img/arrow-up.png"></td>
				<td class="arrow"><a
					<?php
						if($_SESSION['cargo'] >= 1){
					  ?> href="<?php echo INCLUDE_PATH_PAINEL?>para-adocao?order=down&id=<?php echo $value["id"]?>"
					  <?php }else{ ?> 
					  	actionBtn="negado" href="#"
					  <?php } ?>
					><img src="<?php echo INCLUDE_PATH_PAINEL?>img/arrow-down.png">
				</td>
			</tbody>
		<?php } ?>
		</table>
	</div><!--table-wraper-->
	<div class="paginacao">
		<?php
			$totalPagina = ceil(count(Painel::selectAll('tb_site.adotar'))/$porPagina);
			for($i = 1; $i <= $totalPagina; $i++){
				if($i == $paginaAtual){
					echo '<a class="pag-selected" href="'.INCLUDE_PATH_PAINEL.'para-adocao?pagina='.$i.'">'.$i.'</a>';
				}else{
					echo '<a href="'.INCLUDE_PATH_PAINEL.'para-adocao?pagina='.$i.'">'.$i.'</a>';
				}
			}
		?>
		
	</div><!--paginacao-->
</div><!--box-content-->
