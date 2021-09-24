$(function(){
	
	/*
	$('.galeria-apadrinhado').click(function(e){
		e.stopPropagation();
		$('.info-apadrinhado').slideToggle();
	})*/
	$('body').click(function(e){
		e.stopPropagation();
		$('.info-apadrinhado').slideUp();
		$('.info-apadrinhar').slideUp();
	})
	$('.btn-close').click(function(e){
		e.stopPropagation();
		$('.info-apadrinhado').slideUp();
		$('.info-apadrinhar').slideUp();
	})
})