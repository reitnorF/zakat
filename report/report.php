<!DOCTYPE html>
<html>
<head>
	<title>Laporan Zakat Fitrah Masjid Al Amin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
</head>
<body>
<?php

$dbhost = 'localhost';

$dbuser = 'root';
$dbpass = 'root';
$dbname = 'zakat';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
	die($conn->connect_error);
}


$result = mysqli_query($conn, "SELECT sum(jumlahjiwa) from zakat ");
$row = mysqli_fetch_row($result);
echo "Mustahik : ". $row[0] .  " orang </br>";

$result = mysqli_query($conn, "SELECT sum(fitrah_beras) from zakat ");
$row = mysqli_fetch_row($result);
echo "Zakat Fitrah (Beras) : ". $row[0] .  " liter </br>";

$result = mysqli_query($conn, "SELECT sum(fitrah_uang) from zakat ");
$row = mysqli_fetch_row($result);
echo "Zakat Fitrah (Uang) : Rp ". number_format($row[0],0,',','.') .  " </br>";

$result = mysqli_query($conn, "SELECT sum(mal) from zakat ");
$row = mysqli_fetch_row($result);
echo "Zakat Mal : Rp ". number_format($row[0],0,',','.') .  " </br>";

$result = mysqli_query($conn, "SELECT sum(infak) from zakat ");
$row = mysqli_fetch_row($result);
echo "Infaq : Rp ". number_format($row[0],0,',','.') .  " </br>";

$result = mysqli_query($conn, "SELECT sum(shadaqah) from zakat ");
$row = mysqli_fetch_row($result);
echo "Shadaqah : Rp ". number_format($row[0],0,',','.') .  " </br>";

$result = mysqli_query($conn, "SELECT sum(infak)+sum(mal)+sum(shadaqah)+sum(fitrah_uang) from zakat ");
$row = mysqli_fetch_row($result);
echo "Total Uang : Rp ". number_format($row[0],0,',','.') .  " </br>";
echo "<br>";


if ($result = mysqli_query($conn, "SELECT * FROM zakat ORDER BY id DESC ")) {
  //echo "Returned rows are: " . mysqli_num_rows($result) . "<br>";

  while($row = mysqli_fetch_assoc($result)) {
  	echo "m".$row['id'] . "<br>";
  	echo "Nama : ".$row['nama'] . "<br>";
  	echo "Jumlah Jiwa : ".$row['jumlahjiwa']. "<br>";
  	

  	if($row['tanggungan'] != '') {
  		echo "Keluarga : ". $row['tanggungan']. "<br>";	
  	}

  	if($row['fitrah_uang'] != 0) {
  		echo "Zakat Fitrah (uang) : Rp ".$row['fitrah_uang']. "<br>";
  	} else {
  		echo "Zakat Fitrah (beras) : ".$row['fitrah_beras']. " l <br>";	
  	}
  	
  	if($row['mal'] != 0) {
  		echo "Zakat Mal : Rp ". $row['mal']. "<br>";	
  	}

  	if($row['infak'] != 0) {
  		echo "Infak : Rp ". $row['infak']. "<br>";	
  	}

  	if($row['shadaqah'] != 0) {
  		echo "Infak : Rp ". $row['shadaqah']. "<br>";	
  	}

  	if($row['grandtotal'] != 0) {
  		echo "Total uang : Rp ". $row['grandtotal']. "<br>";	
  	}

  	
  	echo "<br>";
  }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($conn);

?>

</body>
</html>
