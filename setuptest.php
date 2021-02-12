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
$sql = "CREATE DATABASE test";
$conn->query($sql);

$servername = "localhost";
$username = "root";
$password = "";
$database = "test";
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
VALUES ('837838', '54','8'),('862863', '37','5'),('432433', '30'),('837838', '54','5'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0'),('0', '0', '0')";

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