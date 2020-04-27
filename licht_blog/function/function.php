<?php
function tgl_indo($date){
	$Hari = array("Sunday", "Saturday", "Friday", "Thurday", "Webdesday", "Thueday", "Monday");

	$Bulan = array("January", "Febuary", "March", "April", "Mey", "June", "July", "Agusth", "September", "October", "November", "December");

	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl = substr($date, 8, 2);
	$waktu = substr($date, 11, 5);
	$hari = date("w", strtotime($date));

	$result = $Hari[$hari] . ", ". " " .$tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu . " " . " WIB";
	return $result;
}


function excape($string){
	$string = substr($string, 0, 80);
	return $string . "........";
}

function batas($string){
	$string = substr($string, 0, 150);
	return $string . "........";
}
function batas2($string){
	$string = substr($string, 0, 250);
	return $string . "........";
}

function cek_nama($username){
	global $db;
	$username = escape($username);

	$query = "SELECT * FROM admin WHERE username = '$username'";

	if($result = mysqli_query($db, $query)){
		if(mysqli_num_rows($result) ==0) return true;
	}else{
		return false;
	}
}

function escape($data){
	global $db;
	$result = mysqli_escape_string($db, $data);
	return $result;
}
?>