<?php

	class loadMenu{
		
		// Parametro que armazena os itens do menu
		public $itensMenu = array();
		
		
		// Metodo para inserção dos grupos de itens de menu (dropdowns)
		// @param $label - Nome do rótulo a ser exibido
		// @param $modulo - Nome do módulo correspondente
		
		public function dropDown($label, $modulo){
			
			$drop = 	"<li module='{$modulo}' class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown'>{$label} <b class='caret'></b></a>
						<ul class='dropdown-menu'>";
						
						foreach ($this->itensMenu as $itens) {
							$drop .= $itens . "\n";
						}
	
			$drop .= 	"</ul>
						</li>";
						
			return $drop;			
	
		}
		
		// Método para inserção dos itens em cada grupo
		// @param $label				- Nome do rótulo a ser exibido
		// @param $URl					- url de destino
		// @param $privilegio		-	nivel do privilegio de acesso (para controle de acesso)
		
		public function setLiItem($label, $URl, $privilegio){
			if ($_SESSION['usuario_tipo'] < $privilegio) {
				$URl = "#";
				$class = "disabled";
			}
			$this->itensMenu[] = "<li class='{$class}'><a href='{$URl}'>{$label}</a></li>";
		}
		
		
		// Metodo para inserir um divisor entre os itens
		
		public function setDivider(){
			
			$this->itensMenu[] = "<li class='divider'></li>";
			
		}
		
	}

?>
