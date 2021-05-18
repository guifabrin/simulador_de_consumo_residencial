<html>
<? 
$arquivo = "contador.txt"; 
$contador = 0; 

$fp = fopen($arquivo,"r"); 
$contador = fgets($fp, 26); 
fclose($fp); 

++$contador; 

$fp = fopen($arquivo,"w+"); 
fwrite($fp, $contador, 26); 
fclose($fp); 
?>	
<head>
<title>Simulador de Consumo Residencial</title>
<link rel="stylesheet" href="style.css" />
<meta name="author" content="Guilherme Fabrin Franco">
<meta name="description"
	content="Simulador de Consumo Residencial - Copuryght">
<meta name="keywords"
	content="simulador, consumo, energia, demei, unijuí">
<meta name="robots" content="index,follow">
<meta http-equiv="content-language" content="pt-br">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="reply-to" content="guilherme.fabrin@gmail.com">
<script src="script.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32427390-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript">
function disableselect(e){
	return false;
	} 
document.onselectstart=new Function ("return false"); 
if (window.sidebar){document.onmousedown=disableselect; 
	document.onclick=reEnable;}
</script>
</head>
<body onload='resize()' onresize='resize()'>
	<div class='first_div'>
		<div class='text'>Bem Vindo! Ao Simulador de Consumo Residencial</div>
		<div align="center">
			<img src="Images/demei.png" align="middle" class='img01'> <img
				src="Images/unijui.png" align="middle" class='img02'> <img src="Images/gaic.png"
				align="middle" class='img03'>
		</div>
		<div class='selecionar'>
			<div id='1' class="select_image" style='top:8%;' onclick='select(0)' onmouseover="up(this.id)" onmouseout="stop(this.id)">
				<img src='Images/casa.jpg' class='img04'>
			</div>
			<div class="select_text" style='top:8%;'>
				Clique aqui para Iniciar!
			</div>
			<div class="select_image" style='top:60%;'>
				<img src='Images/casa.gif' class='img04'>
			</div>
			<div class="select_text" style='top:60%;'>
				Clique aqui para personalizar sua Casa!
			</div>
			<img src='Images/em_construcao.png' class='const'>
			</div>
	</div>
	<div class='load' style='position:absolute; z-index: 200; background-color: rgb(255, 255, 255); width:100%; height:100%;'>
		<img class="loading" 
	src='Casinha/Images/Geral/loading.gif'>
	</div>
</body>
</html>