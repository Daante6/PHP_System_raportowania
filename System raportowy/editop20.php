<?php
require("connect.php");



$data=str_replace("-","",$_POST['date1']);
$query2="SELECT * FROM op20 WHERE date=".$data." ORDER BY id DESC LIMIT 1";
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
<center><h1>OPERACJA 20</h1>
<form action="formop20.php" method="post" target="_blank" autocomplete="on">
<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
<input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
Data: <input type="date" name="date" value="<?php echo $_POST['date1']; ?>" autofocus><br>

<h2>Maszyna SM25:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM251" value="<?php echo $row2["tSM251"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM252" value="<?php echo $row2["tSM252"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM253" value="<?php echo $row2["tSM253"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM251" value="<?php echo $row2["SM251"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM252" value="<?php echo $row2["SM252"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM253" value="<?php echo $row2["SM253"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM25">
    <option value="<?php echo $row2["opt1SM25"] ?>"><?php echo $row2["opt1SM25"] ?></option>
	<?php $query = "SELECT * FROM `SM25`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM251" value="<?php echo $row2["opt1SM251"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM252" value="<?php echo $row2["opt1SM252"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM253" value="<?php echo $row2["opt1SM253"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM25">
    <option value="<?php echo $row2["opt2SM25"] ?>"><?php echo $row2["opt2SM25"] ?></option>
	<?php $query = "SELECT * FROM `SM25`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM251" value="<?php echo $row2["opt2SM251"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM252" value="<?php echo $row2["opt2SM252"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM253" value="<?php echo $row2["opt2SM253"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM25">
    <option value="<?php echo $row2["opt3SM25"] ?>"><?php echo $row2["opt3SM25"] ?></option>
	<?php $query = "SELECT * FROM `SM25`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM251" value="<?php echo $row2["opt3SM251"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM252" value="<?php echo $row2["opt3SM252"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM253" value="<?php echo $row2["opt3SM253"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM84:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM841" value="<?php echo $row2["tSM841"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM842" value="<?php echo $row2["tSM842"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM843" value="<?php echo $row2["tSM843"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM841" value="<?php echo $row2["SM841"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM842" value="<?php echo $row2["SM842"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM843" value="<?php echo $row2["SM843"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM84">
    <option value="<?php echo $row2["opt1SM84"] ?>"><?php echo $row2["opt1SM84"] ?></option>
	<?php $query = "SELECT * FROM `SM84`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM841" value="<?php echo $row2["opt1SM841"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM842" value="<?php echo $row2["opt1SM842"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM843" value="<?php echo $row2["opt1SM843"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM84">
    <option value="<?php echo $row2["opt2SM84"] ?>"><?php echo $row2["opt2SM84"] ?></option>
	<?php $query = "SELECT * FROM `SM84`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM841" value="<?php echo $row2["opt2SM841"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM842" value="<?php echo $row2["opt2SM842"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM843" value="<?php echo $row2["opt2SM843"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM84">
    <option value="<?php echo $row2["opt3SM84"] ?>"><?php echo $row2["opt3SM84"] ?></option>
	<?php $query = "SELECT * FROM `SM84`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM841" value="<?php echo $row2["opt3SM841"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM842" value="<?php echo $row2["opt3SM842"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM843" value="<?php echo $row2["opt3SM843"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM45:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM451" value="<?php echo $row2["tSM451"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM452" value="<?php echo $row2["tSM452"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM453" value="<?php echo $row2["tSM453"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM451" value="<?php echo $row2["SM451"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM452" value="<?php echo $row2["SM452"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM453" value="<?php echo $row2["SM453"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM45">
    <option value="<?php echo $row2["opt1SM45"] ?>"><?php echo $row2["opt1SM45"] ?></option>
	<?php $query = "SELECT * FROM `SM45`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM451" value="<?php echo $row2["opt1SM451"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM452" value="<?php echo $row2["opt1SM452"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM453" value="<?php echo $row2["opt1SM453"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM45">
    <option value="<?php echo $row2["opt2SM45"] ?>"><?php echo $row2["opt2SM45"] ?></option>
	<?php $query = "SELECT * FROM `SM45`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM451" value="<?php echo $row2["opt2SM451"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM452" value="<?php echo $row2["opt2SM452"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM453" value="<?php echo $row2["opt2SM453"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM45">
    <option value="<?php echo $row2["opt3SM45"] ?>"><?php echo $row2["opt3SM45"] ?></option>
	<?php $query = "SELECT * FROM `SM45`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM451" value="<?php echo $row2["opt3SM451"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM452" value="<?php echo $row2["opt3SM452"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM453" value="<?php echo $row2["opt3SM453"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM22:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM221" value="<?php echo $row2["tSM221"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM222" value="<?php echo $row2["tSM222"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM223" value="<?php echo $row2["tSM223"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM221" value="<?php echo $row2["SM221"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM222" value="<?php echo $row2["SM222"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM223" value="<?php echo $row2["SM223"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM22">
    <option value="<?php echo $row2["opt1SM22"] ?>"><?php echo $row2["opt1SM22"] ?></option>
	<?php $query = "SELECT * FROM `SM22`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM221" value="<?php echo $row2["opt1SM221"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM222" value="<?php echo $row2["opt1SM222"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM223" value="<?php echo $row2["opt1SM223"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM22">
    <option value="<?php echo $row2["opt2SM22"] ?>"><?php echo $row2["opt2SM22"] ?></option>
	<?php $query = "SELECT * FROM `SM22`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM221" value="<?php echo $row2["opt2SM221"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM222" value="<?php echo $row2["opt2SM222"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM223" value="<?php echo $row2["opt2SM223"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM22">
    <option value="<?php echo $row2["opt3SM22"] ?>"><?php echo $row2["opt3SM22"] ?></option>
	<?php $query = "SELECT * FROM `SM22`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM221" value="<?php echo $row2["opt3SM221"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM222" value="<?php echo $row2["opt3SM222"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM223" value="<?php echo $row2["opt3SM223"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM64:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM641" value="<?php echo $row2["tSM641"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM642" value="<?php echo $row2["tSM642"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM643" value="<?php echo $row2["tSM643"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM641" value="<?php echo $row2["SM641"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM642" value="<?php echo $row2["SM642"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM643" value="<?php echo $row2["SM643"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM64">
    <option value="<?php echo $row2["opt1SM64"] ?>"><?php echo $row2["opt1SM64"] ?></option>
	<?php $query = "SELECT * FROM `SM64`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM641" value="<?php echo $row2["opt1SM641"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM642" value="<?php echo $row2["opt1SM642"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM643" value="<?php echo $row2["opt1SM643"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM64">
    <option value="<?php echo $row2["opt2SM64"] ?>"><?php echo $row2["opt2SM64"] ?></option>
	<?php $query = "SELECT * FROM `SM64`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM641" value="<?php echo $row2["opt2SM641"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM642" value="<?php echo $row2["opt2SM642"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM643" value="<?php echo $row2["opt2SM643"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM64">
    <option value="<?php echo $row2["opt3SM64"] ?>"><?php echo $row2["opt3SM64"] ?></option>
	<?php $query = "SELECT * FROM `SM64`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM641" value="<?php echo $row2["opt3SM641"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM642" value="<?php echo $row2["opt3SM642"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM643" value="<?php echo $row2["opt3SM643"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM63:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM631" value="<?php echo $row2["tSM631"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM632" value="<?php echo $row2["tSM632"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM633" value="<?php echo $row2["tSM633"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM631" value="<?php echo $row2["SM631"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM632" value="<?php echo $row2["SM632"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM633" value="<?php echo $row2["SM633"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM63">
    <option value="<?php echo $row2["opt1SM63"] ?>"><?php echo $row2["opt1SM63"] ?></option>
	<?php $query = "SELECT * FROM `SM63`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM631" value="<?php echo $row2["opt1SM631"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM632" value="<?php echo $row2["opt1SM632"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM633" value="<?php echo $row2["opt1SM633"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM63">
    <option value="<?php echo $row2["opt2SM63"] ?>"><?php echo $row2["opt2SM63"] ?></option>
	<?php $query = "SELECT * FROM `SM63`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM631" value="<?php echo $row2["opt2SM631"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM632" value="<?php echo $row2["opt2SM632"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM633" value="<?php echo $row2["opt2SM633"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM63">
    <option value="<?php echo $row2["opt3SM63"] ?>"><?php echo $row2["opt3SM63"] ?></option>
	<?php $query = "SELECT * FROM `SM63`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM631" value="<?php echo $row2["opt3SM631"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM632" value="<?php echo $row2["opt3SM632"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM633" value="<?php echo $row2["opt3SM633"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM55:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM551" value="<?php echo $row2["tSM551"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM552" value="<?php echo $row2["tSM552"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM553" value="<?php echo $row2["tSM553"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM551" value="<?php echo $row2["SM551"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM552" value="<?php echo $row2["SM552"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM553" value="<?php echo $row2["SM553"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM55">
    <option value="<?php echo $row2["opt1SM55"] ?>"><?php echo $row2["opt1SM55"] ?></option>
	<?php $query = "SELECT * FROM `SM55`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM551" value="<?php echo $row2["opt1SM551"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM552" value="<?php echo $row2["opt1SM552"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM553" value="<?php echo $row2["opt1SM553"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM55">
    <option value="<?php echo $row2["opt2SM55"] ?>"><?php echo $row2["opt2SM55"] ?></option>
	<?php $query = "SELECT * FROM `SM55`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM551" value="<?php echo $row2["opt2SM551"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM552" value="<?php echo $row2["opt2SM552"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM553" value="<?php echo $row2["opt2SM553"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM55">
    <option value="<?php echo $row2["opt3SM55"] ?>"><?php echo $row2["opt3SM55"] ?></option>
	<?php $query = "SELECT * FROM `SM55`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM551" value="<?php echo $row2["opt3SM551"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM552" value="<?php echo $row2["opt3SM552"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM553" value="<?php echo $row2["opt3SM553"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM56:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM561" value="<?php echo $row2["tSM561"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM562" value="<?php echo $row2["tSM562"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM563" value="<?php echo $row2["tSM563"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM561" value="<?php echo $row2["SM561"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM562" value="<?php echo $row2["SM562"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM563" value="<?php echo $row2["SM563"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM56">
    <option value="<?php echo $row2["opt1SM56"] ?>"><?php echo $row2["opt1SM56"] ?></option>
	<?php $query = "SELECT * FROM `SM56`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM561" value="<?php echo $row2["opt1SM561"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM562" value="<?php echo $row2["opt1SM562"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM563" value="<?php echo $row2["opt1SM563"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM56">
    <option value="<?php echo $row2["opt2SM56"] ?>"><?php echo $row2["opt2SM56"] ?></option>
	<?php $query = "SELECT * FROM `SM56`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM561" value="<?php echo $row2["opt2SM561"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM562" value="<?php echo $row2["opt2SM562"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM563" value="<?php echo $row2["opt2SM563"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM56">
    <option value="<?php echo $row2["opt3SM56"] ?>"><?php echo $row2["opt3SM56"] ?></option>
	<?php $query = "SELECT * FROM `SM56`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM561" value="<?php echo $row2["opt3SM561"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM562" value="<?php echo $row2["opt3SM562"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM563" value="<?php echo $row2["opt3SM563"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM97:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM971" value="<?php echo $row2["tSM971"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM972" value="<?php echo $row2["tSM972"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM973" value="<?php echo $row2["tSM973"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM971" value="<?php echo $row2["SM971"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM972" value="<?php echo $row2["SM972"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM973" value="<?php echo $row2["SM973"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM97">
    <option value="<?php echo $row2["opt1SM97"] ?>"><?php echo $row2["opt1SM97"] ?></option>
	<?php $query = "SELECT * FROM `SM97`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM971" value="<?php echo $row2["opt1SM971"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM972" value="<?php echo $row2["opt1SM972"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM973" value="<?php echo $row2["opt1SM973"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM97">
    <option value="<?php echo $row2["opt2SM97"] ?>"><?php echo $row2["opt2SM97"] ?></option>
	<?php $query = "SELECT * FROM `SM97`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM971" value="<?php echo $row2["opt2SM971"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM972" value="<?php echo $row2["opt2SM972"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM973" value="<?php echo $row2["opt2SM973"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM97">
    <option value="<?php echo $row2["opt3SM97"] ?>"><?php echo $row2["opt3SM97"] ?></option>
	<?php $query = "SELECT * FROM `SM97`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM971" value="<?php echo $row2["opt3SM971"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM972" value="<?php echo $row2["opt3SM972"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM973" value="<?php echo $row2["opt3SM973"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM52:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM521" value="<?php echo $row2["tSM521"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM522" value="<?php echo $row2["tSM522"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM523" value="<?php echo $row2["tSM523"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM521" value="<?php echo $row2["SM521"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM522" value="<?php echo $row2["SM522"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM523" value="<?php echo $row2["SM523"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM52">
    <option value="<?php echo $row2["opt1SM52"] ?>"><?php echo $row2["opt1SM52"] ?></option>
	<?php $query = "SELECT * FROM `SM52`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM521" value="<?php echo $row2["opt1SM521"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM522" value="<?php echo $row2["opt1SM522"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM523" value="<?php echo $row2["opt1SM523"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM52">
    <option value="<?php echo $row2["opt2SM52"] ?>"><?php echo $row2["opt2SM52"] ?></option>
	<?php $query = "SELECT * FROM `SM52`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM521" value="<?php echo $row2["opt2SM521"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM522" value="<?php echo $row2["opt2SM522"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM523" value="<?php echo $row2["opt2SM523"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM52">
    <option value="<?php echo $row2["opt3SM52"] ?>"><?php echo $row2["opt3SM52"] ?></option>
	<?php $query = "SELECT * FROM `SM52`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM521" value="<?php echo $row2["opt3SM521"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM522" value="<?php echo $row2["opt3SM522"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM523" value="<?php echo $row2["opt3SM523"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM24:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM241" value="<?php echo $row2["tSM241"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM242" value="<?php echo $row2["tSM242"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM243" value="<?php echo $row2["tSM243"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM241" value="<?php echo $row2["SM241"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM242" value="<?php echo $row2["SM242"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM243" value="<?php echo $row2["SM243"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM24">
    <option value="<?php echo $row2["opt1SM24"] ?>"><?php echo $row2["opt1SM24"] ?></option>
	<?php $query = "SELECT * FROM `SM24`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM241" value="<?php echo $row2["opt1SM241"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM242" value="<?php echo $row2["opt1SM242"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM243" value="<?php echo $row2["opt1SM243"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM24">
    <option value="<?php echo $row2["opt2SM24"] ?>"><?php echo $row2["opt2SM24"] ?></option>
	<?php $query = "SELECT * FROM `SM24`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM241" value="<?php echo $row2["opt2SM241"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM242" value="<?php echo $row2["opt2SM242"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM243" value="<?php echo $row2["opt2SM243"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM24">
    <option value="<?php echo $row2["opt3SM24"] ?>"><?php echo $row2["opt3SM24"] ?></option>
	<?php $query = "SELECT * FROM `SM24`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM241" value="<?php echo $row2["opt3SM241"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM242" value="<?php echo $row2["opt3SM242"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM243" value="<?php echo $row2["opt3SM243"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM80:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM801" value="<?php echo $row2["tSM801"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM802" value="<?php echo $row2["tSM802"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM803" value="<?php echo $row2["tSM803"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM801" value="<?php echo $row2["SM801"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM802" value="<?php echo $row2["SM802"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM803" value="<?php echo $row2["SM803"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM80">
    <option value="<?php echo $row2["opt1SM80"] ?>"><?php echo $row2["opt1SM80"] ?></option>
	<?php $query = "SELECT * FROM `SM80`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM801" value="<?php echo $row2["opt1SM801"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM802" value="<?php echo $row2["opt1SM802"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM803" value="<?php echo $row2["opt1SM803"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM80">
    <option value="<?php echo $row2["opt2SM80"] ?>"><?php echo $row2["opt2SM80"] ?></option>
	<?php $query = "SELECT * FROM `SM80`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM801" value="<?php echo $row2["opt2SM801"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM802" value="<?php echo $row2["opt2SM802"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM803" value="<?php echo $row2["opt2SM803"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM80">
    <option value="<?php echo $row2["opt3SM80"] ?>"><?php echo $row2["opt3SM80"] ?></option>
	<?php $query = "SELECT * FROM `SM80`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM801" value="<?php echo $row2["opt3SM801"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM802" value="<?php echo $row2["opt3SM802"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM803" value="<?php echo $row2["opt3SM803"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM40:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM401" value="<?php echo $row2["tSM401"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM402" value="<?php echo $row2["tSM402"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM403" value="<?php echo $row2["tSM403"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM401" value="<?php echo $row2["SM401"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM402" value="<?php echo $row2["SM402"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM403" value="<?php echo $row2["SM403"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM40">
    <option value="<?php echo $row2["opt1SM40"] ?>"><?php echo $row2["opt1SM40"] ?></option>
	<?php $query = "SELECT * FROM `SM40`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM401" value="<?php echo $row2["opt1SM401"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM402" value="<?php echo $row2["opt1SM402"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM403" value="<?php echo $row2["opt1SM403"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM40">
    <option value="<?php echo $row2["opt2SM40"] ?>"><?php echo $row2["opt2SM40"] ?></option>
	<?php $query = "SELECT * FROM `SM40`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM401" value="<?php echo $row2["opt2SM401"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM402" value="<?php echo $row2["opt2SM402"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM403" value="<?php echo $row2["opt2SM403"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM40">
    <option value="<?php echo $row2["opt3SM40"] ?>"><?php echo $row2["opt3SM40"] ?></option>
	<?php $query = "SELECT * FROM `SM40`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM401" value="<?php echo $row2["opt3SM401"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM402" value="<?php echo $row2["opt3SM402"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM403" value="<?php echo $row2["opt3SM403"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM59:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM591" value="<?php echo $row2["tSM591"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM592" value="<?php echo $row2["tSM592"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM593" value="<?php echo $row2["tSM593"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM591" value="<?php echo $row2["SM591"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM592" value="<?php echo $row2["SM592"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM593" value="<?php echo $row2["SM593"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM59">
    <option value="<?php echo $row2["opt1SM59"] ?>"><?php echo $row2["opt1SM59"] ?></option>
	<?php $query = "SELECT * FROM `SM59`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM591" value="<?php echo $row2["opt1SM591"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM592" value="<?php echo $row2["opt1SM592"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM593" value="<?php echo $row2["opt1SM593"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM59">
    <option value="<?php echo $row2["opt2SM59"] ?>"><?php echo $row2["opt2SM59"] ?></option>
	<?php $query = "SELECT * FROM `SM59`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM591" value="<?php echo $row2["opt2SM591"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM592" value="<?php echo $row2["opt2SM592"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM593" value="<?php echo $row2["opt2SM593"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM59">
    <option value="<?php echo $row2["opt3SM59"] ?>"><?php echo $row2["opt3SM59"] ?></option>
	<?php $query = "SELECT * FROM `SM59`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM591" value="<?php echo $row2["opt3SM591"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM592" value="<?php echo $row2["opt3SM592"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM593" value="<?php echo $row2["opt3SM593"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM42:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM421" value="<?php echo $row2["tSM421"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM422" value="<?php echo $row2["tSM422"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM423" value="<?php echo $row2["tSM423"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM421" value="<?php echo $row2["SM421"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM422" value="<?php echo $row2["SM422"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM423" value="<?php echo $row2["SM423"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM42">
    <option value="<?php echo $row2["opt1SM42"] ?>"><?php echo $row2["opt1SM42"] ?></option>
	<?php $query = "SELECT * FROM `SM42`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM421" value="<?php echo $row2["opt1SM421"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM422" value="<?php echo $row2["opt1SM422"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM423" value="<?php echo $row2["opt1SM423"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM42">
    <option value="<?php echo $row2["opt2SM42"] ?>"><?php echo $row2["opt2SM42"] ?></option>
	<?php $query = "SELECT * FROM `SM42`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM421" value="<?php echo $row2["opt2SM421"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM422" value="<?php echo $row2["opt2SM422"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM423" value="<?php echo $row2["opt2SM423"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM42">
    <option value="<?php echo $row2["opt3SM42"] ?>"><?php echo $row2["opt3SM42"] ?></option>
	<?php $query = "SELECT * FROM `SM42`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM421" value="<?php echo $row2["opt3SM421"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM422" value="<?php echo $row2["opt3SM422"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM423" value="<?php echo $row2["opt3SM423"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM65:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM651" value="<?php echo $row2["tSM651"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM652" value="<?php echo $row2["tSM652"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM653" value="<?php echo $row2["tSM653"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM651" value="<?php echo $row2["SM651"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM652" value="<?php echo $row2["SM652"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM653" value="<?php echo $row2["SM653"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM65">
    <option value="<?php echo $row2["opt1SM65"] ?>"><?php echo $row2["opt1SM65"] ?></option>
	<?php $query = "SELECT * FROM `SM65`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM651" value="<?php echo $row2["opt1SM651"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM652" value="<?php echo $row2["opt1SM652"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM653" value="<?php echo $row2["opt1SM653"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM65">
    <option value="<?php echo $row2["opt2SM65"] ?>"><?php echo $row2["opt2SM65"] ?></option>
	<?php $query = "SELECT * FROM `SM65`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM651" value="<?php echo $row2["opt2SM651"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM652" value="<?php echo $row2["opt2SM652"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM653" value="<?php echo $row2["opt2SM653"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM65">
    <option value="<?php echo $row2["opt3SM65"] ?>"><?php echo $row2["opt3SM65"] ?></option>
	<?php $query = "SELECT * FROM `SM65`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM651" value="<?php echo $row2["opt3SM651"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM652" value="<?php echo $row2["opt3SM652"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM653" value="<?php echo $row2["opt3SM653"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM51:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM511" value="<?php echo $row2["tSM511"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM512" value="<?php echo $row2["tSM512"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM513" value="<?php echo $row2["tSM513"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM511" value="<?php echo $row2["SM511"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM512" value="<?php echo $row2["SM512"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM513" value="<?php echo $row2["SM513"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM51">
    <option value="<?php echo $row2["opt1SM51"] ?>"><?php echo $row2["opt1SM51"] ?></option>
	<?php $query = "SELECT * FROM `SM51`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM511" value="<?php echo $row2["opt1SM511"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM512" value="<?php echo $row2["opt1SM512"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM513" value="<?php echo $row2["opt1SM513"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM51">
    <option value="<?php echo $row2["opt2SM51"] ?>"><?php echo $row2["opt2SM51"] ?></option>
	<?php $query = "SELECT * FROM `SM51`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM511" value="<?php echo $row2["opt2SM511"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM512" value="<?php echo $row2["opt2SM512"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM513" value="<?php echo $row2["opt2SM513"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM51">
    <option value="<?php echo $row2["opt3SM51"] ?>"><?php echo $row2["opt3SM51"] ?></option>
	<?php $query = "SELECT * FROM `SM51`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM511" value="<?php echo $row2["opt3SM511"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM512" value="<?php echo $row2["opt3SM512"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM513" value="<?php echo $row2["opt3SM513"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM76:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM761" value="<?php echo $row2["tSM761"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM762" value="<?php echo $row2["tSM762"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM763" value="<?php echo $row2["tSM763"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM761" value="<?php echo $row2["SM761"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM762" value="<?php echo $row2["SM762"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM763" value="<?php echo $row2["SM763"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM76">
    <option value="<?php echo $row2["opt1SM76"] ?>"><?php echo $row2["opt1SM76"] ?></option>
	<?php $query = "SELECT * FROM `SM76`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM761" value="<?php echo $row2["opt1SM761"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM762" value="<?php echo $row2["opt1SM762"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM763" value="<?php echo $row2["opt1SM763"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM76">
    <option value="<?php echo $row2["opt2SM76"] ?>"><?php echo $row2["opt2SM76"] ?></option>
	<?php $query = "SELECT * FROM `SM76`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM761" value="<?php echo $row2["opt2SM761"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM762" value="<?php echo $row2["opt2SM762"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM763" value="<?php echo $row2["opt2SM763"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM76">
    <option value="<?php echo $row2["opt3SM76"] ?>"><?php echo $row2["opt3SM76"] ?></option>
	<?php $query = "SELECT * FROM `SM76`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM761" value="<?php echo $row2["opt3SM761"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM762" value="<?php echo $row2["opt3SM762"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM763" value="<?php echo $row2["opt3SM763"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM77:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM771" value="<?php echo $row2["tSM771"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM772" value="<?php echo $row2["tSM772"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM773" value="<?php echo $row2["tSM773"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM771" value="<?php echo $row2["SM771"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM772" value="<?php echo $row2["SM772"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM773" value="<?php echo $row2["SM773"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM77">
    <option value="<?php echo $row2["opt1SM77"] ?>"><?php echo $row2["opt1SM77"] ?></option>
	<?php $query = "SELECT * FROM `SM77`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM771" value="<?php echo $row2["opt1SM771"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM772" value="<?php echo $row2["opt1SM772"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM773" value="<?php echo $row2["opt1SM773"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM77">
    <option value="<?php echo $row2["opt2SM77"] ?>"><?php echo $row2["opt2SM77"] ?></option>
	<?php $query = "SELECT * FROM `SM77`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM771" value="<?php echo $row2["opt2SM771"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM772" value="<?php echo $row2["opt2SM772"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM773" value="<?php echo $row2["opt2SM773"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM77">
    <option value="<?php echo $row2["opt3SM77"] ?>"><?php echo $row2["opt3SM77"] ?></option>
	<?php $query = "SELECT * FROM `SM77`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM771" value="<?php echo $row2["opt3SM771"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM772" value="<?php echo $row2["opt3SM772"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM773" value="<?php echo $row2["opt3SM773"] ?>" style="width: 40px"><br>
<br>

<hr>

<h2>Maszyna SM68:</h2>
Dostępny czas [min]: 1. ZM <input type="text" name="tSM681" value="<?php echo $row2["tSM681"] ?>" style="width: 40px"> 2. ZM<input type="text" name="tSM682" value="<?php echo $row2["tSM682"] ?>" style="width: 40px"> 3. ZM <input type="text" name="tSM683" value="<?php echo $row2["tSM683"] ?>" style="width: 40px"><br>
Plan: 1. ZM <input type="text" name="SM681" value="<?php echo $row2["SM681"] ?>" style="width: 40px"> 2. ZM<input type="text" name="SM682" value="<?php echo $row2["SM682"] ?>" style="width: 40px"> 3. ZM <input type="text" name="SM683" value="<?php echo $row2["SM683"] ?>" style="width: 40px"><br>

Referencja:
  <select name="opt1SM68">
    <option value="<?php echo $row2["opt1SM68"] ?>"><?php echo $row2["opt1SM68"] ?></option>
	<?php $query = "SELECT * FROM `SM68`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt1SM681" value="<?php echo $row2["opt1SM681"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt1SM682" value="<?php echo $row2["opt1SM682"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt1SM683" value="<?php echo $row2["opt1SM683"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt2SM68">
    <option value="<?php echo $row2["opt2SM68"] ?>"><?php echo $row2["opt2SM68"] ?></option>
	<?php $query = "SELECT * FROM `SM68`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt2SM681" value="<?php echo $row2["opt2SM681"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt2SM682" value="<?php echo $row2["opt2SM682"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt2SM683" value="<?php echo $row2["opt2SM683"] ?>" style="width: 40px"><br>
Referencja:
  <select name="opt3SM68">
    <option value="<?php echo $row2["opt3SM68"] ?>"><?php echo $row2["opt3SM68"] ?></option>
	<?php $query = "SELECT * FROM `SM68`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
	<option value="0">0</option>
  </select>
1. ZM <input type="text" name="opt3SM681" value="<?php echo $row2["opt3SM681"] ?>" style="width: 40px"> 2. ZM<input type="text" name="opt3SM682" value="<?php echo $row2["opt3SM682"] ?>" style="width: 40px"> 3. ZM <input type="text" name="opt3SM683" value="<?php echo $row2["opt3SM683"] ?>" style="width: 40px"><br>
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