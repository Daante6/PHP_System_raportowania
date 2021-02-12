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
$sr=0;

//tabela wed³ug projektów
$projekty=array("0"=>"0", "1"=>"0", "2"=>"0", "3"=>"0", "4"=>"0", "5"=>"0", "6"=>"0", "7"=>"0", "8"=>"0", "9"=>"0", "10"=>"0", "11"=>"0");
$projekt=0;

$sztukBracket=0;
$srCal=0; //dzielnik Caliper
$srBracket=0; //dzielnik Bracket
$srWC=0; //dzielnik WC
$srBiel=0; //dzielnik Bieletka

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
$pdf->Cell(40,10,"Raport Op. 20",1,0,"L");
$pdf->SetXY($x+300, $y);
$pdf->Cell(60,10,"Dnia   ".$_POST['date'],1,0,"L");          

//+57 na kolejna kolumne: 18,75,132,189,246,303,360      $startx + x
//+70 na kolejny wiersz: 15,85,155						 $starty + y

// SM45
$sumSM45=$_POST['SM451']+$_POST['SM452']+$_POST['SM453'];
$bilans = 0;
$pdf->SetXY($startx+189, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 45",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM451'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM452'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM453'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM45,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM45'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM451'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM452'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM453'],1,0,"R",true);

if($_POST['opt2SM45']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM45'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM451'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM452'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM453'],1,0,"R",true);
}
if($_POST['opt3SM45']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM45'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM451'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM452'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM453'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM45=$_POST['opt1SM451']+$_POST['opt1SM452']+$_POST['opt1SM453']+$_POST['opt2SM451']+$_POST['opt2SM452']+$_POST['opt2SM453']+$_POST['opt3SM451']+$_POST['opt3SM452']+$_POST['opt3SM453'];
$pdf->Cell($kom3,3,$sztukSM45,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM45-$sumSM45;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM45`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM45']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM451']+$_POST['opt1SM452']+$_POST['opt1SM453'];
}
	$OEE1+=$cykl*$_POST['opt1SM451'];
	$OEE2+=$cykl*$_POST['opt1SM452'];
	$OEE3+=$cykl*$_POST['opt1SM453'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM45`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM45']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM451']+$_POST['opt2SM452']+$_POST['opt2SM453'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM451'];
	$OEE2+=$cykl*$_POST['opt2SM452'];
	$OEE3+=$cykl*$_POST['opt2SM453'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM45`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM45']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM451']+$_POST['opt3SM452']+$_POST['opt3SM453'];
}	

	$OEE1+=$cykl*$_POST['opt3SM451'];
	$OEE2+=$cykl*$_POST['opt3SM452'];
	$OEE3+=$cykl*$_POST['opt3SM453'];
if($_POST['tSM451']!=0){
	$OEE1=100*$OEE1/($_POST['tSM451']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM452']!=0){
	$OEE2=100*$OEE2/($_POST['tSM452']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM453']!=0){
	$OEE3=100*$OEE3/($_POST['tSM453']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srCal+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM45=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM451']!=0){
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

if($_POST['tSM452']!=0){
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

if($_POST['tSM453']!=0){
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

if($_POST['tSM451']+$_POST['tSM452']+$_POST['tSM453']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM22
$sumSM22=$_POST['SM221']+$_POST['SM222']+$_POST['SM223'];
$bilans = 0;
$pdf->SetXY($startx+246, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 22",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM221'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM222'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM223'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM22,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM22'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM221'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM222'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM223'],1,0,"R",true);

if($_POST['opt2SM22']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM22'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM221'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM222'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM223'],1,0,"R",true);
}
if($_POST['opt3SM22']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM22'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM221'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM222'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM223'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM22=$_POST['opt1SM221']+$_POST['opt1SM222']+$_POST['opt1SM223']+$_POST['opt2SM221']+$_POST['opt2SM222']+$_POST['opt2SM223']+$_POST['opt3SM221']+$_POST['opt3SM222']+$_POST['opt3SM223'];
$pdf->Cell($kom3,3,$sztukSM22,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM22-$sumSM22;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM22`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM22']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM221']+$_POST['opt1SM222']+$_POST['opt1SM223'];
}
	$OEE1+=$cykl*$_POST['opt1SM221'];
	$OEE2+=$cykl*$_POST['opt1SM222'];
	$OEE3+=$cykl*$_POST['opt1SM223'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM22`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM22']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM221']+$_POST['opt2SM222']+$_POST['opt2SM223'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM221'];
	$OEE2+=$cykl*$_POST['opt2SM222'];
	$OEE3+=$cykl*$_POST['opt2SM223'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM22`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM22']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM221']+$_POST['opt3SM222']+$_POST['opt3SM223'];
}	

	$OEE1+=$cykl*$_POST['opt3SM221'];
	$OEE2+=$cykl*$_POST['opt3SM222'];
	$OEE3+=$cykl*$_POST['opt3SM223'];
if($_POST['tSM221']!=0){
	$OEE1=100*$OEE1/($_POST['tSM221']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM222']!=0){
	$OEE2=100*$OEE2/($_POST['tSM222']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM223']!=0){
	$OEE3=100*$OEE3/($_POST['tSM223']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srCal+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM22=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM221']!=0){
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

if($_POST['tSM222']!=0){
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

if($_POST['tSM223']!=0){
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

if($_POST['tSM221']+$_POST['tSM222']+$_POST['tSM223']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM25
$sumSM25=$_POST['SM251']+$_POST['SM252']+$_POST['SM253'];
$bilans = 0;
$pdf->SetXY($startx+75, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 25",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM251'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM252'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM253'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM25,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM25'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM251'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM252'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM253'],1,0,"R",true);

if($_POST['opt2SM25']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM25'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM251'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM252'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM253'],1,0,"R",true);
}
if($_POST['opt3SM25']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM25'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM251'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM252'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM253'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM25=$_POST['opt1SM251']+$_POST['opt1SM252']+$_POST['opt1SM253']+$_POST['opt2SM251']+$_POST['opt2SM252']+$_POST['opt2SM253']+$_POST['opt3SM251']+$_POST['opt3SM252']+$_POST['opt3SM253'];
$pdf->Cell($kom3,3,$sztukSM25,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM25-$sumSM25;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM25`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM25']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM251']+$_POST['opt1SM252']+$_POST['opt1SM253'];
}
	$OEE1+=$cykl*$_POST['opt1SM251'];
	$OEE2+=$cykl*$_POST['opt1SM252'];
	$OEE3+=$cykl*$_POST['opt1SM253'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM25`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM25']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM251']+$_POST['opt2SM252']+$_POST['opt2SM253'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM251'];
	$OEE2+=$cykl*$_POST['opt2SM252'];
	$OEE3+=$cykl*$_POST['opt2SM253'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM25`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM25']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM251']+$_POST['opt3SM252']+$_POST['opt3SM253'];
}	

	$OEE1+=$cykl*$_POST['opt3SM251'];
	$OEE2+=$cykl*$_POST['opt3SM252'];
	$OEE3+=$cykl*$_POST['opt3SM253'];
if($_POST['tSM251']!=0){
	$OEE1=100*$OEE1/($_POST['tSM251']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM252']!=0){
	$OEE2=100*$OEE2/($_POST['tSM252']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM253']!=0){
	$OEE3=100*$OEE3/($_POST['tSM253']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srCal+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM25=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM251']!=0){
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

if($_POST['tSM252']!=0){
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

if($_POST['tSM253']!=0){
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

if($_POST['tSM251']+$_POST['tSM252']+$_POST['tSM253']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM63
$sumSM63=$_POST['SM631']+$_POST['SM632']+$_POST['SM633'];
$bilans = 0;
$pdf->SetXY($startx+360, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 63",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(179, 179, 255);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM631'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM632'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM633'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM63,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM63'],1,0,"L",true);
$pdf->SetFillColor(179, 179, 255);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM631'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM632'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM633'],1,0,"R",true);

if($_POST['opt2SM63']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(128, 128, 255);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM63'],1,0,"L",true);
	$pdf->SetFillColor(179, 179, 255);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM631'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM632'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM633'],1,0,"R",true);
}
if($_POST['opt3SM63']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(128, 128, 255);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM63'],1,0,"L",true);
	$pdf->SetFillColor(179, 179, 255);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM631'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM632'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM633'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM63=$_POST['opt1SM631']+$_POST['opt1SM632']+$_POST['opt1SM633']+$_POST['opt2SM631']+$_POST['opt2SM632']+$_POST['opt2SM633']+$_POST['opt3SM631']+$_POST['opt3SM632']+$_POST['opt3SM633'];
$pdf->Cell($kom3,3,$sztukSM63,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM63-$sumSM63;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM63`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM63']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM631']+$_POST['opt1SM632']+$_POST['opt1SM633'];
}
	$OEE1+=$cykl*$_POST['opt1SM631'];
	$OEE2+=$cykl*$_POST['opt1SM632'];
	$OEE3+=$cykl*$_POST['opt1SM633'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM63`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM63']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM631']+$_POST['opt2SM632']+$_POST['opt2SM633'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM631'];
	$OEE2+=$cykl*$_POST['opt2SM632'];
	$OEE3+=$cykl*$_POST['opt2SM633'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM63`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM63']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM631']+$_POST['opt3SM632']+$_POST['opt3SM633'];
}	

	$OEE1+=$cykl*$_POST['opt3SM631'];
	$OEE2+=$cykl*$_POST['opt3SM632'];
	$OEE3+=$cykl*$_POST['opt3SM633'];
if($_POST['tSM631']!=0){
	$OEE1=100*$OEE1/($_POST['tSM631']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM632']!=0){
	$OEE2=100*$OEE2/($_POST['tSM632']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM633']!=0){
	$OEE3=100*$OEE3/($_POST['tSM633']*60);
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
$OEESM63=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM631']!=0){
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

if($_POST['tSM632']!=0){
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

if($_POST['tSM633']!=0){
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

if($_POST['tSM631']+$_POST['tSM632']+$_POST['tSM633']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM76
$sumSM76=$_POST['SM761']+$_POST['SM762']+$_POST['SM763'];
$bilans = 0;
$pdf->SetXY($startx+132, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 76",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(255, 166, 77);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM761'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM762'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM763'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM76,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM76'],1,0,"L",true);
$pdf->SetFillColor(255, 166, 77);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM761'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM762'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM763'],1,0,"R",true);

if($_POST['opt2SM76']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(255, 128, 0);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM76'],1,0,"L",true);
	$pdf->SetFillColor(255, 166, 77);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM761'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM762'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM763'],1,0,"R",true);
}
if($_POST['opt3SM76']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(255, 128, 0);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM76'],1,0,"L",true);
	$pdf->SetFillColor(255, 166, 77);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM761'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM762'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM763'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM76=$_POST['opt1SM761']+$_POST['opt1SM762']+$_POST['opt1SM763']+$_POST['opt2SM761']+$_POST['opt2SM762']+$_POST['opt2SM763']+$_POST['opt3SM761']+$_POST['opt3SM762']+$_POST['opt3SM763'];
$pdf->Cell($kom3,3,$sztukSM76,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM76-$sumSM76;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM76`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM76']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM761']+$_POST['opt1SM762']+$_POST['opt1SM763'];
}
	$OEE1+=$cykl*$_POST['opt1SM761'];
	$OEE2+=$cykl*$_POST['opt1SM762'];
	$OEE3+=$cykl*$_POST['opt1SM763'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM76`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM76']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM761']+$_POST['opt2SM762']+$_POST['opt2SM763'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM761'];
	$OEE2+=$cykl*$_POST['opt2SM762'];
	$OEE3+=$cykl*$_POST['opt2SM763'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM76`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM76']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM761']+$_POST['opt3SM762']+$_POST['opt3SM763'];
}	

	$OEE1+=$cykl*$_POST['opt3SM761'];
	$OEE2+=$cykl*$_POST['opt3SM762'];
	$OEE3+=$cykl*$_POST['opt3SM763'];
if($_POST['tSM761']!=0){
	$OEE1=100*$OEE1/($_POST['tSM761']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM762']!=0){
	$OEE2=100*$OEE2/($_POST['tSM762']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM763']!=0){
	$OEE3=100*$OEE3/($_POST['tSM763']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srWC+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM76=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM761']!=0){
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

if($_POST['tSM762']!=0){
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

if($_POST['tSM763']!=0){
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

if($_POST['tSM761']+$_POST['tSM762']+$_POST['tSM763']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM51
$sumSM51=$_POST['SM511']+$_POST['SM512']+$_POST['SM513'];
$bilans = 0;
$pdf->SetXY($startx+360, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 51",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(179, 179, 255);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM511'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM512'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM513'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM51,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM51'],1,0,"L",true);
$pdf->SetFillColor(179, 179, 255);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM511'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM512'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM513'],1,0,"R",true);

if($_POST['opt2SM51']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(128, 128, 255);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM51'],1,0,"L",true);
	$pdf->SetFillColor(179, 179, 255);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM511'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM512'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM513'],1,0,"R",true);
}
if($_POST['opt3SM51']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(128, 128, 255);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM51'],1,0,"L",true);
	$pdf->SetFillColor(179, 179, 255);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM511'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM512'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM513'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM51=$_POST['opt1SM511']+$_POST['opt1SM512']+$_POST['opt1SM513']+$_POST['opt2SM511']+$_POST['opt2SM512']+$_POST['opt2SM513']+$_POST['opt3SM511']+$_POST['opt3SM512']+$_POST['opt3SM513'];
$pdf->Cell($kom3,3,$sztukSM51,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM51-$sumSM51;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM51`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM51']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM511']+$_POST['opt1SM512']+$_POST['opt1SM513'];
}
	$OEE1+=$cykl*$_POST['opt1SM511'];
	$OEE2+=$cykl*$_POST['opt1SM512'];
	$OEE3+=$cykl*$_POST['opt1SM513'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM51`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM51']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM511']+$_POST['opt2SM512']+$_POST['opt2SM513'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM511'];
	$OEE2+=$cykl*$_POST['opt2SM512'];
	$OEE3+=$cykl*$_POST['opt2SM513'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM51`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM51']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM511']+$_POST['opt3SM512']+$_POST['opt3SM513'];
}	

	$OEE1+=$cykl*$_POST['opt3SM511'];
	$OEE2+=$cykl*$_POST['opt3SM512'];
	$OEE3+=$cykl*$_POST['opt3SM513'];
if($_POST['tSM511']!=0){
	$OEE1=100*$OEE1/($_POST['tSM511']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM512']!=0){
	$OEE2=100*$OEE2/($_POST['tSM512']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM513']!=0){
	$OEE3=100*$OEE3/($_POST['tSM513']*60);
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
$OEESM51=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM511']!=0){
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

if($_POST['tSM512']!=0){
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

if($_POST['tSM513']!=0){
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

if($_POST['tSM511']+$_POST['tSM512']+$_POST['tSM513']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM52
$sumSM52=$_POST['SM521']+$_POST['SM522']+$_POST['SM523'];
$bilans = 0;
$pdf->SetXY($startx+75, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 52",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM521'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM522'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM523'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM52,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM52'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM521'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM522'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM523'],1,0,"R",true);

if($_POST['opt2SM52']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM52'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM521'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM522'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM523'],1,0,"R",true);
}
if($_POST['opt3SM52']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM52'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM521'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM522'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM523'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM52=$_POST['opt1SM521']+$_POST['opt1SM522']+$_POST['opt1SM523']+$_POST['opt2SM521']+$_POST['opt2SM522']+$_POST['opt2SM523']+$_POST['opt3SM521']+$_POST['opt3SM522']+$_POST['opt3SM523'];
$pdf->Cell($kom3,3,$sztukSM52,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM52-$sumSM52;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM52`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM52']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM521']+$_POST['opt1SM522']+$_POST['opt1SM523'];
}
	$OEE1+=$cykl*$_POST['opt1SM521'];
	$OEE2+=$cykl*$_POST['opt1SM522'];
	$OEE3+=$cykl*$_POST['opt1SM523'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM52`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM52']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM521']+$_POST['opt2SM522']+$_POST['opt2SM523'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM521'];
	$OEE2+=$cykl*$_POST['opt2SM522'];
	$OEE3+=$cykl*$_POST['opt2SM523'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM52`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM52']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM521']+$_POST['opt3SM522']+$_POST['opt3SM523'];
}	

	$OEE1+=$cykl*$_POST['opt3SM521'];
	$OEE2+=$cykl*$_POST['opt3SM522'];
	$OEE3+=$cykl*$_POST['opt3SM523'];
if($_POST['tSM521']!=0){
	$OEE1=100*$OEE1/($_POST['tSM521']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM522']!=0){
	$OEE2=100*$OEE2/($_POST['tSM522']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM523']!=0){
	$OEE3=100*$OEE3/($_POST['tSM523']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srCal+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM52=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM521']!=0){
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

if($_POST['tSM522']!=0){
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

if($_POST['tSM523']!=0){
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

if($_POST['tSM521']+$_POST['tSM522']+$_POST['tSM523']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM84
$sumSM84=$_POST['SM841']+$_POST['SM842']+$_POST['SM843'];
$bilans = 0;
$pdf->SetXY($startx+132, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 84",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM841'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM842'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM843'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM84,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM84'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM841'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM842'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM843'],1,0,"R",true);

if($_POST['opt2SM84']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM84'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM841'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM842'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM843'],1,0,"R",true);
}
if($_POST['opt3SM84']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM84'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM841'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM842'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM843'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM84=$_POST['opt1SM841']+$_POST['opt1SM842']+$_POST['opt1SM843']+$_POST['opt2SM841']+$_POST['opt2SM842']+$_POST['opt2SM843']+$_POST['opt3SM841']+$_POST['opt3SM842']+$_POST['opt3SM843'];
$pdf->Cell($kom3,3,$sztukSM84,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM84-$sumSM84;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM84`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM84']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM841']+$_POST['opt1SM842']+$_POST['opt1SM843'];
}
	$OEE1+=$cykl*$_POST['opt1SM841'];
	$OEE2+=$cykl*$_POST['opt1SM842'];
	$OEE3+=$cykl*$_POST['opt1SM843'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM84`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM84']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM841']+$_POST['opt2SM842']+$_POST['opt2SM843'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM841'];
	$OEE2+=$cykl*$_POST['opt2SM842'];
	$OEE3+=$cykl*$_POST['opt2SM843'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM84`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM84']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM841']+$_POST['opt3SM842']+$_POST['opt3SM843'];
}	

	$OEE1+=$cykl*$_POST['opt3SM841'];
	$OEE2+=$cykl*$_POST['opt3SM842'];
	$OEE3+=$cykl*$_POST['opt3SM843'];
if($_POST['tSM841']!=0){
	$OEE1=100*$OEE1/($_POST['tSM841']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM842']!=0){
	$OEE2=100*$OEE2/($_POST['tSM842']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM843']!=0){
	$OEE3=100*$OEE3/($_POST['tSM843']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srCal+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM84=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM841']!=0){
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

if($_POST['tSM842']!=0){
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

if($_POST['tSM843']!=0){
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

if($_POST['tSM841']+$_POST['tSM842']+$_POST['tSM843']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM80
$sumSM80=$_POST['SM801']+$_POST['SM802']+$_POST['SM803'];
$bilans = 0;
$pdf->SetXY($startx+303, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 80",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(179, 179, 255);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM801'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM802'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM803'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM80,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM80'],1,0,"L",true);
$pdf->SetFillColor(179, 179, 255);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM801'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM802'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM803'],1,0,"R",true);

if($_POST['opt2SM80']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(128, 128, 255);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM80'],1,0,"L",true);
	$pdf->SetFillColor(179, 179, 255);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM801'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM802'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM803'],1,0,"R",true);
}
if($_POST['opt3SM80']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(128, 128, 255);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM80'],1,0,"L",true);
	$pdf->SetFillColor(179, 179, 255);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM801'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM802'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM803'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM80=$_POST['opt1SM801']+$_POST['opt1SM802']+$_POST['opt1SM803']+$_POST['opt2SM801']+$_POST['opt2SM802']+$_POST['opt2SM803']+$_POST['opt3SM801']+$_POST['opt3SM802']+$_POST['opt3SM803'];
$pdf->Cell($kom3,3,$sztukSM80,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM80-$sumSM80;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM80`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM80']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM801']+$_POST['opt1SM802']+$_POST['opt1SM803'];
}
	$OEE1+=$cykl*$_POST['opt1SM801'];
	$OEE2+=$cykl*$_POST['opt1SM802'];
	$OEE3+=$cykl*$_POST['opt1SM803'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM80`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM80']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM801']+$_POST['opt2SM802']+$_POST['opt2SM803'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM801'];
	$OEE2+=$cykl*$_POST['opt2SM802'];
	$OEE3+=$cykl*$_POST['opt2SM803'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM80`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM80']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM801']+$_POST['opt3SM802']+$_POST['opt3SM803'];
}	

	$OEE1+=$cykl*$_POST['opt3SM801'];
	$OEE2+=$cykl*$_POST['opt3SM802'];
	$OEE3+=$cykl*$_POST['opt3SM803'];
if($_POST['tSM801']!=0){
	$OEE1=100*$OEE1/($_POST['tSM801']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM802']!=0){
	$OEE2=100*$OEE2/($_POST['tSM802']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM803']!=0){
	$OEE3=100*$OEE3/($_POST['tSM803']*60);
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
$OEESM80=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM801']!=0){
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

if($_POST['tSM802']!=0){
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

if($_POST['tSM803']!=0){
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

if($_POST['tSM801']+$_POST['tSM802']+$_POST['tSM803']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM40
$sumSM40=$_POST['SM401']+$_POST['SM402']+$_POST['SM403'];
$bilans = 0;
$pdf->SetXY($startx+18, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 40",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM401'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM402'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM403'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM40,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM40'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM401'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM402'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM403'],1,0,"R",true);

if($_POST['opt2SM40']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM40'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM401'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM402'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM403'],1,0,"R",true);
}
if($_POST['opt3SM40']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM40'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM401'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM402'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM403'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM40=$_POST['opt1SM401']+$_POST['opt1SM402']+$_POST['opt1SM403']+$_POST['opt2SM401']+$_POST['opt2SM402']+$_POST['opt2SM403']+$_POST['opt3SM401']+$_POST['opt3SM402']+$_POST['opt3SM403'];
$pdf->Cell($kom3,3,$sztukSM40,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM40-$sumSM40;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM40`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM40']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM401']+$_POST['opt1SM402']+$_POST['opt1SM403'];
}
	$OEE1+=$cykl*$_POST['opt1SM401'];
	$OEE2+=$cykl*$_POST['opt1SM402'];
	$OEE3+=$cykl*$_POST['opt1SM403'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM40`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM40']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM401']+$_POST['opt2SM402']+$_POST['opt2SM403'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM401'];
	$OEE2+=$cykl*$_POST['opt2SM402'];
	$OEE3+=$cykl*$_POST['opt2SM403'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM40`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM40']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM401']+$_POST['opt3SM402']+$_POST['opt3SM403'];
}	

	$OEE1+=$cykl*$_POST['opt3SM401'];
	$OEE2+=$cykl*$_POST['opt3SM402'];
	$OEE3+=$cykl*$_POST['opt3SM403'];
if($_POST['tSM401']!=0){
	$OEE1=100*$OEE1/($_POST['tSM401']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM402']!=0){
	$OEE2=100*$OEE2/($_POST['tSM402']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM403']!=0){
	$OEE3=100*$OEE3/($_POST['tSM403']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srCal+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM40=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM401']!=0){
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

if($_POST['tSM402']!=0){
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

if($_POST['tSM403']!=0){
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

if($_POST['tSM401']+$_POST['tSM402']+$_POST['tSM403']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM97
$sumSM97=$_POST['SM971']+$_POST['SM972']+$_POST['SM973'];
$bilans = 0;
$pdf->SetXY($startx+75, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 97",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM971'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM972'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM973'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM97,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM97'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM971'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM972'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM973'],1,0,"R",true);

if($_POST['opt2SM97']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM97'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM971'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM972'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM973'],1,0,"R",true);
}
if($_POST['opt3SM97']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM97'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM971'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM972'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM973'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM97=$_POST['opt1SM971']+$_POST['opt1SM972']+$_POST['opt1SM973']+$_POST['opt2SM971']+$_POST['opt2SM972']+$_POST['opt2SM973']+$_POST['opt3SM971']+$_POST['opt3SM972']+$_POST['opt3SM973'];
$pdf->Cell($kom3,3,$sztukSM97,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM97-$sumSM97;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM97`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM97']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM971']+$_POST['opt1SM972']+$_POST['opt1SM973'];
}
	$OEE1+=$cykl*$_POST['opt1SM971'];
	$OEE2+=$cykl*$_POST['opt1SM972'];
	$OEE3+=$cykl*$_POST['opt1SM973'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM97`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM97']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM971']+$_POST['opt2SM972']+$_POST['opt2SM973'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM971'];
	$OEE2+=$cykl*$_POST['opt2SM972'];
	$OEE3+=$cykl*$_POST['opt2SM973'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM97`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM97']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM971']+$_POST['opt3SM972']+$_POST['opt3SM973'];
}	

	$OEE1+=$cykl*$_POST['opt3SM971'];
	$OEE2+=$cykl*$_POST['opt3SM972'];
	$OEE3+=$cykl*$_POST['opt3SM973'];
if($_POST['tSM971']!=0){
	$OEE1=100*$OEE1/($_POST['tSM971']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM972']!=0){
	$OEE2=100*$OEE2/($_POST['tSM972']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM973']!=0){
	$OEE3=100*$OEE3/($_POST['tSM973']*60);
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
$OEESM97=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM971']!=0){
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

if($_POST['tSM972']!=0){
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

if($_POST['tSM973']!=0){
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

if($_POST['tSM971']+$_POST['tSM972']+$_POST['tSM973']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM59
$sumSM59=$_POST['SM591']+$_POST['SM592']+$_POST['SM593'];
$bilans = 0;
$pdf->SetXY($startx+18, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 59",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM591'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM592'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM593'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM59,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM59'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM591'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM592'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM593'],1,0,"R",true);

if($_POST['opt2SM59']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM59'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM591'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM592'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM593'],1,0,"R",true);
}
if($_POST['opt3SM59']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM59'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM591'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM592'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM593'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM59=$_POST['opt1SM591']+$_POST['opt1SM592']+$_POST['opt1SM593']+$_POST['opt2SM591']+$_POST['opt2SM592']+$_POST['opt2SM593']+$_POST['opt3SM591']+$_POST['opt3SM592']+$_POST['opt3SM593'];
$pdf->Cell($kom3,3,$sztukSM59,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM59-$sumSM59;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM59`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM59']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM591']+$_POST['opt1SM592']+$_POST['opt1SM593'];
}
	$OEE1+=$cykl*$_POST['opt1SM591'];
	$OEE2+=$cykl*$_POST['opt1SM592'];
	$OEE3+=$cykl*$_POST['opt1SM593'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM59`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM59']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM591']+$_POST['opt2SM592']+$_POST['opt2SM593'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM591'];
	$OEE2+=$cykl*$_POST['opt2SM592'];
	$OEE3+=$cykl*$_POST['opt2SM593'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM59`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM59']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM591']+$_POST['opt3SM592']+$_POST['opt3SM593'];
}	

	$OEE1+=$cykl*$_POST['opt3SM591'];
	$OEE2+=$cykl*$_POST['opt3SM592'];
	$OEE3+=$cykl*$_POST['opt3SM593'];
if($_POST['tSM591']!=0){
	$OEE1=100*$OEE1/($_POST['tSM591']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM592']!=0){
	$OEE2=100*$OEE2/($_POST['tSM592']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM593']!=0){
	$OEE3=100*$OEE3/($_POST['tSM593']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srCal+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM59=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM591']!=0){
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

if($_POST['tSM592']!=0){
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

if($_POST['tSM593']!=0){
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

if($_POST['tSM591']+$_POST['tSM592']+$_POST['tSM593']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM56
$sumSM56=$_POST['SM561']+$_POST['SM562']+$_POST['SM563'];
$bilans = 0;
$pdf->SetXY($startx+303, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 56",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(255, 166, 77);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM561'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM562'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM563'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM56,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM56'],1,0,"L",true);
$pdf->SetFillColor(255, 166, 77);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM561'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM562'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM563'],1,0,"R",true);

if($_POST['opt2SM56']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(255, 128, 0);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM56'],1,0,"L",true);
	$pdf->SetFillColor(255, 166, 77);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM561'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM562'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM563'],1,0,"R",true);
}
if($_POST['opt3SM56']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(255, 128, 0);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM56'],1,0,"L",true);
	$pdf->SetFillColor(255, 166, 77);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM561'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM562'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM563'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM56=$_POST['opt1SM561']+$_POST['opt1SM562']+$_POST['opt1SM563']+$_POST['opt2SM561']+$_POST['opt2SM562']+$_POST['opt2SM563']+$_POST['opt3SM561']+$_POST['opt3SM562']+$_POST['opt3SM563'];
$pdf->Cell($kom3,3,$sztukSM56,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM56-$sumSM56;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM56`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM56']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM561']+$_POST['opt1SM562']+$_POST['opt1SM563'];
}
	$OEE1+=$cykl*$_POST['opt1SM561'];
	$OEE2+=$cykl*$_POST['opt1SM562'];
	$OEE3+=$cykl*$_POST['opt1SM563'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM56`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM56']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM561']+$_POST['opt2SM562']+$_POST['opt2SM563'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM561'];
	$OEE2+=$cykl*$_POST['opt2SM562'];
	$OEE3+=$cykl*$_POST['opt2SM563'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM56`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM56']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM561']+$_POST['opt3SM562']+$_POST['opt3SM563'];
}	

	$OEE1+=$cykl*$_POST['opt3SM561'];
	$OEE2+=$cykl*$_POST['opt3SM562'];
	$OEE3+=$cykl*$_POST['opt3SM563'];
if($_POST['tSM561']!=0){
	$OEE1=100*$OEE1/($_POST['tSM561']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM562']!=0){
	$OEE2=100*$OEE2/($_POST['tSM562']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM563']!=0){
	$OEE3=100*$OEE3/($_POST['tSM563']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srWC+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM56=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM561']!=0){
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

if($_POST['tSM562']!=0){
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

if($_POST['tSM563']!=0){
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

if($_POST['tSM561']+$_POST['tSM562']+$_POST['tSM563']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM55
$sumSM55=$_POST['SM551']+$_POST['SM552']+$_POST['SM553'];
$bilans = 0;
$pdf->SetXY($startx+246, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 55",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(255, 166, 77);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM551'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM552'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM553'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM55,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM55'],1,0,"L",true);
$pdf->SetFillColor(255, 166, 77);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM551'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM552'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM553'],1,0,"R",true);

if($_POST['opt2SM55']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(255, 128, 0);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM55'],1,0,"L",true);
	$pdf->SetFillColor(255, 166, 77);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM551'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM552'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM553'],1,0,"R",true);
}
if($_POST['opt3SM55']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(255, 128, 0);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM55'],1,0,"L",true);
	$pdf->SetFillColor(255, 166, 77);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM551'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM552'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM553'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM55=$_POST['opt1SM551']+$_POST['opt1SM552']+$_POST['opt1SM553']+$_POST['opt2SM551']+$_POST['opt2SM552']+$_POST['opt2SM553']+$_POST['opt3SM551']+$_POST['opt3SM552']+$_POST['opt3SM553'];
$pdf->Cell($kom3,3,$sztukSM55,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM55-$sumSM55;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM55`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM55']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM551']+$_POST['opt1SM552']+$_POST['opt1SM553'];
}
	$OEE1+=$cykl*$_POST['opt1SM551'];
	$OEE2+=$cykl*$_POST['opt1SM552'];
	$OEE3+=$cykl*$_POST['opt1SM553'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM55`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM55']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM551']+$_POST['opt2SM552']+$_POST['opt2SM553'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM551'];
	$OEE2+=$cykl*$_POST['opt2SM552'];
	$OEE3+=$cykl*$_POST['opt2SM553'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM55`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM55']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM551']+$_POST['opt3SM552']+$_POST['opt3SM553'];
}	

	$OEE1+=$cykl*$_POST['opt3SM551'];
	$OEE2+=$cykl*$_POST['opt3SM552'];
	$OEE3+=$cykl*$_POST['opt3SM553'];
if($_POST['tSM551']!=0){
	$OEE1=100*$OEE1/($_POST['tSM551']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM552']!=0){
	$OEE2=100*$OEE2/($_POST['tSM552']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM553']!=0){
	$OEE3=100*$OEE3/($_POST['tSM553']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srWC+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM55=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM551']!=0){
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

if($_POST['tSM552']!=0){
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

if($_POST['tSM553']!=0){
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

if($_POST['tSM551']+$_POST['tSM552']+$_POST['tSM553']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM24
$sumSM24=$_POST['SM241']+$_POST['SM242']+$_POST['SM243'];
$bilans = 0;
$pdf->SetXY($startx+132, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 24",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM241'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM242'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM243'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM24,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM24'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM241'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM242'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM243'],1,0,"R",true);

if($_POST['opt2SM24']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM24'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM241'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM242'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM243'],1,0,"R",true);
}
if($_POST['opt3SM24']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM24'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM241'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM242'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM243'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM24=$_POST['opt1SM241']+$_POST['opt1SM242']+$_POST['opt1SM243']+$_POST['opt2SM241']+$_POST['opt2SM242']+$_POST['opt2SM243']+$_POST['opt3SM241']+$_POST['opt3SM242']+$_POST['opt3SM243'];
$pdf->Cell($kom3,3,$sztukSM24,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM24-$sumSM24;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM24`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM24']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM241']+$_POST['opt1SM242']+$_POST['opt1SM243'];
}
	$OEE1+=$cykl*$_POST['opt1SM241'];
	$OEE2+=$cykl*$_POST['opt1SM242'];
	$OEE3+=$cykl*$_POST['opt1SM243'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM24`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM24']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM241']+$_POST['opt2SM242']+$_POST['opt2SM243'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM241'];
	$OEE2+=$cykl*$_POST['opt2SM242'];
	$OEE3+=$cykl*$_POST['opt2SM243'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM24`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM24']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM241']+$_POST['opt3SM242']+$_POST['opt3SM243'];
}	

	$OEE1+=$cykl*$_POST['opt3SM241'];
	$OEE2+=$cykl*$_POST['opt3SM242'];
	$OEE3+=$cykl*$_POST['opt3SM243'];
if($_POST['tSM241']!=0){
	$OEE1=100*$OEE1/($_POST['tSM241']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM242']!=0){
	$OEE2=100*$OEE2/($_POST['tSM242']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM243']!=0){
	$OEE3=100*$OEE3/($_POST['tSM243']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srCal+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM24=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM241']!=0){
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

if($_POST['tSM242']!=0){
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

if($_POST['tSM243']!=0){
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

if($_POST['tSM241']+$_POST['tSM242']+$_POST['tSM243']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM42
$sumSM42=$_POST['SM421']+$_POST['SM422']+$_POST['SM423'];
$bilans = 0;
$pdf->SetXY($startx+189, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 42",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM421'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM422'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM423'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM42,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM42'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM421'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM422'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM423'],1,0,"R",true);

if($_POST['opt2SM42']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM42'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM421'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM422'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM423'],1,0,"R",true);
}
if($_POST['opt3SM42']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM42'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM421'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM422'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM423'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM42=$_POST['opt1SM421']+$_POST['opt1SM422']+$_POST['opt1SM423']+$_POST['opt2SM421']+$_POST['opt2SM422']+$_POST['opt2SM423']+$_POST['opt3SM421']+$_POST['opt3SM422']+$_POST['opt3SM423'];
$pdf->Cell($kom3,3,$sztukSM42,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM42-$sumSM42;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM42`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM42']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM421']+$_POST['opt1SM422']+$_POST['opt1SM423'];
}
	$OEE1+=$cykl*$_POST['opt1SM421'];
	$OEE2+=$cykl*$_POST['opt1SM422'];
	$OEE3+=$cykl*$_POST['opt1SM423'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM42`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM42']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM421']+$_POST['opt2SM422']+$_POST['opt2SM423'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM421'];
	$OEE2+=$cykl*$_POST['opt2SM422'];
	$OEE3+=$cykl*$_POST['opt2SM423'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM42`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM42']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM421']+$_POST['opt3SM422']+$_POST['opt3SM423'];
}	

	$OEE1+=$cykl*$_POST['opt3SM421'];
	$OEE2+=$cykl*$_POST['opt3SM422'];
	$OEE3+=$cykl*$_POST['opt3SM423'];
if($_POST['tSM421']!=0){
	$OEE1=100*$OEE1/($_POST['tSM421']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM422']!=0){
	$OEE2=100*$OEE2/($_POST['tSM422']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM423']!=0){
	$OEE3=100*$OEE3/($_POST['tSM423']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srCal+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM42=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM421']!=0){
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

if($_POST['tSM422']!=0){
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

if($_POST['tSM423']!=0){
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

if($_POST['tSM421']+$_POST['tSM422']+$_POST['tSM423']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM77
$sumSM77=$_POST['SM771']+$_POST['SM772']+$_POST['SM773'];
$bilans = 0;
$pdf->SetXY($startx+189, $starty+155);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 77",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(255, 166, 77);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM771'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM772'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM773'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM77,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM77'],1,0,"L",true);
$pdf->SetFillColor(255, 166, 77);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM771'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM772'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM773'],1,0,"R",true);

if($_POST['opt2SM77']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(255, 128, 0);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM77'],1,0,"L",true);
	$pdf->SetFillColor(255, 166, 77);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM771'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM772'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM773'],1,0,"R",true);
}
if($_POST['opt3SM77']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(255, 128, 0);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM77'],1,0,"L",true);
	$pdf->SetFillColor(255, 166, 77);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM771'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM772'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM773'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM77=$_POST['opt1SM771']+$_POST['opt1SM772']+$_POST['opt1SM773']+$_POST['opt2SM771']+$_POST['opt2SM772']+$_POST['opt2SM773']+$_POST['opt3SM771']+$_POST['opt3SM772']+$_POST['opt3SM773'];
$pdf->Cell($kom3,3,$sztukSM77,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM77-$sumSM77;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM77`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM77']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM771']+$_POST['opt1SM772']+$_POST['opt1SM773'];
}
	$OEE1+=$cykl*$_POST['opt1SM771'];
	$OEE2+=$cykl*$_POST['opt1SM772'];
	$OEE3+=$cykl*$_POST['opt1SM773'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM77`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM77']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM771']+$_POST['opt2SM772']+$_POST['opt2SM773'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM771'];
	$OEE2+=$cykl*$_POST['opt2SM772'];
	$OEE3+=$cykl*$_POST['opt2SM773'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM77`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM77']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM771']+$_POST['opt3SM772']+$_POST['opt3SM773'];
}	

	$OEE1+=$cykl*$_POST['opt3SM771'];
	$OEE2+=$cykl*$_POST['opt3SM772'];
	$OEE3+=$cykl*$_POST['opt3SM773'];
if($_POST['tSM771']!=0){
	$OEE1=100*$OEE1/($_POST['tSM771']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM772']!=0){
	$OEE2=100*$OEE2/($_POST['tSM772']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM773']!=0){
	$OEE3=100*$OEE3/($_POST['tSM773']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srWC+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM77=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM771']!=0){
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

if($_POST['tSM772']!=0){
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

if($_POST['tSM773']!=0){
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

if($_POST['tSM771']+$_POST['tSM772']+$_POST['tSM773']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM65
$sumSM65=$_POST['SM651']+$_POST['SM652']+$_POST['SM653'];
$bilans = 0;
$pdf->SetXY($startx+246, $starty+85);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 65",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM651'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM652'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM653'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM65,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM65'],1,0,"L",true);
$pdf->SetFillColor(0 ,230, 0);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM651'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM652'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM653'],1,0,"R",true);

if($_POST['opt2SM65']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM65'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM651'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM652'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM653'],1,0,"R",true);
}
if($_POST['opt3SM65']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(10 ,200, 10);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM65'],1,0,"L",true);
	$pdf->SetFillColor(0 ,230, 0);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM651'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM652'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM653'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM65=$_POST['opt1SM651']+$_POST['opt1SM652']+$_POST['opt1SM653']+$_POST['opt2SM651']+$_POST['opt2SM652']+$_POST['opt2SM653']+$_POST['opt3SM651']+$_POST['opt3SM652']+$_POST['opt3SM653'];
$pdf->Cell($kom3,3,$sztukSM65,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM65-$sumSM65;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM65`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM65']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM651']+$_POST['opt1SM652']+$_POST['opt1SM653'];
}
	$OEE1+=$cykl*$_POST['opt1SM651'];
	$OEE2+=$cykl*$_POST['opt1SM652'];
	$OEE3+=$cykl*$_POST['opt1SM653'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM65`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM65']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM651']+$_POST['opt2SM652']+$_POST['opt2SM653'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM651'];
	$OEE2+=$cykl*$_POST['opt2SM652'];
	$OEE3+=$cykl*$_POST['opt2SM653'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM65`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM65']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM651']+$_POST['opt3SM652']+$_POST['opt3SM653'];
}	

	$OEE1+=$cykl*$_POST['opt3SM651'];
	$OEE2+=$cykl*$_POST['opt3SM652'];
	$OEE3+=$cykl*$_POST['opt3SM653'];
if($_POST['tSM651']!=0){
	$OEE1=100*$OEE1/($_POST['tSM651']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM652']!=0){
	$OEE2=100*$OEE2/($_POST['tSM652']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM653']!=0){
	$OEE3=100*$OEE3/($_POST['tSM653']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srCal+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM65=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM651']!=0){
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

if($_POST['tSM652']!=0){
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

if($_POST['tSM653']!=0){
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

if($_POST['tSM651']+$_POST['tSM652']+$_POST['tSM653']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

// SM64
$sumSM64=$_POST['SM641']+$_POST['SM642']+$_POST['SM643'];
$bilans = 0;
$pdf->SetXY($startx+303, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 64",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(179, 179, 255);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM641'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM642'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM643'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM64,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM64'],1,0,"L",true);
$pdf->SetFillColor(179, 179, 255);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM641'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM642'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM643'],1,0,"R",true);

if($_POST['opt2SM64']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(128, 128, 255);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM64'],1,0,"L",true);
	$pdf->SetFillColor(179, 179, 255);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM641'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM642'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM643'],1,0,"R",true);
}
if($_POST['opt3SM64']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(128, 128, 255);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM64'],1,0,"L",true);
	$pdf->SetFillColor(179, 179, 255);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM641'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM642'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM643'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM64=$_POST['opt1SM641']+$_POST['opt1SM642']+$_POST['opt1SM643']+$_POST['opt2SM641']+$_POST['opt2SM642']+$_POST['opt2SM643']+$_POST['opt3SM641']+$_POST['opt3SM642']+$_POST['opt3SM643'];
$pdf->Cell($kom3,3,$sztukSM64,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM64-$sumSM64;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM64`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM64']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM641']+$_POST['opt1SM642']+$_POST['opt1SM643'];
}
	$OEE1+=$cykl*$_POST['opt1SM641'];
	$OEE2+=$cykl*$_POST['opt1SM642'];
	$OEE3+=$cykl*$_POST['opt1SM643'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM64`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM64']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM641']+$_POST['opt2SM642']+$_POST['opt2SM643'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM641'];
	$OEE2+=$cykl*$_POST['opt2SM642'];
	$OEE3+=$cykl*$_POST['opt2SM643'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM64`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM64']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM641']+$_POST['opt3SM642']+$_POST['opt3SM643'];
}	

	$OEE1+=$cykl*$_POST['opt3SM641'];
	$OEE2+=$cykl*$_POST['opt3SM642'];
	$OEE3+=$cykl*$_POST['opt3SM643'];
if($_POST['tSM641']!=0){
	$OEE1=100*$OEE1/($_POST['tSM641']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM642']!=0){
	$OEE2=100*$OEE2/($_POST['tSM642']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM643']!=0){
	$OEE3=100*$OEE3/($_POST['tSM643']*60);
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
$OEESM64=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM641']!=0){
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

if($_POST['tSM642']!=0){
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

if($_POST['tSM643']!=0){
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

if($_POST['tSM641']+$_POST['tSM642']+$_POST['tSM643']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


// SM68
$sumSM68=$_POST['SM681']+$_POST['SM682']+$_POST['SM683'];
$bilans = 0;
$pdf->SetXY($startx+18, $starty+15);
$pdf->SetFillColor(255 ,255, 102);
$pdf->SetTextColor(230 ,0, 0);
$pdf->SetFont("Arial","B",16); $pdf->Cell(20,8,"SM 68",0,0,"L",true);  $pdf->SetFont("Arial","",8);
$pdf->SetTextColor(0 ,0, 0);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-38, $y+8);
$pdf->SetFillColor(255 ,255, 102);
$pdf->Cell($kom1,12,"Plan: ",1,0,"L",true);
$pdf->SetFillColor(255, 255, 179);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM681'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM682'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['SM683'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3,"suma ",1,0,"L",true);
$pdf->Cell($kom3,3,$sumSM68,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(255 ,255, 102);
$pdf->Cell(32,9,"Referencja ".$_POST['opt1SM68'],1,0,"L",true);
$pdf->SetFillColor(255, 255, 179);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM681'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM682'],1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
$pdf->Cell($kom3,3,$_POST['opt1SM683'],1,0,"R",true);

if($_POST['opt2SM68']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(255 ,255, 102);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt2SM68'],1,0,"L",true);
	$pdf->SetFillColor(255, 255, 179);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM681'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM682'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt2SM683'],1,0,"R",true);
}
if($_POST['opt3SM68']!=0){
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
	$pdf->SetFillColor(255 ,255, 102);
	$pdf->Cell(32,9,"Referencja ".$_POST['opt3SM68'],1,0,"L",true);
	$pdf->SetFillColor(255, 255, 179);
	$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM681'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 2ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM682'],1,0,"R",true);
	$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-20, $y+3);
	$pdf->Cell($kom2,3," 3ZM ",1,0,"L",true);
	$pdf->Cell($kom3,3,$_POST['opt3SM683'],1,0,"R",true);
}
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$pdf->SetFillColor(255 ,255, 102);
$pdf->Cell($kom1+$kom2,3,"Wyprodukowanych sztuk",1,0,"L",true);
$sztukSM68=$_POST['opt1SM681']+$_POST['opt1SM682']+$_POST['opt1SM683']+$_POST['opt2SM681']+$_POST['opt2SM682']+$_POST['opt2SM683']+$_POST['opt3SM681']+$_POST['opt3SM682']+$_POST['opt3SM683'];
$pdf->Cell($kom3,3,$sztukSM68,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+3);
$bilans=$sztukSM68-$sumSM68;
$pdf->Cell($kom1+$kom2,3," +/- dzien",1,0,"L",true);
$pdf->Cell($kom3,3,$bilans,1,0,"R",true);

//obliczanie OEE
$OEE1=0; $OEE2=0; $OEE3=0; $OEEsr=0; $cykl=0; $sr=0; $projekt=0;

$query = "SELECT * FROM `SM68`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt1SM68']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt1SM681']+$_POST['opt1SM682']+$_POST['opt1SM683'];
}
	$OEE1+=$cykl*$_POST['opt1SM681'];
	$OEE2+=$cykl*$_POST['opt1SM682'];
	$OEE3+=$cykl*$_POST['opt1SM683'];

$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM68`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt2SM68']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt2SM681']+$_POST['opt2SM682']+$_POST['opt2SM683'];
}	
	
	$OEE1+=$cykl*$_POST['opt2SM681'];
	$OEE2+=$cykl*$_POST['opt2SM682'];
	$OEE3+=$cykl*$_POST['opt2SM683'];
	
$projekt=0;
$cykl=0;
$query = "SELECT * FROM `SM68`";
$result1 = mysqli_query($conn, $query);
	while($row1 = mysqli_fetch_array($result1)):;
		if($_POST['opt3SM68']==$row1[1]){
			$cykl=$row1[2];
			$projekt=$row1[3];
		}
    endwhile;
	
if($projekt!=0){
	$projekty[$projekt]+=$_POST['opt3SM681']+$_POST['opt3SM682']+$_POST['opt3SM683'];
}	

	$OEE1+=$cykl*$_POST['opt3SM681'];
	$OEE2+=$cykl*$_POST['opt3SM682'];
	$OEE3+=$cykl*$_POST['opt3SM683'];
if($_POST['tSM681']!=0){
	$OEE1=100*$OEE1/($_POST['tSM681']*60);
	$OEEsr+=$OEE1; $sr+=1;
	}else{$OEE1=0;}
if($_POST['tSM682']!=0){
	$OEE2=100*$OEE2/($_POST['tSM682']*60);
	$OEEsr+=$OEE2; $sr+=1;
	}else{$OEE2=0;}
if($_POST['tSM683']!=0){
	$OEE3=100*$OEE3/($_POST['tSM683']*60);
	$OEEsr+=$OEE3; $sr+=1;
	}else{$OEE3=0;}
if($sr!=0){
$OEEsr=($OEE1+$OEE2+$OEE3)/$sr;
$srBiel+=1;
}else{$OEEsr=0;}
$OEE1=round($OEE1, 1);
$OEE2=round($OEE2, 1);
$OEE3=round($OEE3, 1);
$OEEsr=round($OEEsr, 1);
$OEESM68=$OEEsr;
//wyswietlanie OEE
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-52, $y+5);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(32,12,"OEE ",1,0,"L",true);
$pdf->SetFillColor(255 , 204, 102);
$pdf->Cell($kom2,3," 1ZM ",1,0,"L",true);
if($_POST['tSM681']!=0){
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

if($_POST['tSM682']!=0){
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

if($_POST['tSM683']!=0){
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

if($_POST['tSM681']+$_POST['tSM682']+$_POST['tSM683']!=0){
	if($OEEsr>80){
	$pdf->SetFillColor(0 ,230, 0);
	}else{
	$pdf->SetFillColor(250,60,60);;
	}
$pdf->Cell($kom3,3,$OEEsr."%",1,0,"R",true);
}else{$pdf->Cell($kom3,3,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


//TABELE DODATKOWE
$pdf->SetFont("Arial","",16);


//Caliper
$sztukCal=$sztukSM25+$sztukSM84+$sztukSM45+$sztukSM22+$sztukSM52+$sztukSM24+$sztukSM42+$sztukSM65+$sztukSM40+$sztukSM59;
if($srCal!=0){ //dzielnik ró¿ny od 0
$OEECal=($OEESM40+$OEESM59+$OEESM52+$OEESM25+$OEESM84+$OEESM24+$OEESM45+$OEESM42+$OEESM65+$OEESM22)/$srCal;
}else{$OEECal=0;}
$pdf->SetXY($startx+15, $starty+230);
$pdf->SetFillColor(10 ,200, 10);
$pdf->Cell(55,6,"Caliper",1,0,"L",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-55, $y+6);
$pdf->SetFillColor(250 ,180, 180);
$pdf->Cell(35,6,"Wykonanych",1,0,"L",true);
$pdf->Cell(20,6,$sztukCal,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-55, $y+6);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(35,6,"OEE",1,0,"L",true);
if($srCal!=0){ //dzielnik ró¿ny od 0
if($OEECal>80){
	$pdf->SetFillColor(10,180,80);
	}else{
	$pdf->SetFillColor(200,40,10);
	}
$OEECal=round($OEECal, 1);
$pdf->Cell(20,6,$OEECal."%",1,0,"R",true);
}else{$pdf->Cell(20,6,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

//Bracket
$sumBracket=$sumSM64+$sumSM63+$sumSM80+$sumSM51+$sumSM97;
$sztukBracket=$sztukSM64+$sztukSM63+$sztukSM80+$sztukSM51+$sztukSM97;
$pdf->SetXY($startx+90, $starty+230);
if($srBracket!=0){
$OEEBracket=($OEESM64+$OEESM63+$OEESM80+$OEESM51+$OEESM97)/$srBracket;
}else{$OEEBracket=0;}
$pdf->SetFillColor(128, 128, 255);
$pdf->Cell(55,6,"Bracket",1,0,"L",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-55, $y+6);
$pdf->SetFillColor(250 ,180, 180);
$pdf->Cell(35,6,"Wykonanych",1,0,"L",true);
$pdf->Cell(20,6,$sztukBracket,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-55, $y+6);
$pdf->SetFillColor(102,163,255);
$pdf->Cell(35,6,"OEE",1,0,"L",true);

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

//WC
$sztukWC=$sztukSM55+$sztukSM56+$sztukSM76+$sztukSM77;
$sumWC=$sumSM55+$sumSM56+$sumSM76+$sumSM77;
$pdf->SetXY($startx+170, $starty+230);
$pdf->SetFillColor(255, 128, 0);
$pdf->Cell(55,6,"WC",1,0,"L",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-55, $y+6);
$pdf->SetFillColor(250 ,180, 180);
$pdf->Cell(35,6,"Wykonanych",1,0,"L",true);
$pdf->Cell(20,6,$sztukWC,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-55, $y+6);
if($srWC!=0){ 
$OEEWC=($OEESM55+$OEESM56+$OEESM76+$OEESM77)/$srWC;
}else{$OEEWC=0;}
$pdf->SetFillColor(102,163,255);
$pdf->Cell(35,6,"OEE",1,0,"L",true);
if($OEEWC!=0){
if($OEEWC>80){
	$pdf->SetFillColor(10,180,80);
	}else{
	$pdf->SetFillColor(200,40,10);
	}
$OEEWC=round($OEEWC, 1);
$pdf->Cell(20,6,$OEEWC."%",1,0,"R",true);
}else{$pdf->Cell(20,6,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);

//Bieletka
$sztukBiel=$sztukSM68;
$sumBiel=$sumSM68;
$pdf->SetXY($startx+250, $starty+230);
$pdf->SetFillColor(255 ,255, 102);
$pdf->Cell(55,6,"Bieletka",1,0,"L",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-55, $y+6);
$pdf->SetFillColor(250 ,180, 180);
$pdf->Cell(35,6,"Wykonanych",1,0,"L",true);
$pdf->Cell(20,6,$sztukBiel,1,0,"R",true);
$x = $pdf->GetX(); $y = $pdf->GetY(); $pdf->SetXY($x-55, $y+6);
if($srBiel!=0){ 
$OEEBiel=($OEESM68)/$srBiel;
}else{$OEEBiel=0;}
$pdf->SetFillColor(102,163,255);
$pdf->Cell(35,6,"OEE",1,0,"L",true);
if($OEEBiel!=0){
if($OEEBiel>80){
	$pdf->SetFillColor(10,180,80);
	}else{
	$pdf->SetFillColor(200,40,10);
	}
$OEEBiel=round($OEEBiel, 1);
$pdf->Cell(20,6,$OEEBiel."%",1,0,"R",true);
}else{$pdf->Cell(20,6,"x",1,0,"R",true);}
$pdf->SetTextColor(0,0,0);


//Nowa strona raportu
$pdf->AddPage();

$pdf->SetXY($startx, $starty);
$x = $pdf->GetX(); $y = $pdf->GetY();

$pdf->Cell(40,10,"Raport Op. 20",1,0,"L");
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

list($y,$m,$d)=explode('-',$_POST['date']);
$dzientyg = date("w",mktime(0,0,0,$m,$d,$y));

if($dzientyg == 0){
	$dzientyg=7;
}

$datax=$data;
for($i=1;$i<8;$i++){
	if($i<$dzientyg){
		$datax=$data+($i-$dzientyg);
		$query2="SELECT IPS FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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
		$query2="SELECT PSAk FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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
		$query2="SELECT PSAw FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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
		$query2="SELECT MNBkf FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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
		$query2="SELECT MNBkr FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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
		$query2="SELECT MNBwf FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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
		$query2="SELECT MNBwr FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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
		$query2="SELECT MFA2kf FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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
		$query2="SELECT MFA2kr FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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
		$query2="SELECT MFA2wf FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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
		$query2="SELECT MFA2wr FROM op20 WHERE date=".$datax." ORDER BY id DESC LIMIT 1";
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

$sql = "INSERT INTO op20 (date,
tSM251,
tSM252,
tSM253,
SM251,
SM252,
SM253,
opt1SM25,
opt1SM251,
opt1SM252,
opt1SM253,
opt2SM25,
opt2SM251,
opt2SM252,
opt2SM253,
opt3SM25,
opt3SM251,
opt3SM252,
opt3SM253,
tSM841,
tSM842,
tSM843,
SM841,
SM842,
SM843,
opt1SM84,
opt1SM841,
opt1SM842,
opt1SM843,
opt2SM84,
opt2SM841,
opt2SM842,
opt2SM843,
opt3SM84,
opt3SM841,
opt3SM842,
opt3SM843,
tSM451,
tSM452,
tSM453,
SM451,
SM452,
SM453,
opt1SM45,
opt1SM451,
opt1SM452,
opt1SM453,
opt2SM45,
opt2SM451,
opt2SM452,
opt2SM453,
opt3SM45,
opt3SM451,
opt3SM452,
opt3SM453,
tSM221,
tSM222,
tSM223,
SM221,
SM222,
SM223,
opt1SM22,
opt1SM221,
opt1SM222,
opt1SM223,
opt2SM22,
opt2SM221,
opt2SM222,
opt2SM223,
opt3SM22,
opt3SM221,
opt3SM222,
opt3SM223,
tSM521,
tSM522,
tSM523,
SM521,
SM522,
SM523,
opt1SM52,
opt1SM521,
opt1SM522,
opt1SM523,
opt2SM52,
opt2SM521,
opt2SM522,
opt2SM523,
opt3SM52,
opt3SM521,
opt3SM522,
opt3SM523,
tSM241,
tSM242,
tSM243,
SM241,
SM242,
SM243,
opt1SM24,
opt1SM241,
opt1SM242,
opt1SM243,
opt2SM24,
opt2SM241,
opt2SM242,
opt2SM243,
opt3SM24,
opt3SM241,
opt3SM242,
opt3SM243,
tSM401,
tSM402,
tSM403,
SM401,
SM402,
SM403,
opt1SM40,
opt1SM401,
opt1SM402,
opt1SM403,
opt2SM40,
opt2SM401,
opt2SM402,
opt2SM403,
opt3SM40,
opt3SM401,
opt3SM402,
opt3SM403,
tSM591,
tSM592,
tSM593,
SM591,
SM592,
SM593,
opt1SM59,
opt1SM591,
opt1SM592,
opt1SM593,
opt2SM59,
opt2SM591,
opt2SM592,
opt2SM593,
opt3SM59,
opt3SM591,
opt3SM592,
opt3SM593,
tSM421,
tSM422,
tSM423,
SM421,
SM422,
SM423,
opt1SM42,
opt1SM421,
opt1SM422,
opt1SM423,
opt2SM42,
opt2SM421,
opt2SM422,
opt2SM423,
opt3SM42,
opt3SM421,
opt3SM422,
opt3SM423,
tSM651,
tSM652,
tSM653,
SM651,
SM652,
SM653,
opt1SM65,
opt1SM651,
opt1SM652,
opt1SM653,
opt2SM65,
opt2SM651,
opt2SM652,
opt2SM653,
opt3SM65,
opt3SM651,
opt3SM652,
opt3SM653,
tSM641,
tSM642,
tSM643,
SM641,
SM642,
SM643,
opt1SM64,
opt1SM641,
opt1SM642,
opt1SM643,
opt2SM64,
opt2SM641,
opt2SM642,
opt2SM643,
opt3SM64,
opt3SM641,
opt3SM642,
opt3SM643,
tSM801,
tSM802,
tSM803,
SM801,
SM802,
SM803,
opt1SM80,
opt1SM801,
opt1SM802,
opt1SM803,
opt2SM80,
opt2SM801,
opt2SM802,
opt2SM803,
opt3SM80,
opt3SM801,
opt3SM802,
opt3SM803,
tSM631,
tSM632,
tSM633,
SM631,
SM632,
SM633,
opt1SM63,
opt1SM631,
opt1SM632,
opt1SM633,
opt2SM63,
opt2SM631,
opt2SM632,
opt2SM633,
opt3SM63,
opt3SM631,
opt3SM632,
opt3SM633,
tSM511,
tSM512,
tSM513,
SM511,
SM512,
SM513,
opt1SM51,
opt1SM511,
opt1SM512,
opt1SM513,
opt2SM51,
opt2SM511,
opt2SM512,
opt2SM513,
opt3SM51,
opt3SM511,
opt3SM512,
opt3SM513,
tSM551,
tSM552,
tSM553,
SM551,
SM552,
SM553,
opt1SM55,
opt1SM551,
opt1SM552,
opt1SM553,
opt2SM55,
opt2SM551,
opt2SM552,
opt2SM553,
opt3SM55,
opt3SM551,
opt3SM552,
opt3SM553,
tSM561,
tSM562,
tSM563,
SM561,
SM562,
SM563,
opt1SM56,
opt1SM561,
opt1SM562,
opt1SM563,
opt2SM56,
opt2SM561,
opt2SM562,
opt2SM563,
opt3SM56,
opt3SM561,
opt3SM562,
opt3SM563,
tSM761,
tSM762,
tSM763,
SM761,
SM762,
SM763,
opt1SM76,
opt1SM761,
opt1SM762,
opt1SM763,
opt2SM76,
opt2SM761,
opt2SM762,
opt2SM763,
opt3SM76,
opt3SM761,
opt3SM762,
opt3SM763,
tSM771,
tSM772,
tSM773,
SM771,
SM772,
SM773,
opt1SM77,
opt1SM771,
opt1SM772,
opt1SM773,
opt2SM77,
opt2SM771,
opt2SM772,
opt2SM773,
opt3SM77,
opt3SM771,
opt3SM772,
opt3SM773,
tSM971,
tSM972,
tSM973,
SM971,
SM972,
SM973,
opt1SM97,
opt1SM971,
opt1SM972,
opt1SM973,
opt2SM97,
opt2SM971,
opt2SM972,
opt2SM973,
opt3SM97,
opt3SM971,
opt3SM972,
opt3SM973,
tSM681,
tSM682,
tSM683,
SM681,
SM682,
SM683,
opt1SM68,
opt1SM681,
opt1SM682,
opt1SM683,
opt2SM68,
opt2SM681,
opt2SM682,
opt2SM683,
opt3SM68,
opt3SM681,
opt3SM682,
opt3SM683,
OEESM25,
OEESM84,
OEESM45,
OEESM22,
OEESM52,
OEESM24,
OEESM40,
OEESM59,
OEESM42,
OEESM65,
OEESM64,
OEESM80,
OEESM63,
OEESM51,
OEESM55,
OEESM56,
OEESM76,
OEESM77,
OEESM97,
OEESM68,
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
 ' ".$_POST['tSM251']."',
 ' ".$_POST['tSM252']."',
 ' ".$_POST['tSM253']."',
 ' ".$_POST['SM251']."',
 ' ".$_POST['SM252']."',
 ' ".$_POST['SM253']."',
 ' ".$_POST['opt1SM25']."',
 ' ".$_POST['opt1SM251']."',
 ' ".$_POST['opt1SM252']."',
 ' ".$_POST['opt1SM253']."',
 ' ".$_POST['opt2SM25']."',
 ' ".$_POST['opt2SM251']."',
 ' ".$_POST['opt2SM252']."',
 ' ".$_POST['opt2SM253']."',
 ' ".$_POST['opt3SM25']."',
 ' ".$_POST['opt3SM251']."',
 ' ".$_POST['opt3SM252']."',
 ' ".$_POST['opt3SM253']."',
 ' ".$_POST['tSM841']."',
 ' ".$_POST['tSM842']."',
 ' ".$_POST['tSM843']."',
 ' ".$_POST['SM841']."',
 ' ".$_POST['SM842']."',
 ' ".$_POST['SM843']."',
 ' ".$_POST['opt1SM84']."',
 ' ".$_POST['opt1SM841']."',
 ' ".$_POST['opt1SM842']."',
 ' ".$_POST['opt1SM843']."',
 ' ".$_POST['opt2SM84']."',
 ' ".$_POST['opt2SM841']."',
 ' ".$_POST['opt2SM842']."',
 ' ".$_POST['opt2SM843']."',
 ' ".$_POST['opt3SM84']."',
 ' ".$_POST['opt3SM841']."',
 ' ".$_POST['opt3SM842']."',
 ' ".$_POST['opt3SM843']."',
 ' ".$_POST['tSM451']."',
 ' ".$_POST['tSM452']."',
 ' ".$_POST['tSM453']."',
 ' ".$_POST['SM451']."',
 ' ".$_POST['SM452']."',
 ' ".$_POST['SM453']."',
 ' ".$_POST['opt1SM45']."',
 ' ".$_POST['opt1SM451']."',
 ' ".$_POST['opt1SM452']."',
 ' ".$_POST['opt1SM453']."',
 ' ".$_POST['opt2SM45']."',
 ' ".$_POST['opt2SM451']."',
 ' ".$_POST['opt2SM452']."',
 ' ".$_POST['opt2SM453']."',
 ' ".$_POST['opt3SM45']."',
 ' ".$_POST['opt3SM451']."',
 ' ".$_POST['opt3SM452']."',
 ' ".$_POST['opt3SM453']."',
 ' ".$_POST['tSM221']."',
 ' ".$_POST['tSM222']."',
 ' ".$_POST['tSM223']."',
 ' ".$_POST['SM221']."',
 ' ".$_POST['SM222']."',
 ' ".$_POST['SM223']."',
 ' ".$_POST['opt1SM22']."',
 ' ".$_POST['opt1SM221']."',
 ' ".$_POST['opt1SM222']."',
 ' ".$_POST['opt1SM223']."',
 ' ".$_POST['opt2SM22']."',
 ' ".$_POST['opt2SM221']."',
 ' ".$_POST['opt2SM222']."',
 ' ".$_POST['opt2SM223']."',
 ' ".$_POST['opt3SM22']."',
 ' ".$_POST['opt3SM221']."',
 ' ".$_POST['opt3SM222']."',
 ' ".$_POST['opt3SM223']."',
 ' ".$_POST['tSM521']."',
 ' ".$_POST['tSM522']."',
 ' ".$_POST['tSM523']."',
 ' ".$_POST['SM521']."',
 ' ".$_POST['SM522']."',
 ' ".$_POST['SM523']."',
 ' ".$_POST['opt1SM52']."',
 ' ".$_POST['opt1SM521']."',
 ' ".$_POST['opt1SM522']."',
 ' ".$_POST['opt1SM523']."',
 ' ".$_POST['opt2SM52']."',
 ' ".$_POST['opt2SM521']."',
 ' ".$_POST['opt2SM522']."',
 ' ".$_POST['opt2SM523']."',
 ' ".$_POST['opt3SM52']."',
 ' ".$_POST['opt3SM521']."',
 ' ".$_POST['opt3SM522']."',
 ' ".$_POST['opt3SM523']."',
 ' ".$_POST['tSM241']."',
 ' ".$_POST['tSM242']."',
 ' ".$_POST['tSM243']."',
 ' ".$_POST['SM241']."',
 ' ".$_POST['SM242']."',
 ' ".$_POST['SM243']."',
 ' ".$_POST['opt1SM24']."',
 ' ".$_POST['opt1SM241']."',
 ' ".$_POST['opt1SM242']."',
 ' ".$_POST['opt1SM243']."',
 ' ".$_POST['opt2SM24']."',
 ' ".$_POST['opt2SM241']."',
 ' ".$_POST['opt2SM242']."',
 ' ".$_POST['opt2SM243']."',
 ' ".$_POST['opt3SM24']."',
 ' ".$_POST['opt3SM241']."',
 ' ".$_POST['opt3SM242']."',
 ' ".$_POST['opt3SM243']."',
 ' ".$_POST['tSM401']."',
 ' ".$_POST['tSM402']."',
 ' ".$_POST['tSM403']."',
 ' ".$_POST['SM401']."',
 ' ".$_POST['SM402']."',
 ' ".$_POST['SM403']."',
 ' ".$_POST['opt1SM40']."',
 ' ".$_POST['opt1SM401']."',
 ' ".$_POST['opt1SM402']."',
 ' ".$_POST['opt1SM403']."',
 ' ".$_POST['opt2SM40']."',
 ' ".$_POST['opt2SM401']."',
 ' ".$_POST['opt2SM402']."',
 ' ".$_POST['opt2SM403']."',
 ' ".$_POST['opt3SM40']."',
 ' ".$_POST['opt3SM401']."',
 ' ".$_POST['opt3SM402']."',
 ' ".$_POST['opt3SM403']."',
 ' ".$_POST['tSM591']."',
 ' ".$_POST['tSM592']."',
 ' ".$_POST['tSM593']."',
 ' ".$_POST['SM591']."',
 ' ".$_POST['SM592']."',
 ' ".$_POST['SM593']."',
 ' ".$_POST['opt1SM59']."',
 ' ".$_POST['opt1SM591']."',
 ' ".$_POST['opt1SM592']."',
 ' ".$_POST['opt1SM593']."',
 ' ".$_POST['opt2SM59']."',
 ' ".$_POST['opt2SM591']."',
 ' ".$_POST['opt2SM592']."',
 ' ".$_POST['opt2SM593']."',
 ' ".$_POST['opt3SM59']."',
 ' ".$_POST['opt3SM591']."',
 ' ".$_POST['opt3SM592']."',
 ' ".$_POST['opt3SM593']."',
 ' ".$_POST['tSM421']."',
 ' ".$_POST['tSM422']."',
 ' ".$_POST['tSM423']."',
 ' ".$_POST['SM421']."',
 ' ".$_POST['SM422']."',
 ' ".$_POST['SM423']."',
 ' ".$_POST['opt1SM42']."',
 ' ".$_POST['opt1SM421']."',
 ' ".$_POST['opt1SM422']."',
 ' ".$_POST['opt1SM423']."',
 ' ".$_POST['opt2SM42']."',
 ' ".$_POST['opt2SM421']."',
 ' ".$_POST['opt2SM422']."',
 ' ".$_POST['opt2SM423']."',
 ' ".$_POST['opt3SM42']."',
 ' ".$_POST['opt3SM421']."',
 ' ".$_POST['opt3SM422']."',
 ' ".$_POST['opt3SM423']."',
 ' ".$_POST['tSM651']."',
 ' ".$_POST['tSM652']."',
 ' ".$_POST['tSM653']."',
 ' ".$_POST['SM651']."',
 ' ".$_POST['SM652']."',
 ' ".$_POST['SM653']."',
 ' ".$_POST['opt1SM65']."',
 ' ".$_POST['opt1SM651']."',
 ' ".$_POST['opt1SM652']."',
 ' ".$_POST['opt1SM653']."',
 ' ".$_POST['opt2SM65']."',
 ' ".$_POST['opt2SM651']."',
 ' ".$_POST['opt2SM652']."',
 ' ".$_POST['opt2SM653']."',
 ' ".$_POST['opt3SM65']."',
 ' ".$_POST['opt3SM651']."',
 ' ".$_POST['opt3SM652']."',
 ' ".$_POST['opt3SM653']."',
 ' ".$_POST['tSM641']."',
 ' ".$_POST['tSM642']."',
 ' ".$_POST['tSM643']."',
 ' ".$_POST['SM641']."',
 ' ".$_POST['SM642']."',
 ' ".$_POST['SM643']."',
 ' ".$_POST['opt1SM64']."',
 ' ".$_POST['opt1SM641']."',
 ' ".$_POST['opt1SM642']."',
 ' ".$_POST['opt1SM643']."',
 ' ".$_POST['opt2SM64']."',
 ' ".$_POST['opt2SM641']."',
 ' ".$_POST['opt2SM642']."',
 ' ".$_POST['opt2SM643']."',
 ' ".$_POST['opt3SM64']."',
 ' ".$_POST['opt3SM641']."',
 ' ".$_POST['opt3SM642']."',
 ' ".$_POST['opt3SM643']."',
 ' ".$_POST['tSM801']."',
 ' ".$_POST['tSM802']."',
 ' ".$_POST['tSM803']."',
 ' ".$_POST['SM801']."',
 ' ".$_POST['SM802']."',
 ' ".$_POST['SM803']."',
 ' ".$_POST['opt1SM80']."',
 ' ".$_POST['opt1SM801']."',
 ' ".$_POST['opt1SM802']."',
 ' ".$_POST['opt1SM803']."',
 ' ".$_POST['opt2SM80']."',
 ' ".$_POST['opt2SM801']."',
 ' ".$_POST['opt2SM802']."',
 ' ".$_POST['opt2SM803']."',
 ' ".$_POST['opt3SM80']."',
 ' ".$_POST['opt3SM801']."',
 ' ".$_POST['opt3SM802']."',
 ' ".$_POST['opt3SM803']."',
 ' ".$_POST['tSM631']."',
 ' ".$_POST['tSM632']."',
 ' ".$_POST['tSM633']."',
 ' ".$_POST['SM631']."',
 ' ".$_POST['SM632']."',
 ' ".$_POST['SM633']."',
 ' ".$_POST['opt1SM63']."',
 ' ".$_POST['opt1SM631']."',
 ' ".$_POST['opt1SM632']."',
 ' ".$_POST['opt1SM633']."',
 ' ".$_POST['opt2SM63']."',
 ' ".$_POST['opt2SM631']."',
 ' ".$_POST['opt2SM632']."',
 ' ".$_POST['opt2SM633']."',
 ' ".$_POST['opt3SM63']."',
 ' ".$_POST['opt3SM631']."',
 ' ".$_POST['opt3SM632']."',
 ' ".$_POST['opt3SM633']."',
 ' ".$_POST['tSM511']."',
 ' ".$_POST['tSM512']."',
 ' ".$_POST['tSM513']."',
 ' ".$_POST['SM511']."',
 ' ".$_POST['SM512']."',
 ' ".$_POST['SM513']."',
 ' ".$_POST['opt1SM51']."',
 ' ".$_POST['opt1SM511']."',
 ' ".$_POST['opt1SM512']."',
 ' ".$_POST['opt1SM513']."',
 ' ".$_POST['opt2SM51']."',
 ' ".$_POST['opt2SM511']."',
 ' ".$_POST['opt2SM512']."',
 ' ".$_POST['opt2SM513']."',
 ' ".$_POST['opt3SM51']."',
 ' ".$_POST['opt3SM511']."',
 ' ".$_POST['opt3SM512']."',
 ' ".$_POST['opt3SM513']."',
 ' ".$_POST['tSM551']."',
 ' ".$_POST['tSM552']."',
 ' ".$_POST['tSM553']."',
 ' ".$_POST['SM551']."',
 ' ".$_POST['SM552']."',
 ' ".$_POST['SM553']."',
 ' ".$_POST['opt1SM55']."',
 ' ".$_POST['opt1SM551']."',
 ' ".$_POST['opt1SM552']."',
 ' ".$_POST['opt1SM553']."',
 ' ".$_POST['opt2SM55']."',
 ' ".$_POST['opt2SM551']."',
 ' ".$_POST['opt2SM552']."',
 ' ".$_POST['opt2SM553']."',
 ' ".$_POST['opt3SM55']."',
 ' ".$_POST['opt3SM551']."',
 ' ".$_POST['opt3SM552']."',
 ' ".$_POST['opt3SM553']."',
 ' ".$_POST['tSM561']."',
 ' ".$_POST['tSM562']."',
 ' ".$_POST['tSM563']."',
 ' ".$_POST['SM561']."',
 ' ".$_POST['SM562']."',
 ' ".$_POST['SM563']."',
 ' ".$_POST['opt1SM56']."',
 ' ".$_POST['opt1SM561']."',
 ' ".$_POST['opt1SM562']."',
 ' ".$_POST['opt1SM563']."',
 ' ".$_POST['opt2SM56']."',
 ' ".$_POST['opt2SM561']."',
 ' ".$_POST['opt2SM562']."',
 ' ".$_POST['opt2SM563']."',
 ' ".$_POST['opt3SM56']."',
 ' ".$_POST['opt3SM561']."',
 ' ".$_POST['opt3SM562']."',
 ' ".$_POST['opt3SM563']."',
 ' ".$_POST['tSM761']."',
 ' ".$_POST['tSM762']."',
 ' ".$_POST['tSM763']."',
 ' ".$_POST['SM761']."',
 ' ".$_POST['SM762']."',
 ' ".$_POST['SM763']."',
 ' ".$_POST['opt1SM76']."',
 ' ".$_POST['opt1SM761']."',
 ' ".$_POST['opt1SM762']."',
 ' ".$_POST['opt1SM763']."',
 ' ".$_POST['opt2SM76']."',
 ' ".$_POST['opt2SM761']."',
 ' ".$_POST['opt2SM762']."',
 ' ".$_POST['opt2SM763']."',
 ' ".$_POST['opt3SM76']."',
 ' ".$_POST['opt3SM761']."',
 ' ".$_POST['opt3SM762']."',
 ' ".$_POST['opt3SM763']."',
 ' ".$_POST['tSM771']."',
 ' ".$_POST['tSM772']."',
 ' ".$_POST['tSM773']."',
 ' ".$_POST['SM771']."',
 ' ".$_POST['SM772']."',
 ' ".$_POST['SM773']."',
 ' ".$_POST['opt1SM77']."',
 ' ".$_POST['opt1SM771']."',
 ' ".$_POST['opt1SM772']."',
 ' ".$_POST['opt1SM773']."',
 ' ".$_POST['opt2SM77']."',
 ' ".$_POST['opt2SM771']."',
 ' ".$_POST['opt2SM772']."',
 ' ".$_POST['opt2SM773']."',
 ' ".$_POST['opt3SM77']."',
 ' ".$_POST['opt3SM771']."',
 ' ".$_POST['opt3SM772']."',
 ' ".$_POST['opt3SM773']."',
 ' ".$_POST['tSM971']."',
 ' ".$_POST['tSM972']."',
 ' ".$_POST['tSM973']."',
 ' ".$_POST['SM971']."',
 ' ".$_POST['SM972']."',
 ' ".$_POST['SM973']."',
 ' ".$_POST['opt1SM97']."',
 ' ".$_POST['opt1SM971']."',
 ' ".$_POST['opt1SM972']."',
 ' ".$_POST['opt1SM973']."',
 ' ".$_POST['opt2SM97']."',
 ' ".$_POST['opt2SM971']."',
 ' ".$_POST['opt2SM972']."',
 ' ".$_POST['opt2SM973']."',
 ' ".$_POST['opt3SM97']."',
 ' ".$_POST['opt3SM971']."',
 ' ".$_POST['opt3SM972']."',
 ' ".$_POST['opt3SM973']."',
 ' ".$_POST['tSM681']."',
 ' ".$_POST['tSM682']."',
 ' ".$_POST['tSM683']."',
 ' ".$_POST['SM681']."',
 ' ".$_POST['SM682']."',
 ' ".$_POST['SM683']."',
 ' ".$_POST['opt1SM68']."',
 ' ".$_POST['opt1SM681']."',
 ' ".$_POST['opt1SM682']."',
 ' ".$_POST['opt1SM683']."',
 ' ".$_POST['opt2SM68']."',
 ' ".$_POST['opt2SM681']."',
 ' ".$_POST['opt2SM682']."',
 ' ".$_POST['opt2SM683']."',
 ' ".$_POST['opt3SM68']."',
 ' ".$_POST['opt3SM681']."',
 ' ".$_POST['opt3SM682']."',
 ' ".$_POST['opt3SM683']."',
 
' ".$OEESM25." ',
' ".$OEESM84." ',
' ".$OEESM45." ',
' ".$OEESM22." ',
' ".$OEESM52." ',
' ".$OEESM24." ',
' ".$OEESM40." ',
' ".$OEESM59." ',
' ".$OEESM42." ',
' ".$OEESM65." ',
' ".$OEESM64." ',
' ".$OEESM80." ',
' ".$OEESM63." ',
' ".$OEESM51." ',
' ".$OEESM55." ',
' ".$OEESM56." ',
' ".$OEESM76." ',
' ".$OEESM77." ',
' ".$OEESM97." ',
' ".$OEESM68." ',
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