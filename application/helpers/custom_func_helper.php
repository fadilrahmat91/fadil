<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('hanya_nomor'))
{
	function hanya_nomor($string) 
	{
		if (preg_match('/[0-9]+/', $string))
		{
			return preg_replace('/\D/', '', $string);
		}else{
			return (int)0;
		}
		
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

if($bulan=="01") $bulan = "Jan";
if($bulan=="02") $bulan = "Feb";
if($bulan=="03") $bulan = "Mar";
if($bulan=="04") $bulan = "Apr";
if($bulan=="05") $bulan = "Mei";
if($bulan=="06") $bulan = "Jun";
if($bulan=="07") $bulan = "Jul";
if($bulan=="08") $bulan = "Agu";
if($bulan=="09") $bulan = "Sep";
if($bulan=="10") $bulan = "Okt";
if($bulan=="11") $bulan = "Nov";
if($bulan=="12") $bulan = "Des";

$tgl = $tanggal." ".$bulan." ".$tahun;

return $tgl;
}


function bulanindo($bulan)
{
	
$taketgl = substr($bulan, 0,10);
$tahun = substr($taketgl, 0,4);
$bulan = substr($taketgl, 5,2);
$tanggal = substr($taketgl, 8,2);
	
if($bulan=="01") $bulan = "Jan";
if($bulan=="02") $bulan = "Feb";
if($bulan=="03") $bulan = "Mar";
if($bulan=="04") $bulan = "Apr";
if($bulan=="05") $bulan = "Mei";
if($bulan=="06") $bulan = "Jun";
if($bulan=="07") $bulan = "Jul";
if($bulan=="08") $bulan = "Agu";
if($bulan=="09") $bulan = "Sep";
if($bulan=="10") $bulan = "Okt";
if($bulan=="11") $bulan = "Nov";
if($bulan=="12") $bulan = "Des";
return $bulan;
}


function bulantahunindo($bulan)
{
	
$taketgl = substr($bulan, 0,10);
$tahun = substr($taketgl, 0,4);
$bulan = substr($taketgl, 5,2);
$tanggal = substr($taketgl, 8,2);
	
if($bulan=="01") $bulan = "Jan";
if($bulan=="02") $bulan = "Feb";
if($bulan=="03") $bulan = "Mar";
if($bulan=="04") $bulan = "Apr";
if($bulan=="05") $bulan = "Mei";
if($bulan=="06") $bulan = "Jun";
if($bulan=="07") $bulan = "Jul";
if($bulan=="08") $bulan = "Agu";
if($bulan=="09") $bulan = "Sep";
if($bulan=="10") $bulan = "Okt";
if($bulan=="11") $bulan = "Nov";
if($bulan=="12") $bulan = "Des";
return $bulan." ".$tahun;
}



function tahunindo($bulan)
{
	
$taketgl = substr($bulan, 0,10);
$tahun = substr($taketgl, 0,4);
$bulan = substr($taketgl, 5,2);
$tanggal = substr($taketgl, 8,2);
	
if($bulan=="01") $bulan = "Jan";
if($bulan=="02") $bulan = "Feb";
if($bulan=="03") $bulan = "Mar";
if($bulan=="04") $bulan = "Apr";
if($bulan=="05") $bulan = "Mei";
if($bulan=="06") $bulan = "Jun";
if($bulan=="07") $bulan = "Jul";
if($bulan=="08") $bulan = "Agu";
if($bulan=="09") $bulan = "Sep";
if($bulan=="10") $bulan = "Okt";
if($bulan=="11") $bulan = "Nov";
if($bulan=="12") $bulan = "Des";
return $tahun;
}


function curl_file_exist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}

