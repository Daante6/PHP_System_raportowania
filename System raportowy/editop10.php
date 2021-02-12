<?php
require("connect.php");

if ($conn->connect_error) {
header('Location: error.php');
}

$data=str_replace("-","",$_POST['date1']);
$query2="SELECT * FROM op10 WHERE date=".$data." ORDER BY id DESC LIMIT 1";
$result2 = mysqli_query($conn, $query2);

if ($result2->num_rows < 1) {
header('Location: error.php');          }
$row2 = mysqli_fetch_array($result2);

?>
<html> 
<head>
<meta charset="UTF-8">
</head> 
<body>
<br>
<table>
<td width="60%">
<center><h1>OPERACJA 10</h1>
<form action="formop10.php" method="post" target="_blank" autocomplete="on">
<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
<input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
Data: <input type="date" name="date" value="<?php echo $_POST['date1']; ?>"  ><br>

<h2>Maszyna SM62:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM621" value="<?php echo $row2["tSM621"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM622" value="<?php echo $row2["tSM622"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM623" value="<?php echo $row2["tSM623"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM621" value="<?php echo $row2["SM621"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM622" value="<?php echo $row2["SM622"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM623" value="<?php echo $row2["SM623"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM62">
    <option value="<?php echo $row2["opt1SM62"] ?>"><?php echo $row2["opt1SM62"] ?></option>
	<?php $query = "SELECT * FROM `SM62`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM621" value="<?php echo $row2["opt1SM621"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM622" value="<?php echo $row2["opt1SM622"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM623" value="<?php echo $row2["opt1SM623"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM62">
    <option value="<?php echo $row2["opt2SM62"] ?>"><?php echo $row2["opt2SM62"] ?></option>
	<?php $query = "SELECT * FROM `SM62`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM621" value="<?php echo $row2["opt2SM621"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM622" value="<?php echo $row2["opt2SM622"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM623" value="<?php echo $row2["opt2SM623"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM62">
    <option value="<?php echo $row2["opt3SM62"] ?>"><?php echo $row2["opt3SM62"] ?></option>
	<?php $query = "SELECT * FROM `SM62`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM621" value="<?php echo $row2["opt3SM621"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM622" value="<?php echo $row2["opt3SM622"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM623" value="<?php echo $row2["opt3SM623"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM83:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM831" value="<?php echo $row2["tSM831"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM832" value="<?php echo $row2["tSM832"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM833" value="<?php echo $row2["tSM833"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM831" value="<?php echo $row2["SM831"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM832" value="<?php echo $row2["SM832"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM833" value="<?php echo $row2["SM833"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM83">
    <option value="<?php echo $row2["opt1SM83"] ?>"><?php echo $row2["opt1SM83"] ?></option>
	<?php $query = "SELECT * FROM `SM83`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM831" value="<?php echo $row2["opt1SM831"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM832" value="<?php echo $row2["opt1SM832"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM833" value="<?php echo $row2["opt1SM833"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM83">
    <option value="<?php echo $row2["opt2SM83"] ?>"><?php echo $row2["opt2SM83"] ?></option>
	<?php $query = "SELECT * FROM `SM83`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM831" value="<?php echo $row2["opt2SM831"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM832" value="<?php echo $row2["opt2SM832"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM833" value="<?php echo $row2["opt2SM833"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM83">
    <option value="<?php echo $row2["opt3SM83"] ?>"><?php echo $row2["opt3SM83"] ?></option>
	<?php $query = "SELECT * FROM `SM83`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM831" value="<?php echo $row2["opt3SM831"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM832" value="<?php echo $row2["opt3SM832"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM833" value="<?php echo $row2["opt3SM833"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM82:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM821" value="<?php echo $row2["tSM821"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM822" value="<?php echo $row2["tSM822"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM823" value="<?php echo $row2["tSM823"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM821" value="<?php echo $row2["SM821"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM822" value="<?php echo $row2["SM822"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM823" value="<?php echo $row2["SM823"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM82">
    <option value="<?php echo $row2["opt1SM82"] ?>"><?php echo $row2["opt1SM82"] ?></option>
	<?php $query = "SELECT * FROM `SM82`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM821" value="<?php echo $row2["opt1SM821"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM822" value="<?php echo $row2["opt1SM822"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM823" value="<?php echo $row2["opt1SM823"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM82">
    <option value="<?php echo $row2["opt2SM82"] ?>"><?php echo $row2["opt2SM82"] ?></option>
	<?php $query = "SELECT * FROM `SM82`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM821" value="<?php echo $row2["opt2SM821"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM822" value="<?php echo $row2["opt2SM822"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM823" value="<?php echo $row2["opt2SM823"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM82">
    <option value="<?php echo $row2["opt3SM82"] ?>"><?php echo $row2["opt3SM82"] ?></option>
	<?php $query = "SELECT * FROM `SM82`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM821" value="<?php echo $row2["opt3SM821"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM822" value="<?php echo $row2["opt3SM822"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM823" value="<?php echo $row2["opt3SM823"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM94:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM941" value="<?php echo $row2["tSM941"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM942" value="<?php echo $row2["tSM942"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM943" value="<?php echo $row2["tSM943"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM941" value="<?php echo $row2["SM941"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM942" value="<?php echo $row2["SM942"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM943" value="<?php echo $row2["SM943"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM94">
    <option value="<?php echo $row2["opt1SM94"] ?>"><?php echo $row2["opt1SM94"] ?></option>
	<?php $query = "SELECT * FROM `SM94`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM941" value="<?php echo $row2["opt1SM941"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM942" value="<?php echo $row2["opt1SM942"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM943" value="<?php echo $row2["opt1SM943"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM94">
    <option value="<?php echo $row2["opt2SM94"] ?>"><?php echo $row2["opt2SM94"] ?></option>
	<?php $query = "SELECT * FROM `SM94`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM941" value="<?php echo $row2["opt2SM941"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM942" value="<?php echo $row2["opt2SM942"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM943" value="<?php echo $row2["opt2SM943"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM94">
    <option value="<?php echo $row2["opt3SM94"] ?>"><?php echo $row2["opt3SM94"] ?></option>
	<?php $query = "SELECT * FROM `SM94`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM941" value="<?php echo $row2["opt3SM941"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM942" value="<?php echo $row2["opt3SM942"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM943" value="<?php echo $row2["opt3SM943"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM89:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM891" value="<?php echo $row2["tSM891"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM892" value="<?php echo $row2["tSM892"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM893" value="<?php echo $row2["tSM893"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM891" value="<?php echo $row2["SM891"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM892" value="<?php echo $row2["SM892"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM893" value="<?php echo $row2["SM893"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM89">
    <option value="<?php echo $row2["opt1SM89"] ?>"><?php echo $row2["opt1SM89"] ?></option>
	<?php $query = "SELECT * FROM `SM89`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM891" value="<?php echo $row2["opt1SM891"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM892" value="<?php echo $row2["opt1SM892"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM893" value="<?php echo $row2["opt1SM893"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM89">
    <option value="<?php echo $row2["opt2SM89"] ?>"><?php echo $row2["opt2SM89"] ?></option>
	<?php $query = "SELECT * FROM `SM89`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM891" value="<?php echo $row2["opt2SM891"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM892" value="<?php echo $row2["opt2SM892"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM893" value="<?php echo $row2["opt2SM893"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM89">
    <option value="<?php echo $row2["opt3SM89"] ?>"><?php echo $row2["opt3SM89"] ?></option>
	<?php $query = "SELECT * FROM `SM89`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM891" value="<?php echo $row2["opt3SM891"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM892" value="<?php echo $row2["opt3SM892"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM893" value="<?php echo $row2["opt3SM893"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM91:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM911" value="<?php echo $row2["tSM911"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM912" value="<?php echo $row2["tSM912"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM913" value="<?php echo $row2["tSM913"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM911" value="<?php echo $row2["SM911"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM912" value="<?php echo $row2["SM912"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM913" value="<?php echo $row2["SM913"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM91">
    <option value="<?php echo $row2["opt1SM91"] ?>"><?php echo $row2["opt1SM91"] ?></option>
	<?php $query = "SELECT * FROM `SM91`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM911" value="<?php echo $row2["opt1SM911"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM912" value="<?php echo $row2["opt1SM912"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM913" value="<?php echo $row2["opt1SM913"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM91">
    <option value="<?php echo $row2["opt2SM91"] ?>"><?php echo $row2["opt2SM91"] ?></option>
	<?php $query = "SELECT * FROM `SM91`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM911" value="<?php echo $row2["opt2SM911"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM912" value="<?php echo $row2["opt2SM912"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM913" value="<?php echo $row2["opt2SM913"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM91">
    <option value="<?php echo $row2["opt3SM91"] ?>"><?php echo $row2["opt3SM91"] ?></option>
	<?php $query = "SELECT * FROM `SM91`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM911" value="<?php echo $row2["opt3SM911"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM912" value="<?php echo $row2["opt3SM912"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM913" value="<?php echo $row2["opt3SM913"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM57:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM571" value="<?php echo $row2["tSM571"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM572" value="<?php echo $row2["tSM572"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM573" value="<?php echo $row2["tSM573"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM571" value="<?php echo $row2["SM571"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM572" value="<?php echo $row2["SM572"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM573" value="<?php echo $row2["SM573"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM57">
    <option value="<?php echo $row2["opt1SM57"] ?>"><?php echo $row2["opt1SM57"] ?></option>
	<?php $query = "SELECT * FROM `SM57`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM571" value="<?php echo $row2["opt1SM571"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM572" value="<?php echo $row2["opt1SM572"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM573" value="<?php echo $row2["opt1SM573"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM57">
    <option value="<?php echo $row2["opt2SM57"] ?>"><?php echo $row2["opt2SM57"] ?></option>
	<?php $query = "SELECT * FROM `SM57`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM571" value="<?php echo $row2["opt2SM571"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM572" value="<?php echo $row2["opt2SM572"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM573" value="<?php echo $row2["opt2SM573"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM57">
    <option value="<?php echo $row2["opt3SM57"] ?>"><?php echo $row2["opt3SM57"] ?></option>
	<?php $query = "SELECT * FROM `SM57`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM571" value="<?php echo $row2["opt3SM571"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM572" value="<?php echo $row2["opt3SM572"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM573" value="<?php echo $row2["opt3SM573"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM61:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM611" value="<?php echo $row2["tSM611"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM612" value="<?php echo $row2["tSM612"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM613" value="<?php echo $row2["tSM613"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM611" value="<?php echo $row2["SM611"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM612" value="<?php echo $row2["SM612"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM613" value="<?php echo $row2["SM613"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM61">
    <option value="<?php echo $row2["opt1SM61"] ?>"><?php echo $row2["opt1SM61"] ?></option>
	<?php $query = "SELECT * FROM `SM61`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM611" value="<?php echo $row2["opt1SM611"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM612" value="<?php echo $row2["opt1SM612"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM613" value="<?php echo $row2["opt1SM613"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM61">
    <option value="<?php echo $row2["opt2SM61"] ?>"><?php echo $row2["opt2SM61"] ?></option>
	<?php $query = "SELECT * FROM `SM61`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM611" value="<?php echo $row2["opt2SM611"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM612" value="<?php echo $row2["opt2SM612"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM613" value="<?php echo $row2["opt2SM613"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM61">
    <option value="<?php echo $row2["opt3SM61"] ?>"><?php echo $row2["opt3SM61"] ?></option>
	<?php $query = "SELECT * FROM `SM61`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM611" value="<?php echo $row2["opt3SM611"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM612" value="<?php echo $row2["opt3SM612"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM613" value="<?php echo $row2["opt3SM613"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM95:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM951" value="<?php echo $row2["tSM951"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM952" value="<?php echo $row2["tSM952"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM953" value="<?php echo $row2["tSM953"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM951" value="<?php echo $row2["SM951"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM952" value="<?php echo $row2["SM952"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM953" value="<?php echo $row2["SM953"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM95">
    <option value="<?php echo $row2["opt1SM95"] ?>"><?php echo $row2["opt1SM95"] ?></option>
	<?php $query = "SELECT * FROM `SM95`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM951" value="<?php echo $row2["opt1SM951"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM952" value="<?php echo $row2["opt1SM952"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM953" value="<?php echo $row2["opt1SM953"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM95">
    <option value="<?php echo $row2["opt2SM95"] ?>"><?php echo $row2["opt2SM95"] ?></option>
	<?php $query = "SELECT * FROM `SM95`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM951" value="<?php echo $row2["opt2SM951"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM952" value="<?php echo $row2["opt2SM952"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM953" value="<?php echo $row2["opt2SM953"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM95">
    <option value="<?php echo $row2["opt3SM95"] ?>"><?php echo $row2["opt3SM95"] ?></option>
	<?php $query = "SELECT * FROM `SM95`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM951" value="<?php echo $row2["opt3SM951"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM952" value="<?php echo $row2["opt3SM952"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM953" value="<?php echo $row2["opt3SM953"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna Pp-2:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tPP21" value="<?php echo $row2["tPP21"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tPP22" value="<?php echo $row2["tPP22"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tPP23" value="<?php echo $row2["tPP23"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="PP21" value="<?php echo $row2["PP21"] ?>" style="width: 40px"> 2. ZM<input type="text" name="PP22" value="<?php echo $row2["PP22"] ?>" style="width: 40px"> 3. ZM <input type="text" name="PP23" value="<?php echo $row2["PP23"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1PP2">
    <option value="<?php echo $row2["opt1PP2"] ?>"><?php echo $row2["opt1PP2"] ?></option>
	<?php $query = "SELECT * FROM `PP2`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1PP21" value="<?php echo $row2["opt1PP21"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1PP22" value="<?php echo $row2["opt1PP22"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1PP23" value="<?php echo $row2["opt1PP23"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2PP2">
    <option value="<?php echo $row2["opt2PP2"] ?>"><?php echo $row2["opt2PP2"] ?></option>
	<?php $query = "SELECT * FROM `PP2`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2PP21" value="<?php echo $row2["opt2PP21"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2PP22" value="<?php echo $row2["opt2PP22"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2PP23" value="<?php echo $row2["opt2PP23"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3PP2">
    <option value="<?php echo $row2["opt3PP2"] ?>"><?php echo $row2["opt3PP2"] ?></option>
	<?php $query = "SELECT * FROM `PP2`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3PP21" value="<?php echo $row2["opt3PP21"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3PP22" value="<?php echo $row2["opt3PP22"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3PP23" value="<?php echo $row2["opt3PP23"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna Pp-3:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tPP31" value="<?php echo $row2["tPP31"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tPP32" value="<?php echo $row2["tPP32"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tPP33" value="<?php echo $row2["tPP33"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="PP31" value="<?php echo $row2["PP31"] ?>" style="width: 40px"> 2. ZM<input type="text" name="PP32" value="<?php echo $row2["PP32"] ?>" style="width: 40px"> 3. ZM <input type="text" name="PP33" value="<?php echo $row2["PP33"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1PP3">
    <option value="<?php echo $row2["opt1PP3"] ?>"><?php echo $row2["opt1PP3"] ?></option>
	<?php $query = "SELECT * FROM `PP3`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1PP31" value="<?php echo $row2["opt1PP31"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1PP32" value="<?php echo $row2["opt1PP32"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1PP33" value="<?php echo $row2["opt1PP33"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2PP3">
    <option value="<?php echo $row2["opt2PP3"] ?>"><?php echo $row2["opt2PP3"] ?></option>
	<?php $query = "SELECT * FROM `PP3`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2PP31" value="<?php echo $row2["opt2PP31"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2PP32" value="<?php echo $row2["opt2PP32"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2PP33" value="<?php echo $row2["opt2PP33"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3PP3">
    <option value="<?php echo $row2["opt3PP3"] ?>"><?php echo $row2["opt3PP3"] ?></option>
	<?php $query = "SELECT * FROM `PP3`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3PP31" value="<?php echo $row2["opt3PP31"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3PP32" value="<?php echo $row2["opt3PP32"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3PP33" value="<?php echo $row2["opt3PP33"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM66:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM661" value="<?php echo $row2["tSM661"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM662" value="<?php echo $row2["tSM662"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM663" value="<?php echo $row2["tSM663"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM661" value="<?php echo $row2["SM661"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM662" value="<?php echo $row2["SM662"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM663" value="<?php echo $row2["SM663"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM66">
    <option value="<?php echo $row2["opt1SM66"] ?>"><?php echo $row2["opt1SM66"] ?></option>
	<?php $query = "SELECT * FROM `SM66`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM661" value="<?php echo $row2["opt1SM661"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM662" value="<?php echo $row2["opt1SM662"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM663" value="<?php echo $row2["opt1SM663"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM66">
    <option value="<?php echo $row2["opt2SM66"] ?>"><?php echo $row2["opt2SM66"] ?></option>
	<?php $query = "SELECT * FROM `SM66`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM661" value="<?php echo $row2["opt2SM661"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM662" value="<?php echo $row2["opt2SM662"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM663" value="<?php echo $row2["opt2SM663"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM66">
    <option value="<?php echo $row2["opt3SM66"] ?>"><?php echo $row2["opt3SM66"] ?></option>
	<?php $query = "SELECT * FROM `SM66`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM661" value="<?php echo $row2["opt3SM661"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM662" value="<?php echo $row2["opt3SM662"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM663" value="<?php echo $row2["opt3SM663"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM86:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM861" value="<?php echo $row2["tSM861"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM862" value="<?php echo $row2["tSM862"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM863" value="<?php echo $row2["tSM863"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM861" value="<?php echo $row2["SM861"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM862" value="<?php echo $row2["SM862"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM863" value="<?php echo $row2["SM863"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM86">
    <option value="<?php echo $row2["opt1SM86"] ?>"><?php echo $row2["opt1SM86"] ?></option>
	<?php $query = "SELECT * FROM `SM86`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM861" value="<?php echo $row2["opt1SM861"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM862" value="<?php echo $row2["opt1SM862"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM863" value="<?php echo $row2["opt1SM863"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM86">
    <option value="<?php echo $row2["opt2SM86"] ?>"><?php echo $row2["opt2SM86"] ?></option>
	<?php $query = "SELECT * FROM `SM86`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM861" value="<?php echo $row2["opt2SM861"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM862" value="<?php echo $row2["opt2SM862"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM863" value="<?php echo $row2["opt2SM863"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM86">
    <option value="<?php echo $row2["opt3SM86"] ?>"><?php echo $row2["opt3SM86"] ?></option>
	<?php $query = "SELECT * FROM `SM86`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM861" value="<?php echo $row2["opt3SM861"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM862" value="<?php echo $row2["opt3SM862"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM863" value="<?php echo $row2["opt3SM863"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM81:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM811" value="<?php echo $row2["tSM811"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM812" value="<?php echo $row2["tSM812"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM813" value="<?php echo $row2["tSM813"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM811" value="<?php echo $row2["SM811"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM812" value="<?php echo $row2["SM812"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM813" value="<?php echo $row2["SM813"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM81">
    <option value="<?php echo $row2["opt1SM81"] ?>"><?php echo $row2["opt1SM81"] ?></option>
	<?php $query = "SELECT * FROM `SM81`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM811" value="<?php echo $row2["opt1SM811"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM812" value="<?php echo $row2["opt1SM812"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM813" value="<?php echo $row2["opt1SM813"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM81">
    <option value="<?php echo $row2["opt2SM81"] ?>"><?php echo $row2["opt2SM81"] ?></option>
	<?php $query = "SELECT * FROM `SM81`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM811" value="<?php echo $row2["opt2SM811"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM812" value="<?php echo $row2["opt2SM812"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM813" value="<?php echo $row2["opt2SM813"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM81">
    <option value="<?php echo $row2["opt3SM81"] ?>"><?php echo $row2["opt3SM81"] ?></option>
	<?php $query = "SELECT * FROM `SM81`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM811" value="<?php echo $row2["opt3SM811"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM812" value="<?php echo $row2["opt3SM812"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM813" value="<?php echo $row2["opt3SM813"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM93:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM931" value="<?php echo $row2["tSM931"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM932" value="<?php echo $row2["tSM932"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM933" value="<?php echo $row2["tSM933"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM931" value="<?php echo $row2["SM931"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM932" value="<?php echo $row2["SM932"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM933" value="<?php echo $row2["SM933"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM93">
    <option value="<?php echo $row2["opt1SM93"] ?>"><?php echo $row2["opt1SM93"] ?></option>
	<?php $query = "SELECT * FROM `SM93`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM931" value="<?php echo $row2["opt1SM931"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM932" value="<?php echo $row2["opt1SM932"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM933" value="<?php echo $row2["opt1SM933"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM93">
    <option value="<?php echo $row2["opt2SM93"] ?>"><?php echo $row2["opt2SM93"] ?></option>
	<?php $query = "SELECT * FROM `SM93`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM931" value="<?php echo $row2["opt2SM931"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM932" value="<?php echo $row2["opt2SM932"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM933" value="<?php echo $row2["opt2SM933"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM93">
    <option value="<?php echo $row2["opt3SM93"] ?>"><?php echo $row2["opt3SM93"] ?></option>
	<?php $query = "SELECT * FROM `SM93`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM931" value="<?php echo $row2["opt3SM931"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM932" value="<?php echo $row2["opt3SM932"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM933" value="<?php echo $row2["opt3SM933"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM90:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM901" value="<?php echo $row2["tSM901"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM902" value="<?php echo $row2["tSM902"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM903" value="<?php echo $row2["tSM903"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM901" value="<?php echo $row2["SM901"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM902" value="<?php echo $row2["SM902"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM903" value="<?php echo $row2["SM903"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM90">
    <option value="<?php echo $row2["opt1SM90"] ?>"><?php echo $row2["opt1SM90"] ?></option>
	<?php $query = "SELECT * FROM `SM90`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM901" value="<?php echo $row2["opt1SM901"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM902" value="<?php echo $row2["opt1SM902"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM903" value="<?php echo $row2["opt1SM903"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM90">
    <option value="<?php echo $row2["opt2SM90"] ?>"><?php echo $row2["opt2SM90"] ?></option>
	<?php $query = "SELECT * FROM `SM90`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM901" value="<?php echo $row2["opt2SM901"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM902" value="<?php echo $row2["opt2SM902"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM903" value="<?php echo $row2["opt2SM903"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM90">
    <option value="<?php echo $row2["opt3SM90"] ?>"><?php echo $row2["opt3SM90"] ?></option>
	<?php $query = "SELECT * FROM `SM90`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM901" value="<?php echo $row2["opt3SM901"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM902" value="<?php echo $row2["opt3SM902"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM903" value="<?php echo $row2["opt3SM903"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM92:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM921" value="<?php echo $row2["tSM921"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM922" value="<?php echo $row2["tSM922"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM923" value="<?php echo $row2["tSM923"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM921" value="<?php echo $row2["SM921"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM922" value="<?php echo $row2["SM922"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM923" value="<?php echo $row2["SM923"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM92">
    <option value="<?php echo $row2["opt1SM92"] ?>"><?php echo $row2["opt1SM92"] ?></option>
	<?php $query = "SELECT * FROM `SM92`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM921" value="<?php echo $row2["opt1SM921"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM922" value="<?php echo $row2["opt1SM922"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM923" value="<?php echo $row2["opt1SM923"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM92">
    <option value="<?php echo $row2["opt2SM92"] ?>"><?php echo $row2["opt2SM92"] ?></option>
	<?php $query = "SELECT * FROM `SM92`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM921" value="<?php echo $row2["opt2SM921"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM922" value="<?php echo $row2["opt2SM922"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM923" value="<?php echo $row2["opt2SM923"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM92">
    <option value="<?php echo $row2["opt3SM92"] ?>"><?php echo $row2["opt3SM92"] ?></option>
	<?php $query = "SELECT * FROM `SM92`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM921" value="<?php echo $row2["opt3SM921"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM922" value="<?php echo $row2["opt3SM922"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM923" value="<?php echo $row2["opt3SM923"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM74:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM741" value="<?php echo $row2["tSM741"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM742" value="<?php echo $row2["tSM742"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM743" value="<?php echo $row2["tSM743"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM741" value="<?php echo $row2["SM741"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM742" value="<?php echo $row2["SM742"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM743" value="<?php echo $row2["SM743"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM74">
    <option value="<?php echo $row2["opt1SM74"] ?>"><?php echo $row2["opt1SM74"] ?></option>
	<?php $query = "SELECT * FROM `SM74`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM741" value="<?php echo $row2["opt1SM741"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM742" value="<?php echo $row2["opt1SM742"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM743" value="<?php echo $row2["opt1SM743"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM74">
    <option value="<?php echo $row2["opt2SM74"] ?>"><?php echo $row2["opt2SM74"] ?></option>
	<?php $query = "SELECT * FROM `SM74`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM741" value="<?php echo $row2["opt2SM741"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM742" value="<?php echo $row2["opt2SM742"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM743" value="<?php echo $row2["opt2SM743"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM74">
    <option value="<?php echo $row2["opt3SM74"] ?>"><?php echo $row2["opt3SM74"] ?></option>
	<?php $query = "SELECT * FROM `SM74`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM741" value="<?php echo $row2["opt3SM741"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM742" value="<?php echo $row2["opt3SM742"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM743" value="<?php echo $row2["opt3SM743"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM96:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM961" value="<?php echo $row2["tSM961"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM962" value="<?php echo $row2["tSM962"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM963" value="<?php echo $row2["tSM963"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM961" value="<?php echo $row2["SM961"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM962" value="<?php echo $row2["SM962"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM963" value="<?php echo $row2["SM963"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM96">
    <option value="<?php echo $row2["opt1SM96"] ?>"><?php echo $row2["opt1SM96"] ?></option>
	<?php $query = "SELECT * FROM `SM96`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM961" value="<?php echo $row2["opt1SM961"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM962" value="<?php echo $row2["opt1SM962"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM963" value="<?php echo $row2["opt1SM963"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM96">
    <option value="<?php echo $row2["opt2SM96"] ?>"><?php echo $row2["opt2SM96"] ?></option>
	<?php $query = "SELECT * FROM `SM96`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM961" value="<?php echo $row2["opt2SM961"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM962" value="<?php echo $row2["opt2SM962"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM963" value="<?php echo $row2["opt2SM963"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM96">
    <option value="<?php echo $row2["opt3SM96"] ?>"><?php echo $row2["opt3SM96"] ?></option>
	<?php $query = "SELECT * FROM `SM96`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM961" value="<?php echo $row2["opt3SM961"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM962" value="<?php echo $row2["opt3SM962"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM963" value="<?php echo $row2["opt3SM963"] ?>" style="width: 40px"><br>
<br>

<input type="submit" style="height: 80px ; width: 160px" value="Wyślij" onclick="alert('Raport wysłany!')">
</center>
</form>
</td>
<td valign="top">
<h3>Skróty klawiaturowe:<br>
1. Strzałką w dół w formularzu rozwijasz ostatnio wpisywane opcje<br>
2. Sumy liczone są automatycznie<br>
3. TAB przenosi zaznaczenie do kolejnego okienka<br>
4. Shift+TAB cofa zaznaczenie do poprzedniego okienka <br>
5. Brak produkcji - Zmienić dostępny czas na 0 <br>
6. Zalecane jest używanie IE albo Chrome, Firefox nie wyświetla kalendarza i datę trzeba wpisać ręcznie (w formacie YYYY-MM-DD)</h3>
<img src="https://scontent-frx5-1.xx.fbcdn.net/v/t1.0-9/1013862_803169953058831_590104033408989764_n.jpg?_nc_cat=0&oh=09e4a880d9acf36e43c3ccecb46c8d82&oe=5C112FD6">
</td>
</body>
</html> 
