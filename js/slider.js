$(document).ready(function(){

	var imgShow = 1;
	var maxIndex = Math.ceil($('.mini-img-wraper').length/1) -1;
	var imgAjuda = Math.ceil($('.img-ajuda').length/1) -1;
	var curIndex = 0;
	initiSlider();
	navigateSlide();
	function initiSlider(){
		var amt = $('.mini-img-wraper').length * 100;
		var elScroll = $('.nav-galeria-wraper');
		var elSingle = $('.mini-img-wraper');
		elScroll.css('width',amt+'%');
		elSingle.css('width',100*(100/amt)+'%');
	}
	function navigateSlide(){
		$('.arrow-right').click(function(){
			if(curIndex < maxIndex){
				curIndex++;
				var eloff = $('.mini-img-wraper').eq(curIndex).offset().left - $('.nav-galeria-wraper').offset().left;
				$('.nav-galeria').animate({'scrollLeft':eloff});
			}
		})
		$('.arrow-left').click(function(){
			if(curIndex > 0){
				curIndex--;
				var eloff = $('.mini-img-wraper').eq(curIndex).offset().left - $('.nav-galeria-wraper').offset().left;
				$('.nav-galeria').animate({'scrollLeft':eloff});
			}
		})
	}

})