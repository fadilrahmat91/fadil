
<div class="alert alert-info text-center menu_awal" id="menu_form_penjualan"><span><b><span class="glyphicon glyphicon-file"></span> Form Penjualan</b></span>
	<div class="list-group" id="sub_menu" style="display:none">
		<a href="#home/form_pelanggan" class="list-group-item list-group-item-danger" id="palanggan_baru"> Konsumen Baru</a>
		<a href="#home/pelanggan_lama" class="list-group-item list-group-item-warning" id="pelanggan_lama"> Konsumen Lama</a>
	</div>
</div>

<a href="#home/data_barang"><div class="alert alert-success text-center menu_awal" id="menu_data_barang"> <b><span class="glyphicon glyphicon-hdd"></span> Data Barang</b></div></a>

<!--
<a href="#home/data_stok_barang"><div class="alert text-center menu_awal" style="background:lavender" id="menu_data_stok_barang"><span class="glyphicon glyphicon-open-file"></span> Data Stok Barang</div></a>
-->

<a href="#home/data_penjualan"><div class="alert alert-warning text-center menu_awal" id="menu_data_penjualan"><span><b><span class="glyphicon glyphicon-dashboard"></span> Data Penjualan</b></span></div></a>



<a href="#home/tbl_konsumen"><div class="alert alert-danger text-center menu_awal" id="menu_tbl_konsumen"><span><b><span class="glyphicon glyphicon-file"></span> Data Konsumen</b></span></div></a>



<a href="#laporan/laporan_penjualan"><div class="alert  text-center menu_awal" style="background:lavenderblush"  id="laporan_penjualan"><span><b><span class="glyphicon glyphicon-file"></span>Laporan</b></span></div></a>

<!--
<a href="<?php echo base_url()?>index.php/home/cetak_qrcode" target="blank"><div class="alert  text-center menu_awal" style="background:lavender; border:1px solid lavenderblush;"  id="laporan_penjualan"><span><span class="glyphicon glyphicon-file"></span>Cetak QR Code</span></div></a>

<a href="#home/generate_qrcode"><div class="alert  text-center menu_awal" style="background:#71e6cf; border:1px solid #12bf9c;"  id="generate_qrcode"><span><span class="glyphicon glyphicon-refresh"></span> Generate QR Code</span></div></a>
-->
<a href="#qr_code/data_qrcode"><div class="alert  text-center menu_awal" style="background:#fff; color:#000; border:1px solid #aaa;"  id="data_qrcode"><span><b><span class="glyphicon glyphicon-qrcode"></span> Data QR Code</b></span></div></a>



<script>
/*
$("#menu_data_barang").on("click",function(){
	
	data_barang();

})
*/
$("#menu_form_penjualan").on("click",function(){
	
	$(this).find("span").hide();
	$("#sub_menu").fadeIn();
	//form_penjualan();

})


$("#palanggan_baru").on("click",function(){
	
	form_pelanggan();

})

$("#laporan_penjualan").on("click",function(){
	
	laporan_penjualan();

})

$("#pelanggan_lama").on("click",function(){
	
	pelanggan_lama();

})


$("#menu_data_penjualan").on("click",function(){
	
	data_penjualan();

})


$("#generate_qrcode").on("click",function(){
	
	generate_qrcode();
	return false;
})


$("#data_qrcode").on("click",function(){
	
	data_qrcode();
	
})

/*
$("#menu_tbl_konsumen").on("click",function(){
	
	tbl_konsumen();

})

*/
//iframe

$("#menu_tbl_konsumen").on("click",function(){
	
	iframe(url+"grocery/tbl_konsumen","Table Konsumen");
	return false

})



$("#menu_data_barang").on("click",function(){
	
	iframe(url+"grocery/tbl_barang","Table Barang");
	return false

})



$("#menu_data_stok_barang").on("click",function(){
	
	iframe(url+"grocery/tbl_stok","Table Stok");
	return false

})

/*

$(document).bind('keypress', function(e) {
   
	//alert(e.keyCode);
	if(e.keyCode ==33)//keyboard shift+1
	{
		$("#menu_form_penjualan").find("span").hide();
		$("#sub_menu").fadeIn();
	}else if(e.keyCode ==66)//keyboard shift+B
	{
		form_pelanggan();
	}else if(e.keyCode ==76)//keyboard shift+L
	{
		pelanggan_lama();
	}else if(e.keyCode ==64)//keyboard shift+2
	{
		iframe(url+"grocery/tbl_barang","Table Barang");
		return false
	}else if(e.keyCode ==35)//keyboard shift+3
	{
		data_penjualan();
	}else if(e.keyCode ==36)//keyboard shift+4
	{
		iframe(url+"grocery/tbl_konsumen","Table Konsumen");
		return false
	}else if(e.keyCode ==37)//keyboard 5
	{
		laporan_penjualan();
	}
});
*/

</script>