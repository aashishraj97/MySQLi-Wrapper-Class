
<?php
class DB_connect {										//extends mysqli {
	public $datab;
//Connection Established
    	public function __construct($host, $user, $pass, $db){
			$this->datab=new mysqli($host, $user, $pass, $db);				#parent::__construct($host, $user, $pass, $db); 
           	if ($this->datab->connect_error) 
			{die('connect_error : '.$this->datab->connect_error." Error Number : ".$this->datab->connect_errno); }}
// get row
      	public function getRow($tableName, $condition){
	    	$stmt = $this->datab->prepare('SELECT * FROM '.$tableName.' '.$condition);
			$stmt->execute();
	     	$result = $stmt->get_result();
			return $result;}
// create table
		public function createTable($tableName,$values){
			$stmt = $this->datab->prepare('CREATE TABLE IF NOT EXISTS '.$tableName.'('.$values.')');
        	$stmt->execute();
        	return true;}
// insert row
      	public function insertRow($tableName,$columns,$values){
			$values =  implode("','",$values);	
			$stmt = $this->datab->prepare('INSERT INTO '.$tableName.'('.$columns.') VALUES('.'\''.$values.'\')');
        	$stmt->execute();
        	return true;}
// update row
      	public function updateRow($tableName,$columns,$values,$condition){
		for($i=0; $i<count($columns); $i++)  {         	
		$stmt = $this->datab->prepare('UPDATE '.$tableName.' SET '.$columns[$i].'=\''.$values[$i].'\' WHERE '.$condition);
            	$stmt->execute(); } return true;}
// delete row
      	public function deleteRow($tableName,$condition){
            	$stmt = $this->datab->prepare("DELETE FROM ".$tableName." WHERE ".$condition);
            	$stmt->execute(); return true;}
// drop table
		public function dropTable($tableName){
			$stmt = $this->datab->prepare('DROP TABLE '.$tableName);
        	$stmt->execute();
        	return true;}
}
?>

