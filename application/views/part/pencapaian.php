<?php 
	$bulan_lalu =  bulantahunindo(date('Y-m-d',strtotime("last month")));
	$bulan_ini  =  bulantahunindo(date('Y-m-d'));
?>

<h1> Pencapaian Penjualan</h1>
 <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#tab_pencapaian_bulan_ini">Bulan Ini</a></li>
    <li><a data-toggle="pill" href="#tab_pencapaian_bulan_lalu">Bulan Lalu</a></li>    
    <!--<li><a data-toggle="pill" href="#tab_cari">Cari Range</a></li>-->
    <li><a data-toggle="pill" href="#tab_setting">Setting</a></li>
  </ul>

<div class="tab-content " >

<!-----tab tab_pencapaian_bulan_ini----------------------------------------------------------------->
<div id="tab_pencapaian_bulan_ini" class="tab-pane fade in active">
<h2>Bulan Ini: <?php echo  $bulan_ini?></h2>

		<?php
		$no=0;	
		$grand_total_now=0;	
		foreach($pencapaian_bulan_ini as $dapat)
		{		
			$grand_total_now+= hanya_nomor($dapat->harga_satuan)*hanya_nomor($dapat->jumlah_terjual);									
		}
		
		echo rupiah($grand_total_now)
		?>
	
	
	
	<div id="container" class="container" ></div>		
	
</div>


<script>

//Chart
$(function () {
    var chart, merge = Highcharts.merge;
    $(document).ready(function() {
    var perShapeGradient = {
            x1: 0,
            y1: 0,
            x2: 1,
            y2: 0
        };
        var colors = Highcharts.getOptions().colors;
        colors = [{
            linearGradient: perShapeGradient,
            stops: [
                [0, 'rgb(247, 111, 111)'],
                [1, 'rgb(220, 54, 54)']
                ]
            }, {
            linearGradient: merge(perShapeGradient),
            stops: [
                [0, 'rgb(120, 202, 248)'],
                [1, 'rgb(46, 150, 208)']
                ]
            }, {
            linearGradient: merge(perShapeGradient),
            stops: [
                [0, 'rgb(136, 219, 5)'],
                [1, 'rgb(112, 180, 5)']
                ]}, 
        ]
                              
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text:null
            },
            
            xAxis: {
                categories: ['Target', 'Pencapaian']
            },
           
            plotOptions: {
                column: {
                    cursor: 'pointer',
                   dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y;
                        }
                    }
                }
            },
            
            series: [{
                name: name,
                data: [{
                    y: <?php echo $target?>,                    
                    color: colors[0]
                }, {
                    y: <?php echo $grand_total_now?>,
                    color: colors[1]
                }],
                color: 'white'
            }],
            exporting: {
                enabled: false
            },
            credits:{enabled:false},
            legend: {enabled:false},yAxis: {
                min: 0,
                title: {
                    text: null
                },
                stackLabels: {
                    enabled: false
                }
            },
        });
    });
    
});


</script>




<!-----tab tab_pencapaian_bulan_lalu----------------------------------------------------------------->
<div id="tab_pencapaian_bulan_lalu" class="tab-pane fade">
<h2>Bulan Lalu: <?php echo  $bulan_lalu?></h2>



	<?php
	
	$grand_total_lalu=0;	
	foreach($pencapaian_bulan_lalu as $data){
		
		$get_tot 			= hanya_nomor($data->harga_satuan)*hanya_nomor($data->jumlah_terjual);
		$grand_total_lalu	+= $get_tot;
	
	}
	?>
	<div id="container_lalu" class="container" ></div>
</div>

	
<script>

//Chart
$(function () {
    var chart, merge = Highcharts.merge;
    $(document).ready(function() {
    var perShapeGradient = {
            x1: 0,
            y1: 0,
            x2: 1,
            y2: 0
        };
        var colors = Highcharts.getOptions().colors;
        colors = [{
            linearGradient: perShapeGradient,
            stops: [
                [0, 'rgb(247, 111, 111)'],
                [1, 'rgb(220, 54, 54)']
                ]
            }, {
            linearGradient: merge(perShapeGradient),
            stops: [
                [0, 'rgb(120, 202, 248)'],
                [1, 'rgb(46, 150, 208)']
                ]
            }, {
            linearGradient: merge(perShapeGradient),
            stops: [
                [0, 'rgb(136, 219, 5)'],
                [1, 'rgb(112, 180, 5)']
                ]}, 
        ]
                              
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container_lalu',
                type: 'column'
            },
            title: {
                text:null
            },
            
            xAxis: {
                categories: ['Target', 'Pencapaian']
            },
           
            plotOptions: {
                column: {
                    cursor: 'pointer',
                   dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y;
                        }
                    }
                }
            },
            
            series: [{
                name: name,
                data: [{
                    y: <?php echo $target?>,                    
                    color: colors[0]
                }, {
                    y: <?php echo $grand_total_lalu?>,
                    color: colors[1]
                }],
                color: 'white'
            }],
            exporting: {
                enabled: false
            },
            credits:{enabled:false},
            legend: {enabled:false},yAxis: {
                min: 0,
                title: {
                    text: null
                },
                stackLabels: {
                    enabled: false
                }
            },
        });
    });
    
});


</script>




<!-----tab cari----------------------------------------------------------------->
<!--
<div id="tab_cari" class="tab-pane fade">
<h2>Cari Range pencapaian: </h2>
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

-->



<!-----tab tab_setting----------------------------------------------------------------->

<div id="tab_setting" class="tab-pane fade">
	<h3>Setting </h3>
	
	
<div class="alert alert-info">
	<div class="col-sm-4" style="background-color:lavender; padding:18px;">
		<b>Target Pencapaian:</b>
	</div>
	
	
		<form id="form_target">
		<div class="col-sm-4" style="background-color:lavenderblush; padding:10px;">
			<input type="text" class="form-control" required name="target_pencapaian" id="target_pencapaian" value="<?php echo rupiah($target)?>"> 
		</div>
		<div class="col-sm-4" style="background-color:lavender; padding:10px;">
			<input type="submit" class="btn btn-danger" value="Ubah" > 			
		</div>
		</form>
	
	
	<div style="clear:both"></div>
</div>

</div>


</div>



<!-- Modal -->
<div id="myModal" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg printable">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">pencapaian</h4>
      </div>
      <div class="modal-body" id="modal_isi_cek_tanggal">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
   
   
   



   

<script>
	
	$("#div_list_bulan_tahun").on("click","#list_bulan_tahun",function(){
		loading();
		$("#div_list_bulan_tahun #list_bulan_tahun").removeClass('active');			
		var cari = $(this).attr("title");
		//alert(cari);
		$.get(url+"pencapaian_pdf/cek_tanggal_pdf",{cari:cari},function(e){
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
	
	$('#pencapaian_bulan_ini').dataTable({
								 "lengthMenu": [ 1000,2000 ],
								"pageLength": 1000
								});
	$('#pencapaian_bulan_lalu').dataTable({
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
	 $.get(url+"pencapaian_pdf/pencapaian_penjualan/bulan_ini",function(e){			
			
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
	 $.get(url+"pencapaian_pdf/pencapaian_penjualan/bulan_lalu",function(e){						
			$("#modal_isi_cek_tanggal").html(e);
			$('#myModal').modal('show');
			loading_hide();
			var link_download = $("#modal_isi_cek_tanggal").find("#link_download").val();					
			$("#modal_isi_cek_tanggal").html("");
			$('<a href="'+link_download+'" target="_blank">Full</a><iframe src="'+link_download+'" id="printf" name="printf" style="border: 0; position:relative; top:0; left:0; right:0; bottom:0; width:100%; height:700px"></iframe>').appendTo('#modal_isi_cek_tanggal');
			
		});
	return false; 
 }) 
 
 
 $("#form_target").submit(function(){
	 loading();
	 var div = $(this).find("input#target_pencapaian");
	 $.get(url+"pencapaian/update_target_pencapaian",$(this).serialize(),function(e){							
		div.css('background-color','cyan');	
		loading_hide();
	});
	return false; 
 })
</script>