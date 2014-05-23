<?php

class Mssql_Model {

	private $connection;

	public function __construct()
	{
		global $config;
		
		$this->connection = mssql_pconnect($config['db_host'], $config['db_username'], $config['db_password']) or die('MsSQL Error: Could not connect!');
		mssql_select_db($config['db_name'], $this->connection);
	}

	public function escapeString($string)
	{
		return mysql_real_escape_string($string);
	}

	public function escapeArray($array)
	{
	    array_walk_recursive($array, create_function('&$v', '$v = mysql_real_escape_string($v);'));
		return $array;
	}
	
	public function to_bool($val)
	{
	    return !!$val;
	}
	
	public function to_date($val)
	{
	    return date('Y-m-d', $val);
	}
	
	public function to_time($val)
	{
	    return date('H:i:s', $val);
	}
	
	public function to_datetime($val)
	{
	    return date('Y-m-d H:i:s', $val);
	}
	
	public function query($qry)
	{
		$result = mssql_query($qry) or die('MsSQL Error: ');
		$resultObjects = array();

		while($row = mssql_fetch_object($result)) $resultObjects[] = $row;
		return $resultObjects;
	}

	public function execute($qry)
	{
		ini_set('mssql.charset', 'UTF-8');
		$exec = mssql_query($qry) or die('MsSQL Error: Could not execute query ');
		return $exec;
	}
    
}
?>
