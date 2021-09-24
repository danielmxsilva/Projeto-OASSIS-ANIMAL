<?php
	
	$paginaAtual = isset($_GET['pagina']) ? (INT)$_GET['pagina'] : 1;
	$porPagina = 10;

?>
<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
	<h2>Novas Adoção Esperando Aprovação</h2>
	<div class="table-wraper">
		<table class="lista-noticias">
			<thead class="titulo-tabela">
				<th>Nome</th>
				<th>Foto</th>
				<th>Pessoa</th>
				<th class="btn-green">Ver Mais</th>
				<th class="btn-red">Deletar</th>
				<th style="width: 2%;">#</th>
				<th style="width: 2%;">#</th>
			</thead>
		<?php
			$lista = Mysql::conectar()->prepare("SELECT * FROM `tb_site.adotar` WHERE categoria_id = ? ORDER BY order_id ASC");
			$lista->execute(array(1));
			$lista = $lista->fetchAll();
			foreach($lista as $key => $value){
		?>
			<tbody>
				<td><?php echo $value['nome']?></td>
				<td class="slide-img"><img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>"/></td>
				<td><?php echo $value['adotador']?></td>
				<td class="tb-editar">
						<a href="<?php echo INCLUDE_PATH_PAINEL?>aprovar-adocao?id=<?php echo $value['id']?>"><img src="img/editar-depoimento-verde.png"></a>
				</td>
				<td class="tb-excluir">
						<a <?php
							if($_SESSION['cargo'] >= 1){
						  ?>
						  actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL?>para-adocao?excluir-adocao=<?php echo $value["id"]?>"
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
