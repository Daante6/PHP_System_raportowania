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
<center><br><br>
<h2>Wybierz referencję i przedział czasowy:
<br><br><br>
<form action="intimecal.php" method="post" target="_blank" autocomplete="on">
<input type="hidden" name="operacja" value="<?php echo $operacja;?>">
<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
<input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
<input type="hidden" name="maszyna" value="<?php echo $_POST['maszyna']; ?>">
Referencja:
<select name="referencja">
    <?php $query = "SELECT * FROM `".$_POST['maszyna']."`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select><br>
<br>Wybierz datę OD
<input type="date" name="od" value="0" style="width: 150px">
<br>
<br>Wybierz datę DO
<input type="date" name="do" value="0" style="width: 150px">
<br><br>
<input type="submit" style="height: 80px ; width: 160px" value="Sprawdź">
</html>