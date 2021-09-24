<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Painel</title>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
	<link href="<?php echo INCLUDE_PATH_PAINEL;?>css/style.css" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH_PAINEL;?>img/icone-painel.png" type="image-x/png" rel="shortcut icon">
	<script src="https://cdn.tiny.cloud/1/a3b3sxzsq8y7owpz0sqd9o1jdm5e0p8fah7cut3dgfnzmcw9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
	<header>
			<div class="icone-menu"></div>
			<div class="nome-painel-procurar">
				<div class="nome-painel">
					<h1><span class="color-blue">ADMIN</span> <?php echo NOME_EMPRESA?></h1>
				</div><!--nome-painel-->
				<div class="procurar">
					<input type="text" name="procurar" placeholder="procurar">
				</div>
			</div><!--nome-painel-procurar-->
			<div class="perfil-menu">
				<div class="msg">
					<div class="alerta-notificacao">1</div>
					<div class="submenu-msg">
						<div class="titulo-msg">
							<h2>Você tem <span>1</span> Nova mensagem!</h2>
						</div><!--titulo-msg-->
						<p>Administrador
							<hr>
							<span>Seja Bem vindo ao painel</span>
						</p>
					
					</div><!--submenu-msg-->
				</div><!--msg-->
				<div class="notificacao">
					<div class="alerta-notificacao">3</div>
					<div class="submenu-notif">

						<div class="titulo-msg">
							<h2>Você tem <span>3</span> Novas notificação!</h2>
						</div><!--titulo-msg-->

						<p>Texto adicionado na página principal</p>
						<hr>
						<p>Texto adicionado na página principal</p>
						<hr>
						<p>Texto adicionado na página principal</p>
						<hr>
					</div><!--submenu-msg-->
				</div><!--notificacao-->
				<div class="perfil">
					<?php 
						if($_SESSION['img'] == ' '){
					?>
						<div class="icone-perfil">
							<img src="<?php echo INCLUDE_PATH_PAINEL?>img/icone-user.png">
						</div><!--icone-perfil-->
					<?php }else{ ?>
						<div class="icone-perfil">
							<img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $_SESSION['img']?>">
						</div><!--icone-perfil-->
					<?php } ?>
					<div class="nome-perfil">
						<span><?php echo $_SESSION['nome']?></span>
						<span><?php echo pegaCargo($_SESSION['cargo'])?></span>
					</div><!--nome-perfil-->
					
					<div class="seta-baixo">
						<img src="<?php echo INCLUDE_PATH_PAINEL?>img/seta-baixo.png">
					</div><!--seta-baixo-->

					<div class="sub-menu-perfil">
						<ul>
							<li><img src="<?php echo INCLUDE_PATH_PAINEL?>img/config.png"><a href="<?php echo INCLUDE_PATH_PAINEL?>configuracao-geral">Configuração Geral</a></li>
							<li><img src="<?php echo INCLUDE_PATH_PAINEL?>img/icon-adm.png"><a href="<?php echo INCLUDE_PATH_PAINEL?>adm-painel">ADM Painel</a></li>
							<li><img src="<?php echo INCLUDE_PATH_PAINEL?>img/logout.png"><a href="<?php echo INCLUDE_PATH_PAINEL?>?loggout">Sair</a></li>
						</ul>
					</div><!--sub-menu-perfil-->
				</div><!--perfil-->
			</div>
			<div class="clear"></div>
	</header>

<div class="wraper-body">

	<aside>
		<div class="cadastro-aside">
			<h2>Gestão de Texto</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>configuracao-home">Gerenciar Home</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>configuracao-ajuda">Gerenciar Ajuda</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>configuracao-doar">Gerenciar Doar</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>configuracao-apadrinhar">Gerenciar Apadrinhar</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>configuracao-adotar">Gerenciar Adotar</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>configuracao-contato">Gerenciar Contato</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>configuracao-equipe">Gerenciar Equipe</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>configuracao-galeria">Gerenciar Galeria</a>
		</div><!--cadastro-aside-->
		<div class="cadastro-aside">
			<h2>Gestão de Imagens</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-home">Gerenciar Home</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-ajuda">Gerenciar Ajuda</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-galeria">Gerenciar Galeria</a>
		</div><!--cadastro-aside-->
		<div class="gestao-aside">
			<h2 class="gestao-adm">Gestão Mural</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-fotos">Gerenciar Fotos</a>
			<!--
			<span class="alert-circle"></span></a>
			-->
			<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-mural">Gerenciar Mural</a>
		</div>
		<div class="gestao-aside">
			<h2 class="gestao-adm">Gestão de Doar</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-doar">Gerenciar Doar</a>
		</div>
		<div class="gestao-aside">
			<h2 class="gestao-adm">Gestão de Apadrinhar</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>sem-padrinhos">Sem Padrinho</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-padrinhos">Com Padrinho</a>
		</div>
		<div class="gestao-aside">
			<h2 class="gestao-adm">Gestão de Adotar</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>para-adocao">Para Adoção</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>animais-adotados">Adotados</a>
		</div>
		<div class="gestao-aside">
			<h2 class="gestao-adm">Administração do Painel</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>adm-painel">Gerenciar Usuário</a>
		</div>
		<div class="gestao-aside">
			<h2 class="gestao-adm">Gestão de Notícias</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-categorias">Gerenciar Categoria</a>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-noticias">Gerenciar Notícias</a>
		</div>
		<div class="gestao-aside">
			<h2 class="gestao-adm">Contatos do Site</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-contatos">Gerenciar Contatos</a>
		</div>
	</aside>

	<div class="wraper-content">
		<div class="content">
			
			<?php Painel::carregarPagina();?>

		</div><!--content-->
		
	</div><!--content-->

</div><!--wraper-body-->

	<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/fade-menu.js"></script>
	<script src="<?php echo INCLUDE_PATH?>js/jquery.mask.js"></script>
	<script>
		$(function(){
			$('input[name=data]').mask('99/99/9999');
		})
	</script>
	<script>
   			 tinymce.init({
		      selector: '.tinymce',
			 // menubar: 'insert',
		      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image',
		      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table image',
		      toolbar_mode: 'floating',
		      tinycomments_mode: 'embedded',
		      tinycomments_author: 'Author name',
		      height: 1000,
		   });
    </script>

</body>
</html>