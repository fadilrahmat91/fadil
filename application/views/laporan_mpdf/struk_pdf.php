<?php
//$nn
//$data_penjualan
$patd = base_url('assets/bootstrap');
if($goprint =="goprint")
{
	echo "<script>window.print();</script>";
}
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
	<script src="<?php echo $patd?>/jquery/jquery-1.11.3.js" type="text/javascript"></script>
	<script src="<?php echo $patd?>/jqueryui/js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
	<script src="<?php echo $patd?>/js/bootstrap.min.js" type="text/javascript"></script>	
	<script src="<?php echo $patd?>/js/function.js" type="text/javascript"></script>	
	<script src="<?php echo $patd?>/js/base64.js" type="text/javascript"></script>	
	<script src="<?php echo $patd?>/js/jquery.dataTables.min.js" type="text/javascript"></script>	
	<script src="<?php echo $patd?>/js/dataTables.bootstrap.js" type="text/javascript"></script>	
	<link rel="stylesheet" type="text/css" href="<?php echo $patd?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $patd?>/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $patd?>/jqueryui/css/ui-lightness/jquery-ui-1.10.4.custom.css">
	<script>
	
	$(document).ready(function(){
			
		$("#cetak").click(function(){
			window.print();
		});
	})
	
	</script>

<style>

.alert{		
	padding:5px !important;
	margin-top:5px !important;
	margin-bottom:2px !important;		
}

</style>
</head>
<body>

<div class="container" style="padding-top:10px!important">

	<div class="alert alert-danger">
		<table width="100%">
			<tr>
				<td><b><?php echo $site_name?></b> </td>
				<td style="text-align:right">No.Telp: 081260369690</td>
			</tr>
		</table>	
	</div>
	
	<div class="alert alert-info">
	<table width="100%">
			<tr>
				<td><b>KODE PENJUALAN: <?php echo $nn->penjualan_uniq?></b> </td>
				<td style="text-align:right"><?php echo tanggalindo($nn->tanggal_terjual)?></td>
			</tr>
		</table>	
	</div>
	
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
	<br>
	<div style="border-bottom:2px dashed #000;"></div>
	<br>
	<table class="table table-bordered">
	
		<tr>
			<td><b>No</b></td>
			<td><b>Nama Barang</b></td>
			<td><b>Qty</b></td>
			<td style="text-align:right"><b>@harga</b></td>			
			<td style="text-align:right"><b>Harga Total</b></td>
			
		</tr>
		
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
		
		<?php 
	}
	
	?>
	
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td style="text-align:right">Grand Total:</td>
			<td style="text-align:right">Rp.<b><?php echo rupiah($total)?></b></td>
		</tr>
	
	</table>
	<small><?php echo $memo;?></small>
	<div style="border-bottom:2px dashed #000;" class="text-right"> <?php echo $site_name?> &trade; -</div>
	<hr>
</div>
</body>
</html>