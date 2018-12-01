<?php

namespace Kernel\Tables;

use Kernel\Entities\Language;
use Kernel\Core\Query;
use \PDO;

class LanguagesTables{
	
	public function liste($args=array())
	{	
		$deb = ($args["page"]-1)*$args["by_page"];
		$sel = "select * from #_languages where 1 ";
		
		if(isset($_SESSION["grids"]["languages"]["libelle"]) and $_SESSION["grids"]["languages"]["libelle"] != "")
		{
			$selectLib = Query::select("#_languages_labels.language_entity")
									->from("#_languages_labels")
									->join("#_languages", "#_languages.language_entity", "#_languages_labels.translate_entity")
									->where("language_code", "=", $_SESSION["Auth"]["lg"])
									->whereAnd("#_languages_labels.value", "like", "%".$_SESSION["grids"]["languages"]["libelle"]."%")
									->fetchAll(PDO::FETCH_CLASS, "Kernel\Entities\Language");
			$ids = [];
			foreach($selectLib as $choose)
			{
				$ids[] = $choose->language_entity;
			}
			if(!empty($ids))
			{
				$sel .= " and language_entity in (".implode(",", $ids).")";
			}
		}
		
		
				
		if(isset($_SESSION["grids"]["languages"]["actif"]))
		{
			if($_SESSION["grids"]["languages"]["actif"] == "null")
			{
				$sel .= " and actif is null";
			}
			elseif($_SESSION["grids"]["languages"]["actif"] == "1")
			{
				$sel .=" and actif = 1";
			}
		}
			
		$sel .= " limit ".$deb.", ".$args["by_page"];
		$o = Query::query($sel)->fetchAll(PDO::FETCH_CLASS, "Kernel\Entities\Language");
				
		return $o;
	}
	
	public function getFromCode($code)
	{
		
		$o = Query::select()
				->from('#_languages')
				->where("language_code", "=", $code)
				->fetchOne(PDO::FETCH_CLASS, "Kernel\Entities\Language");
		
		if(!is_object($o))
		{
			$o = new Language();
		}
		
		return $o;
	}
	
	public function countAll()
	{
		$nb = Query::countAll('#_languages');
				
		return $nb;
	}
	
	public function getListeFlags()
	{
		$flags = array();
		$o = Query::select()
					->from('#_languages')
					->where("actif", "=", "1")
					->fetchAll(PDO::FETCH_CLASS, "Kernel\Entities\Language");
					
		foreach($o as $lg)
		{
			$flags[$lg->language_code] = $lg->language_entity;
		}
		
		return $flags;
	}
}

?>