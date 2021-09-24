<?php
	
	$paginaAtual = isset($_GET['pagina']) ? (INT)$_GET['pagina'] : 1;
	$porPagina = 15;
	$slides = Painel::selectAll('tb_config.contato',($paginaAtual - 1)*$porPagina,$porPagina);

?>
<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
	<h2>Fotos Recebidas</h2>
	<div class="table-wraper">
		<table>
			<thead class="titulo-tabela">
				<th>Nome</th>
				<th>Motivo Contato</th>
				<th>Data Contato</th>
				<th class="btn-green">Ver Mais</th>
				<th class="btn-red">Deletar</th>
				<th style="width: 2%;">#</th>
				<th style="width: 2%;">#</th>
			</thead>
		<?php
			foreach($slides as $key => $value){
		?>
			<tbody>
				<td><?php echo $value['nome']?></td>
				<td><?php echo $value['motivo_contato']?></td>
				<td><?php echo date('d/m/Y',strtotime($value['data']))?></td>
				<td class="tb-editar">
						<a href="<?php echo INCLUDE_PATH_PAINEL?>ver-mais-contato?id=<?php echo $value['id']?>"><img src="img/editar-depoimento-verde.png"></a>
				</td>
				<td class="tb-excluir">
						<a <?php
							if($_SESSION['cargo'] >= 1){
						  ?>
						  actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-contatos?excluir=<?php echo $value["id"]?>"
						  <?php }else{ ?> 
						  	actionBtn="negado" href="#"
						  <?php } ?>
						  >

						<img src='img/excluir-depoimento-red.png'></a>
				</td>
				<td class="arrow"><a 
					<?php
						if($_SESSION['cargo'] >= 1){
					  ?> href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-contatos?order=up&id=<?php echo $value["id"]?>"
					  <?php }else{ ?> 
					  	actionBtn="negado" href="#"
					  <?php } ?>
					><img src="<?php echo INCLUDE_PATH_PAINEL?>img/arrow-up.png"></td>
				<td class="arrow"><a
					<?php
						if($_SESSION['cargo'] >= 1){
					  ?> href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-contatos?order=down&id=<?php echo $value["id"]?>"
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
			$totalPagina = ceil(count(Painel::selectAll('tb_config.contato'))/$porPagina);
			for($i = 1; $i <= $totalPagina; $i++){
				if($i == $paginaAtual){
					echo '<a class="pag-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-contatos?pagina='.$i.'">'.$i.'</a>';
				}else{
					echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-contatos?pagina='.$i.'">'.$i.'</a>';
				}
			}
		?>
		
	</div><!--paginacao-->
</div><!--box-content-->
