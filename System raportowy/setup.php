<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE raportowanieOperacji";
$conn->query($sql);

$servername = "localhost";
$username = "root";
$password = "";
$database = "raportowanieOperacji";
$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "CREATE TABLE SM62(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM62 (ref, cykl, projekt)
VALUES ('121', '72','0'),('993994', '115','4'),('229230', '154','4'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0')";

$conn->query($sql);

$sql = "CREATE TABLE SM83(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM83 (ref, cykl, projekt)
VALUES ('209', '72','0'),('339340', '73','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0')";

$conn->query($sql);

$sql = "CREATE TABLE SM82(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM82 (ref, cykl, projekt)
VALUES ('104', '61','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0'),('0', '0','0')";

$conn->query($sql);

$sql = "CREATE TABLE SM94(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM94 (ref, cykl, projekt)
VALUES ('067', '64','0'),('082', '60','0'),('123', '63','0'),('209', '72','0'),('339340', '73','0'),('432433', '68','2'),('91', '63','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM89(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM89 (ref, cykl, projekt)
VALUES ('082', '60','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM91(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM91 (ref, cykl, projekt)
VALUES ('091', '63','0'),('837838', '120','5'),('862863', '120','5'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM57(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM57 (ref, cykl, projekt)
VALUES ('843844', '103','8'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM61(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM61 (ref, cykl, projekt)
VALUES ('843844', '103','8'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM95(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM95 (ref, cykl, projekt)
VALUES ('432433', '35','2'),('405406', '130','8'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE PP2(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO PP2 (ref, cykl, projekt)
VALUES ('L66846', '17','7'),('L61377', '17','3'),('L69757', '17','6'),('L69259', '17','6'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE PP3(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO PP3 (ref, cykl, projekt)
VALUES ('L72327', '20','10'),('L72852', '20','11'),('L62855', '20','11'),('L66846', '40','7'),('L73031', '40','10'),('L72413', '40','10'),('L76758', '40','11'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM66(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM66 (ref, cykl, projekt)
VALUES ('067', '64','0'),('082', '60','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM86(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM86 (ref, cykl, projekt)
VALUES ('067', '64','0'),('209', '72','0'),('339340', '73','0'),('993994', '115','4'),('229230', '140','4'),('251252', '154','4'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM81(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM81 (ref, cykl, projekt)
VALUES ('104', '61','0'),('123', '63','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM93(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM93 (ref, cykl, projekt)
VALUES ('082', '60','0'),('432433', '68','2'),('091', '73','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM90(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM90 (ref, cykl, projekt)
VALUES ('082', '60','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM92(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM92 (ref, cykl, projekt)
VALUES ('067', '64','0'),('091', '63','0'),('837838', '116','5'),('993994', '115','4'),('862863', '116','5'),('229230', '140','4'),('432433', '68','2'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM74(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM74 (ref, cykl, projekt)
VALUES ('843844', '103','9'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM96(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM96 (ref, cykl, projekt)
VALUES ('023024', '25','0'),('319320', '25','8'),('837838', '25','8'),('367368', '46','8'),('748749', '65','9'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM25(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM25 (ref, cykl, projekt)
VALUES ('837838', '54','8'),('862863', '37','5'),('432433', '30','0'),('837838', '54','5'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM84(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM84 (ref, cykl, projekt)
VALUES ('091', '37','0'),('104', '37','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM45(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM45 (ref, cykl, projekt)
VALUES ('067', '37','0'),('082', '38','0'),('123', '37','0'),('104', '37','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM22(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM22 (ref, cykl, projekt)
VALUES ('023024', '36','8'),('319320', '38','8'),('837838', '54','8'),('405406', '42','8'),('367368', '48','8'),('009010', '48','8'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM52(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM52 (ref, cykl, projekt)
VALUES ('067', '37','0'),('082', '38','0'),('123', '37','0'),('091', '37','0'),('104', '37','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM24(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM24 (ref, cykl, projekt)
VALUES ('091', '37','0'),('104', '37','0'),('209', '38','0'),('339340', '38','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM40(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM40 (ref, cykl, projekt)
VALUES ('837838', '54','5'),('862863', '37','5'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM59(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM59 (ref, cykl, projekt)
VALUES ('843844', '32','11'),('714715', '32','11'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM42(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM42 (ref, cykl, projekt)
VALUES ('067', '37','0'),('082', '38','0'),('123', '37','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM65(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM65 (ref, cykl, projekt)
VALUES ('993994', '40','4'),('229230', '40','4'),('251252', '40','4'),('748749', '40','4'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM64(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM64 (ref, cykl, projekt)
VALUES ('377378', '27','3'),('L73031', '45','10'),('L72327', '45','10'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM80(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM80 (ref, cykl, projekt)
VALUES ('L73031', '45','10'),('L72852', '45','11'),('L72855', '45','11'),('L76723', '45','11'),('L72413', '45','10'),('L76758', '45','11'),('L69201', '45','0'),('L69203', '45','6'),('377378', '27','3'),('L72327', '45','10')";

$conn->query($sql);

$sql = "CREATE TABLE SM63(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM63 (ref, cykl, projekt)
VALUES ('L66846', '45','7'),('L69201', '45','0'),('L69203', '45','6'),('L69757', '45','6'),('L69259', '45','6'),('L69170', '45','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM51(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM51 (ref, cykl, projekt)
VALUES ('L66846', '45','7'),('L69201', '45','0'),('L69203', '45','6'),('L73031', '45','10'),('L69170', '45','0'),('L72327', '45','10'),('L96202', '45','6'),('L72375', '45','10'),('L98156', '45','6'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM55(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM55 (ref, cykl, projekt)
VALUES ('949', '36','0'),('829', '36','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM56(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM56 (ref, cykl, projekt)
VALUES ('555', '38','0'),('556', '40','0'),('829', '36','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM76(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM76 (ref, cykl, projekt)
VALUES ('555', '38','0'),('556', '40','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM77(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM77 (ref, cykl, projekt)
VALUES ('555', '38','0'),('556', '40','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM97(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM97 (ref, cykl, projekt)
VALUES ('377378', '27','4'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE SM68(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ref TEXT NOT NULL,
cykl INT NOT NULL,
projekt INT NOT NULL)";

$conn->query($sql);

$sql = "INSERT INTO SM68 (ref, cykl, projekt)
VALUES ('588', '15','0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

$conn->query($sql);

$sql = "CREATE TABLE op10(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
date DATE,
`tSM621` INT NOT NULL , 
`tSM622` INT NOT NULL , 
`tSM623` INT NOT NULL , 

`SM621` INT NOT NULL , 
`SM622` INT NOT NULL , 
`SM623` INT NOT NULL , 
`opt1SM62` INT NOT NULL , 
`opt1SM621` INT NOT NULL , 
`opt1SM622` INT NOT NULL , 
`opt1SM623` INT NOT NULL , 
`opt2SM62` INT NOT NULL , 
`opt2SM621` INT NOT NULL , 
`opt2SM622` INT NOT NULL , 
`opt2SM623` INT NOT NULL , 
`opt3SM62` INT NOT NULL , 
`opt3SM621` INT NOT NULL , 
`opt3SM622` INT NOT NULL , 
`opt3SM623` INT NOT NULL , 
`tSM831` INT NOT NULL , 
`tSM832` INT NOT NULL , 
`tSM833` INT NOT NULL , 

`SM831` INT NOT NULL , 
`SM832` INT NOT NULL , 
`SM833` INT NOT NULL , 
`opt1SM83` INT NOT NULL , 
`opt1SM831` INT NOT NULL , 
`opt1SM832` INT NOT NULL , 
`opt1SM833` INT NOT NULL , 
`opt2SM83` INT NOT NULL , 
`opt2SM831` INT NOT NULL , 
`opt2SM832` INT NOT NULL , 
`opt2SM833` INT NOT NULL , 
`opt3SM83` INT NOT NULL , 
`opt3SM831` INT NOT NULL , 
`opt3SM832` INT NOT NULL , 
`opt3SM833` INT NOT NULL , 
`tSM821` INT NOT NULL , 
`tSM822` INT NOT NULL , 
`tSM823` INT NOT NULL , 

`SM821` INT NOT NULL , 
`SM822` INT NOT NULL , 
`SM823` INT NOT NULL , 
`opt1SM82` INT NOT NULL , 
`opt1SM821` INT NOT NULL , 
`opt1SM822` INT NOT NULL , 
`opt1SM823` INT NOT NULL , 
`opt2SM82` INT NOT NULL , 
`opt2SM821` INT NOT NULL , 
`opt2SM822` INT NOT NULL , 
`opt2SM823` INT NOT NULL , 
`opt3SM82` INT NOT NULL , 
`opt3SM821` INT NOT NULL , 
`opt3SM822` INT NOT NULL , 
`opt3SM823` INT NOT NULL , 
`tSM941` INT NOT NULL , 
`tSM942` INT NOT NULL , 
`tSM943` INT NOT NULL , 

`SM941` INT NOT NULL , 
`SM942` INT NOT NULL , 
`SM943` INT NOT NULL , 
`opt1SM94` INT NOT NULL , 
`opt1SM941` INT NOT NULL , 
`opt1SM942` INT NOT NULL , 
`opt1SM943` INT NOT NULL , 
`opt2SM94` INT NOT NULL , 
`opt2SM941` INT NOT NULL , 
`opt2SM942` INT NOT NULL , 
`opt2SM943` INT NOT NULL , 
`opt3SM94` INT NOT NULL , 
`opt3SM941` INT NOT NULL , 
`opt3SM942` INT NOT NULL , 
`opt3SM943` INT NOT NULL , 
`tSM891` INT NOT NULL , 
`tSM892` INT NOT NULL , 
`tSM893` INT NOT NULL , 

`SM891` INT NOT NULL , 
`SM892` INT NOT NULL , 
`SM893` INT NOT NULL , 
`opt1SM89` INT NOT NULL , 
`opt1SM891` INT NOT NULL , 
`opt1SM892` INT NOT NULL , 
`opt1SM893` INT NOT NULL , 
`opt2SM89` INT NOT NULL , 
`opt2SM891` INT NOT NULL , 
`opt2SM892` INT NOT NULL , 
`opt2SM893` INT NOT NULL , 
`opt3SM89` INT NOT NULL , 
`opt3SM891` INT NOT NULL , 
`opt3SM892` INT NOT NULL , 
`opt3SM893` INT NOT NULL , 
`tSM911` INT NOT NULL , 
`tSM912` INT NOT NULL , 
`tSM913` INT NOT NULL , 

`SM911` INT NOT NULL , 
`SM912` INT NOT NULL , 
`SM913` INT NOT NULL , 
`opt1SM91` INT NOT NULL , 
`opt1SM911` INT NOT NULL , 
`opt1SM912` INT NOT NULL , 
`opt1SM913` INT NOT NULL , 
`opt2SM91` INT NOT NULL , 
`opt2SM911` INT NOT NULL , 
`opt2SM912` INT NOT NULL , 
`opt2SM913` INT NOT NULL , 
`opt3SM91` INT NOT NULL , 
`opt3SM911` INT NOT NULL , 
`opt3SM912` INT NOT NULL , 
`opt3SM913` INT NOT NULL , 
`tSM571` INT NOT NULL , 
`tSM572` INT NOT NULL , 
`tSM573` INT NOT NULL , 

`SM571` INT NOT NULL , 
`SM572` INT NOT NULL , 
`SM573` INT NOT NULL , 
`opt1SM57` INT NOT NULL , 
`opt1SM571` INT NOT NULL , 
`opt1SM572` INT NOT NULL , 
`opt1SM573` INT NOT NULL , 
`opt2SM57` INT NOT NULL , 
`opt2SM571` INT NOT NULL , 
`opt2SM572` INT NOT NULL , 
`opt2SM573` INT NOT NULL , 
`opt3SM57` INT NOT NULL , 
`opt3SM571` INT NOT NULL , 
`opt3SM572` INT NOT NULL , 
`opt3SM573` INT NOT NULL , 
`tSM611` INT NOT NULL , 
`tSM612` INT NOT NULL , 
`tSM613` INT NOT NULL , 

`SM611` INT NOT NULL , 
`SM612` INT NOT NULL , 
`SM613` INT NOT NULL , 
`opt1SM61` INT NOT NULL , 
`opt1SM611` INT NOT NULL , 
`opt1SM612` INT NOT NULL , 
`opt1SM613` INT NOT NULL , 
`opt2SM61` INT NOT NULL , 
`opt2SM611` INT NOT NULL , 
`opt2SM612` INT NOT NULL , 
`opt2SM613` INT NOT NULL , 
`opt3SM61` INT NOT NULL , 
`opt3SM611` INT NOT NULL , 
`opt3SM612` INT NOT NULL , 
`opt3SM613` INT NOT NULL , 
`tSM951` INT NOT NULL , 
`tSM952` INT NOT NULL , 
`tSM953` INT NOT NULL , 

`SM951` INT NOT NULL , 
`SM952` INT NOT NULL , 
`SM953` INT NOT NULL , 
`opt1SM95` INT NOT NULL , 
`opt1SM951` INT NOT NULL , 
`opt1SM952` INT NOT NULL , 
`opt1SM953` INT NOT NULL , 
`opt2SM95` INT NOT NULL , 
`opt2SM951` INT NOT NULL , 
`opt2SM952` INT NOT NULL , 
`opt2SM953` INT NOT NULL , 
`opt3SM95` INT NOT NULL , 
`opt3SM951` INT NOT NULL , 
`opt3SM952` INT NOT NULL , 
`opt3SM953` INT NOT NULL , 
`tPP21` INT NOT NULL , 
`tPP22` INT NOT NULL , 
`tPP23` INT NOT NULL , 

`PP21` INT NOT NULL , 
`PP22` INT NOT NULL , 
`PP23` INT NOT NULL , 
`opt1PP2` INT NOT NULL , 
`opt1PP21` INT NOT NULL , 
`opt1PP22` INT NOT NULL , 
`opt1PP23` INT NOT NULL , 
`opt2PP2` INT NOT NULL , 
`opt2PP21` INT NOT NULL , 
`opt2PP22` INT NOT NULL , 
`opt2PP23` INT NOT NULL , 
`opt3PP2` INT NOT NULL , 
`opt3PP21` INT NOT NULL , 
`opt3PP22` INT NOT NULL , 
`opt3PP23` INT NOT NULL , 
`tPP31` INT NOT NULL , 
`tPP32` INT NOT NULL , 
`tPP33` INT NOT NULL , 

`PP31` INT NOT NULL , 
`PP32` INT NOT NULL , 
`PP33` INT NOT NULL , 
`opt1PP3` INT NOT NULL , 
`opt1PP31` INT NOT NULL , 
`opt1PP32` INT NOT NULL , 
`opt1PP33` INT NOT NULL , 
`opt2PP3` INT NOT NULL , 
`opt2PP31` INT NOT NULL , 
`opt2PP32` INT NOT NULL , 
`opt2PP33` INT NOT NULL , 
`opt3PP3` INT NOT NULL , 
`opt3PP31` INT NOT NULL , 
`opt3PP32` INT NOT NULL , 
`opt3PP33` INT NOT NULL , 
`tSM661` INT NOT NULL , 
`tSM662` INT NOT NULL , 
`tSM663` INT NOT NULL , 

`SM661` INT NOT NULL , 
`SM662` INT NOT NULL , 
`SM663` INT NOT NULL , 
`opt1SM66` INT NOT NULL , 
`opt1SM661` INT NOT NULL , 
`opt1SM662` INT NOT NULL , 
`opt1SM663` INT NOT NULL , 
`opt2SM66` INT NOT NULL , 
`opt2SM661` INT NOT NULL , 
`opt2SM662` INT NOT NULL , 
`opt2SM663` INT NOT NULL , 
`opt3SM66` INT NOT NULL , 
`opt3SM661` INT NOT NULL , 
`opt3SM662` INT NOT NULL , 
`opt3SM663` INT NOT NULL , 
`tSM861` INT NOT NULL , 
`tSM862` INT NOT NULL , 
`tSM863` INT NOT NULL , 

`SM861` INT NOT NULL , 
`SM862` INT NOT NULL , 
`SM863` INT NOT NULL , 
`opt1SM86` INT NOT NULL , 
`opt1SM861` INT NOT NULL , 
`opt1SM862` INT NOT NULL , 
`opt1SM863` INT NOT NULL , 
`opt2SM86` INT NOT NULL , 
`opt2SM861` INT NOT NULL , 
`opt2SM862` INT NOT NULL , 
`opt2SM863` INT NOT NULL , 
`opt3SM86` INT NOT NULL , 
`opt3SM861` INT NOT NULL , 
`opt3SM862` INT NOT NULL , 
`opt3SM863` INT NOT NULL , 
`tSM811` INT NOT NULL , 
`tSM812` INT NOT NULL , 
`tSM813` INT NOT NULL , 

`SM811` INT NOT NULL , 
`SM812` INT NOT NULL , 
`SM813` INT NOT NULL , 
`opt1SM81` INT NOT NULL , 
`opt1SM811` INT NOT NULL , 
`opt1SM812` INT NOT NULL , 
`opt1SM813` INT NOT NULL , 
`opt2SM81` INT NOT NULL , 
`opt2SM811` INT NOT NULL , 
`opt2SM812` INT NOT NULL , 
`opt2SM813` INT NOT NULL , 
`opt3SM81` INT NOT NULL , 
`opt3SM811` INT NOT NULL , 
`opt3SM812` INT NOT NULL , 
`opt3SM813` INT NOT NULL , 
`tSM931` INT NOT NULL , 
`tSM932` INT NOT NULL , 
`tSM933` INT NOT NULL , 

`SM931` INT NOT NULL , 
`SM932` INT NOT NULL , 
`SM933` INT NOT NULL , 
`opt1SM93` INT NOT NULL , 
`opt1SM931` INT NOT NULL , 
`opt1SM932` INT NOT NULL , 
`opt1SM933` INT NOT NULL , 
`opt2SM93` INT NOT NULL , 
`opt2SM931` INT NOT NULL , 
`opt2SM932` INT NOT NULL , 
`opt2SM933` INT NOT NULL , 
`opt3SM93` INT NOT NULL , 
`opt3SM931` INT NOT NULL , 
`opt3SM932` INT NOT NULL , 
`opt3SM933` INT NOT NULL , 
`tSM901` INT NOT NULL , 
`tSM902` INT NOT NULL , 
`tSM903` INT NOT NULL , 

`SM901` INT NOT NULL , 
`SM902` INT NOT NULL , 
`SM903` INT NOT NULL , 
`opt1SM90` INT NOT NULL , 
`opt1SM901` INT NOT NULL , 
`opt1SM902` INT NOT NULL , 
`opt1SM903` INT NOT NULL , 
`opt2SM90` INT NOT NULL , 
`opt2SM901` INT NOT NULL , 
`opt2SM902` INT NOT NULL , 
`opt2SM903` INT NOT NULL , 
`opt3SM90` INT NOT NULL , 
`opt3SM901` INT NOT NULL , 
`opt3SM902` INT NOT NULL , 
`opt3SM903` INT NOT NULL , 
`tSM921` INT NOT NULL , 
`tSM922` INT NOT NULL , 
`tSM923` INT NOT NULL , 

`SM921` INT NOT NULL , 
`SM922` INT NOT NULL , 
`SM923` INT NOT NULL , 
`opt1SM92` INT NOT NULL , 
`opt1SM921` INT NOT NULL , 
`opt1SM922` INT NOT NULL , 
`opt1SM923` INT NOT NULL , 
`opt2SM92` INT NOT NULL , 
`opt2SM921` INT NOT NULL , 
`opt2SM922` INT NOT NULL , 
`opt2SM923` INT NOT NULL , 
`opt3SM92` INT NOT NULL , 
`opt3SM921` INT NOT NULL , 
`opt3SM922` INT NOT NULL , 
`opt3SM923` INT NOT NULL , 
`tSM741` INT NOT NULL , 
`tSM742` INT NOT NULL , 
`tSM743` INT NOT NULL , 

`SM741` INT NOT NULL , 
`SM742` INT NOT NULL , 
`SM743` INT NOT NULL , 
`opt1SM74` INT NOT NULL , 
`opt1SM741` INT NOT NULL , 
`opt1SM742` INT NOT NULL , 
`opt1SM743` INT NOT NULL , 
`opt2SM74` INT NOT NULL , 
`opt2SM741` INT NOT NULL , 
`opt2SM742` INT NOT NULL , 
`opt2SM743` INT NOT NULL , 
`opt3SM74` INT NOT NULL , 
`opt3SM741` INT NOT NULL , 
`opt3SM742` INT NOT NULL , 
`opt3SM743` INT NOT NULL , 
`tSM961` INT NOT NULL , 
`tSM962` INT NOT NULL , 
`tSM963` INT NOT NULL , 

`SM961` INT NOT NULL , 
`SM962` INT NOT NULL , 
`SM963` INT NOT NULL , 
`opt1SM96` INT NOT NULL , 
`opt1SM961` INT NOT NULL , 
`opt1SM962` INT NOT NULL , 
`opt1SM963` INT NOT NULL , 
`opt2SM96` INT NOT NULL , 
`opt2SM961` INT NOT NULL , 
`opt2SM962` INT NOT NULL , 
`opt2SM963` INT NOT NULL , 
`opt3SM96` INT NOT NULL , 
`opt3SM961` INT NOT NULL , 
`opt3SM962` INT NOT NULL , 
`opt3SM963` INT NOT NULL ,

`plan` INT NOT NULL ,

`OEESM62` INT NOT NULL ,
`OEESM83` INT NOT NULL ,
`OEESM82` INT NOT NULL ,
`OEESM94` INT NOT NULL ,
`OEESM89` INT NOT NULL ,
`OEESM91` INT NOT NULL ,
`OEESM57` INT NOT NULL ,
`OEESM61` INT NOT NULL ,
`OEESM95` INT NOT NULL ,
`OEEPP2` INT NOT NULL ,
`OEEPP3` INT NOT NULL ,
`OEESM66` INT NOT NULL ,
`OEESM86` INT NOT NULL ,
`OEESM81` INT NOT NULL ,
`OEESM93` INT NOT NULL ,
`OEESM90` INT NOT NULL ,
`OEESM92` INT NOT NULL ,
`OEESM74` INT NOT NULL ,
`OEESM96` INT NOT NULL ,

`IPS` INT NOT NULL ,
`PSAk` INT NOT NULL,
`PSAw` INT NOT NULL,
`MNBkf` INT NOT NULL,
`MNBkr` INT NOT NULL,
`MNBwf` INT NOT NULL,
`MNBwr` INT NOT NULL,
`MFA2kf` INT NOT NULL,
`MFA2kr` INT NOT NULL,
`MFA2wf` INT NOT NULL,
`MFA2wr` INT NOT NULL

)";

$conn->query($sql);

$sql = "CREATE TABLE op20(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
date DATE,
`tSM251` INT NOT NULL , 
`tSM252` INT NOT NULL , 
`tSM253` INT NOT NULL , 

`SM251` INT NOT NULL , 
`SM252` INT NOT NULL , 
`SM253` INT NOT NULL , 
`opt1SM25` INT NOT NULL , 
`opt1SM251` INT NOT NULL , 
`opt1SM252` INT NOT NULL , 
`opt1SM253` INT NOT NULL , 
`opt2SM25` INT NOT NULL , 
`opt2SM251` INT NOT NULL , 
`opt2SM252` INT NOT NULL , 
`opt2SM253` INT NOT NULL , 
`opt3SM25` INT NOT NULL , 
`opt3SM251` INT NOT NULL , 
`opt3SM252` INT NOT NULL , 
`opt3SM253` INT NOT NULL , 
`tSM841` INT NOT NULL , 
`tSM842` INT NOT NULL , 
`tSM843` INT NOT NULL , 

`SM841` INT NOT NULL , 
`SM842` INT NOT NULL , 
`SM843` INT NOT NULL , 
`opt1SM84` INT NOT NULL , 
`opt1SM841` INT NOT NULL , 
`opt1SM842` INT NOT NULL , 
`opt1SM843` INT NOT NULL , 
`opt2SM84` INT NOT NULL , 
`opt2SM841` INT NOT NULL , 
`opt2SM842` INT NOT NULL , 
`opt2SM843` INT NOT NULL , 
`opt3SM84` INT NOT NULL , 
`opt3SM841` INT NOT NULL , 
`opt3SM842` INT NOT NULL , 
`opt3SM843` INT NOT NULL , 
`tSM451` INT NOT NULL , 
`tSM452` INT NOT NULL , 
`tSM453` INT NOT NULL , 

`SM451` INT NOT NULL , 
`SM452` INT NOT NULL , 
`SM453` INT NOT NULL , 
`opt1SM45` INT NOT NULL , 
`opt1SM451` INT NOT NULL , 
`opt1SM452` INT NOT NULL , 
`opt1SM453` INT NOT NULL , 
`opt2SM45` INT NOT NULL , 
`opt2SM451` INT NOT NULL , 
`opt2SM452` INT NOT NULL , 
`opt2SM453` INT NOT NULL , 
`opt3SM45` INT NOT NULL , 
`opt3SM451` INT NOT NULL , 
`opt3SM452` INT NOT NULL , 
`opt3SM453` INT NOT NULL , 
`tSM221` INT NOT NULL , 
`tSM222` INT NOT NULL , 
`tSM223` INT NOT NULL , 

`SM221` INT NOT NULL , 
`SM222` INT NOT NULL , 
`SM223` INT NOT NULL , 
`opt1SM22` INT NOT NULL , 
`opt1SM221` INT NOT NULL , 
`opt1SM222` INT NOT NULL , 
`opt1SM223` INT NOT NULL , 
`opt2SM22` INT NOT NULL , 
`opt2SM221` INT NOT NULL , 
`opt2SM222` INT NOT NULL , 
`opt2SM223` INT NOT NULL , 
`opt3SM22` INT NOT NULL , 
`opt3SM221` INT NOT NULL , 
`opt3SM222` INT NOT NULL , 
`opt3SM223` INT NOT NULL , 
`tSM521` INT NOT NULL , 
`tSM522` INT NOT NULL , 
`tSM523` INT NOT NULL , 

`SM521` INT NOT NULL , 
`SM522` INT NOT NULL , 
`SM523` INT NOT NULL , 
`opt1SM52` INT NOT NULL , 
`opt1SM521` INT NOT NULL , 
`opt1SM522` INT NOT NULL , 
`opt1SM523` INT NOT NULL , 
`opt2SM52` INT NOT NULL , 
`opt2SM521` INT NOT NULL , 
`opt2SM522` INT NOT NULL , 
`opt2SM523` INT NOT NULL , 
`opt3SM52` INT NOT NULL , 
`opt3SM521` INT NOT NULL , 
`opt3SM522` INT NOT NULL , 
`opt3SM523` INT NOT NULL , 
`tSM241` INT NOT NULL , 
`tSM242` INT NOT NULL , 
`tSM243` INT NOT NULL , 

`SM241` INT NOT NULL , 
`SM242` INT NOT NULL , 
`SM243` INT NOT NULL , 
`opt1SM24` INT NOT NULL , 
`opt1SM241` INT NOT NULL , 
`opt1SM242` INT NOT NULL , 
`opt1SM243` INT NOT NULL , 
`opt2SM24` INT NOT NULL , 
`opt2SM241` INT NOT NULL , 
`opt2SM242` INT NOT NULL , 
`opt2SM243` INT NOT NULL , 
`opt3SM24` INT NOT NULL , 
`opt3SM241` INT NOT NULL , 
`opt3SM242` INT NOT NULL , 
`opt3SM243` INT NOT NULL , 
`tSM401` INT NOT NULL , 
`tSM402` INT NOT NULL , 
`tSM403` INT NOT NULL , 

`SM401` INT NOT NULL , 
`SM402` INT NOT NULL , 
`SM403` INT NOT NULL , 
`opt1SM40` INT NOT NULL , 
`opt1SM401` INT NOT NULL , 
`opt1SM402` INT NOT NULL , 
`opt1SM403` INT NOT NULL , 
`opt2SM40` INT NOT NULL , 
`opt2SM401` INT NOT NULL , 
`opt2SM402` INT NOT NULL , 
`opt2SM403` INT NOT NULL , 
`opt3SM40` INT NOT NULL , 
`opt3SM401` INT NOT NULL , 
`opt3SM402` INT NOT NULL , 
`opt3SM403` INT NOT NULL , 
`tSM591` INT NOT NULL , 
`tSM592` INT NOT NULL , 
`tSM593` INT NOT NULL , 

`SM591` INT NOT NULL , 
`SM592` INT NOT NULL , 
`SM593` INT NOT NULL , 
`opt1SM59` INT NOT NULL , 
`opt1SM591` INT NOT NULL , 
`opt1SM592` INT NOT NULL , 
`opt1SM593` INT NOT NULL , 
`opt2SM59` INT NOT NULL , 
`opt2SM591` INT NOT NULL , 
`opt2SM592` INT NOT NULL , 
`opt2SM593` INT NOT NULL , 
`opt3SM59` INT NOT NULL , 
`opt3SM591` INT NOT NULL , 
`opt3SM592` INT NOT NULL , 
`opt3SM593` INT NOT NULL , 
`tSM421` INT NOT NULL , 
`tSM422` INT NOT NULL , 
`tSM423` INT NOT NULL , 

`SM421` INT NOT NULL , 
`SM422` INT NOT NULL , 
`SM423` INT NOT NULL , 
`opt1SM42` INT NOT NULL , 
`opt1SM421` INT NOT NULL , 
`opt1SM422` INT NOT NULL , 
`opt1SM423` INT NOT NULL , 
`opt2SM42` INT NOT NULL , 
`opt2SM421` INT NOT NULL , 
`opt2SM422` INT NOT NULL , 
`opt2SM423` INT NOT NULL , 
`opt3SM42` INT NOT NULL , 
`opt3SM421` INT NOT NULL , 
`opt3SM422` INT NOT NULL , 
`opt3SM423` INT NOT NULL , 
`tSM651` INT NOT NULL , 
`tSM652` INT NOT NULL , 
`tSM653` INT NOT NULL , 

`SM651` INT NOT NULL , 
`SM652` INT NOT NULL , 
`SM653` INT NOT NULL , 
`opt1SM65` INT NOT NULL , 
`opt1SM651` INT NOT NULL , 
`opt1SM652` INT NOT NULL , 
`opt1SM653` INT NOT NULL , 
`opt2SM65` INT NOT NULL , 
`opt2SM651` INT NOT NULL , 
`opt2SM652` INT NOT NULL , 
`opt2SM653` INT NOT NULL , 
`opt3SM65` INT NOT NULL , 
`opt3SM651` INT NOT NULL , 
`opt3SM652` INT NOT NULL , 
`opt3SM653` INT NOT NULL , 
`tSM641` INT NOT NULL , 
`tSM642` INT NOT NULL , 
`tSM643` INT NOT NULL , 

`SM641` INT NOT NULL , 
`SM642` INT NOT NULL , 
`SM643` INT NOT NULL , 
`opt1SM64` INT NOT NULL , 
`opt1SM641` INT NOT NULL , 
`opt1SM642` INT NOT NULL , 
`opt1SM643` INT NOT NULL , 
`opt2SM64` INT NOT NULL , 
`opt2SM641` INT NOT NULL , 
`opt2SM642` INT NOT NULL , 
`opt2SM643` INT NOT NULL , 
`opt3SM64` INT NOT NULL , 
`opt3SM641` INT NOT NULL , 
`opt3SM642` INT NOT NULL , 
`opt3SM643` INT NOT NULL , 
`tSM801` INT NOT NULL , 
`tSM802` INT NOT NULL , 
`tSM803` INT NOT NULL , 

`SM801` INT NOT NULL , 
`SM802` INT NOT NULL , 
`SM803` INT NOT NULL , 
`opt1SM80` INT NOT NULL , 
`opt1SM801` INT NOT NULL , 
`opt1SM802` INT NOT NULL , 
`opt1SM803` INT NOT NULL , 
`opt2SM80` INT NOT NULL , 
`opt2SM801` INT NOT NULL , 
`opt2SM802` INT NOT NULL , 
`opt2SM803` INT NOT NULL , 
`opt3SM80` INT NOT NULL , 
`opt3SM801` INT NOT NULL , 
`opt3SM802` INT NOT NULL , 
`opt3SM803` INT NOT NULL , 
`tSM631` INT NOT NULL , 
`tSM632` INT NOT NULL , 
`tSM633` INT NOT NULL , 

`SM631` INT NOT NULL , 
`SM632` INT NOT NULL , 
`SM633` INT NOT NULL , 
`opt1SM63` INT NOT NULL , 
`opt1SM631` INT NOT NULL , 
`opt1SM632` INT NOT NULL , 
`opt1SM633` INT NOT NULL , 
`opt2SM63` INT NOT NULL , 
`opt2SM631` INT NOT NULL , 
`opt2SM632` INT NOT NULL , 
`opt2SM633` INT NOT NULL , 
`opt3SM63` INT NOT NULL , 
`opt3SM631` INT NOT NULL , 
`opt3SM632` INT NOT NULL , 
`opt3SM633` INT NOT NULL , 
`tSM511` INT NOT NULL , 
`tSM512` INT NOT NULL , 
`tSM513` INT NOT NULL , 

`SM511` INT NOT NULL , 
`SM512` INT NOT NULL , 
`SM513` INT NOT NULL , 
`opt1SM51` INT NOT NULL , 
`opt1SM511` INT NOT NULL , 
`opt1SM512` INT NOT NULL , 
`opt1SM513` INT NOT NULL , 
`opt2SM51` INT NOT NULL , 
`opt2SM511` INT NOT NULL , 
`opt2SM512` INT NOT NULL , 
`opt2SM513` INT NOT NULL , 
`opt3SM51` INT NOT NULL , 
`opt3SM511` INT NOT NULL , 
`opt3SM512` INT NOT NULL , 
`opt3SM513` INT NOT NULL , 
`tSM551` INT NOT NULL , 
`tSM552` INT NOT NULL , 
`tSM553` INT NOT NULL , 

`SM551` INT NOT NULL , 
`SM552` INT NOT NULL , 
`SM553` INT NOT NULL , 
`opt1SM55` INT NOT NULL , 
`opt1SM551` INT NOT NULL , 
`opt1SM552` INT NOT NULL , 
`opt1SM553` INT NOT NULL , 
`opt2SM55` INT NOT NULL , 
`opt2SM551` INT NOT NULL , 
`opt2SM552` INT NOT NULL , 
`opt2SM553` INT NOT NULL , 
`opt3SM55` INT NOT NULL , 
`opt3SM551` INT NOT NULL , 
`opt3SM552` INT NOT NULL , 
`opt3SM553` INT NOT NULL , 
`tSM561` INT NOT NULL , 
`tSM562` INT NOT NULL , 
`tSM563` INT NOT NULL , 

`SM561` INT NOT NULL , 
`SM562` INT NOT NULL , 
`SM563` INT NOT NULL , 
`opt1SM56` INT NOT NULL , 
`opt1SM561` INT NOT NULL , 
`opt1SM562` INT NOT NULL , 
`opt1SM563` INT NOT NULL , 
`opt2SM56` INT NOT NULL , 
`opt2SM561` INT NOT NULL , 
`opt2SM562` INT NOT NULL , 
`opt2SM563` INT NOT NULL , 
`opt3SM56` INT NOT NULL , 
`opt3SM561` INT NOT NULL , 
`opt3SM562` INT NOT NULL , 
`opt3SM563` INT NOT NULL , 
`tSM761` INT NOT NULL , 
`tSM762` INT NOT NULL , 
`tSM763` INT NOT NULL , 

`SM761` INT NOT NULL , 
`SM762` INT NOT NULL , 
`SM763` INT NOT NULL , 
`opt1SM76` INT NOT NULL , 
`opt1SM761` INT NOT NULL , 
`opt1SM762` INT NOT NULL , 
`opt1SM763` INT NOT NULL , 
`opt2SM76` INT NOT NULL , 
`opt2SM761` INT NOT NULL , 
`opt2SM762` INT NOT NULL , 
`opt2SM763` INT NOT NULL , 
`opt3SM76` INT NOT NULL , 
`opt3SM761` INT NOT NULL , 
`opt3SM762` INT NOT NULL , 
`opt3SM763` INT NOT NULL , 
`tSM771` INT NOT NULL , 
`tSM772` INT NOT NULL , 
`tSM773` INT NOT NULL , 

`SM771` INT NOT NULL , 
`SM772` INT NOT NULL , 
`SM773` INT NOT NULL , 
`opt1SM77` INT NOT NULL , 
`opt1SM771` INT NOT NULL , 
`opt1SM772` INT NOT NULL , 
`opt1SM773` INT NOT NULL , 
`opt2SM77` INT NOT NULL , 
`opt2SM771` INT NOT NULL , 
`opt2SM772` INT NOT NULL , 
`opt2SM773` INT NOT NULL , 
`opt3SM77` INT NOT NULL , 
`opt3SM771` INT NOT NULL , 
`opt3SM772` INT NOT NULL , 
`opt3SM773` INT NOT NULL , 
`tSM971` INT NOT NULL , 
`tSM972` INT NOT NULL , 
`tSM973` INT NOT NULL , 

`SM971` INT NOT NULL , 
`SM972` INT NOT NULL , 
`SM973` INT NOT NULL , 
`opt1SM97` INT NOT NULL , 
`opt1SM971` INT NOT NULL , 
`opt1SM972` INT NOT NULL , 
`opt1SM973` INT NOT NULL , 
`opt2SM97` INT NOT NULL , 
`opt2SM971` INT NOT NULL , 
`opt2SM972` INT NOT NULL , 
`opt2SM973` INT NOT NULL , 
`opt3SM97` INT NOT NULL , 
`opt3SM971` INT NOT NULL , 
`opt3SM972` INT NOT NULL , 
`opt3SM973` INT NOT NULL , 
`tSM681` INT NOT NULL , 
`tSM682` INT NOT NULL , 
`tSM683` INT NOT NULL , 

`SM681` INT NOT NULL , 
`SM682` INT NOT NULL , 
`SM683` INT NOT NULL , 
`opt1SM68` INT NOT NULL , 
`opt1SM681` INT NOT NULL , 
`opt1SM682` INT NOT NULL , 
`opt1SM683` INT NOT NULL , 
`opt2SM68` INT NOT NULL , 
`opt2SM681` INT NOT NULL , 
`opt2SM682` INT NOT NULL , 
`opt2SM683` INT NOT NULL , 
`opt3SM68` INT NOT NULL , 
`opt3SM681` INT NOT NULL , 
`opt3SM682` INT NOT NULL , 
`opt3SM683` INT NOT NULL ,

`plan` INT NOT NULL ,

`OEESM25` INT NOT NULL ,
`OEESM84` INT NOT NULL ,
`OEESM45` INT NOT NULL ,
`OEESM22` INT NOT NULL ,
`OEESM52` INT NOT NULL ,
`OEESM24` INT NOT NULL ,
`OEESM40` INT NOT NULL ,
`OEESM59` INT NOT NULL ,
`OEESM42` INT NOT NULL ,
`OEESM65` INT NOT NULL ,
`OEESM64` INT NOT NULL ,
`OEESM80` INT NOT NULL ,
`OEESM63` INT NOT NULL ,
`OEESM51` INT NOT NULL ,
`OEESM55` INT NOT NULL ,
`OEESM56` INT NOT NULL ,
`OEESM76` INT NOT NULL ,
`OEESM77` INT NOT NULL ,
`OEESM97` INT NOT NULL ,
`OEESM68` INT NOT NULL ,

`IPS` INT NOT NULL ,
`PSAk` INT NOT NULL,
`PSAw` INT NOT NULL,
`MNBkf` INT NOT NULL,
`MNBkr` INT NOT NULL,
`MNBwf` INT NOT NULL,
`MNBwr` INT NOT NULL,
`MFA2kf` INT NOT NULL,
`MFA2kr` INT NOT NULL,
`MFA2wf` INT NOT NULL,
`MFA2wr` INT NOT NULL

)";

$conn->query($sql);

?>
<html>
<head>
<meta charset="UTF-8">
</head> 
<body>
Raczej się udało
</body>
</html>