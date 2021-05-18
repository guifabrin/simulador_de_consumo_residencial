<?php

class eletro {
	private $nome;
	private $width;
	private $height;
	private $top;
	private $left;
	private $nomeCompleto;
	
	function __construct($nome, $width, $height, $top, $left) {
		$this->nome = $nome;
		$this->width = $width;
		$this->height = $height;
		$this->top = $top;
		$this->left = $left;
		if ($nome == "luz")
			$this->nomeCompleto  = "Lâmpada";
		else if ($nome == "tv")
			$this->nomeCompleto = "Televisão";
		else if ($nome == "som")
			$this->nomeCompleto  = "aparelho de som";
		else if ($nome == "climatizador")
			$this->nomeCompleto  = "Climatizador";
		else if ($nome == "dvd")
			$this->nomeCompleto = "Aparelho de DVD";
		else if ($nome == "game")
			$this->nomeCompleto = "Videogame";
		else if ($nome == "microondas")
			$this->nomeCompleto = "Microondas";
		else if ($nome == "forno")
			$this->nomeCompleto = "Forno elétrico";
		else if ($nome == "geladeira")
			$this->nomeCompleto = "Geladeira";
		else if ($nome == "coifa")
			$this->nomeCompleto = "Coifa";
		else if ($nome == "mqsecar")
			$this->nomeCompleto = "Máquina de secar roupas";
		else if ($nome == "mqlavar")
			$this->nomeCompleto = "Máquina de lavar roupas";
		else if ($nome == "chuveiro")
			$this->nomeCompleto = "Chuveiro";
		else if ($nome == "abajur")
			$this->nomeCompleto = "Abajur";
		else if ($nome == "computador")
			$this->nomeCompleto = "Computador (DESKTOP)";
}
	/**
	 * @return the $nomeCompleto
	 */
	public function getNomeCompleto() {
		return $this->nomeCompleto;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getWidth() {
		return $this->width;
	}

	public function getHeight() {
		return $this->height;
	}

	public function getTop() {
		return $this->top;
	}

	public function getLeft() {
		return $this->left;
	}
}?>