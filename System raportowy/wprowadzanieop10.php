<?php
require("connect.php");

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
Dostępny czas [min]: 1. ZM <input type="text" name="tSM621" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM622" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM623" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM621" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM622" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM623" value="0" style="width: 40px"><br>

Referencja:
  <select name="opt1SM62">
	<?php $query = "SELECT * FROM `SM62`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM621" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM622" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM623" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM62">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM62`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM621" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM622" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM623" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM62">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM62`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM621" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM622" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM623" value="0" style="width: 40px"><br>
<br>
<hr>
<h2>Maszyna SM83:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM831" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM832" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM833" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM831" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM832" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM833" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM83">
	<?php $query = "SELECT * FROM `SM83`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM831" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM832" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM833" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM83">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM83`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM831" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM832" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM833" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM83">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM83`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	
  </select>
1. ZM <input type="text" name="opt3SM831" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM832" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM833" value="0" style="width: 40px"><br>
<br>
<hr>

<h2>Maszyna SM82:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM821" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM822" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM823" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM821" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM822" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM823" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM82">
	<?php $query = "SELECT * FROM `SM82`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM821" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM822" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM823" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM82">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM82`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	
  </select>
1. ZM <input type="text" name="opt2SM821" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM822" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM823" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM82">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM82`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM821" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM822" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM823" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM94:</h2> 
Dostępny czas [min]: 1. ZM <input type="text" name="tSM941" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM942" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM943" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM941" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM942" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM943" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM94">
	
	<?php $query = "SELECT * FROM `SM94`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM941" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM942" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM943" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM94">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM94`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM941" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM942" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM943" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM94">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM94`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM941" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM942" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM943" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM89:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM891" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM892" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM893" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM891" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM892" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM893" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM89">
	<?php $query = "SELECT * FROM `SM89`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM891" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM892" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM893" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM89">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM89`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM891" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM892" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM893" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM89">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM89`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM891" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM892" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM893" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM91:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM911" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM912" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM913" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM911" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM912" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM913" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM91">
	<?php $query = "SELECT * FROM `SM91`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM911" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM912" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM913" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM91">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM91`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM911" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM912" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM913" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM91">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM91`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM911" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM912" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM913" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM57:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM571" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM572" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM573" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM571" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM572" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM573" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM57">
	<?php $query = "SELECT * FROM `SM57`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM571" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM572" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM573" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM57">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM57`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM571" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM572" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM573" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM57">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM57`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM571" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM572" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM573" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM61:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM611" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM612" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM613" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM611" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM612" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM613" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM61">
	<?php $query = "SELECT * FROM `SM61`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM611" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM612" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM613" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM61">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM61`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM611" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM612" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM613" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM61">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM61`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM611" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM612" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM613" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM95:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM951" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM952" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM953" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM951" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM952" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM953" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM95">
	<?php $query = "SELECT * FROM `SM95`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM951" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM952" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM953" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM95">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM95`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM951" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM952" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM953" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM95">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM95`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM951" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM952" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM953" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna Pp-2:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tPP21" value="445" style="width: 40px"> 2. ZM<input type="text" name="tPP22" value="445" style="width: 40px"> 3. ZM <input type="text" name="tPP23" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="PP21" value="0" style="width: 40px"> 2. ZM<input type="text" name="PP22" value="0" style="width: 40px"> 3. ZM <input type="text" name="PP23" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1PP2">
	<?php $query = "SELECT * FROM `PP2`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1PP21" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1PP22" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1PP23" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2PP2">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `PP2`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2PP21" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2PP22" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2PP23" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3PP2">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `PP2`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3PP21" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3PP22" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3PP23" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna Pp-3:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tPP31" value="445" style="width: 40px"> 2. ZM<input type="text" name="tPP32" value="445" style="width: 40px"> 3. ZM <input type="text" name="tPP33" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="PP31" value="0" style="width: 40px"> 2. ZM<input type="text" name="PP32" value="0" style="width: 40px"> 3. ZM <input type="text" name="PP33" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1PP3">
	<?php $query = "SELECT * FROM `PP3`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1PP31" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1PP32" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1PP33" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2PP3">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `PP3`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2PP31" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2PP32" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2PP33" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3PP3">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `PP3`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3PP31" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3PP32" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3PP33" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM66:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM661" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM662" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM663" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM661" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM662" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM663" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM66">
	<?php $query = "SELECT * FROM `SM66`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM661" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM662" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM663" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM66">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM66`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM661" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM662" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM663" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM66">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM66`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM661" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM662" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM663" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM86:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM861" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM862" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM863" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM861" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM862" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM863" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM86">
	<?php $query = "SELECT * FROM `SM86`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM861" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM862" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM863" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM86">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM86`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM861" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM862" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM863" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM86">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM86`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM861" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM862" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM863" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM81:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM811" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM812" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM813" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM811" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM812" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM813" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM81">
	<?php $query = "SELECT * FROM `SM81`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM811" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM812" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM813" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM81">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM81`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM811" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM812" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM813" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM81">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM81`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM811" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM812" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM813" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM93:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM931" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM932" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM933" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM931" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM932" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM933" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM93">
	<?php $query = "SELECT * FROM `SM93`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM931" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM932" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM933" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM93">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM93`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM931" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM932" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM933" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM93">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM93`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM931" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM932" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM933" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM90:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM901" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM902" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM903" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM901" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM902" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM903" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM90">
	<?php $query = "SELECT * FROM `SM90`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM901" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM902" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM903" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM90">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM90`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM901" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM902" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM903" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM90">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM90`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM901" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM902" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM903" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM92:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM921" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM922" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM923" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM921" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM922" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM923" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM92">
	<?php $query = "SELECT * FROM `SM92`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM921" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM922" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM923" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM92">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM92`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM921" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM922" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM923" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM92">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM92`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM921" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM922" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM923" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM74:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM741" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM742" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM743" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM741" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM742" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM743" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM74">
	<?php $query = "SELECT * FROM `SM74`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM741" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM742" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM743" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM74">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM74`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM741" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM742" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM743" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM74">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM74`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM741" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM742" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM743" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM96:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM961" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM962" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM963" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM961" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM962" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM963" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM96">
	<?php $query = "SELECT * FROM `SM96`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM961" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM962" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM963" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM96">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM96`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM961" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM962" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM963" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM96">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM96`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM961" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM962" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM963" value="0" style="width: 40px"><br>
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