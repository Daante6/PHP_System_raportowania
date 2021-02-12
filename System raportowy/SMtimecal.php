<?php
require("connect.php");

$maszyna=$_POST['maszyna'];
$od=$_POST['od'];
$do=$_POST['do'];
$datax=0;
$operacja=$_POST['operacja'];

$sumsztuk=0; //suma sztuk
$sztukdzien=0; //sztuki danego dnia
$dzielnik=0; //ile jest zmiennych do średniej do OEE
$OEE=0; //suma, na koniec dzielone na dzielnik
?>
<html> 
<head>
<meta charset="UTF-8">
</head> 
<body>
<center>
<h1>Produkcja maszyny w czasie</h1><br>

<br><hr>Tabelka do Excela:<br>
<table border="1">
<td>
dzień<br>
sztuk<br>
OEE<br>
<?php
//wczytaj date,OEEsm,op1sm1/2/3 [11łącznie (0-10)] from op$operacja WHERE date between '".$od."' AND '".$do."' ORDER BY `date`,`ID` DESC";
//while na każdy row explode date na dzień, sumuj sztuki, dodaj dzielnik do średniej, sume OEE
//echo dzień<br>OEE<br>sztuki<td>

$query = "SELECT date,opt1".$maszyna."1,opt1".$maszyna."2,opt1".$maszyna."3,opt2".$maszyna."1,opt2".$maszyna."2,opt2".$maszyna."3,opt3".$maszyna."1,opt3".$maszyna."2,opt3".$maszyna."3,OEE".$maszyna." FROM `op".$operacja."` WHERE date between '".$od."' AND '".$do."' ORDER BY `date`,`ID` DESC";
	$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
	
		if($row1['0']!=$datax){//sprawdź i dodaj do sumy cały rekord
		
		//obliczenia
		$sztukdzien=$row1['1']+$row1['2']+$row1['3']+$row1['4']+$row1['5']+$row1['6']+$row1['7']+$row1['8']+$row1['9'];
		$sumsztuk+=$sztukdzien;
		$OEE+=$row1['10'];
		$dzielnik+=1;
		
		//data
		list($y,$m,$d)=explode("-",$row1['0']);
		
		//rysuj tabele
		echo "<td>".$d."<br>".$sztukdzien."<br>".$row1['10'];
		
		//żeby dwa razy nie brać tej samej daty
		$datax=$row1['0'];
				}
    endwhile;

	//po pętli
	if($dzielnik!=0){
	$OEE=$OEE/$dzielnik;
	}else{echo "Brak raportów!";}
	$OEE=round($OEE, 1);
?>
</table>
<br><hr><br><h2>
Na okres od <?php echo $od; ?> do <?php echo $do; ?><br>
Średnie OEE wynosi: <?php echo $OEE; ?><br>
Łącznie wyprodukowanych referencji: <?php echo $sumsztuk; ?><br><h3>