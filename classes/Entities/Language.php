<?php

namespace Kernel\Entities;

use Kernel\Core\Query;
use \PDO;

class Language{
	
	public $translate = array();
	public $language_entity;
	public $language_code;
	public $actif;
	
	public function __construct()
	{
		if(isset($this->language_entity) and $this->language_entity != "")
		{
			$this->labels();
		}
	}
	
	public function labels()
	{
		$resultat = array();
		$labels = Query::select()
				->from("#_languages_labels")
				->join("#_languages", "#_languages_labels.translate_entity", "#_languages.language_entity")
				->where("#_languages_labels.language_entity", "=", $this->language_entity)
				->fetchAll(PDO::FETCH_ASSOC);
		foreach($labels as $label)
		{
			$resultat[] = $label;
			$this->translate[$label["language_code"]] = $label["value"];
		}
		
		return $resultat;
	}
	
}