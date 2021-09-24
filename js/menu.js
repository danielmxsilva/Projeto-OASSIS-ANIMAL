$(document).ready(function(){

	$('.icone-menu').click(function(e){
		e.stopPropagation();
		if($('.menu-mobile').is(':visible')){
			$('.img-desktop').fadeIn();
			$('.icone-menu').css('background-image','');
			console.log('escondido');
		}else{
			$('.img-desktop').hide();
			$('.icone-menu').css('background-image','url(img/menu-open.png)');
			console.log('aberto');
		}
		$('.menu-mobile').slideToggle();
	})

	$('body').click(function(e){
		e.stopPropagation();
		$('.menu-mobile').slideUp();
		$('.img-desktop').fadeIn();
		$('.icone-menu').css('background-image','');
	})

})