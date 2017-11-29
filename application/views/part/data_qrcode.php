<h1> Data Qr Code Barang</h1>

<a href="<?php echo base_url()?>index.php/qr_code/cetak_qrcode" target="blank">
	<button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-file"></span>Cetak Semua QRCode</button>
</a>
<button class="btn btn-warning btn-xs" id="generate_qrcode"><span class="glyphicon glyphicon-refresh"></span> Generate Semua QRCode</button>

<button class="btn btn-danger btn-xs" id="delete_qrcode"><span class="glyphicon glyphicon-refresh"></span> Delete Semua QRCode</button>

<div style="clear:both; padding:20px;"></div>
	<table id="tbl_barang" class="table table-striped table-bordered" cellspacing="0" width="100%">
	
		<thead>
		<tr>
			<th>No</th>
			
			<th>nama barang</th>			
			<th>Qr Code</th>
			<th>pilihan</th>
			</tr>
		</thead>	
	
	
	<tbody>
	<?php
	$no=0;	
	foreach($all_barang as $dapat){
		$id_barang			=	$dapat->id_barang;
		$nama_barang		=	$dapat->nama_barang;
		$harga_barang		=	$dapat->harga_barang;
		$tgl_barang_masuk	=	$dapat->tgl_barang_masuk;
		$stok				=	$dapat->stok_barang;
		
		
	$no ++;
	
	$qr_name = preg_replace('/\s+/', '', $dapat->nama_barang);			
	$qr_name = str_replace('/', '_', $qr_name);	
	$full_qr_name = base_url('assets/qrcode')."/".$qr_name.".png";
	
	if(curl_file_exist($full_qr_name))
	{
		$qr_path = "<img src='".$full_qr_name."' width='30px'>";
		$btn_cetak = "<a href='".base_url()."index.php/qr_code/cetak_qrcode_satu/".urlencode($qr_name)."' target='blank' class='btn btn-xs btn-info'><span class='glyphicon glyphicon-print'></span> Cetak</a> ";
	}else{
		$qr_path = "Belum ada";
		$btn_cetak = "";
	}
	
	echo"
		<tr>
			<td>$no	</td>			
			<td>$nama_barang</td>
			
			<td>$qr_path</td>
			<td>
				<a class='btn btn-xs btn-danger' id='generate_qr' href='".base_url('assets/phpqrcode/')."/custom_get.php?data=".$nama_barang."'><span class='glyphicon glyphicon-refresh'></span> Generate</a>
				".$btn_cetak."
				
			</td>
		</tr>
	";
	}
	?>
	
	</tbody>
	
	</table>
	
	
<script>
	
	$('#tbl_barang').dataTable();
	
	$("#tbl_barang").on("click","tr td #generate_qr",function(e){		
		var urlnya = $(this).attr("href");
		$.get(urlnya,function(event){
			$("#alternatif_isi").hide().html("<b>Sukses generate ["+event+"] code...</b> Silahkan cetak..").fadeIn().delay(5000).fadeOut();
			data_qrcode();
		})
		return false;
	})
		
		
	$("#generate_qrcode").on("click",function(){
		
		generate_qrcode();
				
		return false;
	})

$("#delete_qrcode").on("click",function(){
		
		if(confirm("Serius..?"))
		{
			
			if(confirm("cius..?"))
			{
				delete_qrcode();
			}
		}		
		return false;
	})


</script>