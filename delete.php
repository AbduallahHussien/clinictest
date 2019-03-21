<?php
require_once ('MysqliDb.php');

$db = new MysqliDb ('localhost', 'root', '', 'clinic');


$id=$_GET["id"];

$db->where("id",$id); 


if($db->delete('doctors')) echo 'successfully deleted';


?>