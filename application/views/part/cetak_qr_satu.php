<style>
.qr{
font-size:10px;
font-family:verdana;
margin:0px auto;
}
.qr_title{
	position:absolute;
	margin-top:-3px;
	margin-left:20px;
}
.place{	
	float:left;	
	border:1px dashed #aaa;
	
}
.qr_img > img{
	width:200px;
}


	@media print{
	@page {
		size: A4;
		margin: 0;
	}
	
	margin:0mm;
	padding:0mm;
	
	}

	.alert{
	padding:5px !important;
	margin-top:5px !important;
	margin-bottom:2px !important;
	}
</style>
<div class="qr">
<?php
	
	
	
		echo "<div class='place'>";
			echo "<div class='qr_title'>".$nama_barang."</div>";
			echo "<div class='qr_img'>";
			echo "<img src='".base_url('assets/qrcode')."/".$nama_barang.".png'>";
			echo "</div>";
		echo "</div>";
	
?>

</div>

<script>
window.print();
</script>