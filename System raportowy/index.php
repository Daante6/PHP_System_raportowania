<?php
$data=getdate();
$dzien=$data['mday']-1;
if($data['mon']<10){
	$data['mon']="0".$data['mon'];
}
if($dzien<10){
	$dzien="0".$dzien;
}

$date1=$data['year']."-".$data['mon']."-".$dzien;
?>
<html> 
<head>
<meta charset="UTF-8">
</head> 
<body>
<center>
<h1><u><br><br>System obsługi dziennych raportów</u></h1>
</center>
<br>
<table>
<td style="width: 50%">
<center>
<br><h3>Dla MSF</h3> <br>
<form action="edycjaref.php" method="post" autocomplete="on">
Użytkownik <input type="text" name="username" style="width: 60px">
<br><br>
Hasło      <input type="password" name="password" style="width: 60px">
<br><br>
Maszyna 
<select name="maszyna">
    <option value="SM62">SM62</option>
	<option value="SM83">SM83</option>
	<option value="SM82">SM82</option>
	<option value="SM94">SM94</option>
	<option value="SM89">SM89</option>
	<option value="SM91">SM91</option>
	<option value="SM57">SM57</option>
	<option value="SM61">SM61</option>
	<option value="SM95">SM95</option>
	<option value="PP2">PP2</option>
	<option value="PP3">PP3</option>
	<option value="SM66">SM86</option>
	<option value="SM86">SM86</option>
	<option value="SM81">SM81</option>
	<option value="SM93">SM93</option>
	<option value="SM90">SM90</option>
	<option value="SM92">SM92</option>
	<option value="SM74">SM74</option>
	<option value="SM96">SM96</option>
	<option value="SM25">SM25</option>
	<option value="SM84">SM84</option>
	<option value="SM45">SM45</option>
	<option value="SM22">SM22</option>
	<option value="SM52">SM52</option>
	<option value="SM24">SM24</option>
	<option value="SM40">SM40</option>
	<option value="SM59">SM59</option>
	<option value="SM42">SM42</option>
	<option value="SM65">SM65</option>
	<option value="SM64">SM64</option>
	<option value="SM80">SM80</option>
	<option value="SM63">SM63</option>
	<option value="SM51">SM51</option>
	<option value="SM55">SM55</option>
	<option value="SM56">SM56</option>
	<option value="SM76">SM76</option>
	<option value="SM77">SM77</option>
	<option value="SM97">SM97</option>
	<option value="SM68">SM68</option>
	
</select>
<br><br><br>
<h2><font color="blue">Edycja referencji</font></h2>

<br>

	<input type="submit" style="height: 80px ; width: 160px" value="Edytuj" >
<br><br><hr>
<h2><font color="blue">Produkcja referencji w czasie</font></h2><br>
<button type="submit" formaction="/html/intime.php"  style="height: 80px ; width: 160px">Sprawdź</button>
<br><br><hr>
<h2><font color="blue">Produkcja maszyny w czasie</font></h2><br>
<button type="submit" formaction="/html/SMtime.php"  style="height: 80px ; width: 160px">Sprawdź</button>
</form>
</center>
</td>
<td style="width: 60%">
<table>
<center>
<form action="wprowadzanieop10.php" method="post" autocomplete="on">
<h3>Dla liderów</h3> <br>
Użytkownik: <input type="text" name="username" value="" style="width: 150px"><br>
Hasło: <input type="password" name="password" value="" style="width: 150px"><br>
Data: <input type="date" name="date1" value="<?php echo $date1; ?>" style="width: 150px">
<br><br><br>
<td style="width: 50%">
<center><h2><font color="green">Nowa Operacja 10</font></h2>

<br><br>
<input type="submit" style="height: 80px ; width: 160px" value="Nowa Op 10" >

<br><br>
<h2><font color="#ff9900">Edycja Operacji 10</font></h2>
<br><br>
<button type="submit" formaction="/html/editop10.php"  style="height: 80px ; width: 160px">Edit Op 10</button>

</center>
</td>
<td style="width: 100px">
</td>
<td style="width: 50%">
<center><h2><font color="green">Nowa Operacja 20</font></h2>
<br><br>
<button type="submit" formaction="/html/wprowadzanieop20.php"  style="height: 80px ; width: 160px">Nowa Op 20</button>
<br><br>
<h2><font color="#ff9900">Edycja Operacji 20</font></h2>
<br><br>
<button type="submit" formaction="/html/editop20.php"  style="height: 80px ; width: 160px">Edit Op 20</button>
</form>
</td>
</table>
</table>
</center>
