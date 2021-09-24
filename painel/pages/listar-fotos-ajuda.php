<?php
	
	$slides = Painel::selectAll('tb_foto.ajuda');

?>
<div class="box-content">
	<img src="<?php echo INCLUDE_PATH_PAINEL;?>img/listar.png">
	<h2>Fotos Cadastrados</h2>
	<div class="table-wraper">
		<table>
			<thead class="titulo-tabela">
				<th>Nome</th>
				<th>Imagem</th>
				<th class="btn-green">Editar</th>
			</thead>
		<?php
			foreach($slides as $key => $value){
		?>
			<tbody>
				<td><?php echo $value['nome']?></td>
				<td class="slide-img"><img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['foto']?>"/></td>
				<td class="tb-editar">
						<a href="<?php echo INCLUDE_PATH_PAINEL?>editar-foto-ajuda?id=<?php echo $value['id']?>"><img src="img/editar-depoimento-verde.png"></a>
				</td>
			</tbody>
		<?php } ?>
		</table>
	</div><!--table-wraper-->
</div><!--box-content-->
