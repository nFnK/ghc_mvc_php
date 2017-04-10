<?php

class Database extends PDO
{
	
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
		//parent::setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXEPTIONS);
	}

	/**
	* select/lsitaj
	* @param string $sql sql komanda 
	* @param string $array paramtere za prikaz
	* @param constant $fatchMode je PDO mod za listanje
	*/
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value) {
			$sth->bindValue("$key", $value);
		}
		
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	

   /**
	* insert/ubaci
	* @param string $table ime tabele dje se $data dodaju 
	* @param string $data podaci koji se ubacuju u $table
	*/

	public function insert($table, $data){
		ksort($data);
		
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		
		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}
		
		$sth->execute();
	}

	/**
	* insert/ubaci
	* @param string $table ime tabele dje se $data dodaju 
	* @param string $data podaci koji se ubacuju u $table
	* @param string $where i WHERE query post
	*/
	public function update($table, $data, $where){
		ksort($data);
		
		$fieldDetails = NULL;
		foreach($data as $key => $value) {
			$fieldDetails .= "`$key`=:$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ',');
		
		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}
		
		$sth->execute();
	}

	/**
	 * delete/brisi
	 * 
	 * @param string $table
	 * @param string $where
	 * @param integer $limit
	 * @return integer broj
	 */
	public function delete($table, $where, $limit = 1)
	{
		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	}

}