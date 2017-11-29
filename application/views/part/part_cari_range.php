

<h2>Laporan: <?php echo $from?> &rarr; <?php echo $to?></h2>
		<table id="laporan_get_bulan" class="table table-striped table-bordered" cellspacing="0" width="100%">
		
			<thead>
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
		foreach($cek_tanggal as $dapat){
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
		
		
<script>
$('#laporan_get_bulan').dataTable({
								 "lengthMenu": [ 1000,2000,3000 ],
								"pageLength": 1000
								});
</script>