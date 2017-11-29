<?php
function hanya_nomor($string) 
{
	if (preg_match('/[0-9]+/', $string))
	{
		return preg_replace('/\D/', '', $string);
	}else{
		return 0;
	}
    
}

function rupiah($nilai, $pecahan = 0) 
{
    return number_format($nilai, $pecahan, ',', '.');
}

function buang_spasi($string)
{
	$string = preg_replace('/\s+/', '', $string);
	return $string;
}

function tanggalindo($tanggal)
{
$taketgl = substr($tanggal, 0,10);
$tahun = substr($taketgl, 0,4);
$bulan = substr($taketgl, 5,2);
$tanggal = substr($taketgl, 8,2);

if($bulan=="01") $bulan = "Januari";
if($bulan=="02") $bulan = "Februari";
if($bulan=="03") $bulan = "Maret";
if($bulan=="04") $bulan = "April";
if($bulan=="05") $bulan = "Mei";
if($bulan=="06") $bulan = "Juni";
if($bulan=="07") $bulan = "Juli";
if($bulan=="08") $bulan = "Agustus";
if($bulan=="09") $bulan = "September";
if($bulan=="10") $bulan = "Oktober";
if($bulan=="11") $bulan = "November";
if($bulan=="12") $bulan = "Desember";

$tgl = $tanggal." ".$bulan." ".$tahun;

return $tgl;
}
/*
function id_member($db)
{	
	//FAD0001
	$q = $db->query("SELECT id_member FROM tbl_konsumen ORDER BY id_konsumen DESC LIMIT 1");
	if(mysqli_num_rows($q)>0)
	{
		$data = $q->fetch_object();
		$id_member = hanya_nomor($data->id_member);
		$id_member = sprintf('%04d', $id_member + 1);
		$id_member = "FAD".$id_member;
		
	}else{
		$id_member = "FAD0001";
	}
	return $id_member;
}
*/