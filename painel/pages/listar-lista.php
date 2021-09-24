<?php
	
	$paginaAtual = isset($_GET['pagina']) ? (INT)$_GET['pagina'] : 1;
	$porPagina = 10;
	$slides = Painel::selectAll('tb_site.doador',($paginaAtual - 1)*$porPagina,$porPagina);

?>
<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
	<h2>Doadores Cadastrados</h2>
	<div class="table-wraper">
		<table>
			<thead class="titulo-tabela">
				<th>Nome</th>
				<th>E-mail</th>
				<th>Valor</th>
				<th class="btn-green">Editar</th>
				<th class="btn-red">Deletar</th>
			</thead>
		<?php
			foreach($slides as $key => $value){
		?>
			<tbody>
				<td><?php echo $value['nome']?></td>
				<td><?php echo $value['email']?></td>
				<td><?php echo $value['valor_doado']?></td>
				<td class="tb-editar">
						<a href="<?php echo INCLUDE_PATH_PAINEL?>editar-doador?id=<?php echo $value['id']?>"><img src="img/editar-depoimento-verde.png"></a>
				</td>
				<td class="tb-excluir">
						<a <?php
							if($_SESSION['cargo'] >= 1){
						  ?>
						  actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-doar?excluir=<?php echo $value["id"]?>"
						  <?php }else{ ?> 
						  	actionBtn="negado" href="#"
						  <?php } ?>
						  >

						<img src='img/excluir-depoimento-red.png'></a>
				</td>
			</tbody>
		<?php } ?>
		</table>
	</div><!--table-wraper-->
	<div class="paginacao">
		<?php
			$totalPagina = ceil(count(Painel::selectAll('tb_site.doador'))/$porPagina);
			for($i = 1; $i <= $totalPagina; $i++){
				if($i == $paginaAtual){
					echo '<a class="pag-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-doar?pagina='.$i.'">'.$i.'</a>';
				}else{
					echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-doar?pagina='.$i.'">'.$i.'</a>';
				}
			}
		?>
		
	</div><!--paginacao-->
</div><!--box-content-->

