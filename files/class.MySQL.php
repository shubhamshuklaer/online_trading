<?php

/////////////////////////////////////////
//Editiong this class to set the connection settings
/////////////////////////////////////
include_once '../config/config.php';



/*
 *  Copyright (C) 2012
 *     Ed Rackham (http://github.com/a1phanumeric/PHP-MySQL-Class)
 *  Changes to Version 0.8.1 copyright (C) 2013
 *	Christopher Harms (http://github.com/neurotroph)
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// MySQL Class v0.8.1
class MySQL {
	
	// Base variables
	var $lastError;					// Holds the last error
	var $lastQuery;					// Holds the last query
	var $result;						// Holds the MySQL query result
	var $records;						// Holds the total number of records returned
	var $affected;					// Holds the total number of records affected
	var $rawResults;				// Holds raw 'arrayed' results
	var $arrayedResult;			// Holds an array of the result
	
	var $hostname;	// MySQL Hostname
	var $username;	// MySQL Username
	var $password;	// MySQL Password
	var $database;	// MySQL Database
	
	var $databaseLink;		// Database Connection Link
	


	/* *******************
	 * Class Constructor *
	 * *******************/
	function __construct(){
		$this->database = constant("DBNAME");
		$this->username = constant("USERNAME");
		$this->password = constant("PASS");
		$this->hostname = constant("DB_HOST");
		
		$this->Connect();
	}
	///////////////////////////edited end
	
	
	
	/* *******************
	 * Private Functions *
	 * *******************/
	
	// Connects class to database
	// $persistant (boolean) - Use persistant connection?
	private function Connect($persistant = false){
		$this->CloseConnection();
		
		if($persistant){
			$this->databaseLink = mysqli_connect('p:'.$this->hostname, $this->username, $this->password);// 'p:' is for persistant connection
		}else{
			$this->databaseLink = mysqli_connect($this->hostname, $this->username, $this->password);
			
		}
		
		if(!$this->databaseLink){
   		$this->lastError = 'Could not connect to server: ' . mysqli_error($this->databaseLink);
			return false;
		}
		
		if(!$this->UseDB()){
			$this->lastError = 'Could not connect to database: ' . mysqli_error($this->databaseLink);
			return false;
		}
		return true;
	}
	
	
	// Select database to use
	private function UseDB(){
		if(!mysqli_select_db($this->databaseLink,$this->database)){
			$this->lastError = 'Cannot select database: ' . mysqli_error($this->databaseLink);
			return false;
		}else{
			return true;
		}
	}
	
	
	// Performs a 'mysqli_real_escape_string' on the entire array/string
	private function SecureData($data){
		if(is_array($data)){
			foreach($data as $key=>$value){//edit the array value
				if(!is_array($data[$key])){
					$data[$key] = mysqli_real_escape_string($this->databaseLink,$data[$key]);
				}
			}
		}else{
			$data = mysqli_real_escape_string($this->databaseLink,$data);
		}
		return $data;
	}
	
	
	
	/* ******************
	 * Public Functions *
	 * ******************/
	
	// Executes MySQL query
	function ExecuteSQL($query){
		$this->lastQuery 	= $query;
		if($this->result 	= mysqli_query($this->databaseLink,$query)){
			$this->records 	= @mysqli_num_rows($this->result);
			$this->affected	= @mysqli_affected_rows($this->databaseLink);	
			if($this->records > 0){
                         $this->ArrayResults();
                         return $this->arrayedResult;
                        }else{
                         return true;
                        }

			
		}else{
			$this->records=-1;//shubham shukla
			$this->lastError = mysqli_error($this->databaseLink);
			return false;
		}
	}
	
	
	// Adds a record to the database based on the array key names
	function Insert($vars, $table, $exclude = ''){
		
		// Catch Exclusions
		if($exclude == ''){
			$exclude = array();
		}
		
		array_push($exclude, 'MAX_FILE_SIZE'); // Automatically exclude this one
		
		// Prepare Variables
		$vars = $this->SecureData($vars);
		
		$query = "INSERT INTO `{$table}` SET ";
		foreach($vars as $key=>$value){
			if(in_array($key, $exclude)){
				continue;
			}
			//$query .= '`' . $key . '` = "' . $value . '", ';
			$query .= "`{$key}` = '{$value}', ";
		}
		
		$query = substr($query, 0, -2);
		
		return $this->ExecuteSQL($query);
	}
	
	// Deletes a record from the database
	//shubham shukla for where syntax see the comment on select function
	function Delete($table, $where='', $limit=''){
		$query = "DELETE FROM `{$table}` WHERE ";
		if(is_array($where) && $where != ''){
			// Prepare Variables
			$where = $this->SecureData($where);
			
			foreach($where as $key=>$value){
					$query .= $key." "."'".$value."'"." ";
			}
		}
		
		if($limit != ''){
			$query .= ' LIMIT ' . $limit;
		}
		
		return $this->ExecuteSQL($query);
	}
	
	
	// Gets a single row from $from where $where is true
	//shubham shukla edited this..!!Format of where clause is associative array.. each  will make one where statement
	//eg array("user_nm not like"=> "shubham" ," AND name" => "dskfjsdk" ," or hdsjkahg like"=> "jjsdkhg") 
	function Select($from, $where='', $orderBy='', $limit='',$cols='*'){// eg of $orderby "colname1 DESC,colname2 DESC" ,DESC for decending ordering and ASC for accending
		// Catch Exceptions
		if(trim($from) == ''){
			return false;
		}
		
		$query = "SELECT {$cols} FROM `{$from}` WHERE ";
		
		if(is_array($where) && $where != ''){
			// Prepare Variables
			$where = $this->SecureData($where);
			
			foreach($where as $key=>$value){
					$query .= $key." "."'".$value."'"." ";//removed % before and after {$value} add it while providing its value//shubham shukla
			}
		}else{
			$query = substr($query, 0, -6);
		}
		
		if($orderBy != ''){
			$query .= ' ORDER BY ' . $orderBy;
		}
		
		if($limit != ''){
			$query .= ' LIMIT ' . $limit;
		}
		
		return $this->ExecuteSQL($query);
		
	}
	
	// Updates a record in the database based on WHERE
	function Update($table, $set, $where, $exclude = ''){
		// Catch Exceptions
		if(trim($table) == '' || !is_array($set) || !is_array($where)){
			return false;
		}
		if($exclude == ''){
			$exclude = array();
		}
		
		array_push($exclude, 'MAX_FILE_SIZE'); // Automatically exclude this one
		
		$set 		= $this->SecureData($set);
		$where 	= $this->SecureData($where);
		
		// SET
		
		$query = "UPDATE `{$table}` SET ";
		
		foreach($set as $key=>$value){
			if(in_array($key, $exclude)){
				continue;
			}
			$query .= "`{$key}` = '{$value}', ";
		}
		
		$query = substr($query, 0, -2);
		
		// WHERE
		
		$query .= ' WHERE ';
		
		foreach($where as $key=>$value){
			$query .= $key." "."'".$value."'"." ";
		}
		
		
		return $this->ExecuteSQL($query);
	}
	
	// 'Arrays' a single result
	function ArrayResult(){// shubham shukla edited this to make the return datatype of ArrayResult and ArrayResults same i.e array of associative arrays
		$this->arrayedResult=array();
		$this->arrayedResult[] = mysqli_fetch_assoc($this->result) or die (mysqli_error($this->databaseLink));
		return $this->arrayedResult;
	}

	// 'Arrays' multiple result
	function ArrayResults(){
		
		if($this->records == 1){
			return $this->ArrayResult();
		}
		
		$this->arrayedResult = array();
		while ($data = mysqli_fetch_assoc($this->result)){
			$this->arrayedResult[] = $data;
		}
		return $this->arrayedResult;
	}
	
	// 'Arrays' multiple results with a key
	function ArrayResultsWithKey($key='id'){
		if(isset($this->arrayedResult)){
			unset($this->arrayedResult);
		}
		$this->arrayedResult = array();
		while($row = mysqli_fetch_assoc($this->result)){
			foreach($row as $theKey => $theValue){
				$this->arrayedResult[$row[$key]][$theKey] = $theValue;
			}
		}
		return $this->arrayedResult;
	}

	// Returns last insert ID
	function LastInsertID(){
		return mysqli_insert_id();
	}

	// Return number of rows
	function CountRows($from, $where=''){
		$result = $this->Select($from, $where, '', '', false, 'AND','count(*)');
		return $result["count(*)"];
	}

	// Closes the connections
	function CloseConnection(){
		if($this->databaseLink){
			mysqli_close($this->databaseLink);
		}
	}

	function escape_string($string){
		return mysqli_real_escape_string($this->databaseLink,$string);
	}
}

?>
