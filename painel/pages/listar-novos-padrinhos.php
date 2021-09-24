<?php
	
	$paginaAtual = isset($_GET['pagina']) ? (INT)$_GET['pagina'] : 1;
	$porPagina = 10;

?>
<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
	<h2>Novos Padrinhos</h2>
	<div class="table-wraper">
		<table class="lista-noticias">
			<thead class="titulo-tabela">
				<th>Nome</th>
				<th>Foto</th>
				<th>Padrinho</th>
				<th class="btn-green">Editar</th>
				<th class="btn-red">Deletar</th>
				<th style="width: 2%;">#</th>
				<th style="width: 2%;">#</th>
			</thead>
		<?php
			$lista = Mysql::conectar()->prepare("SELECT * FROM `tb_site.apadrinhar` WHERE categoria_id = ? ORDER BY order_id ASC");
			$lista->execute(array(1));
			$lista = $lista->fetchAll();
			foreach($lista as $key => $value){
		?>
			<tbody>
				<td><?php echo $value['nome']?></td>
				<td class="slide-img"><img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>"/></td>
				<td><?php echo $value['padrinho']?></td>
				<td class="tb-editar">
						<a href="<?php echo INCLUDE_PATH_PAINEL?>editar-com-padrinhos?id=<?php echo $value['id']?>"><img src="img/editar-depoimento-verde.png"></a>
				</td>
				<td class="tb-excluir">
						<a <?php
							if($_SESSION['cargo'] >= 1){
						  ?>
						  actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL?>sem-padrinhos?excluir-padrinho=<?php echo $value["id"]?>"
						  <?php }else{ ?> 
						  	actionBtn="negado" href="#"
						  <?php } ?>
						  >

						<img src='img/excluir-depoimento-red.png'></a>
					</td>
				<td class="arrow"><a 
					<?php
						if($_SESSION['cargo'] >= 1){
					  ?> href="<?php echo INCLUDE_PATH_PAINEL?>sem-padrinhos?order=up&id=<?php echo $value["id"]?>"
					  <?php }else{ ?> 
					  	actionBtn="negado" href="#"
					  <?php } ?>
					><img src="<?php echo INCLUDE_PATH_PAINEL?>img/arrow-up.png"></td>
				<td class="arrow"><a
					<?php
						if($_SESSION['cargo'] >= 1){
					  ?> href="<?php echo INCLUDE_PATH_PAINEL?>sem-padrinhos?order=down&id=<?php echo $value["id"]?>"
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
			$totalPagina = ceil(count(Painel::selectAll('tb_site.apadrinhar'))/$porPagina);
			for($i = 1; $i <= $totalPagina; $i++){
				if($i == $paginaAtual){
					echo '<a class="pag-selected" href="'.INCLUDE_PATH_PAINEL.'sem-padrinhos?pagina='.$i.'">'.$i.'</a>';
				}else{
					echo '<a href="'.INCLUDE_PATH_PAINEL.'sem-padrinhos?pagina='.$i.'">'.$i.'</a>';
				}
			}
		?>
		
	</div><!--paginacao-->
</div><!--box-content-->
