<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'minisite');

class Model
{
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/
	/**
	 * Начало тестовых данных модели для соединения с БД
	 */
	private static $link;
		
	public function __construct()
	{
		if (!self::$link) {
			self::$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			mysqli_query(self::$link, "SET NAMES 'utf8'");
		}
	}
	
	public static function getLink() {
		return self::$link;
	}
	

	protected function changeOne($query) {
		$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		return $result ;
	}

	protected function findOne($query)
	{
		$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		return mysqli_fetch_assoc($result);
	}
	
	protected function findMany($query)
	{
		$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		return $data;
	}

	protected function getQuantityByKey($query)
	{
		$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		return mysqli_fetch_assoc($result)['count'];
	}
	/**
	 * Окончание тестовых данных модели для соединения с БД
	 */

	// метод выборки данных
	public function get_data()
	{
		// todo
	}
}

