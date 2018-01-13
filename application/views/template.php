<?php $path = base_url('assets/bootstrap');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	<link rel="stylesheet" type="text/css" href="<?php echo $path?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path?>/css/custom.css">
	
	
	
	
	
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
                    <a href="#" >
                        <span class="glyphicon glyphicon-home"> </span> Home
                    </a>
                </li>                
			
				
				
				
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

<script>
	
	
	$.get("<?= site_url()?>/admin/tproduk",function(hasil){
		$("#isi").html(hasil);
	})
</script>
</html>
