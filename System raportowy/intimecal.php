<?php
require("connect.php");

$maszyna=$_POST['maszyna'];
$od=$_POST['od'];
$do=$_POST['do'];
$datax=0;
$operacja=$_POST['operacja'];
$referencja=$_POST['referencja'];
$suma=0;
$query = "SELECT date,opt1".$maszyna.",opt1".$maszyna."1,opt1".$maszyna."2,opt1".$maszyna."3,opt2".$maszyna.",opt2".$maszyna."1,opt2".$maszyna."2,opt2".$maszyna."3,opt3".$maszyna.",opt3".$maszyna."1,opt3".$maszyna."2,opt3".$maszyna."3 FROM `op".$operacja."` WHERE date between '".$od."' AND '".$do."' ORDER BY `date`,`ID` DESC";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
	
		if($row1['0']<=$do && $row1['0']>=$od && $row1['0']!=$datax){//sprawdŸ i dodaj do sumy ca³y rekord
		if($row1['1']==$referencja){
		$suma=$suma+$row1['2']+$row1['3']+$row1['4'];
		}elseif($row1['5']==$referencja){
		$suma=$suma+$row1['6']+$row1['7']+$row1['8'];
		}elseif($row1['9']==$referencja){
		$suma=$suma+$row1['10']+$row1['11']+$row1['12'];
		}
		$datax=$row1['0'];
				}
    endwhile;


?>
<html>
<head>
<meta charset="UTF-8">
</head> 
<body>
<center><br><br>
<h2>Raport:<br>
Maszyna: <?php echo $maszyna; ?><br>
referencja: <?php echo $referencja; ?><br>
Produkcja od <?php echo $od; ?> <br>
do <?php echo $do; ?><br>
wynosi <?php echo $suma; ?>