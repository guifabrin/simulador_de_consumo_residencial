<?php
include "eletro.php";

class Comodo {
	
	private $name;
	private $position;
	private $listadeeletro;
	private $browser;
	private $ext;
	function __construct($name, $position, $browser, $ext) {
		$this->name = $name;
		$this->position = $position;
		$this->browser = $browser;
		$this->ext = $ext;
		$this->listadeeletro = Array ();
		switch ($position) {
			case 1 :
				$this->top = 50;
				$this->left = 0;
				$this->zindex = 1;
				break;
			case 2 :
				$this->top = 50;
				$this->left = 25;
				$this->zindex = 2;
				break;
			case 3 :
				$this->top = 50;
				$this->left = 50;
				$this->zindex = 1;
				break;
			case 4 :
				$this->top = 25;
				$this->left = 0;
				$this->zindex = 3;
				break;
			case 5 :
				$this->top = 25;
				$this->left = 25;
				$this->zindex = 4;
				break;
			case 6 :
				$this->top = 25;
				$this->left = 50;
				$this->zindex = 3;
				break;
			case 7 :
				$this->top = 0;
				$this->left = 0;
				$this->zindex = 1;
				break;
			case 8 :
				$this->top = 0;
				$this->left = 25;
				$this->zindex = 2;
				break;
			case 9 :
				$this->top = 0;
				$this->left = 50;
				$this->zindex = 1;
				break;
		}
	}
	
	static function construirComodo($comodo) {
		$htmlDyn = "";
		if ($comodo->getBrowser () == "Chrome" || $comodo->getBrowser () == "Safari") {
			$background = "background-image:url('Images/Comodos/" . $comodo->getName () . $comodo->getExt () . "')";
			$image = "";
			$porta = "<div title='Clique aqui para sair do comodo ".$comodo->getName()."' class='porta toClicked click' onclick=\"reduzir('" . $comodo->getPosition () . "','" . $comodo->getTop () . "','" . $comodo->getLeft () . "'); mall();\"></div>";
			$foco = "<div  class='full foco' id='" . $comodo->getName () . "foco' style='background-image:url(\"Images/Efeitos/perderfoco.png\")'></div>";
			$transp = "<div class='full transparente click' onclick='aumentar(" . $comodo->getPosition () . ",\"" . $comodo->getName () . "\");'></div>";
		} else {
			$background = "";
			$image = "<img class='full' src=\"Images/Comodos/" . $comodo->getName () . $comodo->getExt () . "\">";
			$foco = "<img  class='full foco' id='" . $comodo->getName () . "foco' src='Images/Efeitos/perderfoco.png'>";
			$transp = "<img src='Images/Geral/transparente.png' class='full transparente click' onclick='aumentar(" . $comodo->getPosition () . ",\"" . $comodo->getName () . "\")'/>";
			if ($comodo->getBrowser () == "MSIE")
				$porta = "<img title='Clique aqui para sair do comodo ".$comodo->getName()."' class='porta toClicked click' src='Images/Geral/transparente.png' onclick=\"reduzir(" . $comodo->getPosition () . "," . $comodo->getTop () . "," . $comodo->getLeft () . "); mall();\">";
			else {
				$porta = "<div title='Clique aqui para sair do comodo ".$comodo->getName()."' class='porta toClicked click' onclick=\"reduzir(" . $comodo->getPosition () . "," . $comodo->getTop () . "," . $comodo->getLeft () . "); mall();\"></div>";
			}
		}
		$htmlDyn .= "<div name=\"" . $comodo->getName () . "\" id=\"" . $comodo->getPosition () . "\" class='comodo' style=\"top:" . $comodo->getTop () . "%; left:" . $comodo->getLeft () . "%; z-index:" . $comodo->getZindex () . "; " . $background . "; \" onmouseover='this.style.zIndex=100'; onmouseout=\"this.style.zIndex=" . $comodo->getZindex () . "\">";
		if ($image != "")
			$htmlDyn .= $image;
		$porta1 = "<img class='porta' src='Images/Geral/portafechada" . $comodo->getExt () . "'>";
		$htmlDyn .= $porta . $foco . $transp . $porta1;
		$htmlDyn .= Comodo::montareletro ( $comodo );
		$htmlDyn .= "</div>";
		return $htmlDyn;
	}
	static function montareletro($comodo) {
		$htmlDyn = "";
		foreach ( $comodo->getListadeeletro () as $eletro ) {
			if ($comodo->getBrowser () == "Chrome" || $comodo->getBrowser () == "Safari") {
				$htmlDyn .= "<div id='" . $comodo->getName () . $eletro->getNome () . "'name='" . $eletro->getNome () . "' class='eletro " . $comodo->getName () . "' style='top:" . $eletro->getTop () . "%; left:" . $eletro->getLeft () . "%; width:" . $eletro->getWidth () . "%; height:" . $eletro->getHeight () . "%; background-image:url(\"Images/Eletros/" . $eletro->getNome () . "off" . $comodo->getExt () . "\")' onclick='ligar(\"" . $comodo->getName () . "\",\"" . $eletro->getNome () . "\");'></div>";
			} else {
				$htmlDyn .= "<img id='" . $comodo->getName () . $eletro->getNome () . "'name='" . $eletro->getNome () . "' class='eletro " . $comodo->getName () . "' style='top:" . $eletro->getTop () . "%; left:" . $eletro->getLeft () . "%; width:" . $eletro->getWidth () . "%; height:" . $eletro->getHeight () . "%;' src=\"Images/Eletros/" . $eletro->getNome () . "off" . $comodo->getExt () . "\" onclick='ligar(\"" . $comodo->getName () . "\",\"" . $eletro->getNome () . "\");'>";
			}
			if ($comodo->getBrowser () != "MSIE") {
				$htmlDyn .= "<div title='clique aqui para ligar o(a) ".$eletro->getNome()."' class='toClicked click' style='top:" . $eletro->getTop () . "%; left:" . $eletro->getLeft () . "%; width:" . $eletro->getWidth () . "%; height:" . $eletro->getHeight () . "%;' onclick='$(\"#" . $comodo->getName () . $eletro->getNome () . "\").click()'></div>";
			} else {
				$htmlDyn .= "<img class='toClicked click' style='top:" . $eletro->getTop () . "%; left:" . $eletro->getLeft () . "%; width:" . $eletro->getWidth () . "%; height:" . $eletro->getHeight () . "%;' src=\"Images/Geral/transparente.png\" onclick='$(\"#" . $comodo->getName () . $eletro->getNome () . "\").click()'>";
			}
			$htmlDyn .= "<img id='" . $comodo->getName () . $eletro->getNome () . "avc' class='eletro avc' style='display:none; top:" . $eletro->getTop () . "%; left:" . ($eletro->getLeft () + $eletro->getWidth ()) . "%;' src=\"Images/Geral/advanced.png\" onclick=\"comod='" . $comodo->getName () . "'; eletr='" . $eletro->getNome () . "'; click1(); $('.editor').children().attr('value','Você está editando o(a) " . $eletro->getNomeCompleto () . " do(a) " . $comodo->getName () . "')\">";
			$htmlDyn .= "<img id='" . $comodo->getName () . $eletro->getNome () . "avc1' class='toClicked avc click' style='display:none; top:" . $eletro->getTop () . "%; left:" . ($eletro->getLeft () + $eletro->getWidth ()) . "%;' src=\"Images/Geral/transparente.png\" onclick='$(\"#" . $comodo->getName () . $eletro->getNome () . "avc\").click()'/>";
			if ($eletro->getNome () == 'chuveiro') {
				$htmlDyn .= "<img id='" . $comodo->getName () . $eletro->getNome () . "pingo' class='eletro' style='display:none; width:3%; height:50%; top:" . ($eletro->getTop () + $eletro->getHeight ()) . "%; left:" . ($eletro->getLeft () + 6.5) . "%;' src=\"Images/Efeitos/pingo.gif\">";
			} else if ($eletro->getNome () == 'climatizador') {
				$htmlDyn .= "<img id='" . $comodo->getName () . $eletro->getNome () . "ar' class='eletro' style='display:none; width:" . $eletro->getWidth () . "%; height:" . $eletro->getHeight () . "%; top:" . ($eletro->getTop () + $eletro->getHeight ()) . "%; left:" . $eletro->getLeft () . "%;' src=\"Images/Efeitos/ar.gif\">";
			} else if ($eletro->getNome () == 'abajur') {
				$htmlDyn .= "<img id='" . $comodo->getName () . $eletro->getNome () . "abajur' class='eletro' style='display:none; width:" . $eletro->getWidth () . "%; height:" . ($eletro->getHeight () - 2) . "%; top:" . ($eletro->getTop () + 2) . "%; left:" . ($eletro->getLeft () - 2) . "%;' src=\"Images/Efeitos/abajurefect.png\">";
			} else if ($eletro->getNome () == 'som') {
				$htmlDyn .= "<img id='" . $comodo->getName () . $eletro->getNome () . "notas' class='eletro' style='display:none; width:" . $eletro->getWidth () . "%; height:" . $eletro->getHeight () . "%; top:" . ($eletro->getTop () - $eletro->getHeight ()) . "%; left:" . $eletro->getLeft () . "%;' src=\"Images/Efeitos/notas.gif\">";
			}
		}
		return $htmlDyn;
	}
	
	static function construirDados($comodo) {
		$js = "";
		$file = fopen ( "tabela.csv", "r" );
		$conteudo = fread ( $file, filesize ( "tabela.csv" ) );
		$linhas = explode ( "\n", $conteudo );
		$i = 0;
		$array = Array ();
		foreach ( $linhas as $linha ) {
			if ($linha != "") {
				$celula = explode ( ";", $linha );
				$array [$i] = $celula;
				$i ++;
			}
		}
		$js .= "eletro['" . $comodo->getName () . "'] = new Array();\n";
		foreach ( $comodo->getListadeeletro () as $eletro ) {
			for($ia = 0; $ia < $i; $ia ++) {
				for($ib = 0; $ib < 2; $ib ++) {
					if ($array [$ia] [$ib] == $comodo->getName ()) {
						$ib ++;
						if ($array [$ia] [$ib] == $eletro->getNome ()) {
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "'] = new Array();";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['status'] = 0; ";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['dqtd'] = " . $array [$ia] [2] . "; ";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['dwat'] = " . $array [$ia] [3] . "; ";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['ddia'] = " . $array [$ia] [4] . "; ";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['dhrs'] = " . $array [$ia] [5] . "; ";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['aqtd'] = " . $array [$ia] [2] . "; ";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['awat'] = " . $array [$ia] [3] . "; ";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['adia'] = " . $array [$ia] [4] . "; ";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['ahrs'] = " . $array [$ia] [5] . "; ";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['total'] = 0; ";
							$js .= "eletro['" . $comodo->getName () . "']['" . $eletro->getNome () . "']['completo'] = '".$eletro->getNomeCompleto()."';";
						}
					}
				}
			}
		}
		$js .= "eletro['" . $comodo->getName () . "']['total'] = 0; ";
		$js .= "eletro['" . $comodo->getName () . "']['totalwatts'] = 0; ";
		return $js;
	}
	static function loadImagens($comodo) {
		$v = 1;
		$im = "";
		foreach ( $comodo->getListadeeletro () as $eletro ) {
				if ($eletro->getNome() == "tv" || $eletro->getNome () == 'chuveiro' || $eletro->getNome () == 'coifa' ) {
					if ($eletro->getNome() == 'tv'){
						$im .= "im" . $comodo->getPosition () . "" . $v . "on = new Image(" . $eletro->getWidth () . "," . $eletro->getHeight () . ");";
						$im .= "im" . $comodo->getPosition () . "" . $v . "on.src = 'Images/Efeitos/" . $eletro->getNome () . "on.gif';";
					}
				} else {
					$im .= "im" . $comodo->getPosition () . "" . $v . "on = new Image(" . $eletro->getWidth () . "," . $eletro->getHeight () . ");";
					$im .= "im" . $comodo->getPosition () . "" . $v . "on.src = 'Images/Eletros/" . $eletro->getNome () . "on" . $comodo->getExt () . "';";
				}
				$im .= "im" . $comodo->getPosition () . "" . $v . "off = new Image(" . $eletro->getWidth () . "," . $eletro->getHeight () . ");";
				$im .= "im" . $comodo->getPosition () . "" . $v . "off.src = 'Images/Eletros/" . $eletro->getNome () . "off" . $comodo->getExt () . "';";
				$v ++;
		}
		return $im;
	
	}
	static function nomeComodos($comodo) {
		$nc = "";
		$nc .= "comodo[" . ($comodo->getPosition () - 1) . "] = '" . $comodo->getName () . "';";
		return $nc;
	}
	static function nomeEletros($comodo) {
		$var = 0;
		$ne = "";
		foreach ( $comodo->getListadeeletro () as $eletro ) {
			$ne .= "eletro['" . $comodo->getName () . "'][" . $var . "] = '" . $eletro->getNome () . "';";
			$var ++;
		}
		return $ne;
	
	}
	
	public function getBrowser() {
		return $this->browser;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getTop() {
		return $this->top;
	}
	
	public function getLeft() {
		return $this->left;
	}
	
	public function getZindex() {
		return $this->zindex;
	}
	public function getListadeeletro() {
		return $this->listadeeletro;
	}
	
	public function getPosition() {
		return $this->position;
	}
	
	public function getExt() {
		return $this->ext;
	}
	
	public function addEletro($eletro) {
		array_push ( $this->listadeeletro, $eletro );
	}
}

?>
