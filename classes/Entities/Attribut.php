<?php

namespace Kernel\Entities;

use Kernel\Core\Query;
use \PDO;

class Attribut{
	
	public $translate = array();
	public $options = array();
	public $attribute_entity;
	public $attribute_code;
	public $attribute_type;
	
	public function __construct()
	{
		if(isset($this->attribute_entity) and $this->attribute_entity != "")
		{
			$this->labels();
		}
	}
	
	public function labels()
	{
		$resultat = array();
		$labels = Query::select()
				->from("#_eav_attributes_labels")
				->join("#_languages", "#_eav_attributes_labels.language_entity", "#_languages.language_entity")
				->where("attribute_entity", "=", $this->attribute_entity)
				->fetchAll(PDO::FETCH_ASSOC);
		foreach($labels as $label)
		{
			$resultat[] = $label;
			$this->translate[$label["language_code"]] = $label["value"];
		}
		
		return $resultat;
	}
	
	public function options()
	{
		$resultat = array();
		$options = Query::select()
					->form("#_eav_attributes_options")
					->join("#_languages", "#_eav_attributes_options.language_entity", "#_languages.language_entity")
					->where("attribute_entity", "=", $this->attribute_entity)
					->fetchAll(PDO::FETCH_ASSOC);
					
		foreach($options as $option)
		{
			$resultat[] = $option;
			$this->options[$option["options_attribute_entity"]][$option["language_code"]] = $option["value"];
		}
		
		return $resultat;
	}
		
	public function set($attr, $val)
	{
		$this->$attr = $val;
	}
	
	public function save()
	{
	}
}