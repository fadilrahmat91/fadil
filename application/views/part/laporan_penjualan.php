<?php 
	$bulan_lalu =  bulantahunindo(date('Y-m-d',strtotime("last month")));
	$bulan_ini  =  bulantahunindo(date('Y-m-d'));
?>

<h1> Laporan Penjualan</h1>
 <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#tab_laporan_bulan_ini">Bulan Ini</a></li>
    <li><a data-toggle="pill" href="#tab_laporan_bulan_lalu">Bulan Lalu</a></li>
    <li><a data-toggle="pill" href="#tab_semua">Semua Laporan</a></li>
    <li><a data-toggle="pill" href="#tab_cari">Cari Range</a></li>
  </ul>

<div class="tab-content " >

<!-----tab tab_laporan_bulan_ini----------------------------------------------------------------->
<div id="tab_laporan_bulan_ini" class="tab-pane fade in active">
<h2>Bulan Ini: <?php echo  $bulan_ini?></h2>
<div class="panel panel-default">
	<div class="panel-body">
		<button id="get_pdf_bulan_ini" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Generate Pdf</button>
	</div>
</div>
		<table id="laporan_bulan_ini" class="table table-striped table-bordered" cellspacing="0" width="100%">
		
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
		foreach($laporan_bulan_ini as $dapat){
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


<!-----tab tab_laporan_bulan_lalu----------------------------------------------------------------->
<div id="tab_laporan_bulan_lalu" class="tab-pane fade">
<h2>Bulan Lalu: <?php echo  $bulan_lalu?></h2>


<div class="panel panel-default">
	<div class="panel-body">
		<button id="get_pdf_bulan_lalu" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Generate Pdf</button>
	</div>
</div>

	<table id="laporan_bulan_lalu" class="table table-striped table-bordered" cellspacing="0" width="100%">
	
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
	$grand_total_lalu=0;	
	foreach($laporan_bulan_lalu as $data){
		$no ++;
		$tanggal_terjual	= tanggalindo($data->tanggal_terjual);
		$nama_barang		= $data->nama_barang;		
		$harga_barang		= rupiah(hanya_nomor($data->harga_satuan));
		$jumlah_terjual		= $data->jumlah_terjual;
		$harga_total		= rupiah(hanya_nomor($data->harga_satuan)*hanya_nomor($data->jumlah_terjual));		
		$get_tot 			= hanya_nomor($data->harga_satuan)*hanya_nomor($data->jumlah_terjual);
		$grand_total_lalu	+= $get_tot;
						
	echo"
		<tr>
			<td>$no	</td>			
			<td>$tanggal_terjual</td>
			<td>$nama_barang</td>
			<td>$data->id_member</td>			
			<td>$data->penjualan_uniq</td>			
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
			<th  class="text-right"><?php echo rupiah($grand_total_lalu)?></th>						
		</tr>
		</tfoot>	
	</table>
	
</div>


<!-----tab tab_semua----------------------------------------------------------------->

<div id="tab_semua" class="tab-pane fade">
<h2>Semua Laporan: </h2>
<div class="row">
    <div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
    <div class="col-sm-4" style="background-color:lavenderblush;">.col-sm-4</div>
    <div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div>
  </div>
  
  <div class="list-group" id="div_list_bulan_tahun">
	<?php
		foreach($laporan_all as $data){
				
			echo '<a href="#" class="list-group-item text-center" id="list_bulan_tahun" title="'.$data->tanggal_terjual.'">'.bulantahunindo($data->tanggal_terjual).'</a>';
			
		}
	
	?>
	  
  </div>
  <div id="div_cek_tanggal"></div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg printable">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Laporan</h4>
      </div>
      <div class="modal-body" id="modal_isi_cek_tanggal">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
   
   
   





<!-----tab cari----------------------------------------------------------------->

<div id="tab_cari" class="tab-pane fade">
<h2>Cari Range Laporan: </h2>
<form id="cari_range">
<div class="row">
    <div class="col-sm-4" style="background-color:lavender; padding:10px;">
		<label for="from">From:</label> 
		<input type="text" id="from" class="form-control" name="from" required>
	</div>
    <div class="col-sm-4" style="background-color:lavenderblush; padding:10px;">
		<label for="to">To:</label> 
		<input type="text" id="to" class="form-control" name="to" required>
	</div>
    <div class="col-sm-4" style="background-color:lavender; padding:10px;">
		<label for="submit">Action</label> <br>
		<input type="submit" id="submit" class="btn btn-primary" name="submit">
	</div>
  </div>
 </form>
   
   <div id="hasil_cari"></div>
</div>
</div>



   

<script>
	
	$("#div_list_bulan_tahun").on("click","#list_bulan_tahun",function(){
		loading();
		$("#div_list_bulan_tahun #list_bulan_tahun").removeClass('active');			
		var cari = $(this).attr("title");
		//alert(cari);
		$.get(url+"laporan_pdf/cek_tanggal_pdf",{cari:cari},function(e){
			//$("#div_cek_tanggal").hide().html(e).fadeIn();
			$("#modal_isi_cek_tanggal").html(e);
			$('#myModal').modal('show');
			var link_download = $("#modal_isi_cek_tanggal").find("#link_download").val();					
			$("#modal_isi_cek_tanggal").html("");
			//alert(e);
			$('<a href="'+link_download+'" target="_blank">Full</a><iframe src="'+link_download+'" id="printf" name="printf" style="border: 0; position:relative; top:0; left:0; right:0; bottom:0; width:100%; height:700px"></iframe>').appendTo('#modal_isi_cek_tanggal');
			loading_hide();
		});
		$(this).addClass("active");
		return false;
	})
	
	$('#laporan_bulan_ini').dataTable({
								 "lengthMenu": [ 1000,2000 ],
								"pageLength": 1000
								});
	$('#laporan_bulan_lalu').dataTable({
								 "lengthMenu": [ 1000,2000,3000 ],
								"pageLength": 1000
								});
	
	
	
	//cari
$(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
	  dateFormat: 'yy-mm-dd', 
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
	  dateFormat: 'yy-mm-dd', 
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  
  
 $("#cari_range").submit(function(){
	 loading();
	var serializenya = $(this).serialize();	
	$.get(url+"laporan_pdf/cari_range_pdf",serializenya,function(e){	
			$("#modal_isi_cek_tanggal").html(e);
			$('#myModal').modal('show');
			
			var link_download = $("#modal_isi_cek_tanggal").find("#link_download").val();					
			$("#modal_isi_cek_tanggal").html("");
			$('<a href="'+link_download+'" target="_blank">Full</a><iframe src="'+link_download+'" id="printf" name="printf" style="border: 0; position:relative; top:0; left:0; right:0; bottom:0; width:100%; height:700px"></iframe>').appendTo('#modal_isi_cek_tanggal');
			loading_hide();
		});
	return false; 
 });
 
 
 $("#get_pdf_bulan_ini").click(function(){
	 loading();
	 $.get(url+"laporan_pdf/laporan_penjualan/bulan_ini",function(e){			
			
			$("#modal_isi_cek_tanggal").html(e);
			$('#myModal').modal('show');			
			var link_download = $("#modal_isi_cek_tanggal").find("#link_download").val();					
			$("#modal_isi_cek_tanggal").html("");
			$('<a href="'+link_download+'" target="_blank">Full</a><iframe src="'+link_download+'" id="printf" name="printf" style="border: 0; position:relative; top:0; left:0; right:0; bottom:0; width:100%; height:700px"></iframe>').appendTo('#modal_isi_cek_tanggal');
			loading_hide();
		});
	return false; 
 })
 
 $("#get_pdf_bulan_lalu").click(function(){
	 loading();
	 $.get(url+"laporan_pdf/laporan_penjualan/bulan_lalu",function(e){						
			$("#modal_isi_cek_tanggal").html(e);
			$('#myModal').modal('show');
			loading_hide();
			var link_download = $("#modal_isi_cek_tanggal").find("#link_download").val();					
			$("#modal_isi_cek_tanggal").html("");
			$('<a href="'+link_download+'" target="_blank">Full</a><iframe src="'+link_download+'" id="printf" name="printf" style="border: 0; position:relative; top:0; left:0; right:0; bottom:0; width:100%; height:700px"></iframe>').appendTo('#modal_isi_cek_tanggal');
			
		});
	return false; 
 })
</script>