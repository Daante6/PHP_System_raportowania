<?php
//Ustawienia poczatkowe (wczytywanie biblioteki/komend, czcionek itp)

require("connect.php");

$cykl = 0;
$czas = 26700; //jedna zmiana
$OEE1 = 0; //OEE pierwszej zmiany itp
$OEE2 = 0;
$OEE3 = 0;
$OEEsr = 0; //OEE œrednie
$bilans = 0; // +- dzieñ
$sr = 0; //dzielnik, do liczenia œredniej balansu sztuk
$sr2 = 0; //dzielnik do BA600
$srTD = 0; // dzielnik Tecno Delta
$srBA4 = 0; //dzielnik SW BA400
$srBracket = 0; //dzielnik Bracket

//tabela wed³ug projektów
$projekty=array("0"=>"0", "1"=>"0", "2"=>"0", "3"=>"0", "4"=>"0", "5"=>"0", "6"=>"0", "7"=>"0", "8"=>"0", "9"=>"0", "10"=>"0", "11"=>"0");
$projekt=0;

$kom1 = 32; //szerokoœæ 1. kolumny, np "Plan:"
$kom2 = 10; //szerokoœæ 2. kolumny, np "1ZM, suma"
$kom3 = 10; //szerokoœæ 3. kolumny, dane liczbowe

require("fpdf/fpdf.php");
$pdf=new FPDF('L','mm','A3');
$pdf->AddPage();
$pdf->SetFont("Arial","",16);
// $x i $y to polozenie wskaznika ; $startx i $starty to lewy górny róg
$x = $pdf->GetX(); $y = $pdf->GetY();
$startx = $pdf->GetX(); $starty = $pdf->GetY();

//tytul i data
$pdf->Cell(40,10,"Raport Op. 10",1,0,"L");
$pdf->SetXY($x+300, $y);
$pdf->Cell(60,10,"Dnia   ".$_POST['date'],1,0,"L");          

//+57 na kolejna kolumne: 18,75,132,189,246,303,360      $startx + x
//+70 na kolejny wiersz: 15,85,155						 $starty + y

// SM 57
//rysowanie tabelek
$sumSM57=$_POST['SM571']+$_POST['SM572']+$_POST['SM573'];
$bilans = 0;
$pdf->SetXY($startx+303, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 57",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM571'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM572'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM573'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM57,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM57'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM571'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM572'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM573'],1,0,"R",true);

if($_POST['opt2SM57']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM57'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM571'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM572'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM573'],1,0,"R",true);
}
if($_POST['opt3SM57']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM57'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM571'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM572'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM573'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM57=$_POST['opt1SM571']+$_POST['opt1SM572']+$_POST['opt1SM573']+$_POST['opt2SM571']+$_POST['opt2SM572']+$_POST['opt2SM573']+$_POST['opt3SM571']+$_POST['opt3SM572']+$_POST['opt3SM573'];
$pdf->Cell($kom3,3,$sztukSM57,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM57-$sumSM57;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `sm57`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM57']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM571']+$_POST['opt1SM572']+$_POST['opt1SM573'];
}
	$OEE1+=$cykl*$_POST['opt1SM571'];
	$OEE2+=$cykl*$_POST['opt1SM572'];
	$OEE3+=$cykl*$_POST['opt1SM573'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `sm57`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM57']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM571']+$_POST['opt2SM572']+$_POST['opt2SM573'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM571'];
	$OEE2+=$cykl*$_POST['opt2SM572'];
	$OEE3+=$cykl*$_POST['opt2SM573'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `sm57`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM57']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM571']+$_POST['opt3SM572']+$_POST['opt3SM573'];
}	

	$OEE1+=$cykl*$_POST['opt3SM571'];
	$OEE2+=$cykl*$_POST['opt3SM572'];
	$OEE3+=$cykl*$_POST['opt3SM573'];
	
if($_POST['tSM571']!=0){
	$OEE1=100*$OEE1/($_POST['tSM571']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM572']!=0){
	$OEE2=100*$OEE2/($_POST['tSM572']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM573']!=0){
	$OEE3=100*$OEE3/($_POST['tSM573']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srBA4+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM57=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM571']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM572']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM573']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM571']+$_POST['tSM572']+$_POST['tSM573']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 61
$sumSM61=$_POST['SM611']+$_POST['SM612']+$_POST['SM613'];
$bilans = 0;
$pdf->SetXY($startx+189, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 61",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM611'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM612'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM613'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM61,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM61'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM611'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM612'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM613'],1,0,"R",true);

if($_POST['opt2SM61']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM61'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM611'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM612'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM613'],1,0,"R",true);
}
if($_POST['opt3SM61']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM61'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM611'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM612'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM613'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM61=$_POST['opt1SM611']+$_POST['opt1SM612']+$_POST['opt1SM613']+$_POST['opt2SM611']+$_POST['opt2SM612']+$_POST['opt2SM613']+$_POST['opt3SM611']+$_POST['opt3SM612']+$_POST['opt3SM613'];
$pdf->Cell($kom3,3,$sztukSM61,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM61-$sumSM61;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM61`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM61']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM611']+$_POST['opt1SM612']+$_POST['opt1SM613'];
}
	$OEE1+=$cykl*$_POST['opt1SM611'];
	$OEE2+=$cykl*$_POST['opt1SM612'];
	$OEE3+=$cykl*$_POST['opt1SM613'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM61`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM61']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM611']+$_POST['opt2SM612']+$_POST['opt2SM613'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM611'];
	$OEE2+=$cykl*$_POST['opt2SM612'];
	$OEE3+=$cykl*$_POST['opt2SM613'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM61`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM61']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM611']+$_POST['opt3SM612']+$_POST['opt3SM613'];
}	

	$OEE1+=$cykl*$_POST['opt3SM611'];
	$OEE2+=$cykl*$_POST['opt3SM612'];
	$OEE3+=$cykl*$_POST['opt3SM613'];
	
if($_POST['tSM611']!=0){
	$OEE1=100*$OEE1/($_POST['tSM611']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM612']!=0){
	$OEE2=100*$OEE2/($_POST['tSM612']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM613']!=0){
	$OEE3=100*$OEE3/($_POST['tSM613']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srBA4+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM61=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM611']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM612']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM613']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM611']+$_POST['tSM612']+$_POST['tSM613']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM 62
$sumSM62=$_POST['SM621']+$_POST['SM622']+$_POST['SM623'];
$bilans = 0;
$pdf->SetXY($startx+18, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 62",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM621'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM622'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM623'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM62,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM62'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM621'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM622'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM623'],1,0,"R",true);

if($_POST['opt2SM62']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM62'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM621'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM622'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM623'],1,0,"R",true);
}
if($_POST['opt3SM62']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM62'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM621'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM622'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM623'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM62=$_POST['opt1SM621']+$_POST['opt1SM622']+$_POST['opt1SM623']+$_POST['opt2SM621']+$_POST['opt2SM622']+$_POST['opt2SM623']+$_POST['opt3SM621']+$_POST['opt3SM622']+$_POST['opt3SM623'];
$pdf->Cell($kom3,3,$sztukSM62,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM62-$sumSM62;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM62`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM62']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM621']+$_POST['opt1SM622']+$_POST['opt1SM623'];
}
	$OEE1+=$cykl*$_POST['opt1SM621'];
	$OEE2+=$cykl*$_POST['opt1SM622'];
	$OEE3+=$cykl*$_POST['opt1SM623'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM62`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM62']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM621']+$_POST['opt2SM622']+$_POST['opt2SM623'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM621'];
	$OEE2+=$cykl*$_POST['opt2SM622'];
	$OEE3+=$cykl*$_POST['opt2SM623'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM62`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM62']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM621']+$_POST['opt3SM622']+$_POST['opt3SM623'];
}	

	$OEE1+=$cykl*$_POST['opt3SM621'];
	$OEE2+=$cykl*$_POST['opt3SM622'];
	$OEE3+=$cykl*$_POST['opt3SM623'];
	
if($_POST['tSM621']!=0){
	$OEE1=100*$OEE1/($_POST['tSM621']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM622']!=0){
	$OEE2=100*$OEE2/($_POST['tSM622']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM623']!=0){
	$OEE3=100*$OEE3/($_POST['tSM623']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM62=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM621']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM622']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM623']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM621']+$_POST['tSM622']+$_POST['tSM623']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 66
$sumSM66=$_POST['SM661']+$_POST['SM662']+$_POST['SM663'];
$bilans = 0;
$pdf->SetXY($startx+18, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 66",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM661'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM662'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM663'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM66,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM66'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM661'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM662'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM663'],1,0,"R",true);

if($_POST['opt2SM66']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM66'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM661'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM662'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM663'],1,0,"R",true);
}
if($_POST['opt3SM66']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM66'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM661'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM662'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM663'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM66=$_POST['opt1SM661']+$_POST['opt1SM662']+$_POST['opt1SM663']+$_POST['opt2SM661']+$_POST['opt2SM662']+$_POST['opt2SM663']+$_POST['opt3SM661']+$_POST['opt3SM662']+$_POST['opt3SM663'];
$pdf->Cell($kom3,3,$sztukSM66,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM66-$sumSM66;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM66`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM66']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM661']+$_POST['opt1SM662']+$_POST['opt1SM663'];
}
	$OEE1+=$cykl*$_POST['opt1SM661'];
	$OEE2+=$cykl*$_POST['opt1SM662'];
	$OEE3+=$cykl*$_POST['opt1SM663'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM66`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM66']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM661']+$_POST['opt2SM662']+$_POST['opt2SM663'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM661'];
	$OEE2+=$cykl*$_POST['opt2SM662'];
	$OEE3+=$cykl*$_POST['opt2SM663'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM66`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM66']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM661']+$_POST['opt3SM662']+$_POST['opt3SM663'];
}	

	$OEE1+=$cykl*$_POST['opt3SM661'];
	$OEE2+=$cykl*$_POST['opt3SM662'];
	$OEE3+=$cykl*$_POST['opt3SM663'];
if($_POST['tSM661']!=0){
	$OEE1=100*$OEE1/($_POST['tSM661']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM662']!=0){
	$OEE2=100*$OEE2/($_POST['tSM662']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM663']!=0){
	$OEE3=100*$OEE3/($_POST['tSM663']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM66=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM661']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM662']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM663']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM661']+$_POST['tSM662']+$_POST['tSM663']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM 74
$sumSM74=$_POST['SM741']+$_POST['SM742']+$_POST['SM743'];
$bilans = 0;
$pdf->SetXY($startx+246, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 74",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM741'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM742'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM743'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM74,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM74'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM741'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM742'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM743'],1,0,"R",true);

if($_POST['opt2SM74']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM74'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM741'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM742'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM743'],1,0,"R",true);
}
if($_POST['opt3SM74']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM74'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM741'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM742'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM743'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM74=$_POST['opt1SM741']+$_POST['opt1SM742']+$_POST['opt1SM743']+$_POST['opt2SM741']+$_POST['opt2SM742']+$_POST['opt2SM743']+$_POST['opt3SM741']+$_POST['opt3SM742']+$_POST['opt3SM743'];
$pdf->Cell($kom3,3,$sztukSM74,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM74-$sumSM74;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM74`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM74']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM741']+$_POST['opt1SM742']+$_POST['opt1SM743'];
}
	$OEE1+=$cykl*$_POST['opt1SM741'];
	$OEE2+=$cykl*$_POST['opt1SM742'];
	$OEE3+=$cykl*$_POST['opt1SM743'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM74`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM74']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM741']+$_POST['opt2SM742']+$_POST['opt2SM743'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM741'];
	$OEE2+=$cykl*$_POST['opt2SM742'];
	$OEE3+=$cykl*$_POST['opt2SM743'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM74`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM74']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM741']+$_POST['opt3SM742']+$_POST['opt3SM743'];
}	

	$OEE1+=$cykl*$_POST['opt3SM741'];
	$OEE2+=$cykl*$_POST['opt3SM742'];
	$OEE3+=$cykl*$_POST['opt3SM743'];
if($_POST['tSM741']!=0){
	$OEE1=100*$OEE1/($_POST['tSM741']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM742']!=0){
	$OEE2=100*$OEE2/($_POST['tSM742']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM743']!=0){
	$OEE3=100*$OEE3/($_POST['tSM743']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srBA4+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM74=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM741']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM742']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM743']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM741']+$_POST['tSM742']+$_POST['tSM743']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM 81
$sumSM81=$_POST['SM811']+$_POST['SM812']+$_POST['SM813'];
$bilans = 0;
$pdf->SetXY($startx+132, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 81",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM811'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM812'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM813'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM81,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM81'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM811'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM812'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM813'],1,0,"R",true);

if($_POST['opt2SM81']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM81'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM811'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM812'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM813'],1,0,"R",true);
}
if($_POST['opt3SM81']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM81'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM811'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM812'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM813'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM81=$_POST['opt1SM811']+$_POST['opt1SM812']+$_POST['opt1SM813']+$_POST['opt2SM811']+$_POST['opt2SM812']+$_POST['opt2SM813']+$_POST['opt3SM811']+$_POST['opt3SM812']+$_POST['opt3SM813'];
$pdf->Cell($kom3,3,$sztukSM81,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM81-$sumSM81;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM81`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM81']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM811']+$_POST['opt1SM812']+$_POST['opt1SM813'];
}
	$OEE1+=$cykl*$_POST['opt1SM811'];
	$OEE2+=$cykl*$_POST['opt1SM812'];
	$OEE3+=$cykl*$_POST['opt1SM813'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM81`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM81']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM811']+$_POST['opt2SM812']+$_POST['opt2SM813'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM811'];
	$OEE2+=$cykl*$_POST['opt2SM812'];
	$OEE3+=$cykl*$_POST['opt2SM813'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM81`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM81']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM811']+$_POST['opt3SM812']+$_POST['opt3SM813'];
}	

	$OEE1+=$cykl*$_POST['opt3SM811'];
	$OEE2+=$cykl*$_POST['opt3SM812'];
	$OEE3+=$cykl*$_POST['opt3SM813'];
if($_POST['tSM811']!=0){
	$OEE1=100*$OEE1/($_POST['tSM811']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM812']!=0){
	$OEE2=100*$OEE2/($_POST['tSM812']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM813']!=0){
	$OEE3=100*$OEE3/($_POST['tSM813']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM81=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM811']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM812']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM813']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM811']+$_POST['tSM812']+$_POST['tSM813']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM 82
$sumSM82=$_POST['SM821']+$_POST['SM822']+$_POST['SM823'];
$bilans = 0;
$pdf->SetXY($startx+132, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 82",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM821'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM822'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM823'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM82,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM82'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM821'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM822'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM823'],1,0,"R",true);

if($_POST['opt2SM82']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM82'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM821'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM822'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM823'],1,0,"R",true);
}
if($_POST['opt3SM82']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM82'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM821'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM822'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM823'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM82=$_POST['opt1SM821']+$_POST['opt1SM822']+$_POST['opt1SM823']+$_POST['opt2SM821']+$_POST['opt2SM822']+$_POST['opt2SM823']+$_POST['opt3SM821']+$_POST['opt3SM822']+$_POST['opt3SM823'];
$pdf->Cell($kom3,3,$sztukSM82,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM82-$sumSM82;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM82`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM82']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM821']+$_POST['opt1SM822']+$_POST['opt1SM823'];
}
	$OEE1+=$cykl*$_POST['opt1SM821'];
	$OEE2+=$cykl*$_POST['opt1SM822'];
	$OEE3+=$cykl*$_POST['opt1SM823'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM82`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM82']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM821']+$_POST['opt2SM822']+$_POST['opt2SM823'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM821'];
	$OEE2+=$cykl*$_POST['opt2SM822'];
	$OEE3+=$cykl*$_POST['opt2SM823'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM82`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM82']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM821']+$_POST['opt3SM822']+$_POST['opt3SM823'];
}	

	$OEE1+=$cykl*$_POST['opt3SM821'];
	$OEE2+=$cykl*$_POST['opt3SM822'];
	$OEE3+=$cykl*$_POST['opt3SM823'];
	
	if($_POST['tSM821']!=0){
	$OEE1=100*$OEE1/($_POST['tSM821']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM822']!=0){
	$OEE2=100*$OEE2/($_POST['tSM822']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM823']!=0){
	$OEE3=100*$OEE3/($_POST['tSM823']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM82=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM821']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM822']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM823']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM821']+$_POST['tSM822']+$_POST['tSM823']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 83
$sumSM83=$_POST['SM831']+$_POST['SM832']+$_POST['SM833'];
$bilans = 0;
$pdf->SetXY($startx+75, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 83",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM831'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM832'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM833'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM83,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM83'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM831'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM832'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM833'],1,0,"R",true);

if($_POST['opt2SM83']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM83'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM831'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM832'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM833'],1,0,"R",true);
}
if($_POST['opt3SM83']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM83'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM831'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM832'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM833'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM83=$_POST['opt1SM831']+$_POST['opt1SM832']+$_POST['opt1SM833']+$_POST['opt2SM831']+$_POST['opt2SM832']+$_POST['opt2SM833']+$_POST['opt3SM831']+$_POST['opt3SM832']+$_POST['opt3SM833'];
$pdf->Cell($kom3,3,$sztukSM83,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM83-$sumSM83;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM83`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM83']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM831']+$_POST['opt1SM832']+$_POST['opt1SM833'];
}
	$OEE1+=$cykl*$_POST['opt1SM831'];
	$OEE2+=$cykl*$_POST['opt1SM832'];
	$OEE3+=$cykl*$_POST['opt1SM833'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM83`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM83']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM831']+$_POST['opt2SM832']+$_POST['opt2SM833'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM831'];
	$OEE2+=$cykl*$_POST['opt2SM832'];
	$OEE3+=$cykl*$_POST['opt2SM833'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM83`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM83']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM831']+$_POST['opt3SM832']+$_POST['opt3SM833'];
}	

	$OEE1+=$cykl*$_POST['opt3SM831'];
	$OEE2+=$cykl*$_POST['opt3SM832'];
	$OEE3+=$cykl*$_POST['opt3SM833'];
if($_POST['tSM831']!=0){
	$OEE1=100*$OEE1/($_POST['tSM831']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM832']!=0){
	$OEE2=100*$OEE2/($_POST['tSM832']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM833']!=0){
	$OEE3=100*$OEE3/($_POST['tSM833']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM83=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM831']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM832']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM833']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM831']+$_POST['tSM832']+$_POST['tSM833']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 86
$sumSM86=$_POST['SM861']+$_POST['SM862']+$_POST['SM863'];
$bilans = 0;
$pdf->SetXY($startx+75, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 86",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM861'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM862'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM863'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM86,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM86'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM861'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM862'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM863'],1,0,"R",true);

if($_POST['opt2SM86']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM86'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM861'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM862'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM863'],1,0,"R",true);
}
if($_POST['opt3SM86']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM86'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM861'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM862'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM863'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM86=$_POST['opt1SM861']+$_POST['opt1SM862']+$_POST['opt1SM863']+$_POST['opt2SM861']+$_POST['opt2SM862']+$_POST['opt2SM863']+$_POST['opt3SM861']+$_POST['opt3SM862']+$_POST['opt3SM863'];
$pdf->Cell($kom3,3,$sztukSM86,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM86-$sumSM86;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM86`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM86']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM861']+$_POST['opt1SM862']+$_POST['opt1SM863'];
}
	$OEE1+=$cykl*$_POST['opt1SM861'];
	$OEE2+=$cykl*$_POST['opt1SM862'];
	$OEE3+=$cykl*$_POST['opt1SM863'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM86`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM86']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM861']+$_POST['opt2SM862']+$_POST['opt2SM863'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM861'];
	$OEE2+=$cykl*$_POST['opt2SM862'];
	$OEE3+=$cykl*$_POST['opt2SM863'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM86`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM86']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM861']+$_POST['opt3SM862']+$_POST['opt3SM863'];
}	

	$OEE1+=$cykl*$_POST['opt3SM861'];
	$OEE2+=$cykl*$_POST['opt3SM862'];
	$OEE3+=$cykl*$_POST['opt3SM863'];
	
	if($_POST['tSM861']!=0){
	$OEE1=100*$OEE1/($_POST['tSM861']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM862']!=0){
	$OEE2=100*$OEE2/($_POST['tSM862']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM863']!=0){
	$OEE3=100*$OEE3/($_POST['tSM863']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM86=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM861']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM862']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM863']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM861']+$_POST['tSM862']+$_POST['tSM863']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 89
$sumSM89=$_POST['SM891']+$_POST['SM892']+$_POST['SM893'];
$bilans = 0;
$pdf->SetXY($startx+246, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 89",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM891'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM892'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM893'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM89,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM89'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM891'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM892'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM893'],1,0,"R",true);

if($_POST['opt2SM89']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM89'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM891'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM892'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM893'],1,0,"R",true);
}
if($_POST['opt3SM89']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM89'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM891'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM892'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM893'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM89=$_POST['opt1SM891']+$_POST['opt1SM892']+$_POST['opt1SM893']+$_POST['opt2SM891']+$_POST['opt2SM892']+$_POST['opt2SM893']+$_POST['opt3SM891']+$_POST['opt3SM892']+$_POST['opt3SM893'];
$pdf->Cell($kom3,3,$sztukSM89,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM89-$sumSM89;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM89`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM89']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM891']+$_POST['opt1SM892']+$_POST['opt1SM893'];
}
	$OEE1+=$cykl*$_POST['opt1SM891'];
	$OEE2+=$cykl*$_POST['opt1SM892'];
	$OEE3+=$cykl*$_POST['opt1SM893'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM89`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM89']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM891']+$_POST['opt2SM892']+$_POST['opt2SM893'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM891'];
	$OEE2+=$cykl*$_POST['opt2SM892'];
	$OEE3+=$cykl*$_POST['opt2SM893'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM89`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM89']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM891']+$_POST['opt3SM892']+$_POST['opt3SM893'];
}	

	$OEE1+=$cykl*$_POST['opt3SM891'];
	$OEE2+=$cykl*$_POST['opt3SM892'];
	$OEE3+=$cykl*$_POST['opt3SM893'];
	
if($_POST['tSM891']!=0){
	$OEE1=100*$OEE1/($_POST['tSM891']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM892']!=0){
	$OEE2=100*$OEE2/($_POST['tSM892']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM893']!=0){
	$OEE3=100*$OEE3/($_POST['tSM893']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM89=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM891']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM892']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM893']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM891']+$_POST['tSM892']+$_POST['tSM893']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM 90
$sumSM90=$_POST['SM901']+$_POST['SM902']+$_POST['SM903'];
$bilans = 0;
$pdf->SetXY($startx+246, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 90",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM901'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM902'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM903'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM90,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM90'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM901'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM902'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM903'],1,0,"R",true);

if($_POST['opt2SM90']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM90'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM901'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM902'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM903'],1,0,"R",true);
}
if($_POST['opt3SM90']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM90'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM901'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM902'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM903'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM90=$_POST['opt1SM901']+$_POST['opt1SM902']+$_POST['opt1SM903']+$_POST['opt2SM901']+$_POST['opt2SM902']+$_POST['opt2SM903']+$_POST['opt3SM901']+$_POST['opt3SM902']+$_POST['opt3SM903'];
$pdf->Cell($kom3,3,$sztukSM90,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM90-$sumSM90;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM90`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM90']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM901']+$_POST['opt1SM902']+$_POST['opt1SM903'];
}
	$OEE1+=$cykl*$_POST['opt1SM901'];
	$OEE2+=$cykl*$_POST['opt1SM902'];
	$OEE3+=$cykl*$_POST['opt1SM903'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM90`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM90']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM901']+$_POST['opt2SM902']+$_POST['opt2SM903'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM901'];
	$OEE2+=$cykl*$_POST['opt2SM902'];
	$OEE3+=$cykl*$_POST['opt2SM903'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM90`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM90']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM901']+$_POST['opt3SM902']+$_POST['opt3SM903'];
}	

	$OEE1+=$cykl*$_POST['opt3SM901'];
	$OEE2+=$cykl*$_POST['opt3SM902'];
	$OEE3+=$cykl*$_POST['opt3SM903'];
if($_POST['tSM901']!=0){
	$OEE1=100*$OEE1/($_POST['tSM901']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM902']!=0){
	$OEE2=100*$OEE2/($_POST['tSM902']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM903']!=0){
	$OEE3=100*$OEE3/($_POST['tSM903']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM90=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM901']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM902']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM903']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM901']+$_POST['tSM902']+$_POST['tSM903']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 91
$sumSM91=$_POST['SM911']+$_POST['SM912']+$_POST['SM913'];
$bilans = 0;
$pdf->SetXY($startx+303, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 91",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM911'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM912'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM913'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM91,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM91'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM911'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM912'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM913'],1,0,"R",true);

if($_POST['opt2SM91']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM91'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM911'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM912'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM913'],1,0,"R",true);
}
if($_POST['opt3SM91']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM91'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM911'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM912'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM913'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM91=$_POST['opt1SM911']+$_POST['opt1SM912']+$_POST['opt1SM913']+$_POST['opt2SM911']+$_POST['opt2SM912']+$_POST['opt2SM913']+$_POST['opt3SM911']+$_POST['opt3SM912']+$_POST['opt3SM913'];
$pdf->Cell($kom3,3,$sztukSM91,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM91-$sumSM91;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM91`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM91']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM911']+$_POST['opt1SM912']+$_POST['opt1SM913'];
}
	$OEE1+=$cykl*$_POST['opt1SM911'];
	$OEE2+=$cykl*$_POST['opt1SM912'];
	$OEE3+=$cykl*$_POST['opt1SM913'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM91`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM91']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM911']+$_POST['opt2SM912']+$_POST['opt2SM913'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM911'];
	$OEE2+=$cykl*$_POST['opt2SM912'];
	$OEE3+=$cykl*$_POST['opt2SM913'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM91`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM91']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM911']+$_POST['opt3SM912']+$_POST['opt3SM913'];
}	

	$OEE1+=$cykl*$_POST['opt3SM911'];
	$OEE2+=$cykl*$_POST['opt3SM912'];
	$OEE3+=$cykl*$_POST['opt3SM913'];
if($_POST['tSM911']!=0){
	$OEE1=100*$OEE1/($_POST['tSM911']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM912']!=0){
	$OEE2=100*$OEE2/($_POST['tSM912']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM913']!=0){
	$OEE3=100*$OEE3/($_POST['tSM913']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM91=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM911']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM912']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM913']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM911']+$_POST['tSM912']+$_POST['tSM913']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 92
$sumSM92=$_POST['SM921']+$_POST['SM922']+$_POST['SM923'];
$bilans = 0;
$pdf->SetXY($startx+303, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 92",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM921'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM922'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM923'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM92,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM92'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM921'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM922'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM923'],1,0,"R",true);

if($_POST['opt2SM92']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM92'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM921'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM922'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM923'],1,0,"R",true);
}
if($_POST['opt3SM92']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM92'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM921'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM922'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM923'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM92=$_POST['opt1SM921']+$_POST['opt1SM922']+$_POST['opt1SM923']+$_POST['opt2SM921']+$_POST['opt2SM922']+$_POST['opt2SM923']+$_POST['opt3SM921']+$_POST['opt3SM922']+$_POST['opt3SM923'];
$pdf->Cell($kom3,3,$sztukSM92,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM92-$sumSM92;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM92`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM92']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM921']+$_POST['opt1SM922']+$_POST['opt1SM923'];
}
	$OEE1+=$cykl*$_POST['opt1SM921'];
	$OEE2+=$cykl*$_POST['opt1SM922'];
	$OEE3+=$cykl*$_POST['opt1SM923'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM92`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM92']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM921']+$_POST['opt2SM922']+$_POST['opt2SM923'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM921'];
	$OEE2+=$cykl*$_POST['opt2SM922'];
	$OEE3+=$cykl*$_POST['opt2SM923'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM92`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM92']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM921']+$_POST['opt3SM922']+$_POST['opt3SM923'];
}	

	$OEE1+=$cykl*$_POST['opt3SM921'];
	$OEE2+=$cykl*$_POST['opt3SM922'];
	$OEE3+=$cykl*$_POST['opt3SM923'];
if($_POST['tSM921']!=0){
	$OEE1=100*$OEE1/($_POST['tSM921']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM922']!=0){
	$OEE2=100*$OEE2/($_POST['tSM922']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM923']!=0){
	$OEE3=100*$OEE3/($_POST['tSM923']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM92=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM921']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM922']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM923']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM921']+$_POST['tSM922']+$_POST['tSM923']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 93
$sumSM93=$_POST['SM931']+$_POST['SM932']+$_POST['SM933'];
$bilans = 0;
$pdf->SetXY($startx+189, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 93",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM931'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM932'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM933'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM93,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM93'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM931'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM932'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM933'],1,0,"R",true);

if($_POST['opt2SM93']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM93'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM931'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM932'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM933'],1,0,"R",true);
}
if($_POST['opt3SM93']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM93'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM931'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM932'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM933'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM93=$_POST['opt1SM931']+$_POST['opt1SM932']+$_POST['opt1SM933']+$_POST['opt2SM931']+$_POST['opt2SM932']+$_POST['opt2SM933']+$_POST['opt3SM931']+$_POST['opt3SM932']+$_POST['opt3SM933'];
$pdf->Cell($kom3,3,$sztukSM93,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM93-$sumSM93;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM93`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM93']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM931']+$_POST['opt1SM932']+$_POST['opt1SM933'];
}
	$OEE1+=$cykl*$_POST['opt1SM931'];
	$OEE2+=$cykl*$_POST['opt1SM932'];
	$OEE3+=$cykl*$_POST['opt1SM933'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM93`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM93']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM931']+$_POST['opt2SM932']+$_POST['opt2SM933'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM931'];
	$OEE2+=$cykl*$_POST['opt2SM932'];
	$OEE3+=$cykl*$_POST['opt2SM933'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM93`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM93']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM931']+$_POST['opt3SM932']+$_POST['opt3SM933'];
}	

	$OEE1+=$cykl*$_POST['opt3SM931'];
	$OEE2+=$cykl*$_POST['opt3SM932'];
	$OEE3+=$cykl*$_POST['opt3SM933'];
if($_POST['tSM931']!=0){
	$OEE1=100*$OEE1/($_POST['tSM931']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM932']!=0){
	$OEE2=100*$OEE2/($_POST['tSM932']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM933']!=0){
	$OEE3=100*$OEE3/($_POST['tSM933']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM93=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM931']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM932']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM933']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM931']+$_POST['tSM932']+$_POST['tSM933']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 94
$sumSM94=$_POST['SM941']+$_POST['SM942']+$_POST['SM943'];
$bilans = 0;
$pdf->SetXY($startx+189, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 94",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM941'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM942'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM943'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM94,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM94'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM941'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM942'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM943'],1,0,"R",true);

if($_POST['opt2SM94']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM94'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM941'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM942'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM943'],1,0,"R",true);
}
if($_POST['opt3SM94']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM94'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM941'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM942'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM943'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM94=$_POST['opt1SM941']+$_POST['opt1SM942']+$_POST['opt1SM943']+$_POST['opt2SM941']+$_POST['opt2SM942']+$_POST['opt2SM943']+$_POST['opt3SM941']+$_POST['opt3SM942']+$_POST['opt3SM943'];
$pdf->Cell($kom3,3,$sztukSM94,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM94-$sumSM94;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM94`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM94']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM941']+$_POST['opt1SM942']+$_POST['opt1SM943'];
}
	$OEE1+=$cykl*$_POST['opt1SM941'];
	$OEE2+=$cykl*$_POST['opt1SM942'];
	$OEE3+=$cykl*$_POST['opt1SM943'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM94`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM94']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM941']+$_POST['opt2SM942']+$_POST['opt2SM943'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM941'];
	$OEE2+=$cykl*$_POST['opt2SM942'];
	$OEE3+=$cykl*$_POST['opt2SM943'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM94`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM94']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM941']+$_POST['opt3SM942']+$_POST['opt3SM943'];
}	

	$OEE1+=$cykl*$_POST['opt3SM941'];
	$OEE2+=$cykl*$_POST['opt3SM942'];
	$OEE3+=$cykl*$_POST['opt3SM943'];
if($_POST['tSM941']!=0){
	$OEE1=100*$OEE1/($_POST['tSM941']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM942']!=0){
	$OEE2=100*$OEE2/($_POST['tSM942']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM943']!=0){
	$OEE3=100*$OEE3/($_POST['tSM943']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$sr2+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM94=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM941']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM942']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM943']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM941']+$_POST['tSM942']+$_POST['tSM943']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 95
$sumSM95=$_POST['SM951']+$_POST['SM952']+$_POST['SM953'];
$bilans = 0;
$pdf->SetXY($startx+18, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 95",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM951'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM952'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM953'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM95,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM95'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM951'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM952'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM953'],1,0,"R",true);

if($_POST['opt2SM95']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM95'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM951'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM952'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM953'],1,0,"R",true);
}
if($_POST['opt3SM95']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM95'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM951'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM952'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM953'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM95=$_POST['opt1SM951']+$_POST['opt1SM952']+$_POST['opt1SM953']+$_POST['opt2SM951']+$_POST['opt2SM952']+$_POST['opt2SM953']+$_POST['opt3SM951']+$_POST['opt3SM952']+$_POST['opt3SM953'];
$pdf->Cell($kom3,3,$sztukSM95,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM95-$sumSM95;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM95`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM95']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM951']+$_POST['opt1SM952']+$_POST['opt1SM953'];
}
	$OEE1+=$cykl*$_POST['opt1SM951'];
	$OEE2+=$cykl*$_POST['opt1SM952'];
	$OEE3+=$cykl*$_POST['opt1SM953'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM95`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM95']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM951']+$_POST['opt2SM952']+$_POST['opt2SM953'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM951'];
	$OEE2+=$cykl*$_POST['opt2SM952'];
	$OEE3+=$cykl*$_POST['opt2SM953'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM95`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM95']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM951']+$_POST['opt3SM952']+$_POST['opt3SM953'];
}	

	$OEE1+=$cykl*$_POST['opt3SM951'];
	$OEE2+=$cykl*$_POST['opt3SM952'];
	$OEE3+=$cykl*$_POST['opt3SM953'];
if($_POST['tSM951']!=0){
	$OEE1=100*$OEE1/($_POST['tSM951']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM952']!=0){
	$OEE2=100*$OEE2/($_POST['tSM952']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM953']!=0){
	$OEE3=100*$OEE3/($_POST['tSM953']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srTD+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM95=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM951']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM952']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM953']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM951']+$_POST['tSM952']+$_POST['tSM953']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM 96
$sumSM96=$_POST['SM961']+$_POST['SM962']+$_POST['SM963'];
$bilans = 0;
$pdf->SetXY($startx+75, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 96",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM961'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM962'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM963'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM96,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM96'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM961'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM962'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM963'],1,0,"R",true);

if($_POST['opt2SM96']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM96'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM961'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM962'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM963'],1,0,"R",true);
}
if($_POST['opt3SM96']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM96'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM961'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM962'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM963'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM96=$_POST['opt1SM961']+$_POST['opt1SM962']+$_POST['opt1SM963']+$_POST['opt2SM961']+$_POST['opt2SM962']+$_POST['opt2SM963']+$_POST['opt3SM961']+$_POST['opt3SM962']+$_POST['opt3SM963'];
$pdf->Cell($kom3,3,$sztukSM96,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM96-$sumSM96;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM96`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM96']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM961']+$_POST['opt1SM962']+$_POST['opt1SM963'];
}
	$OEE1+=$cykl*$_POST['opt1SM961'];
	$OEE2+=$cykl*$_POST['opt1SM962'];
	$OEE3+=$cykl*$_POST['opt1SM963'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM96`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM96']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM961']+$_POST['opt2SM962']+$_POST['opt2SM963'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM961'];
	$OEE2+=$cykl*$_POST['opt2SM962'];
	$OEE3+=$cykl*$_POST['opt2SM963'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM96`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM96']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM961']+$_POST['opt3SM962']+$_POST['opt3SM963'];
}	

	$OEE1+=$cykl*$_POST['opt3SM961'];
	$OEE2+=$cykl*$_POST['opt3SM962'];
	$OEE3+=$cykl*$_POST['opt3SM963'];
if($_POST['tSM961']!=0){
	$OEE1=100*$OEE1/($_POST['tSM961']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM962']!=0){
	$OEE2=100*$OEE2/($_POST['tSM962']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM963']!=0){
	$OEE3=100*$OEE3/($_POST['tSM963']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srTD+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM96=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM961']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tSM962']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tSM963']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tSM961']+$_POST['tSM962']+$_POST['tSM963']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// PP2
$sumPP2=$_POST['PP21']+$_POST['PP22']+$_POST['PP23'];
$bilans = 0;
$pdf->SetXY($startx+360, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"PP 2",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['PP21'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['PP22'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['PP23'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumPP2,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1PP2'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1PP21'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1PP22'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1PP23'],1,0,"R",true);

if($_POST['opt2PP2']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2PP2'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2PP21'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2PP22'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2PP23'],1,0,"R",true);
}
if($_POST['opt3PP2']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3PP2'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3PP21'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3PP22'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3PP23'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukPP2=$_POST['opt1PP21']+$_POST['opt1PP22']+$_POST['opt1PP23']+$_POST['opt2PP21']+$_POST['opt2PP22']+$_POST['opt2PP23']+$_POST['opt3PP21']+$_POST['opt3PP22']+$_POST['opt3PP23'];
$pdf->Cell($kom3,3,$sztukPP2,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukPP2-$sumPP2;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `PP2`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1PP2']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1PP21']+$_POST['opt1PP22']+$_POST['opt1PP23'];
}
	$OEE1+=$cykl*$_POST['opt1PP21'];
	$OEE2+=$cykl*$_POST['opt1PP22'];
	$OEE3+=$cykl*$_POST['opt1PP23'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `PP2`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2PP2']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2PP21']+$_POST['opt2PP22']+$_POST['opt2PP23'];
}	
	
	$OEE1+=$cykl*$_POST['opt2PP21'];
	$OEE2+=$cykl*$_POST['opt2PP22'];
	$OEE3+=$cykl*$_POST['opt2PP23'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `PP2`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3PP2']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3PP21']+$_POST['opt3PP22']+$_POST['opt3PP23'];
}	

	$OEE1+=$cykl*$_POST['opt3PP21'];
	$OEE2+=$cykl*$_POST['opt3PP22'];
	$OEE3+=$cykl*$_POST['opt3PP23'];
if($_POST['tPP21']!=0){
	$OEE1=100*$OEE1/($_POST['tPP21']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tPP22']!=0){
	$OEE2=100*$OEE2/($_POST['tPP22']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tPP23']!=0){
	$OEE3=100*$OEE3/($_POST['tPP23']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srBracket+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEEPP2=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tPP21']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tPP22']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tPP23']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tPP21']+$_POST['tPP22']+$_POST['tPP23']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// PP3
$sumPP3=$_POST['PP31']+$_POST['PP32']+$_POST['PP33'];
$bilans = 0;
$pdf->SetXY($startx+360, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"PP 3",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['PP31'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['PP32'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['PP33'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumPP3,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);

$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1PP3'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1PP31'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1PP32'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1PP33'],1,0,"R",true);

if($_POST['opt2PP3']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2PP3'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2PP31'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2PP32'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2PP33'],1,0,"R",true);
}
if($_POST['opt3PP3']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3PP3'],1,0,"L",true);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3PP31'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3PP32'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3PP33'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukPP3=$_POST['opt1PP31']+$_POST['opt1PP32']+$_POST['opt1PP33']+$_POST['opt2PP31']+$_POST['opt2PP32']+$_POST['opt2PP33']+$_POST['opt3PP31']+$_POST['opt3PP32']+$_POST['opt3PP33'];
$pdf->Cell($kom3,3,$sztukPP3,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukPP3-$sumPP3;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `PP3`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1PP3']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1PP31']+$_POST['opt1PP32']+$_POST['opt1PP33'];
}
	$OEE1+=$cykl*$_POST['opt1PP31'];
	$OEE2+=$cykl*$_POST['opt1PP32'];
	$OEE3+=$cykl*$_POST['opt1PP33'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `PP3`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2PP3']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2PP31']+$_POST['opt2PP32']+$_POST['opt2PP33'];
}	
	
	$OEE1+=$cykl*$_POST['opt2PP31'];
	$OEE2+=$cykl*$_POST['opt2PP32'];
	$OEE3+=$cykl*$_POST['opt2PP33'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `PP3`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3PP3']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3PP31']+$_POST['opt3PP32']+$_POST['opt3PP33'];
}	

	$OEE1+=$cykl*$_POST['opt3PP31'];
	$OEE2+=$cykl*$_POST['opt3PP32'];
	$OEE3+=$cykl*$_POST['opt3PP33'];
if($_POST['tPP31']!=0){
	$OEE1=100*$OEE1/($_POST['tPP31']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tPP32']!=0){
	$OEE2=100*$OEE2/($_POST['tPP32']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tPP33']!=0){
	$OEE3=100*$OEE3/($_POST['tPP33']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srBracket+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEEPP3=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tPP31']!=0){
	if($OEE1>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE1."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);

if($_POST['tPP32']!=0){
	if($OEE2>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE2."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);

if($_POST['tPP33']!=0){
	if($OEE3>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEE3."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->SetFillColor(102,163,255);
$pdf->Cell($kom2,3," suma ",1,0,"L",true);

if($_POST['tPP31']+$_POST['tPP32']+$_POST['tPP33']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

//TABELE DODATKOWE
$pdf->SetFont("Arial","",16);

//Balans sztuk
$sztuk=$sztukSM62+$sztukSM83+$sztukSM82+$sztukSM94+$sztukSM89+$sztukSM91+$sztukSM57+$sztukSM61+$sztukSM95+$sztukSM66+$sztukSM86+$sztukSM81+$sztukSM93+$sztukSM90+$sztukSM92+$sztukSM74+$sztukSM96;
$plan=$sumSM62+$sumSM83+$sumSM82+$sumSM94+$sumSM89+$sumSM91+$sumSM57+$sumSM61+$sumSM95+$sumSM66+$sumSM86+$sumSM81+$sumSM93+$sumSM90+$sumSM92+$sumSM74+$sumSM96;
$roznica=$sztuk-$plan;

$data=str_replace("-","",$_POST['date']);
$datax=0;
list($y,$m,$d)=explode('-',$_POST['date']);
$dzientyg = date("w",mktime(0,0,0,$m,$d,$y));

if($dzientyg == 0){
	$dzientyg=7;
}
$roznica7=$roznica;

for($i=1;$i<$dzientyg;$i++){
	$datax=$data-$i;
	$query2="SELECT plan FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
	$result2 = mysqli_query($conn, $query2);
	$row2 = mysqli_fetch_array($result2);
	$roznica7=$roznica7+$row2["plan"];
}


$pdf->SetXY($startx+15, $starty+230);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell(50,6,"Wyprodukowanych",1,0,"L",true);
$pdf->Cell(20,6,$sztuk,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-70, $y+6);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(50,6,"Plan",1,0,"L",true);
$pdf->Cell(20,6,$plan,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-70, $y+6);
$pdf->SetFillColor(255, 255, 102);
$pdf->Cell(50,6,"Roznica dzien",1,0,"L",true);
$pdf->Cell(20,6,$roznica,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-70, $y+6);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell(50,6,"Roznica tydzien",1,0,"L",true);
$pdf->Cell(20,6,$roznica7,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-70, $y+6);


//BA600
if($sr2!=0){
$OEEBA6=($OEESM62+$OEESM83+$OEESM82+$OEESM94+$OEESM89+$OEESM91+$OEESM66+$OEESM86+$OEESM81+$OEESM93+$OEESM90+$OEESM92)/$sr2;
}else{$OEEBA6=0;}
$pdf->SetXY($startx+100, $starty+230);
$pdf->SetFillColor(255, 255, 102);
$pdf->Cell(50,6,"BA600",1,0,"L",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-50, $y+6);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(30,6,"OEE",1,0,"L",true);
if($sr2!=0){
if($OEEBA6>80){
	$pdf->SetFillColor(10,180,80);
	}else{
	$pdf->SetFillColor(200,40,10);
	}
$OEEBA6=round($OEEBA6, 1);
$pdf->Cell(20,6,$OEEBA6."%",1,0,"R",true);
}else{$pdf->Cell(20,6,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

//Bracket
$sumBracket=$sumPP2+$sumPP3;
$sztukBracket=$sztukPP2+$sztukPP3;
$roznicaBracket=$sztukBracket-$sumBracket;
$pdf->SetXY($startx+170, $starty+230);
if($srBracket!=0){
$OEEBracket=($OEEPP2+$OEEPP3)/$srBracket;
}else{$OEEBracket=0;}
$pdf->SetFillColor(255, 92, 51);
$pdf->Cell(50,6,"Bracket",1,0,"L",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-50, $y+6);
$pdf->SetFillColor(230, 238, 235);
$pdf->Cell(30,6,"Plan",1,0,"L",true);
$pdf->Cell(20,6,$sumBracket,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-50, $y+6);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell(30,6,"Wykonanie",1,0,"L",true);
$pdf->Cell(20,6,$sztukBracket,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-50, $y+6);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell(30,6,"Roznica",1,0,"L",true);
$pdf->Cell(20,6,$roznicaBracket,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-50, $y+6);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(30,6,"OEE",1,0,"L",true);

if($srBracket!=0){
if($OEEBracket>80){
	$pdf->SetFillColor(10,180,80);
	}else{
	$pdf->SetFillColor(200,40,10);
	}
$OEEBracket=round($OEEBracket, 1);
$pdf->Cell(20,6,$OEEBracket."%",1,0,"R",true);
}else{$pdf->Cell(20,6,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

//SW BA400
$pdf->SetXY($startx+250, $starty+230);
$pdf->SetFillColor(255, 255, 128);
$pdf->Cell(50,6,"SW BA400",1,0,"L",true);
if($srBA4!=0){
$OEEBA4=($OEESM57+$OEESM61+$OEESM74)/$srBA4;
}else{$OEEBA4=0;}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-50, $y+6);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(30,6,"OEE",1,0,"L",true);
if($OEEBA4!=0){
if($OEEBA4>80){
	$pdf->SetFillColor(10,180,80);
	}else{
	$pdf->SetFillColor(200,40,10);
	}
$OEEBA4=round($OEEBA4, 1);
$pdf->Cell(20,6,$OEEBA4."%",1,0,"R",true);
}else{$pdf->Cell(20,6,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

//Tecno Delta
if($srTD!=0){
$OEETD=($OEESM95+$OEESM96)/$srTD;
}else{$OEETD=0;}
$pdf->SetXY($startx+330, $starty+230);
$pdf->SetFillColor(230, 238, 255);
$pdf->Cell(50,6,"Tecno Delta",1,0,"L",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-50, $y+6);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(30,6,"OEE",1,0,"L",true);
if($OEETD!=0){
if($OEETD>80){
	$pdf->SetFillColor(10,180,80);
	}else{
	$pdf->SetFillColor(200,40,10);
	}
$OEETD=round($OEETD, 1);
$pdf->Cell(20,6,$OEETD."%",1,0,"R",true);
}else{$pdf->Cell(20,6,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


//Nowa strona raportu
$pdf->AddPage();

$pdf->SetXY($startx, $starty);
$x = $pdf->GetX(); $y = $pdf->GetY();

$pdf->Cell(40,10,"Raport Op. 10",1,0,"L");
$pdf->SetXY($x+300, $y);
$pdf->Cell(60,10,"Dnia   ".$_POST['date'],1,0,"L");  



//Dzienne iloœci z podzia³em na projekty

//szerokoœci komórek
$w1=30; //nazwa + dzien tygodnia
$w2=50; //wspornik/korpus
$w3=20; // FA/RA
$h1=7; //wysokoœæ + jej wielokrotnoœci

$pdf->SetXY($x-400, $y+20);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell(310,$h1,"Dzienna produkcja na dane projekty",1,0,"L",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-310, $y+$h1);
$pdf->SetFillColor(230, 92, 0);
$pdf->Cell($w1+$w2+$w3,$h1,"",1,0,"L",true);
$pdf->Cell($w1,$h1,"PN",1,0,"L",true);
$pdf->Cell($w1,$h1,"WT",1,0,"L",true);
$pdf->Cell($w1,$h1,"SR",1,0,"L",true);
$pdf->Cell($w1,$h1,"CZW",1,0,"L",true);
$pdf->Cell($w1,$h1,"PT",1,0,"L",true);
$pdf->Cell($w1,$h1,"SB",1,0,"L",true);
$pdf->Cell($w1,$h1,"ND",1,0,"L",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-310, $y+$h1);
$pdf->SetFillColor(204, 153, 102); //NAZWA                            //IPS
$pdf->Cell($w1,$h1,"IPS",1,0,"L",true);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w2+$w3,$h1,"korpus",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI

$data=str_replace("-","",$_POST['date']);
$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT IPS FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['IPS'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['1'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-310, $y+$h1);
$pdf->SetFillColor(204, 153, 102); //NAZWA                            //PSA
$pdf->Cell($w1,$h1*2,"PSA",1,0,"L",true);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w2+$w3,$h1,"korpus",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI

$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT PSAk FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['PSAk'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['2'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-($w1*7+$w2+$w3), $y+$h1);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w2+$w3,$h1,"wspornik",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI

$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT PSAw FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['PSAw'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['3'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-310, $y+$h1);
$pdf->SetFillColor(204, 153, 102); //NAZWA                            //MNB
$pdf->Cell($w1,$h1*4,"MNB",1,0,"L",true);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w2,$h1*2,"korpus",1,0,"L",true);
$pdf->Cell($w3,$h1,"FA",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI

$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT MNBkf FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['MNBkf'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['4'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-($w1*7+$w3), $y+$h1);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w3,$h1,"RA",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI

$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT MNBkr FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['MNBkr'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['5'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-($w1*7+$w2+$w3), $y+$h1);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w2,$h1*2,"wspornik",1,0,"L",true);
$pdf->Cell($w3,$h1,"FA",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI

$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT MNBwf FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['MNBwf'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['6'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-($w1*7+$w3), $y+$h1);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w3,$h1,"RA",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI

$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT MNBwr FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['MNBwr'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['7'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-310, $y+$h1);
$pdf->SetFillColor(204, 153, 102); //NAZWA                            //MFA2
$pdf->Cell($w1,$h1*4,"MFA2",1,0,"L",true);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w2,$h1*2,"korpus",1,0,"L",true);
$pdf->Cell($w3,$h1,"FA",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI

$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT MFA2kf FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['MFA2kf'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['8'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-($w1*7+$w3), $y+$h1);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w3,$h1,"RA",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI

$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT MFA2kr FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['MFA2kr'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['9'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-($w1*7+$w2+$w3), $y+$h1);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w2,$h1*2,"wspornik",1,0,"L",true);
$pdf->Cell($w3,$h1,"FA",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI

$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT MFA2wf FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['MFA2wf'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['10'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}

$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-($w1*7+$w3), $y+$h1);
$pdf->SetFillColor(255, 219, 77); //RODZAJ
$pdf->Cell($w3,$h1,"RA",1,0,"L",true);
$pdf->SetFillColor(148, 148, 184); //SZTUKI
$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT MFA2wr FROM op10 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		$pdf->Cell($w1,$h1,$row2['MFA2wr'],1,0,"L",true);
	}elseif($i==$dzientyg){
		$pdf->Cell($w1,$h1,$projekty['11'],1,0,"L",true);
	}else{
		$pdf->Cell($w1,$h1,"0",1,0,"L",true);
	}
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-310, $y+$h1);

//WPISYWANIE DO BAZY DANYCH

$sql = "INSERT INTO op10 (date,
tSM621, 
tSM622, 
tSM623, 
SM621, 
SM622, 
SM623, 
opt1SM62, 
opt1SM621, 
opt1SM622, 
opt1SM623, 
opt2SM62, 
opt2SM621, 
opt2SM622, 
opt2SM623, 
opt3SM62, 
opt3SM621, 
opt3SM622, 
opt3SM623, 
tSM831, 
tSM832, 
tSM833, 
SM831, 
SM832, 
SM833, 
opt1SM83, 
opt1SM831, 
opt1SM832, 
opt1SM833, 
opt2SM83, 
opt2SM831, 
opt2SM832, 
opt2SM833, 
opt3SM83, 
opt3SM831, 
opt3SM832, 
opt3SM833, 
tSM821, 
tSM822, 
tSM823, 
SM821, 
SM822, 
SM823, 
opt1SM82, 
opt1SM821, 
opt1SM822, 
opt1SM823, 
opt2SM82, 
opt2SM821, 
opt2SM822, 
opt2SM823, 
opt3SM82, 
opt3SM821, 
opt3SM822, 
opt3SM823, 
tSM941, 
tSM942, 
tSM943, 
SM941, 
SM942, 
SM943, 
opt1SM94, 
opt1SM941, 
opt1SM942, 
opt1SM943, 
opt2SM94, 
opt2SM941, 
opt2SM942, 
opt2SM943, 
opt3SM94, 
opt3SM941, 
opt3SM942, 
opt3SM943, 
tSM891, 
tSM892, 
tSM893, 
SM891, 
SM892, 
SM893, 
opt1SM89, 
opt1SM891, 
opt1SM892, 
opt1SM893, 
opt2SM89, 
opt2SM891, 
opt2SM892, 
opt2SM893, 
opt3SM89, 
opt3SM891, 
opt3SM892, 
opt3SM893, 
tSM911, 
tSM912, 
tSM913, 
SM911, 
SM912, 
SM913, 
opt1SM91, 
opt1SM911, 
opt1SM912, 
opt1SM913, 
opt2SM91, 
opt2SM911, 
opt2SM912, 
opt2SM913, 
opt3SM91, 
opt3SM911, 
opt3SM912, 
opt3SM913, 
tSM571, 
tSM572, 
tSM573, 
SM571, 
SM572, 
SM573, 
opt1SM57, 
opt1SM571, 
opt1SM572, 
opt1SM573, 
opt2SM57, 
opt2SM571, 
opt2SM572, 
opt2SM573, 
opt3SM57, 
opt3SM571, 
opt3SM572, 
opt3SM573, 
tSM611, 
tSM612, 
tSM613, 
SM611, 
SM612, 
SM613, 
opt1SM61, 
opt1SM611, 
opt1SM612, 
opt1SM613, 
opt2SM61, 
opt2SM611, 
opt2SM612, 
opt2SM613, 
opt3SM61, 
opt3SM611, 
opt3SM612, 
opt3SM613, 
tSM951, 
tSM952, 
tSM953, 
SM951, 
SM952, 
SM953, 
opt1SM95, 
opt1SM951, 
opt1SM952, 
opt1SM953, 
opt2SM95, 
opt2SM951, 
opt2SM952, 
opt2SM953, 
opt3SM95, 
opt3SM951, 
opt3SM952, 
opt3SM953, 
tPP21, 
tPP22, 
tPP23, 
PP21, 
PP22, 
PP23, 
opt1PP2, 
opt1PP21, 
opt1PP22, 
opt1PP23, 
opt2PP2, 
opt2PP21, 
opt2PP22, 
opt2PP23, 
opt3PP2, 
opt3PP21, 
opt3PP22, 
opt3PP23, 
tPP31, 
tPP32, 
tPP33, 
PP31, 
PP32, 
PP33, 
opt1PP3, 
opt1PP31, 
opt1PP32, 
opt1PP33, 
opt2PP3, 
opt2PP31, 
opt2PP32, 
opt2PP33, 
opt3PP3, 
opt3PP31, 
opt3PP32, 
opt3PP33, 
tSM661, 
tSM662, 
tSM663, 
SM661, 
SM662, 
SM663, 
opt1SM66, 
opt1SM661, 
opt1SM662, 
opt1SM663, 
opt2SM66, 
opt2SM661, 
opt2SM662, 
opt2SM663, 
opt3SM66, 
opt3SM661, 
opt3SM662, 
opt3SM663, 
tSM861, 
tSM862, 
tSM863, 
SM861, 
SM862, 
SM863, 
opt1SM86, 
opt1SM861, 
opt1SM862, 
opt1SM863, 
opt2SM86, 
opt2SM861, 
opt2SM862, 
opt2SM863, 
opt3SM86, 
opt3SM861, 
opt3SM862, 
opt3SM863, 
tSM811, 
tSM812, 
tSM813, 
SM811, 
SM812, 
SM813, 
opt1SM81, 
opt1SM811, 
opt1SM812, 
opt1SM813, 
opt2SM81, 
opt2SM811, 
opt2SM812, 
opt2SM813, 
opt3SM81, 
opt3SM811, 
opt3SM812, 
opt3SM813, 
tSM931, 
tSM932, 
tSM933, 
SM931, 
SM932, 
SM933, 
opt1SM93, 
opt1SM931, 
opt1SM932, 
opt1SM933, 
opt2SM93, 
opt2SM931, 
opt2SM932, 
opt2SM933, 
opt3SM93, 
opt3SM931, 
opt3SM932, 
opt3SM933, 
tSM901, 
tSM902, 
tSM903, 
SM901, 
SM902, 
SM903, 
opt1SM90, 
opt1SM901, 
opt1SM902, 
opt1SM903, 
opt2SM90, 
opt2SM901, 
opt2SM902, 
opt2SM903, 
opt3SM90, 
opt3SM901, 
opt3SM902, 
opt3SM903, 
tSM921, 
tSM922, 
tSM923, 
SM921, 
SM922, 
SM923, 
opt1SM92, 
opt1SM921, 
opt1SM922, 
opt1SM923, 
opt2SM92, 
opt2SM921, 
opt2SM922, 
opt2SM923, 
opt3SM92, 
opt3SM921, 
opt3SM922, 
opt3SM923, 
tSM741, 
tSM742, 
tSM743, 
SM741, 
SM742, 
SM743, 
opt1SM74, 
opt1SM741, 
opt1SM742, 
opt1SM743, 
opt2SM74, 
opt2SM741, 
opt2SM742, 
opt2SM743, 
opt3SM74, 
opt3SM741, 
opt3SM742, 
opt3SM743, 
tSM961, 
tSM962, 
tSM963, 
SM961, 
SM962, 
SM963, 
opt1SM96, 
opt1SM961, 
opt1SM962, 
opt1SM963, 
opt2SM96, 
opt2SM961, 
opt2SM962, 
opt2SM963, 
opt3SM96, 
opt3SM961, 
opt3SM962, 
opt3SM963,
plan,
OEESM62,
OEESM83,
OEESM82,
OEESM94,
OEESM89,
OEESM91,
OEESM57,
OEESM61,
OEESM95,
OEEPP2,
OEEPP3,
OEESM66,
OEESM86,
OEESM81,
OEESM93,
OEESM90,
OEESM92,
OEESM74,
OEESM96,
IPS,
PSAk,
PSAw,
MNBkf,
MNBkr,
MNBwf,
MNBwr,
MFA2kf,
MFA2kr,
MFA2wf,
MFA2wr

) VALUES ('".$_POST['date']."', 
 ' ".$_POST['tSM621']."',
 ' ".$_POST['tSM622']."',
 ' ".$_POST['tSM623']."',
 ' ".$_POST['SM621']."',
 ' ".$_POST['SM622']."',
 ' ".$_POST['SM623']."',
 ' ".$_POST['opt1SM62']."',
 ' ".$_POST['opt1SM621']."',
 ' ".$_POST['opt1SM622']."',
 ' ".$_POST['opt1SM623']."',
 ' ".$_POST['opt2SM62']."',
 ' ".$_POST['opt2SM621']."',
 ' ".$_POST['opt2SM622']."',
 ' ".$_POST['opt2SM623']."',
 ' ".$_POST['opt3SM62']."',
 ' ".$_POST['opt3SM621']."',
 ' ".$_POST['opt3SM622']."',
 ' ".$_POST['opt3SM623']."',
 ' ".$_POST['tSM831']."',
 ' ".$_POST['tSM832']."',
 ' ".$_POST['tSM833']."',
 ' ".$_POST['SM831']."',
 ' ".$_POST['SM832']."',
 ' ".$_POST['SM833']."',
 ' ".$_POST['opt1SM83']."',
 ' ".$_POST['opt1SM831']."',
 ' ".$_POST['opt1SM832']."',
 ' ".$_POST['opt1SM833']."',
 ' ".$_POST['opt2SM83']."',
 ' ".$_POST['opt2SM831']."',
 ' ".$_POST['opt2SM832']."',
 ' ".$_POST['opt2SM833']."',
 ' ".$_POST['opt3SM83']."',
 ' ".$_POST['opt3SM831']."',
 ' ".$_POST['opt3SM832']."',
 ' ".$_POST['opt3SM833']."',
 ' ".$_POST['tSM821']."',
 ' ".$_POST['tSM822']."',
 ' ".$_POST['tSM823']."',
 ' ".$_POST['SM821']."',
 ' ".$_POST['SM822']."',
 ' ".$_POST['SM823']."',
 ' ".$_POST['opt1SM82']."',
 ' ".$_POST['opt1SM821']."',
 ' ".$_POST['opt1SM822']."',
 ' ".$_POST['opt1SM823']."',
 ' ".$_POST['opt2SM82']."',
 ' ".$_POST['opt2SM821']."',
 ' ".$_POST['opt2SM822']."',
 ' ".$_POST['opt2SM823']."',
 ' ".$_POST['opt3SM82']."',
 ' ".$_POST['opt3SM821']."',
 ' ".$_POST['opt3SM822']."',
 ' ".$_POST['opt3SM823']."',
 ' ".$_POST['tSM941']."',
 ' ".$_POST['tSM942']."',
 ' ".$_POST['tSM943']."',
 ' ".$_POST['SM941']."',
 ' ".$_POST['SM942']."',
 ' ".$_POST['SM943']."',
 ' ".$_POST['opt1SM94']."',
 ' ".$_POST['opt1SM941']."',
 ' ".$_POST['opt1SM942']."',
 ' ".$_POST['opt1SM943']."',
 ' ".$_POST['opt2SM94']."',
 ' ".$_POST['opt2SM941']."',
 ' ".$_POST['opt2SM942']."',
 ' ".$_POST['opt2SM943']."',
 ' ".$_POST['opt3SM94']."',
 ' ".$_POST['opt3SM941']."',
 ' ".$_POST['opt3SM942']."',
 ' ".$_POST['opt3SM943']."',
 ' ".$_POST['tSM891']."',
 ' ".$_POST['tSM892']."',
 ' ".$_POST['tSM893']."',
 ' ".$_POST['SM891']."',
 ' ".$_POST['SM892']."',
 ' ".$_POST['SM893']."',
 ' ".$_POST['opt1SM89']."',
 ' ".$_POST['opt1SM891']."',
 ' ".$_POST['opt1SM892']."',
 ' ".$_POST['opt1SM893']."',
 ' ".$_POST['opt2SM89']."',
 ' ".$_POST['opt2SM891']."',
 ' ".$_POST['opt2SM892']."',
 ' ".$_POST['opt2SM893']."',
 ' ".$_POST['opt3SM89']."',
 ' ".$_POST['opt3SM891']."',
 ' ".$_POST['opt3SM892']."',
 ' ".$_POST['opt3SM893']."',
 ' ".$_POST['tSM911']."',
 ' ".$_POST['tSM912']."',
 ' ".$_POST['tSM913']."',
 ' ".$_POST['SM911']."',
 ' ".$_POST['SM912']."',
 ' ".$_POST['SM913']."',
 ' ".$_POST['opt1SM91']."',
 ' ".$_POST['opt1SM911']."',
 ' ".$_POST['opt1SM912']."',
 ' ".$_POST['opt1SM913']."',
 ' ".$_POST['opt2SM91']."',
 ' ".$_POST['opt2SM911']."',
 ' ".$_POST['opt2SM912']."',
 ' ".$_POST['opt2SM913']."',
 ' ".$_POST['opt3SM91']."',
 ' ".$_POST['opt3SM911']."',
 ' ".$_POST['opt3SM912']."',
 ' ".$_POST['opt3SM913']."',
 ' ".$_POST['tSM571']."',
 ' ".$_POST['tSM572']."',
 ' ".$_POST['tSM573']."',
 ' ".$_POST['SM571']."',
 ' ".$_POST['SM572']."',
 ' ".$_POST['SM573']."',
 ' ".$_POST['opt1SM57']."',
 ' ".$_POST['opt1SM571']."',
 ' ".$_POST['opt1SM572']."',
 ' ".$_POST['opt1SM573']."',
 ' ".$_POST['opt2SM57']."',
 ' ".$_POST['opt2SM571']."',
 ' ".$_POST['opt2SM572']."',
 ' ".$_POST['opt2SM573']."',
 ' ".$_POST['opt3SM57']."',
 ' ".$_POST['opt3SM571']."',
 ' ".$_POST['opt3SM572']."',
 ' ".$_POST['opt3SM573']."',
 ' ".$_POST['tSM611']."',
 ' ".$_POST['tSM612']."',
 ' ".$_POST['tSM613']."',
 ' ".$_POST['SM611']."',
 ' ".$_POST['SM612']."',
 ' ".$_POST['SM613']."',
 ' ".$_POST['opt1SM61']."',
 ' ".$_POST['opt1SM611']."',
 ' ".$_POST['opt1SM612']."',
 ' ".$_POST['opt1SM613']."',
 ' ".$_POST['opt2SM61']."',
 ' ".$_POST['opt2SM611']."',
 ' ".$_POST['opt2SM612']."',
 ' ".$_POST['opt2SM613']."',
 ' ".$_POST['opt3SM61']."',
 ' ".$_POST['opt3SM611']."',
 ' ".$_POST['opt3SM612']."',
 ' ".$_POST['opt3SM613']."',
 ' ".$_POST['tSM951']."',
 ' ".$_POST['tSM952']."',
 ' ".$_POST['tSM953']."',
 ' ".$_POST['SM951']."',
 ' ".$_POST['SM952']."',
 ' ".$_POST['SM953']."',
 ' ".$_POST['opt1SM95']."',
 ' ".$_POST['opt1SM951']."',
 ' ".$_POST['opt1SM952']."',
 ' ".$_POST['opt1SM953']."',
 ' ".$_POST['opt2SM95']."',
 ' ".$_POST['opt2SM951']."',
 ' ".$_POST['opt2SM952']."',
 ' ".$_POST['opt2SM953']."',
 ' ".$_POST['opt3SM95']."',
 ' ".$_POST['opt3SM951']."',
 ' ".$_POST['opt3SM952']."',
 ' ".$_POST['opt3SM953']."',
 ' ".$_POST['tPP21']."',
 ' ".$_POST['tPP22']."',
 ' ".$_POST['tPP23']."',
 ' ".$_POST['PP21']."',
 ' ".$_POST['PP22']."',
 ' ".$_POST['PP23']."',
 ' ".$_POST['opt1PP2']."',
 ' ".$_POST['opt1PP21']."',
 ' ".$_POST['opt1PP22']."',
 ' ".$_POST['opt1PP23']."',
 ' ".$_POST['opt2PP2']."',
 ' ".$_POST['opt2PP21']."',
 ' ".$_POST['opt2PP22']."',
 ' ".$_POST['opt2PP23']."',
 ' ".$_POST['opt3PP2']."',
 ' ".$_POST['opt3PP21']."',
 ' ".$_POST['opt3PP22']."',
 ' ".$_POST['opt3PP23']."',
 ' ".$_POST['tPP31']."',
 ' ".$_POST['tPP32']."',
 ' ".$_POST['tPP33']."',
 ' ".$_POST['PP31']."',
 ' ".$_POST['PP32']."',
 ' ".$_POST['PP33']."',
 ' ".$_POST['opt1PP3']."',
 ' ".$_POST['opt1PP31']."',
 ' ".$_POST['opt1PP32']."',
 ' ".$_POST['opt1PP33']."',
 ' ".$_POST['opt2PP3']."',
 ' ".$_POST['opt2PP31']."',
 ' ".$_POST['opt2PP32']."',
 ' ".$_POST['opt2PP33']."',
 ' ".$_POST['opt3PP3']."',
 ' ".$_POST['opt3PP31']."',
 ' ".$_POST['opt3PP32']."',
 ' ".$_POST['opt3PP33']."',
 ' ".$_POST['tSM661']."',
 ' ".$_POST['tSM662']."',
 ' ".$_POST['tSM663']."',
 ' ".$_POST['SM661']."',
 ' ".$_POST['SM662']."',
 ' ".$_POST['SM663']."',
 ' ".$_POST['opt1SM66']."',
 ' ".$_POST['opt1SM661']."',
 ' ".$_POST['opt1SM662']."',
 ' ".$_POST['opt1SM663']."',
 ' ".$_POST['opt2SM66']."',
 ' ".$_POST['opt2SM661']."',
 ' ".$_POST['opt2SM662']."',
 ' ".$_POST['opt2SM663']."',
 ' ".$_POST['opt3SM66']."',
 ' ".$_POST['opt3SM661']."',
 ' ".$_POST['opt3SM662']."',
 ' ".$_POST['opt3SM663']."',
 ' ".$_POST['tSM861']."',
 ' ".$_POST['tSM862']."',
 ' ".$_POST['tSM863']."',
 ' ".$_POST['SM861']."',
 ' ".$_POST['SM862']."',
 ' ".$_POST['SM863']."',
 ' ".$_POST['opt1SM86']."',
 ' ".$_POST['opt1SM861']."',
 ' ".$_POST['opt1SM862']."',
 ' ".$_POST['opt1SM863']."',
 ' ".$_POST['opt2SM86']."',
 ' ".$_POST['opt2SM861']."',
 ' ".$_POST['opt2SM862']."',
 ' ".$_POST['opt2SM863']."',
 ' ".$_POST['opt3SM86']."',
 ' ".$_POST['opt3SM861']."',
 ' ".$_POST['opt3SM862']."',
 ' ".$_POST['opt3SM863']."',
 ' ".$_POST['tSM811']."',
 ' ".$_POST['tSM812']."',
 ' ".$_POST['tSM813']."',
 ' ".$_POST['SM811']."',
 ' ".$_POST['SM812']."',
 ' ".$_POST['SM813']."',
 ' ".$_POST['opt1SM81']."',
 ' ".$_POST['opt1SM811']."',
 ' ".$_POST['opt1SM812']."',
 ' ".$_POST['opt1SM813']."',
 ' ".$_POST['opt2SM81']."',
 ' ".$_POST['opt2SM811']."',
 ' ".$_POST['opt2SM812']."',
 ' ".$_POST['opt2SM813']."',
 ' ".$_POST['opt3SM81']."',
 ' ".$_POST['opt3SM811']."',
 ' ".$_POST['opt3SM812']."',
 ' ".$_POST['opt3SM813']."',
 ' ".$_POST['tSM931']."',
 ' ".$_POST['tSM932']."',
 ' ".$_POST['tSM933']."',
 ' ".$_POST['SM931']."',
 ' ".$_POST['SM932']."',
 ' ".$_POST['SM933']."',
 ' ".$_POST['opt1SM93']."',
 ' ".$_POST['opt1SM931']."',
 ' ".$_POST['opt1SM932']."',
 ' ".$_POST['opt1SM933']."',
 ' ".$_POST['opt2SM93']."',
 ' ".$_POST['opt2SM931']."',
 ' ".$_POST['opt2SM932']."',
 ' ".$_POST['opt2SM933']."',
 ' ".$_POST['opt3SM93']."',
 ' ".$_POST['opt3SM931']."',
 ' ".$_POST['opt3SM932']."',
 ' ".$_POST['opt3SM933']."',
 ' ".$_POST['tSM901']."',
 ' ".$_POST['tSM902']."',
 ' ".$_POST['tSM903']."',
 ' ".$_POST['SM901']."',
 ' ".$_POST['SM902']."',
 ' ".$_POST['SM903']."',
 ' ".$_POST['opt1SM90']."',
 ' ".$_POST['opt1SM901']."',
 ' ".$_POST['opt1SM902']."',
 ' ".$_POST['opt1SM903']."',
 ' ".$_POST['opt2SM90']."',
 ' ".$_POST['opt2SM901']."',
 ' ".$_POST['opt2SM902']."',
 ' ".$_POST['opt2SM903']."',
 ' ".$_POST['opt3SM90']."',
 ' ".$_POST['opt3SM901']."',
 ' ".$_POST['opt3SM902']."',
 ' ".$_POST['opt3SM903']."',
 ' ".$_POST['tSM921']."',
 ' ".$_POST['tSM922']."',
 ' ".$_POST['tSM923']."',
 ' ".$_POST['SM921']."',
 ' ".$_POST['SM922']."',
 ' ".$_POST['SM923']."',
 ' ".$_POST['opt1SM92']."',
 ' ".$_POST['opt1SM921']."',
 ' ".$_POST['opt1SM922']."',
 ' ".$_POST['opt1SM923']."',
 ' ".$_POST['opt2SM92']."',
 ' ".$_POST['opt2SM921']."',
 ' ".$_POST['opt2SM922']."',
 ' ".$_POST['opt2SM923']."',
 ' ".$_POST['opt3SM92']."',
 ' ".$_POST['opt3SM921']."',
 ' ".$_POST['opt3SM922']."',
 ' ".$_POST['opt3SM923']."',
 ' ".$_POST['tSM741']."',
 ' ".$_POST['tSM742']."',
 ' ".$_POST['tSM743']."',
 ' ".$_POST['SM741']."',
 ' ".$_POST['SM742']."',
 ' ".$_POST['SM743']."',
 ' ".$_POST['opt1SM74']."',
 ' ".$_POST['opt1SM741']."',
 ' ".$_POST['opt1SM742']."',
 ' ".$_POST['opt1SM743']."',
 ' ".$_POST['opt2SM74']."',
 ' ".$_POST['opt2SM741']."',
 ' ".$_POST['opt2SM742']."',
 ' ".$_POST['opt2SM743']."',
 ' ".$_POST['opt3SM74']."',
 ' ".$_POST['opt3SM741']."',
 ' ".$_POST['opt3SM742']."',
 ' ".$_POST['opt3SM743']."',
 ' ".$_POST['tSM961']."',
 ' ".$_POST['tSM962']."',
 ' ".$_POST['tSM963']."',
 ' ".$_POST['SM961']."',
 ' ".$_POST['SM962']."',
 ' ".$_POST['SM963']."',
 ' ".$_POST['opt1SM96']."',
 ' ".$_POST['opt1SM961']."',
 ' ".$_POST['opt1SM962']."',
 ' ".$_POST['opt1SM963']."',
 ' ".$_POST['opt2SM96']."',
 ' ".$_POST['opt2SM961']."',
 ' ".$_POST['opt2SM962']."',
 ' ".$_POST['opt2SM963']."',
 ' ".$_POST['opt3SM96']."',
 ' ".$_POST['opt3SM961']."',
 ' ".$_POST['opt3SM962']."',
 ' ".$_POST['opt3SM963']."',
 ' ".$roznica."',
 ' ".$OEESM62." ',
 ' ".$OEESM83." ',
 ' ".$OEESM82." ',
 ' ".$OEESM94." ',
 ' ".$OEESM89." ',
 ' ".$OEESM91." ',
 ' ".$OEESM57." ',
 ' ".$OEESM61." ',
 ' ".$OEESM95." ',
 ' ".$OEEPP2." ',
 ' ".$OEEPP3." ',
 ' ".$OEESM66." ',
 ' ".$OEESM86." ',
 ' ".$OEESM81." ',
 ' ".$OEESM93." ',
 ' ".$OEESM90." ',
 ' ".$OEESM92." ',
 ' ".$OEESM74." ',
 ' ".$OEESM96." ',
 '".$projekty['1']." ',
 '".$projekty['2']." ',
 '".$projekty['3']." ',
 '".$projekty['4']." ',
 '".$projekty['5']." ',
 '".$projekty['6']." ',
 '".$projekty['7']." ',
 '".$projekty['8']." ',
 '".$projekty['9']." ',
 '".$projekty['10']." ',
 '".$projekty['11']." '

 
)";
mysqli_query($conn, $sql);


mysqli_close($conn);

// komenda generowania pdf'a, ma zostaæ na koñcu
$pdf->output();
?>