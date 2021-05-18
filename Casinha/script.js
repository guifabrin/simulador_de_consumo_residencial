var taxa;
visualizacao = 0;
function aumentar(a, b) {
	if (visualizacao == 0) {
		$('#' + a).css({
			'top' : '0%',
			'left' : '0%',
			'width' : '100%',
			'height' : '100%'
		});
		oall();
		mthi(a);
		comod = b;
	}
}
function oall() {
	for (b = 1; b <= $('.comodo').length; b++) {
		$('#' + b).css('display', 'none');
	}
	$('.transparente').css('display', 'none');
}
function mthi(b) {
	$('#' + b).css('display', '');
}
function mall() {
	$('.comodo').css('display', '');
	$('.transparente').css('display', '');
}
function reduzir(idiv, top, left) {
	$('#' + idiv).css({
		'top' : top + '%',
		'left' : left + '%',
		'width' : '50%',
		'height' : '50%'
	});
}

function ligar(a, b) {
	if (eletro[a][b]['status'] == 0) {
		if (b == "chuveiro" || b == "coifa" || b == "tv") {
		} else {
			if (browser == "Chrome" || browser == "Safari") {
				$('#' + a + b).css('background-image',
						"url(Images/Eletros/" + b + "on" + extension + ")");
			} else {
				if (b != "chuveiro" || b != "coifa") {
					$('#' + a + b)
							.attr('src', "Images/Eletros/" + b + "on" + extension);
				}
			}
		}
		if (b == "luz") {
			$('#' + a + 'foco').css('display', 'none');
		}
		if (b == "tv") {
			if (browser == "Chrome" || browser == "Safari") {
				$('#' + a + b).css('background-image',
						"url(Images/Efeitos/" + b + "on.gif)");
			} else {
				$('#' + a + b).attr('src', "Images/Efeitos/" + b + "on.gif");
			}
		}
		$('#' + a + b + 'avc').css('display', '');
		$('#' + a + b + 'avc1').css('display', '');
		if(b == "climatizador"){
			$('#'+a+b+"ar").css('display','');
		}
		if(b == "chuveiro"){
			$('#'+a+b+"pingo").css('display','');
		}
		if(b == "abajur"){
			$('#'+a+b+"abajur").css('display','');
		}
		if(b == "som"){
			$('#'+a+b+"notas").css('display','');
		}
		
		eletro[a][b]['status'] = 1;
	} else {
		if (b == "chuveiro" || b == "coifa") {
		} else {
			if (browser == "Chrome" || browser == "Safari") {
				$('#' + a + b).css('background-image',
						"url(Images/Eletros/" + b + "off" + extension + ")");
			} else {
				$('#' + a + b).attr('src', "Images/Eletros/" + b + "off" + extension);
			}
		}
		if (b == "luz") {
			$('#' + a + 'foco').css('display', '');
		}
		$('#' + a + b + "avc").css('display', 'none');
		$('#' + a + b + "avc1").css('display', 'none');
		if(b == "climatizador"){
			$('#'+a+b+"ar").css('display','none');
		}
		if(b == "chuveiro"){
			$('#'+a+b+"pingo").css('display','none');
		}
		if(b == "abajur"){
			$('#'+a+b+"abajur").css('display','none');
		}
		if(b == "som"){
			$('#'+a+b+"notas").css('display','none');
		}
		eletro[a][b]['status'] = 0;
	}
	calcular(a, b);
}

function calcular(a, b) {
	c = eletro[a][b];
	c['total'] = c['aqtd'] * c['awat'] * c['adia'] * c['ahrs'] * c['status']
			/ 1000;
	eletro[a]['total'] = 0;
	for (i = 0; i < eletro[a].length; i++) {
		eletro[a]['total'] += eletro[a][eletro[a][i]]['total'];
	}
	total = 0;
	for (j = 0; j < comodo.length; j++) {
		total += eletro[comodo[j]]['total'];
	}
	$('#watts').attr('value', (total).toFixed(2));
	if ($('#watts').attr('value') < 50) {
		taxa = 0.39024 / (0.8735);
		$('#taxinha').attr('value','0.39024 / (0.8735)');
	} else {
		taxa = 0.39024 / (0.7435);
		$('#taxinha').attr('value','0.39024 / (0.7435)');
	}
	$('#result').attr('value', (total * taxa).toFixed(2));
	listview();
}
function fechar() {
	$('.toConfig').css('display', 'none');
}
function fechar1() {
	$('#mydiv').css('display','none');
}

function trocar() {
	torf = true;
	for (i = 0; i <= 3; i++) {
		if ($('#n' + ale[i]).attr('value') <= 0
				|| $('#n' + ale[i]).attr('value') == '') {
			alert('O valor ' + ale[i] + ' não pode ser Negativo ou Nulo');
			$('#n' + ale[i]).attr('value', '');
			torf = false;
		}
	}
	if (document.getElementById('ndia').value > 30) {
		alert('Dias não podem ultrapassar 30;')
		document.getElementById('ndia').value = '';
		torf = false;
	}
	if (document.getElementById('nhrs').value > 24) {
		alert('Horas não podem ultrapassar 24;')
		document.getElementById('nhrs').value = '';
		torf = false;
	}
	if (torf != false) {
		for (i = 0; i <= 3; i++) {
			eletro[comod][eletr][('a' + ale[i])] = document
					.getElementById(('n' + ale[i])).value
		}
		limpar();
		calcular(comod, eletr);
		fechar();
	}
}
function def() {
	for (i = 0; i <= 3; i++) {
		$('#n' + ale[i]).attr('value',
				parseFloat(eletro[comod][eletr][('d' + ale[i])]));
	}
}
function limpar() {
	for (i = 0; i <= 3; i++) {
		document.getElementById(('n' + ale[i])).value = ''
	}
}
function click1() {
	for (i = 0; i <= 3; i++) {
		$('#a' + ale[i]).attr('value', eletro[comod][eletr][('a' + ale[i])]);
	}
	$('.toConfig').css('display', '');
}
function resize() {
	$('body').css('height', '100%');
	$('body').css('width', '100%');
	if ($('body').width() < 1092) {
		$('.center').css('width', '1092px');
		$('.center').css('left', '40px');
	} else {
		$('.center').css('width', '90%');
		$('.center').css('left', '5%');
	}
	if ($('body').height() < 537) {
		$('.center').css('height', '537px');
		$('.center').css('top', '50px');
	} else {
		$('.center').css('height', '90%');
		$('.center').css('top', '8%');
	}
	if (browser=='Safari' || browser=='Firefox'){
		$('input').css('height','20px')
		$('input[type=button]').css('height','40px')
	}
		
}
function zero() {
	$('watts').attr('value', '0');
	$('result').attr('value', '0.00');
	listview();
}
function listview() {
	$('.listview').children('table').children().remove();
	$('.listview')
			.children('table')
			.append(
					"<tr><td>Comodo</td> <td style='text-align: center;'>Eletrodoméstico</td> <td style='text-align: center;'>Valor R$</td></tr>")
	for (i = 0; i < comodo.length; i++) {
		a = comodo[i];
		for (j = 0; j < eletro[a].length; j++) {
			b = eletro[a][j];
			if (eletro[a][b]['status'] == 1)
				$('.listview').children('table').append(
						"<tr ><td>" + a + "</td> <td>" + eletro[a][b]['completo']
								+ "</td> <td style='text-align: right;'>"
								+ (eletro[a][b]['total'] * taxa).toFixed(2)
								+ "</td></tr>");
		}
	}
	$('.listview').children('table').css('width', '100%');
	$('.listview').children('table').children().children('tr').css('width',
			'100%');
	$('.listview').children('table').children().children('tr').children('td')
			.css('width', '33%');
}
function imprimir() {
	novaJanela = window
			.open(
					'',
					'',
					'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
	novaJanela.document.write("<head>");
	novaJanela.document
			.write("<meta http-equiv='content-type' content='text/html; charset=iso-8859-1' />");
	novaJanela.document
			.write("<style tyle='text/css' media='print'>button{display: none;}</style>");
	novaJanela.document
			.write("<style tyle='text/css' media='all'>a{color: #0000FF;}</style>");
	novaJanela.document.write("");
	novaJanela.document.write("</head>");
	novaJanela.document.write("<body>");
	novaJanela.document.write("<table>");
	novaJanela.document.write("<tbody>");
	novaJanela.document
			.write("<tr><td>Comodo</td> <td style='text-align: center;'>Eletrodoméstico</td> <td style='text-align: center;'>Valor R$</td></tr>")
	for (i = 0; i < comodo.length; i++) {
		a = comodo[i];
		for (j = 0; j < eletro[a].length; j++) {
			b = eletro[a][j];
			if (eletro[a][b]['status'] == 1)
				novaJanela.document.write("<tr><td>" + a + "</td> <td>" + b
						+ "</td> <td style='text-align: right;'>"
						+ (eletro[a][b]['total'] * taxa).toFixed(2)
						+ "</td></tr>");
		}
	}
	novaJanela.document.write("</tbody>");
	novaJanela.document.write("</table>");
	novaJanela.document
			.write("<button type='button' onclick='javascript:window.print();'>Imprimir Página</button>");
	novaJanela.document.write("</body>");
	return false;
}