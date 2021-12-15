<?php
class T_cypher extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	var $id_event = 0;
	var	$id_activiy = 1;
	var	$id_gateway = 1;
	var	$id_relation = 1;
	var $not = 0;
	var $where = array();
	var $negatif_path = false;

	public function get_cypher($NameU,$text=null){
		switch ($NameU) {
			case "Start":
			return '(e1:event{nama:"start"})';
			break;
			case "Task/Subtask":
			return $this->cyph_act($NameU,$text);
			break;
			case "Path":
			return '-[*..]-';
			break;
			case "Negative Path":
			$this->negatif_path = true;
			return '-[*..]-';
			break;
			case "Flow":
			return '-[:SEQUENCE]-';
			break;
			case "Gateway XOR JOIN":
			return '(g'.$this->id_gateway++.':gateway{nama:"xor"})';
			break;
			case "Gateway XOR SPLIT":
			return '(g'.$this->id_gateway++.':gateway{nama:"xor"})';
			break;
			case "Generic Shape":
			return '(g'.$this->id_gateway++.'gateway)';
			break;
			case "Generic SPLIT":
			return '(g'.$this->id_gateway++.':gateway{nama:"split"})';
			break;
			case "Generic Join":
			return '(g'.$this->id_gateway++.':gateway{nama:"join"})';
			break;
			case "Gateway AND SPLIT":
			return '(g'.$this->id_gateway++.':gateway{nama:"and"})';
			break;
			case "Gateway AND JOIN":
			return '(g'.$this->id_gateway++.':gateway{nama:"and"})';
			break;
			case "Gateway OR JOIN":
			return '(g'.$this->id_gateway++.':gateway{nama:"or"})';
			break;
			case "Gateway OR SPLIT":
			return '(g'.$this->id_gateway++.':gateway{nama:"or"})';
			break;
			case "End":
			return '(e2:event{nama:"end"})';
			break;
			default:
			"code to be executed if n is different from all labels";
			break;
		}
	}

	public function start(){
		$this->id_event = 0;
		$this->id_act = 1;
		$this->id_gateway = 1;
		$this->id_relation = 1;
		$this->not = 0;
		$this->negatif_path = false;
	}

	public function get_node($NameU,$jarak){
		switch ($NameU) {
			case "Start":
			return '(e1)';
			break;
			case "Task/Subtask":
			return '(a'.($this->id_activiy-$jarak).')';
			break;
			case "Gateway XOR JOIN":
			return '(g'.($this->id_gateway-$jarak).')';
			break;
			case "Gateway XOR SPLIT":
			return '(g'.($this->id_gateway-$jarak).')';
			break;
			case "Generic Shape":
			return '(g'.($this->id_gateway-$jarak).')';
			break;
			case "Generic SPLIT":
			return '(g'.($this->id_gateway-$jarak).')';
			break;
			case "Generic Join":
			return '(g'.($this->id_gateway-$jarak).')';
			break;
			case "Gateway AND SPLIT":
			return '(g'.($this->id_gateway-$jarak).')';
			break;
			case "Gateway OR JOIN":
			return '(g'.($this->id_gateway-$id).')';
			break;
			case "Gateway AND JOIN":
			return '(g'.($this->id_gateway-$id).')';
			break;
			case "Gateway AND SPLIT":
			return '(g'.($this->id_gateway-$id).')';
			break;
			case "End":
			return '(e2)';
			default:
			"code to be executed if n is different from all labels";
			break;
		}
	}

	public function cyph_act($NameU,$text){
		if ($text==null || $text == "@") {
			return '(a'.$this->id_activiy++.':activity)';
		}
		if ($this->negatif_path) {
			$this->negatif_path = false;
			$this->where[$this->not] = ' not (a'.$this->id_activiy.'.nama = "'.$text.'" )';
			$this->not++;
			return '(a'.$this->id_activiy++.':activity)';
		}
		return '(a'.$this->id_activiy++.':activity{nama:"'.$text.'"})';
	}

	public function get_where(){
		$cypher = " where";
		for ($i=0; $i < count($this->where); $i++) {
			if ($i>0) {
				$cypher .= " AND ";
			 	$cypher .= $this->where[$i];
			}else{
				$cypher .= $this->where[$i];
			} 
		}
		if (count($this->where) == 0) {
			return "";
		}
		return $cypher;
	}
}
?>