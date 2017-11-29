<?php
//$nn
//$data_penjualan
$path = base_url('assets/bootstrap');
if($goprint =="goprint")
{
	echo "<script>window.print();</script>";
}
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?php echo $path?>/jquery/jquery-1.11.3.js" type="text/javascript"></script>
	<script src="<?php echo $path?>/jqueryui/js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
	<script src="<?php echo $path?>/js/bootstrap.min.js" type="text/javascript"></script>	
	<script src="<?php echo $path?>/js/function.js" type="text/javascript"></script>	
	<script src="<?php echo $path?>/js/base64.js" type="text/javascript"></script>	
	<script src="<?php echo $path?>/js/jquery.dataTables.min.js" type="text/javascript"></script>	
	<script src="<?php echo $path?>/js/dataTables.bootstrap.js" type="text/javascript"></script>	
	<link rel="stylesheet" type="text/css" href="<?php echo $path?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path?>/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path?>/jqueryui/css/ui-lightness/jquery-ui-1.10.4.custom.css">
	<script>
	
	$(document).ready(function(){
			
		$("#cetak").click(function(){
			window.print();
		});
	})
	
	</script>

<style>

html, body {
    margin:0px;
	padding:0px;	
    background:#cccccc;        
	margin: 0px; 
	
  }
@media print{
@page {
	size: A4;
	margin: 0;
	
	}

	margin:0mm;
	padding:0mm;
	
}

@media print{
	
	.hilang{
		display:none !important;
		
	}
}


.alert{		
	padding:5px !important;
	margin-top:5px !important;
	margin-bottom:2px !important;		
}

.container{
	height: 285mm;
    width: 205mm;	
	background:#fff;
	/*-webkit-box-shadow:5px 5px 5px 5px #000;*/
	box-shadow: 0px 2px 10px 5px #6d6d6d;
	margin-bottom:10px;
}
</style>
</head>
<body>
<!--<div class="alt_menu text-center"  id="hilang"><a href='<?php echo base_url()?>' title='home'><span class="glyphicon glyphicon-home"></span> Home</a> |  <a id="cetak"><span class="glyphicon glyphicon-print"></span> Cetak</a></div>-->
<div class="hilang text-center" ><a href='<?php echo base_url()?>' title='home'><span class="glyphicon glyphicon-home"></span> Home</a>  |  <a id="cetak" href="#"><span class="glyphicon glyphicon-print"></span> Cetak</a></div>

<div class="container" style="padding-top:10px!important">

	<div class="alert alert-danger"><b><?php echo $site_name?></b> <span style="float:right;">No.Telp: 081260369690</span> </div>
	
	<div class="alert alert-info">KODE PENJUALAN: <?php echo $nn->penjualan_uniq?> <span style="float:right;"><?php echo tanggalindo($nn->tanggal_terjual)?></span> </div>
	
	<b>Data Konsumen:</b>
	<table class="table table-bordered" >
	<tr>
		<td>Nama</td><td>   <?php echo $nn->nama_konsumen?></td>
	</tr>

	<tr>
		<td>Telp</td><td>  <?php echo $nn->telp_konsumen?></td>
	</tr>

	<tr>
		<td>Alamat</td><td>   <?php echo $nn->alamat_konsumen?></td>
	</tr>
	</table>
	<div style="border-bottom:2px dashed #000;"></div>
	<table class="table">
		<thead>
			<th>No</th>
			<th>Nama Barang</th>
			<th>Qty</th>
			<th style="text-align:right">@harga</th>			
			<th style="text-align:right">Harga Total</th>
			
		</thead>
		
	<?php
	$no=0;
	$total=0;	
	foreach($data_penjualan as $data)
	{		
		$no++;
		$tot_harga = hanya_nomor($data->harga_satuan)*$data->jumlah_terjual;
		$total+=$tot_harga;
		
		$harga_satuan = $data->harga_satuan;
		if(isset($data->memo) && $data->memo !=="")
		{
			$memo = "NB: $data->memo";
		}else{
			$memo = "";
		}
		?>
		
		<tbody>
			<tr>
				<td>
					<?php echo $no ?>
				</td>
				<td>
				<?php echo $data->nama_barang ?>
				</td>

			<td>
				<?php echo $data->jumlah_terjual ?>
			</td>
			
			<td style="text-align:right">	
				<?php echo rupiah($harga_satuan) ?>
			</td>
			<td style="text-align:right">
				<?php echo rupiah($tot_harga)?>
			</td>
			</tr>
		<tbody>
		<?php 
	}
	
	?>
	<tfoot>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td style="text-align:right">Grand Total:</td>
			<td style="text-align:right">Rp.<b><?php echo rupiah($total)?></b></td>
		</tr>
	</tfoot>
	</table>
	<small><?php echo $memo;?></small>
	<div style="border-bottom:2px dashed #000;" class="text-right"> <?php echo $site_name?> &trade; -</div>
</div>
</body>
</html>