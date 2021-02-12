<?php
require("connect.php");

if($_POST['maszyna'] == "SM62" || $_POST['maszyna'] == "SM83" || $_POST['maszyna'] == "SM82" || $_POST['maszyna'] == "SM94" || $_POST['maszyna'] == "SM89" || $_POST['maszyna'] == "SM91" || $_POST['maszyna'] == "SM57" || $_POST['maszyna'] == "SM61" || $_POST['maszyna'] == "SM95" || $_POST['maszyna'] == "PP2" || $_POST['maszyna'] == "PP3" || $_POST['maszyna'] == "SM66" || $_POST['maszyna'] == "SM86" || $_POST['maszyna'] == "SM81" || $_POST['maszyna'] == "SM93" || $_POST['maszyna'] == "SM90" || $_POST['maszyna'] == "SM92" || $_POST['maszyna'] == "SM74" || $_POST['maszyna'] == "SM96"){
$operacja=10;
}else{
$operacja=20;
}
?>
<html> 
<head>
<meta charset="UTF-8">
</head> 
<body>
<center>
<h1>Produkcja maszyny w czasie</h1>
<form action="SMtimecal.php" method="post" target="_blank" autocomplete="on">
<input type="hidden" name="operacja" value="<?php echo $operacja;?>">
<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
<input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
<input type="hidden" name="maszyna" value="<?php echo $_POST['maszyna']; ?>">

<br>Wybierz datę OD
<input type="date" name="od" value="0" style="width: 150px">
<br>
<br>Wybierz datę DO
<input type="date" name="do" value="0" style="width: 150px">
<br><br>
<input type="submit" style="height: 80px ; width: 160px" value="Sprawdź">