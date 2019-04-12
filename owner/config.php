<?php

	define('HOST','localhost');
	define('USER','root');
	define('PASS','');
	define('DB','dbspa');

/**
 * $dbconnect : koneksi kedatabase
 */
$connect = new mysqli(HOST, USER, PASS, DB);

/**
 * Check Error yang terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($connect->connect_error) {
    die('Database Not Connect. Error : ' . $connect->connect_error);
}
