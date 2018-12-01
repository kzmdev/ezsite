<?php
namespace controllers;

use Kernel\Core\Query;
use Kernel\Core\Controllers;
use Kernel\Core\Grids;
use Kernel\Facades\Attributes;
use Kernel\Core\Alert;
use Kernel\Core\Tables;


class AdminAttributesController extends Controllers {
	
	protected $template_ss_titre = "Liste des Attributs";
	
	
	public function displayGrid(){
		
		if(!isset($_SESSION["Auth"]) OR (isset($_SESSION["Auth"]["acces"]) and  $_SESSION["Auth"]["acces"] != "authorized"))
		{
			header("Location: /"._AdminPath_);
			exit();
		} 
		
		$this->setjs($this->templateDir."/js/grids.js");
		
		//init grids
		$grid = new Grids("attributs");
				
		Alert::isAlert($this->template);
		
		$liste = Attributes::liste(['by_page' => $grid->by_page,'page' => $grid->page]);
		$nbDataTotal = Attributes::countAll();
		$nbPageMax = ceil($nbDataTotal/$grid->by_page);
		
		$this->template->assign("liste", $liste);
		$this->template->assign("total", $nbDataTotal);
		$this->template->assign("nbPageMax", $nbPageMax);
		$this->template->assign("currentPage", $grid->page);
		$this->template->render('grids/attributs', 'common');
	}
	
}