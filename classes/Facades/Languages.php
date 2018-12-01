<?php
namespace Kernel\Facades;

use Kernel\Tables\LanguagesTables;
/**
* Class Classes
* Façade de QueryBuilder
*/
class Languages{

	public static function __callStatic($method, $arguments)
	{
		$query = new LanguagesTables();
		
		return call_user_func_array([$query, $method], $arguments);
	}
}