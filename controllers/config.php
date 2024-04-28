<?php
$server = "localhost";
$username = "root";
$pass = "";
$dbname = "boedoo1";

// buat koneksi dan cek disini
$conn = new mysqli($server, $username, $pass, $dbname);
// cek koneksi
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	session_start();
}
?>