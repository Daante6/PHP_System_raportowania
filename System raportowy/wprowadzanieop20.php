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
<center><h1>OPERACJA 20</h1>
<form action="formop20.php" method="post" target="_blank" autocomplete="on">
<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
<input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
Data: <input type="date" name="date" value="<?php echo $_POST['date1']; ?>" autofocus><br>
<h2>Maszyna SM25:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM251" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM252" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM253" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM251" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM252" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM253" value="0" style="width: 40px"><br>

Referencja:
  <select name="opt1SM25">
    <?php $query = "SELECT * FROM `SM25`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM251" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM252" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM253" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM25">
	<option value="0">0</option>
    <?php $query = "SELECT * FROM `SM25`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM251" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM252" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM253" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM25">
	<option value="0">0</option>
    <?php $query = "SELECT * FROM `SM25`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM251" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM252" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM253" value="0" style="width: 40px"><br>
<br>
<hr>
<h2>Maszyna SM84:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM841" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM842" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM843" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM841" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM842" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM843" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM84">
    <?php $query = "SELECT * FROM `SM84`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM841" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM842" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM843" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM84">
	<option value="0">0</option>
    <?php $query = "SELECT * FROM `SM84`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM841" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM842" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM843" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM84">
	<option value="0">0</option>
    <?php $query = "SELECT * FROM `SM84`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM841" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM842" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM843" value="0" style="width: 40px"><br>
<br>
<hr>

<h2>Maszyna SM45:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM451" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM452" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM453" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM451" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM452" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM453" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM45">
	<?php $query = "SELECT * FROM `SM45`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0"></option>
  </select>
1. ZM <input type="text" name="opt1SM451" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM452" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM453" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM45">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM45`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM451" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM452" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM453" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM45">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM45`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM451" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM452" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM453" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM22:</h2> 
Dostępny czas [min]: 1. ZM <input type="text" name="tSM221" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM222" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM223" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM221" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM222" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM223" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM22">
	<?php $query = "SELECT * FROM `SM22`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM221" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM222" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM223" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM22">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM22`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM221" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM222" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM223" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM22">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM22`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM221" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM222" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM223" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM64:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM641" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM642" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM643" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM641" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM642" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM643" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM64">
	<?php $query = "SELECT * FROM `SM64`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM641" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM642" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM643" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM64">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM64`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM641" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM642" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM643" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM64">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM64`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM641" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM642" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM643" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM63:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM631" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM632" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM633" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM631" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM632" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM633" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM63">
	<?php $query = "SELECT * FROM `SM63`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM631" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM632" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM633" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM63">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM63`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM631" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM632" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM633" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM63">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM63`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM631" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM632" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM633" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM55:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM551" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM552" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM553" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM551" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM552" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM553" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM55">
	<?php $query = "SELECT * FROM `SM55`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM551" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM552" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM553" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM55">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM55`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM551" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM552" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM553" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM55">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM55`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM551" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM552" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM553" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM56:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM561" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM562" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM563" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM561" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM562" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM563" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM56">
	<?php $query = "SELECT * FROM `SM56`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM561" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM562" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM563" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM56">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM56`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM561" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM562" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM563" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM56">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM56`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM561" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM562" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM563" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM97:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM971" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM972" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM973" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM971" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM972" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM973" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM97">
	<?php $query = "SELECT * FROM `SM97`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM971" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM972" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM973" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM97">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM97`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM971" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM972" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM973" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM97">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM97`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM971" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM972" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM973" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM52:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM521" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM522" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM523" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM521" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM522" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM523" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM52">
	<?php $query = "SELECT * FROM `SM52`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM521" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM522" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM523" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM52">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM52`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM521" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM522" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM523" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM52">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM52`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM521" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM522" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM523" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM24:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM241" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM242" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM243" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM241" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM242" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM243" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM24">
	<?php $query = "SELECT * FROM `SM24`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM241" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM242" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM243" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM24">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM24`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM241" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM242" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM243" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM24">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM24`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM241" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM242" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM243" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM80:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM801" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM802" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM803" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM801" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM802" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM803" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM80">
	<?php $query = "SELECT * FROM `SM80`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM801" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM802" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM803" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM80">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM80`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM801" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM802" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM803" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM80">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM80`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM801" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM802" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM803" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM40:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM401" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM402" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM403" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM401" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM402" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM403" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM40">
	<?php $query = "SELECT * FROM `SM40`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM401" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM402" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM403" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM40">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM40`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM401" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM402" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM403" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM40">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM40`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM401" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM402" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM403" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM59:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM591" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM592" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM593" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM591" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM592" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM593" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM59">
	<?php $query = "SELECT * FROM `SM59`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM591" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM592" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM593" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM59">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM59`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM591" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM592" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM593" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM59">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM59`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM591" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM592" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM593" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM42:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM421" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM422" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM423" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM421" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM422" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM423" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM42">
	<?php $query = "SELECT * FROM `SM42`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM421" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM422" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM423" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM42">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM42`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM421" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM422" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM423" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM42">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM42`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM421" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM422" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM423" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM65:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM651" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM652" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM653" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM651" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM652" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM653" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM65">
	<?php $query = "SELECT * FROM `SM65`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM651" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM652" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM653" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM65">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM65`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM651" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM652" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM653" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM65">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM65`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM651" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM652" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM653" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM51:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM511" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM512" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM513" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM511" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM512" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM513" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM51">
	<?php $query = "SELECT * FROM `SM51`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM511" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM512" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM513" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM51">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM51`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM511" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM512" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM513" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM51">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM51`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM511" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM512" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM513" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM76:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM761" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM762" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM763" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM761" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM762" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM763" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM76">
	<?php $query = "SELECT * FROM `SM76`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM761" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM762" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM763" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM76">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM76`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM761" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM762" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM763" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM76">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM76`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM761" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM762" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM763" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM77:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM771" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM772" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM773" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM771" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM772" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM773" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM77">
	<?php $query = "SELECT * FROM `SM77`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM771" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM772" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM773" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM77">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM77`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt2SM771" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM772" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM773" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM77">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM77`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM771" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM772" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM773" value="0" style="width: 40px"><br>
<br>

<hr>
<h2>Maszyna SM68:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM681" value="445" style="width: 40px"> 2. ZM<input type="text" name="tSM682" value="445" style="width: 40px"> 3. ZM <input type="text" name="tSM683" value="445" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM681" value="0" style="width: 40px"> 2. ZM<input type="text" name="SM682" value="0" style="width: 40px"> 3. ZM <input type="text" name="SM683" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt1SM68">
	<?php $query = "SELECT * FROM `SM68`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM681" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt1SM682" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt1SM683" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt2SM68">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM68`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	</select>
1. ZM <input type="text" name="opt2SM681" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt2SM682" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt2SM683" value="0" style="width: 40px"><br>
Referencja:
  <select name="opt3SM68">
	<option value="0">0</option>
	<?php $query = "SELECT * FROM `SM68`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
1. ZM <input type="text" name="opt3SM681" value="0" style="width: 40px"> 2. ZM<input type="text" name="opt3SM682" value="0" style="width: 40px"> 3. ZM <input type="text" name="opt3SM683" value="0" style="width: 40px"><br>
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