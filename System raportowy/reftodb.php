<?php
require("connect.php");


$sql = "UPDATE ".$_POST['maszyna']." SET ref='".$_POST['newname']."',cykl='".$_POST['time']."',projekt='".$_POST['projekt']."' WHERE id='".$_POST['maszyna1']."'";
mysqli_query($conn, $sql);

header('Location: http://localhost/html/start.php');
?>
	