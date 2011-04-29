<?php
class Config {
	
	public static $config = array();
	
	public static function set($name, $value)
	{
		static::$config[$name] = $value;
	}
	
	public static function get($name)
	{
		return isset(static::$config[$name]) ? static::$config[$name] : NULL;
	}
	
	public static function remove($name)
	{
		if (isset(static::$config[$name]))
		{
			unset(static::$config[$name]);
		}
	}
	
}