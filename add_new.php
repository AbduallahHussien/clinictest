<?php
require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', '', 'clinic');

if (isset($_POST["name"])) {


$data = Array ("name" => $_POST["name"],
               "mobile"=>$_POST["mobile"],
);

	$db->insert ('doctors', $data);

}
?> 
<a href="http://localhost/clinic/index.php">home</a>
<h2>welcome to clinic please login</h2>
<form action="add_new.php" method="post" >
<h2>inter name here</h2>
	<input type="text" name="name">
	<br>
	<h2>inter mobile here</h2>
	<input type="number" name="mobile">
	<br>
	<button type="submit">Add</button>




</form>