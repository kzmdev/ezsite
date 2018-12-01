<?php
namespace controllers;

use Kernel\Core\Query;
use Kernel\Core\Controllers;
use Kernel\Facades\Languages;
use Kernel\Core\Grids;
use Kernel\Core\Alert;
use Kernel\Core\Tables;


class AdminLanguagesController extends Controllers {
	
	protected $template_ss_titre = "Liste des Attributs";
	protected $current_grid = "languages";
	
	public function displayGrid(){
		
		if(!isset($_SESSION["Auth"]) OR (isset($_SESSION["Auth"]["acces"]) and  $_SESSION["Auth"]["acces"] != "authorized"))
		{
			header("Location: /"._AdminPath_);
			exit();
		} 
		
		$this->setjs($this->templateDir."/js/grids.js");
		
		//init grids
		$grid = new Grids("languages");
			
		Alert::isAlert($this->template);
		
		$liste = Languages::liste(['by_page' => $this->grid->by_page,'page' => $this->grid->page]);
		$nbDataTotal = Languages::countAll();
		$nbPageMax = ceil($nbDataTotal/$this->grid->by_page);
		
		$this->template->assign("liste", $liste);
		$this->template->assign("total", $nbDataTotal);
		$this->template->assign("nbPageMax", $nbPageMax);
		$this->template->assign("byPage", $this->grid->by_page);
		$this->template->assign("currentPage", $this->grid->page);
		$this->template->render('grids/languages', 'common');
	}
	
	public function formGrid()
	{
		header("Location: /"._AdminPath_."/languages");
		exit();
	}
	
}