function select(i){
	if (i == 0){
		window.location = 'Casinha/';
	}
	else{
		window.location = 'Formulario/form.php';
	}
}
function up(id){
	for (i=0; i<1000;i++){
	$('#'+id).animate({'top':'4%'});
	$('#'+id).animate({'top':'8%'});}
}
function stop(id){
	$('#'+id).stop(true, true);
	$('#'+id).css('top','8%')}
function resize(){
	$('body').css('height','100%');
	$('body').css('width','100%');
	$('.first_div').css({'top':((100-$('.first_div').height()*100/$('body').height())/2)+'%',
		'left':((100-$('.first_div').width()*100/$('body').width())/2)+'%'
	})
	if ($('.first_div').css('top') < '0%')
		$('.first_div').css('top','0px');
	if ($('.first_div').css('left') < '0%')
		$('.first_div').css('left','0px');
	$('.load').css('display','none');
}