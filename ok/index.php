<?php
error_reporting(-1);
ini_set("display_errors", 1); 


/*
mysql -u root -p
show databases;
create database zakat;
use zakat;
create table zakat ( id INT(6) AUTO_INCREMENT PRIMARY KEY,  nama TEXT, jumlahjiwa INT, fitrah_uang INT, fitrah_beras FLOAT, mal INT, infak INT, shadaqah INT, grandtotal INT, tanggungan TEXT, waktu TIMESTAMP DEFAULT CURRENT_TIMESTAMP);



*/


//print_r($_POST);


$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'zakat';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
	die($conn->connect_error);
}




$sql = "INSERT INTO zakat (nama,jumlahjiwa,fitrah_uang,fitrah_beras,mal,infak,shadaqah,grandtotal,tanggungan) VALUES(?,?,?,?,?,?,?,?,?)";

if($stmt = mysqli_prepare($conn,$sql)) {
	mysqli_stmt_bind_param($stmt,"siidiiiis",$_POST['nama'],$_POST['jumlahJiwa'],$_POST['totalUang'],$_POST['totalBeras'],$_POST['mal'],$_POST['infak'],$_POST['shadaqah'],$_POST['grandtotal'],$_POST['tanggungan']);
	mysqli_stmt_execute($stmt);
	echo mysqli_insert_id($conn);
}






//$stmt->bind_param("siiiiiiis");


?>


