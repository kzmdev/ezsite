<?php
namespace controllers;

use Kernel\Core\Query;
use Kernel\Core\Controllers;
use Kernel\Facades\Attributes;
use Kernel\Core\Alert;
use Kernel\Core\Form;


class AdminAttributesAddController extends Controllers {
	
	protected $template_ss_titre = "Mise à jour d'un attributs";
	
	
	
	public function display($code=null){
		$attribut = Attributes::getFromCode($code);
		
		if(!is_null($attribut->attribute_code))
		{
			$this->template->assign("template_ss_titre", $attribut->attribute_code);
		}
		
		$this->template->assign("attribut", $attribut);
		$this->template->render('forms/attribut', 'common');
		
	}
}
?>