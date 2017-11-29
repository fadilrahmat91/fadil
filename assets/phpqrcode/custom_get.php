<?php    
include "qrlib.php";    
	$nama_barang = preg_replace('/\s+/', '', $_GET['data']);			
	$nama_barang = str_replace('/', '_', $nama_barang);	
	
QRcode::png($_GET['data'], "../qrcode/".$nama_barang.".png", "H", 5, 2);