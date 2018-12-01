<?php

namespace Kernel\Tables;

use Kernel\Entities\Attribut;
use Kernel\Core\Query;
use \PDO;

class AttributesTables{
	
	public function liste($args=array())
	{
		$req = Query::select()
				->from('#_eav_attributes');
				//->limit(0,1);
		$o = $req->fetchAll(PDO::FETCH_CLASS, "Kernel\Entities\Attribut");
				
		return $o;
	}
	
	public function getFromCode($code)
	{
		
		$o = Query::select()
				->from('#_eav_attributes')
				->where("attribute_code", "=", $code)
				->fetchOne(PDO::FETCH_CLASS, "Kernel\Entities\Attribut");
		
		if(!is_object($o))
		{
			$o = new Attribut();
		}
		
		return $o;
	}
	
	public function countAll()
	{
		$nb = Query::countAll('#_eav_attributes');
				
		return $nb;
	}
}

?>