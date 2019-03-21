<?php

error_reporting(E_ERROR | E_PARSE);//to hide warnings

//include external file
require_once ('MysqliDb.php');


//$db => is an object
//MysqliDb is a class 
//'host', 'username', 'password', 'databaseName' => constructor arguments
$db = new MysqliDb ('localhost', 'root', '', 'clinic');

if (isset($_GET["id"])) {
		
	$id=$_GET["id"];

	$db->where("id",$id); 


	$db->delete('doctors');
}


/*
#insert code
$data = Array ("name" => "mohamed",
               "mobile" => "010542151",
);

try{
	$db->insert ('doctors', $data);
} catch (Exception $e) {
    echo "انا لقيت مشكلة";
}
*/

$results = $db->get ('doctors');
?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
h2{
	color:red;
}
</style>
</head>
<body>

<h2>Doctors</h2>

<table>
	<a href="http://localhost/clinic/add_new.php">add new doctor</a>
	
	<?php 
	foreach ($results as $result) {
	
	
		
echo"<tr>";
		
echo"<td>"; 
			echo $result['id'];
echo"<td>";

echo"<td>";
			echo $result['name'];
echo"<td>";

echo"<td>";
			echo $result['mobile'];
echo"<td>";

echo"<td>";
           echo"
<a  href='http://localhost/clinic/index.php?id=". $result['id'].  " ' onClick=\"html: return confirm('are you sure?');\" >Delete</a>";
echo"<td>";

echo"<td>";
           echo "
<a  href='http://localhost/clinic/edite.php?id=". $result['id']. " '>edit</a>";
echo"<td>";

echo"</tr>";
		
	}	    
	?>

	
</table>


</body>
</html> 