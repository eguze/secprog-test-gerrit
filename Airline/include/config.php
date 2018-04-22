<?php 

$hostname='localhost';
$database='airline';
$userdb='root';
$passdb='';
$con=mysql_pconnect($hostname,$userdb,$passdb) or trigger_error(mysql_error(),E_USER_ERROR);
//ABOVE IS TO DO DECLARATION OF DB

?>
