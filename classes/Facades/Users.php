<?php
namespace Kernel\Facades;

use Kernel\Tables\UsersTables;
/**
* Class Classes
* Façade de QueryBuilder
*/
class Users{

	public static function __callStatic($method, $arguments)
	{
		$query = new UsersTables();
		
		return call_user_func_array([$query, $method], $arguments);
	}
}