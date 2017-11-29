<?php
//$nn
//$data_penjualan
$patd = base_url('assets/bootstrap');
 
	$bulan_lalu =  bulantahunindo(date('Y-m-d',strtotime("last month")));
	$bulan_ini  =  bulantahunindo(date('Y-m-d'));
?>
	<script src="<?php echo $patd?>/js/jquery.dataTables.min.js" type="text/javascript"></script>	
	<script src="<?php echo $patd?>/js/dataTables.bootstrap.js" type="text/javascript"></script>	
	<link rel="stylesheet" type="text/css" href="<?php echo $patd?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $patd?>/css/custom.css">
	


<style>

.alert{		
	padding:5px !important;
	margin-top:5px !important;
	margin-bottom:5px !important;		
}

td,th{
	padding:5px !important;
}

th{
	background-color:#aaa !important;
}
</style>
<input type="hidden" id="link_download" value="<?php echo $download?>">
<!-----tab tab_laporan_bulan_ini----------------------------------------------------------------->
<div id="tab_laporan_bulan_ini" class="tab-pane fade in active">
<h2 class="alert alert-danger">Laporan :<?php echo  str_replace("_",":",$judul)?></h2>
		<table id="laporan_bulan_ini" class="table table-striped table-bordered" cellspacing="0" width="100%">
		
			<thead >
			<tr>
				<th>No</th>			
				<th>Tanggal</th>
				<th>Nama Barang</th>
				<th>ID MEMBER</th>
				<th>ID PENJUALAN</th>
				<th  class="text-right">@Harga barang</th>						
				<th  class='text-right'>Qty</th>						
				<th  class="text-right">Harga Total</th>						
			</tr>
			</thead>	
		
		
		<tbody>
		<?php
		$no=0;	
		$grand_total_now=0;	
		foreach($laporan as $dapat){
			$tanggal_terjual	= tanggalindo($dapat->tanggal_terjual);
			$nama_barang		= $dapat->nama_barang;		
			$harga_barang		= rupiah(hanya_nomor($dapat->harga_satuan));
			$jumlah_terjual		= $dapat->jumlah_terjual;
			$harga_total		= rupiah(hanya_nomor($dapat->harga_satuan)*hanya_nomor($dapat->jumlah_terjual));		
		$no ++;
		$grand_total_now+= hanya_nomor($dapat->harga_satuan)*hanya_nomor($dapat->jumlah_terjual);
							
		echo"
			<tr>
				<td>$no	</td>			
				<td>$tanggal_terjual</td>
				<td>$nama_barang</td>
				<td>$dapat->id_member</td>			
				<td>$dapat->penjualan_uniq</td>			
				<td class='text-right'>$harga_barang</td>			
				<td class='text-right'>$jumlah_terjual</td>
				<td  class='text-right'>$harga_total</td>			
			</tr>
		";
		}
		?>
		
		</tbody>
			<tfoot>
			<tr>
				<th colspan="7" class="text-right">Grand Total:</th>
				<th  class="text-right"><?php echo rupiah($grand_total_now)?></th>						
			</tr>
			</tfoot>	
		</table>
</div>

