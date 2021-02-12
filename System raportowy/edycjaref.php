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
<td width="30%">

<h2> Aktualna lista referencji:<br>
</h2><h4>
<?php $query = "SELECT * FROM `".$_POST['maszyna']."`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            ID: <?php echo $row1[0];?> <br>Ref: <?php echo $row1[1];?><br> Cykl: <?php echo $row1[2]." sec<br>";?> Projekt: <?php echo $row1[3];?><hr>

            <?php endwhile;?>
</td>
<td width="40%">
<center>
<h2>Edycja referencji <?php echo $_POST['maszyna'];?></h2>
<form  method="post" action="reftodb.php" autocomplete="on">
<br>
Wybierz którą
<select name="maszyna1">
    <?php $query = "SELECT * FROM `".$_POST['maszyna']."`";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

            <?php endwhile;?>
  </select>
<br>
nazwa referencji<input type="text" name="newname"> <br>
cykl:<input type="text" name="time" maxlength="3" size="5"><br>
projekt:<input type="text" name="projekt" maxlength="2" size="5"><br>
<input type="hidden" value="<?php echo $_POST['maszyna']; ?>" name="maszyna">
<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
<input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
<input type="submit" style="height: 80px ; width: 160px" value="Zapisz">
</center>
</td>
<td width="35%">
Instrukcja obsługi:<br>
Wybieramy, którą referencję chcemy edytować (lub dodać w przypadku "0")<br>
<u>Przepisujemy</u> nazwę referencji edytowanej lub wprowadzamy nową<br>
W przypadku gdy mamy dwie referencje, pomijamy ukośnik między nimi<br>
(229230 zamiast 229/230)<br>
Wpisujemy cykl<br>
Jako projekt wpisujemy tylko liczbę!<br>
Klikamy "Zapisz"<br>
<hr><b>
Projekty:<br>
1 - IPS<br>
2 - PSA korpus<br>
3 - PSA wspornik<br>
4 - MNB korpus przód<br>
5 - MNB korpus tył<br>
6 - MNB wspornik przód<br>
7 - MNB wspornik tył<br>
8 - MFA2 korpus przód<br>
9 - MFA2 korpus tył<br>
10 - MFA2 wspornik przód<br>
11 - MFA2 wspornik tył<br>
</table>
</html>