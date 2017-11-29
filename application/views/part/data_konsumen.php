
<h1> Data Konsumen</h1>

	<table id="tbl_barang" class="table table-striped table-bordered" cellspacing="0" width="100%">
	
		<thead>
		<tr>
			<th>No</th>
			<th>ID PENJUALAN</th>
			<th>ID MEMBER</th>
			<th>NAMA </th>
			<th>TGL TERJUAL</th>
			<th>ACTION</th>
			</tr>
		</thead>	
	
	
	<tbody>
	<?php
	$no=0;	
	foreach($data_konsumen as $data)
	{		
	$no++;					
	echo"
		<tr>
			<td>$no	</td>
			<td>$data->penjualan_uniq	</td>
			<td>$data->id_member		</td>
			<td>$data->nama_konsumen	</td>
			<td>$data->tanggal_terjual	</td>
			<td><a href='".base_url()."index.php/home/struk/$data->penjualan_uniq' target='_blank'><span class='glyphicon glyphicon-print'></span></a></td>
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