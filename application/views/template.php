<?php $path = base_url('assets/bootstrap');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?php echo $path?>/jquery/jquery-1.11.3.js" type="text/javascript"></script>
	<script src="<?php echo $path?>/jqueryui/js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
	<script src="<?php echo $path?>/js/bootstrap.min.js" type="text/javascript"></script>		
	<script src="<?php echo $path?>/js/base64.js" type="text/javascript"></script>	
	<script src="<?php echo $path?>/js/jquery.dataTables.min.js" type="text/javascript"></script>	
	<script src="<?php echo $path?>/js/dataTables.bootstrap.js" type="text/javascript"></script>	
	<link rel="stylesheet" type="text/css" href="<?php echo $path?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path?>/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path?>/jqueryui/css/ui-lightness/smoothness.css">
	<!--plugins-->
	<script src="<?php echo base_url('assets/camcode')?>/qrcodelib.js" type="text/javascript"></script>	
	<script src="<?php echo base_url('assets/camcode')?>/webcodecamjquery.js" type="text/javascript"></script>	
	<!--plugins-->
	
	<!------------url js --------------------->
	<script>
		var url="<?php echo base_url()?>index.php/";
	</script>
	<script src="<?php echo $path?>/js/function.js" type="text/javascript"></script>	
	<!------------url js --------------------->
	
	<!-- highchart---------------------------------------------------->
	<script src="<?php echo base_url()?>assets/highcharts.js" type="text/javascript"></script>	
	<!-- highchart---------------------------------------------------->
	
	
	<title><?php if(isset($title)): echo $title; endif;?></title>
</head>
<body >

<div id="loading">
	<div class="alert alert-warning text-center">
		<img src="<?php echo $path?>/img/bigLoader.gif" id="img_loading"><strong>Loading...</strong>
	</div>
</div>


<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" onclick="menu_awal()">
                        <span class="glyphicon glyphicon-home"> </span> Home
                    </a>
                </li>                
				
				<div class="menu_left">
					<span class="glyphicon glyphicon-file"></span> Form Penjualan
					<div onclick="form_pelanggan()"><a href="#home/form_pelanggan"><span class="glyphicon glyphicon-file"></span> Konsumen Baru</a></div>
					<div onclick="pelanggan_lama()"><a href="#home/pelanggan_lama"><span class="glyphicon glyphicon-file"></span> Konsumen Lama</a></div>
				</div>
				<div class="menu_left" onclick='iframe(url+"grocery/tbl_barang","Data Barang")'><a href="#"><span class="glyphicon glyphicon-hdd"></span> Data Barang</a></div>
				<div class="menu_left" onclick='data_penjualan()'><a href="#home/data_penjualan"><span class="glyphicon glyphicon-dashboard"></span> Data Penjualan</a></div>
				<div class="menu_left" onclick='iframe(url+"grocery/tbl_konsumen","Data Konsumen")'><a href="#"><span class="glyphicon glyphicon-user"></span> Data Konsumen</a></div>
				<div class="menu_left" onclick='laporan_penjualan()'><a href="#laporan/laporan_penjualan"><span class="glyphicon glyphicon-file"></span> Laporan Penjualan</a></div>
				<div class="menu_left">
					<span class="glyphicon glyphicon-qrcode"></span> QRCode
					<div onclick='data_qrcode()'><a href="#home/data_qrcode"><span class="glyphicon glyphicon-qrcode"></span> Data QRCode</a></div>
					<div onclick="generate_qrcode()"><a><span class="glyphicon glyphicon-refresh"></span> Generate Semua</a></div>
					<div><a href="<?php echo base_url()?>index.php/qr_code/cetak_qrcode" target="blank"><span class="glyphicon glyphicon-print"></span> Cetak Semua</a></div>
					<div onclick='if(confirm("Yakin?")){delete_qrcode();}'><a><span class="glyphicon glyphicon-remove"></span> Hapus Semua</a></div>
					
				</div>
				<div class="menu_left" onclick='data_pencapaian()'><a href="#pencapaian"><span class="glyphicon glyphicon-dashboard"></span> Data Pencapaian</a></div>
				
            </ul>
			
        </div>
        <!-- /#sidebar-wrapper -->


	<!--<nav class="navbar navbar-custom">-->
	<nav class="navbar navbar-default">	
	<!--<nav class="navbar navbar-inverse">-->
	<!--<div class="navbar navbar-default navbar-fixed-top">-->
	
	<span id="menu_kiri"><img src="<?php echo $path?>/img/menu.png" id="aaaa" align="left"></span>			 	
		<div class="container">			
			<a href="<?php echo base_url()?>" class="navbar-brand" id="">PENJUALAN BARANG</a>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>				
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" id="home"><span class="glyphicon glyphicon-home"> </span> Home</a></li>
				</ul>
			</div>
		</div>									
	</nav>		
		<div id="isi" class="container">						
		</div>
<div id="alternatif_isi" class="alert alert-info container text-center" style="display:none"><div>
<footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright Fadil 2015</p>
      </div>
</footer>

</body>
</html>
