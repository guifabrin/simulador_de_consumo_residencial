<html>

<head>

<title>Simulador de Consumo Residencial</title>

<!-- Meta Tags -->
<meta name="author" content="Guilherme Fabrin Franco">
<meta name="description"
	content="Simulador de Consumo Residencial - Copuryght">
<meta name="keywords"
	content="simulador, consumo, energia, demei, unijuí">
<meta name="robots" content="index,follow">
<meta http-equiv="content-language" content="pt-br">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta name="reply-to" content="guilherme.fabrin@gmail.com">

<!-- Scripts -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="script.js"></script>
<script type="text/javascript">
function disableselect(e){return false;} 
document.onselectstart=new Function ("return false"); 
if (window.sidebar){document.onmousedown=disableselect; 
	document.onclick=reEnable;}
</script>
<script>
<?php
include "comodo.php";

/*
 * Verifica Brownser
 */

$u_agent = $_SERVER ['HTTP_USER_AGENT'];
if (preg_match ( '/MSIE/i', $u_agent ) && ! preg_match ( '/Opera/i', $u_agent )) {
	$browser = "MSIE";
	$ext = ".png";
	$bootstrap = "<link href='css/bootstrap.css' rel='stylesheet'>";
} elseif (preg_match ( '/Firefox/i', $u_agent )) {
	$browser = "Firefox";
	$ext = ".png";
	$bootstrap = "<link href='css/bootstrap.css' rel='stylesheet'>";
} elseif (preg_match ( '/Chrome/i', $u_agent )) {
	$browser = "Chrome";
	$ext = ".png";
	$bootstrap = "<link href='css/bootstrap.css' rel='stylesheet'>";
} elseif (preg_match ( '/Safari/i', $u_agent )) {
	$browser = "Safari";
	$ext = ".png";
	$bootstrap = "<link href='css/bootstrap.css' rel='stylesheet'>";
} elseif (preg_match ( '/Opera/i', $u_agent )) {
	$browser = "Opera";
	$ext = ".png";
	$bootstrap = "";
} elseif (preg_match ( '/Netscape/i', $u_agent )) {
	$browser = "Netscape";
	$ext->ext = ".png";
	$bootstrap = "";
}

/*
 * Define quais São os Comodos
 */

$var = Array ();
array_push ( $var, new Comodo ( "Sala", 5, $browser, $ext ) );
array_push ( $var, new Comodo ( "Cozinha", 2, $browser, $ext ) );
array_push ( $var, new Comodo ( "Lavanderia", 3, $browser, $ext ) );
array_push ( $var, new Comodo ( "Quarto", 4, $browser, $ext ) );
array_push ( $var, new Comodo ( "Quarto_da_menina", 7, $browser, $ext ) );
array_push ( $var, new Comodo ( "Banheiro", 6, $browser, $ext ) );
array_push ( $var, new Comodo ( "Banheiro1", 9, $browser, $ext ) );
array_push ( $var, new Comodo ( "Escritorio", 1, $browser, $ext ) );
array_push ( $var, new Comodo ( "Quarto_do_menino", 8, $browser, $ext ) );

/*
 * Define os eletros de cada comodo Sala
 */
$eletro001 = new Eletro ( "luz", 2, 15, 12, 49 );
$var [0]->addEletro ( $eletro001 );
$eletro002 = new Eletro ( "tv", 12, 20, 36, 8 );
$var [0]->addEletro ( $eletro002 );
$eletro003 = new Eletro ( "game", 8, 7, 69, 14 );
$var [0]->addEletro ( $eletro003 );
$eletro004 = new Eletro ( "dvd", 9, 6, 80, 5 );
$var [0]->addEletro ( $eletro004 );
$eletro005 = new Eletro ( "som", 10, 10, 58, 32 );
$var [0]->addEletro ( $eletro005 );
$eletro006 = new Eletro ( "climatizador", 14, 7, 26, 60 );
$var [0]->addEletro ( $eletro006 );

/*
 * Cozinha
 */

$eletro001 = new Eletro ( "luz", 2, 15, 12, 49 );
$var [1]->addEletro ( $eletro001 );
$eletro002 = new Eletro ( "geladeira", 18, 69, 25, 77 );
$var [1]->addEletro ( $eletro002 );
$eletro003 = new Eletro ( "microondas", 8, 10, 54, 50 );
$var [1]->addEletro ( $eletro003 );
$eletro004 = new Eletro ( "forno", 7, 10, 54, 39 );
$var [1]->addeletro ( $eletro004 );
$eletro005 = new Eletro ( "coifa", 12, 19, 22, 27 );
$var [1]->addEletro ( $eletro005 );

/*
 * Lavanderia
 */

$eletro001 = new Eletro ( "luz", 2, 15, 12, 49 );
$var [2]->addEletro ( $eletro001 );
$eletro002 = new Eletro ( "mqlavar", 12, 23, 57, 38 );
$var [2]->addEletro ( $eletro002 );
$eletro003 = new Eletro ( "mqsecar", 14, 23, 57, 20 );
$var [2]->addEletro ( $eletro003 );

/*
 * Quarto
 */

$eletro001 = new Eletro ( "luz", 2, 15, 12, 49 );
$var [3]->addEletro ( $eletro001 );
$eletro002 = new Eletro ( "tv", 9, 20, 40, 5 );
$var [3]->addEletro ( $eletro002 );
$eletro003 = new Eletro ( "climatizador", 14, 7, 26, 60 );
$var [3]->addEletro ( $eletro003 );

/*
 * Quarto da Menina
 */

$eletro001 = new Eletro ( "luz", 2, 15, 12, 49 );
$var [4]->addEletro ( $eletro001 );
$eletro002 = new Eletro ( "abajur", 5, 10, 57.5, 23 );
$var [4]->addEletro ( $eletro002 );

/*
 * Banheiro
 */

$eletro001 = new Eletro ( "luz", 2, 15, 12, 49 );
$var [5]->addEletro ( $eletro001 );
$eletro002 = new Eletro ( "chuveiro", 10, 6, 33, 8 );
$var [5]->addEletro ( $eletro002 );

/*
 * Banheiro1
 */

$eletro001 = new Eletro ( "luz", 2, 15, 12, 49 );
$var [6]->addEletro ( $eletro001 );
$eletro002 = new Eletro ( "chuveiro", 10, 6, 33, 8 );
$var [6]->addEletro ( $eletro002 );

/*
 * Escritório
 */

$eletro001 = new Eletro ( "luz", 2, 15, 12, 49 );
$var [7]->addEletro ( $eletro001 );
$eletro002 = new Eletro ( "abajur", 5, 10, 56, 45 );
$var [7]->addEletro ( $eletro002 );
$eletro003 = new Eletro ( "computador", 12, 11, 60, 10 );
$var [7]->addEletro ( $eletro003 );

/*
 * Quarto do Menino
 */

$eletro001 = new Eletro ( "luz", 2, 15, 12, 49 );
$var [8]->addEletro ( $eletro001 );

/*
 * Pega o Brownser e Extension do PHP e passa para uma variável em JS
 */

echo "var extension ='" . $var [8]->getExt () . "';";
echo "var browser ='" . $var [8]->getBrowser () . "';";

/*
 * Função que carrega inicialmente as Imagens
 */

echo "function load(){ ";
foreach ( $var as $comodo ) {
	echo Comodo::loadImagens ( $comodo );
}
echo ";$('.load').css('display','none'); $('.configToConfig').children().css('width','33%'); resize(); zero();}";

/*
 * Define uma Array com o Nome dos Comodos
 */

echo "var comodo = new Array();";
foreach ( $var as $comodo ) {
	echo Comodo::nomeComodos ( $comodo );
}

/*
 * Array aux;
 */

echo "var ale = new Array(); ale[0] = 'qtd'; ale[1] = 'wat'; ale[2] = 'dia'; ale[3] = 'hrs';";

/*
 * Define valores para cada eletro e dita os nomes do php para JS
 */

echo "var eletro = new Array();";
foreach ( $var as $comodo ) {
	echo Comodo::construirDados ( $comodo );
}
foreach ( $var as $comodo ) {
	echo Comodo::nomeEletros ( $comodo );
}
echo "var comod; var eletr; var total; var totalwatts;";
?>

</script>

<?php

/*
 * Define ou não o BOOTSTRAP
 */

if ($bootstrap != "")
	echo $bootstrap;
?>

<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body onload="load();" onresize="resize()">
		<input type='button' class='btn' style='width:100px;' value='Início' onclick="window.location = '../'">
		<input type='button' class='btn' style='width:100px;' value='Copyright' onclick="$('#mydiv').css('display','')">
<div id="mydiv" class="full" style="display: none;">
	<div class='full'>
	<img src='Images/Efeitos/perderfoco.png' class='full'>
		<div class='this003' onload='teste()'>
		<img class='closeToConfig' style='z-index:100;'
				src="Images/Geral/close.png" onclick='fechar1()'
				title="Fechar e Voltar para a Casa">
				<p class='this002' align='center'>
			<font face="comic sans ms"><br>COPYRIGHT</font>
		</p>
			<p style="margin-left: 16; font-size:20px; text-align:center;">Educação em Eficiência Energética: Construindo um Futuro Sustentável - WEB</p>
			<p style="margin-left: 16">
				Autor: Guilherme Fabrin Franco;<br> Co-autor: <a href='http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=S6948821'>Leonardo Bressan
				Motyska</a>;
			</p>
			<p style="margin-left: 16">
				Coordenadores: <br><a href='http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=B384862'>Prof. Dr. Paulo Sérgio Sausen</a> <br><a href='http://buscatextual.cnpq.br/buscatextual/visualizacv.do?id=N264331'>Prof. Dr. Mauricio de
				Campos</a>
			</p>
			<p style='margin-left: 16; margin '>Apoio</p>
			 <img src="../Images/demei.png" class='img01'><img
				src="../Images/ambos.png" class='img02'>
		</div>
	</div>
</div>
	<!-- Tela de Loading -->

	<div class="load full">
		<img class="loading" src='Images/Geral/loading.gif'>
	</div>

	<!-- Div que contem os Comodos -->

	<div class='center'>
		<div class='over'>
			    <?php
							/*
							 * Cria os Comodos
							 */
							foreach ( $var as $comodo ) {
								echo Comodo::construirComodo ( $comodo );
							}
							?>
  		</div>

		<!-- Configurador de Eletro -->

		<div class='toConfig' style='display: none;'>
			<img class='full'
				style='background-color: #000000; opacity: 0.8; filter: alpha(opacity =             80);'
				src='Images/Efeitos/perderfoco.png'> <img class='closeToConfig'
				src="Images/Geral/close.png" onclick='fechar()'
				title="Fechar e Voltar para a Casa">
			<div class='editor'>
				<input readonly='readonly'>
			</div>
			<div class='config'>
				<div class='help'>
					<img class='full' src='Images/Efeitos/perderfoco.png'
						style='background-color: #FFFFFF; opacity: 0.7; filter: alpha(opacity =               70); z-index: -1;'>
					<font color="white"> O cálculo de consumo de cada eletrodoméstico é
						dado pela equação: <br> <font color="green"><b>kWh</b></font> = <font
						color="red"><b>Watts</b></font>*<font color="blue"><b>Dias</b></font>*<font
						color="gold"><b>Horas</b></font>/1000 <br> Atribuímos à <font
						color="orange"><b>Taxa</b></font> o valor de R$ 0,39024/(0.8735)
						até o consumo de 50 kWh, após esse valor, a taxa ficará definida
						por 0,39024/(0.7435)<br> Assim <font color="green"><b>kWh</b></font>*(<font
						color="orange"><b>Taxa</b></font>) é igual ao resultado em R$. <br>
						<br> <font style="text-align: justify;"> Nessa parte de
							configuração você pode definir a quantidade de eletrodomésticos
							da mesma espécie, a quantidade de Watts utilizada e quantos dias
							e horas por mês você utiliza.</font><br> Obs: Caso exista mais do
						mesmo eletrodoméstico faça uma média entre todos.
					</font>
				</div>
				<div class='configToConfig'>
					<input readonly="readonly" class='input'><input readonly="readonly"
						value="Novo"><input readonly="readonly" value="Anterior">
                 <?php
																	/*
																	 * Arrays
																	 * Aux
																	 */
																	$a [0] = "qtd";
																	$b [0] = "Qtd";
																	$a [1] = "wat";
																	$b [1] = "Watts";
																	$a [2] = "dia";
																	$b [2] = "Dias";
																	$a [3] = "hrs";
																	$b [3] = "Horas";
																	for($i = 0; $i < 4; $i ++) {
																		echo "<input readonly='readonly' value='" . $b [$i] . "'>";
																		echo "<input type='text' id='n" . $a [$i] . "'>";
																		echo "<input readonly='readonly' id='a" . $a [$i] . "'>";
																		echo "<br>";
																	}
																	?>
                 <input type='button' class='btn btn-success'
						value='Trocar' onclick='trocar()' style='margin-left: -1px;'><input type='button' class='btn'
						value='Limpar' onclick='limpar()' style='margin-left: -1px;'><input class='btn' type='button'
						value='Default' onclick='def()' style='margin-left: -1px;'>
				</div>
			</div>
		</div>
		
		<img class='otherdiv' id='otherdiv' style="display: none;"
			src="Images/Efeitos/perderfoco.png">
			
		<!--  Telhado -->
		
		<div class='telhado'>
			<img class='full' src='Images/Geral/telhado.png'>
		</div>
		
		<div class='print'>
			<img class='image_print' src='Images/Geral/print.png'
				onclick="javascript:imprimir();">
			<div style='left: 15%;'>Clique na imagem ao lado para imprimir sua
				lista.</div>
		</div>
		<div class='listview'>
			<table border="1" style="text-transform: uppercase; font-size: 10px;">
			</table>
		</div>
		<div class='conta'>
			<div align=center></div>
			<img class="full" src='Images/Geral/conta.png'>
			<div class='topresult01' style="left: 40%;">
				<input readonly='readonly' id='mes' class='result'
					value='<?php
					$mes = date ( 'm' );
					switch ($mes) {
						
						case 1 :
							$mes = "Janeiro";
							break;
						case 2 :
							$mes = "Fevereiro";
							break;
						case 3 :
							$mes = "Mar&ccedil;o";
							break;
						case 4 :
							$mes = "Abril";
							break;
						case 5 :
							$mes = "Maio";
							break;
						case 6 :
							$mes = "Junho";
							break;
						case 7 :
							$mes = "Julho";
							break;
						case 8 :
							$mes = "Agosto";
							break;
						case 9 :
							$mes = "Setembro";
							break;
						case 10 :
							$mes = "Outubro";
							break;
						case 11 :
							$mes = "Novembro";
							break;
						case 12 :
							$mes = "Dezembro";
							break;
					}
					echo $mes;
					?>'>
			</div>
			<div class='topresult02' style='left: 40%;'>
				<input readonly='readonly' class='result' id='watts' value="0">
			</div>
			<div class='topresult01' style='left: 73%;'>
				<input readonly='readonly' class='result' id='date'
					value='<?php echo date ( 'd/m/y' );?>'>
			</div>
			<div class='topresult02' style='left: 73%;'>
				<input readonly='readonly' class='result' id='result' value='0,00'>
			</div>
			<div style='top: 100%; font-size: 80%; height: 15%;'>
				OBS: A taxa usada até o consumo de 50 kwh é dada pelo cálculo:
				0.39024 / (0.8735); Após, é dada pelo cálculo: 0.39024 / (0.7435);<br>
				Sua taxa atual é: <input style="width: 30%"
					value='0.39024 / (0.8735)' readonly="readonly" id='taxinha'>
			</div>
		</div>
		<div class='style'>Simulador de Consumo de Energia para Eficiência
			Energética</div>
	</div>
</body>
</html>
