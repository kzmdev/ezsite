<?php
namespace controllers;

use Kernel\Core\Query;
use Kernel\Core\Controllers;
use Kernel\Facades\Languages;
use Kernel\Core\Alert;
use Kernel\Core\Form;


class AdminLanguagesAddController extends Controllers {
	
	protected $template_ss_titre = "Mise à jour d'un language";
	
	/*protected $header_form = [
								"back" => "/languages",
								"del" => "/
							];
	*/
	public function display($code=null){
		$item = Languages::getFromCode($code);
		
		if(!is_null($item->language_entity))
		{
			$this->template->assign("template_ss_titre", $item->language_entity . "/" . $item->language_code);
		}
		$this->template->assign("flags", Languages::getListeFlags());
		$this->template->assign("item", $item);
		$this->template->render('forms/language', 'common');
		
	}
}
?>