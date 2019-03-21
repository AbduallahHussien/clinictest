<?php
require_once ('MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', '', 'clinic');


#ask if post variable exists
if (isset($_POST["name"])) {
#f exists run update command
	$data = Array (
		'name' => $_POST["name"],
		'mobile' => $_POST["mobile"],
	
	);
	$id=$_POST["id"];
	$db->where ('id', $id);
	$db->update ('doctors', $data);

}

if (isset($_GET["id"])) {
	$id=$_GET["id"];
	$db->where ("id", $id);
	$doctor = $db->getOne ("doctors"); 
}

?>
<a href="http://localhost/clinic/index.php">home</a>
<form action="edite.php?id=<?php echo $doctor['id']; ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $doctor['id']; ?>">
<h2> edite name here </h2>
<br>	
<input type="text" name="name" value="<?php echo $doctor['name']; ?>">
</br>
<h2> edite mobile here </h2>
<br>
<input type="number" name="mobile" value="<?php echo $doctor['mobile']; ?>" >
<br>
<button type="submit">update</button>
</form>
