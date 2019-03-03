<?php
require 'DB_connect.php';
// object Creation for DB_connect
$db = new DB_connect($host='hostname',$user='UserName',$pass='UserPassword',$db='DatabaseName');
// create table
$createTable= $db->createTable($tableName='user',$values='id INT PRIMARY KEY AUTO_INCREMENT, userName VARCHAR(30) NOT NULL,password VARCHAR(30) NOT NULL, email VARCHAR(30) UNIQUE'); 															echo "Table Created !";
// insert row
$tableName='user'; $columns="userName,password,email";
$db->insertRow($tableName,$columns,['aashish','aashish@123','aashish@domain.com']);
$db->insertRow($tableName,$columns,['vikash','vikash@123','vikash@domain.com']);
$db->insertRow($tableName,$columns,['varsha','varsha@123','varsha@domain.com']);
$db->insertRow($tableName,$columns,['aman','aman@123', 'aman@domain.com']);
$db->insertRow($tableName,$columns,['ravi','ravi@123','ravi@domain.com']);
// get row
$getRows = $db->getRow($tableName='user',$condition='LIMIT 5');									echo "<br/><br/><br/>Inserted !<br/>";
while ($getRow = $getRows->fetch_array())
{echo $getRow['0']." ".$getRow['userName']." ".$getRow['password']." ".$getRow['email']."<br/>";}				
// update row
$update = $db->updateRow($tableName='user',$columns=['userName','password','email'],$values=['harish','harish@123','harish123@localhost'],$condition='id=2');
// get row
$getRows = $db->getRow($tableName='user',$condition='LIMIT 5'); 								echo "<br/><br/><br/>Updated !<br/>";
while ($getRow = $getRows->fetch_array())
{echo $getRow['0']." ".$getRow['userName']." ".$getRow['password']." ".$getRow['email']."<br/>";}				
// delete row
$delete = $db->deleteRow($tableName='user',$condition='id=2');
// get row
$getRows = $db->getRow($tableName='user',$condition='LIMIT 5'); 								echo "<br/><br/><br/>Deleted !<br/>";
while ($getRow = $getRows->fetch_array())
{echo $getRow['0']." ".$getRow['userName']." ".$getRow['password']." ".$getRow['email']."<br/>";}
// drop table
$db->dropTable('user');														echo "<br/><br/><br/>Table Droped !";
?>
