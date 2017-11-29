<?php
//$nn
//$data_penjualan
$path = base_url('assets/bootstrap');

?>
<h1> Data Penjualan</h1>

	<table id="tbl_barang" class="table table-striped table-bordered" cellspacing="0" width="100%">
	
		<thead>
		<tr>
			<th>No</th>
			<th>ID PENJUALAN</th>
			<th>ID MEMBER</th>
			<th>NAMA </th>
			<th>QTY </th>
			<th>TGL TERJUAL</th>
			<th>ACTION</th>
			</tr>
		</thead>	
	
	
	<tbody>
	<?php
	$no=0;	
	foreach($data_penjualan as $data)
	{		
	$no++;					
	echo"
		<tr>
			<td>$no	</td>
			<td>$data->penjualan_uniq	</td>
			<td>$data->id_member		</td>
			<td>$data->nama_konsumen	</td>
			<td>$data->qty	</td>
			<td>".tanggalindo($data->tanggal_terjual)."	</td>
			<td>
				<!--<a href='".base_url()."index.php/home/struk/$data->penjualan_uniq/goprint' target=''><button class='btn btn-xs btn-danger'><span class='glyphicon glyphicon-print'></span> Cetak</button></a> &nbsp;&nbsp;
				<a href='".base_url()."index.php/home/struk/$data->penjualan_uniq' target=''><button class='btn btn-xs btn-success'> Lihat</button></a>			-->
				<a href='".base_url()."index.php/home/struk_pdf/$data->penjualan_uniq' target='_blank'><button class='btn btn-xs btn-warning'> <span class='glyphicon glyphicon-print'></span> Cetak</button></a>			
			</td>
			
		</tr>
	";
	}
	?>
	
	</tbody>
	
	</table>
	
	
<script>
	
	$('#tbl_barang').dataTable({
					"oSearch": {"sSearch": "<?php echo $penjualan_uniq?>"}
				  });
						
		
</script>