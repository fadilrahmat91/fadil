<h1> Tampilan Data Barang</h1>

	<table id="tbl_barang" class="table table-striped table-bordered" cellspacing="0" width="100%">
	
		<thead>
		<tr>
			<th>No</th>
			
			<th>nama barang</th>
			<th>stok barang</th>
			<th>harga barang</th>
			<th>Tgl Masuk Barang</th>
			<th>pilihan</th>
			</tr>
		</thead>	
	
	
	<tbody>
	<?php
	$no=0;	
	foreach($all_barang as $dapat){
		$id_barang			=$dapat->id_barang;
		$nama_barang		=$dapat->nama_barang;
		$harga_barang		=$dapat->harga_barang;
		$tgl_barang_masuk	=$dapat->tgl_barang_masuk;
		$stok				=$dapat->stok_barang;
	$no ++;
	
						
	echo"
		<tr>
			<td>$no	</td>
			
			<td>$nama_barang</td>
			<td>$stok</td>
			<td>$harga_barang</td>
			<td>$tgl_barang_masuk</td>
			<td><a href='jual.php?id_barang=$id_barang'>jual</a></td>
		</tr>
	";
	}
	?>
	
	</tbody>
	
	</table>
	
	
<script>
	
	$('#tbl_barang').dataTable();
		
</script>