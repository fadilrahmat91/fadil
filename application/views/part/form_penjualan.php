<div id="qrcode" class="alert" style="position:fixed;top:60px;right:0px;width:220px;height:420px;border:5px solid lavenderblush; background:lavender">
	<center>
		<select id="select"></select> 
		<canvas class="img-rounded" style="width:180px;height:180px;"></canvas> 
		<div id="t4_readed_qr" style="width:150px;height:150px;"></div>
	</center>
</div>

<h1><center>Form Penjualan Barang</center></h1>

<div class="row ">
	<b>Data Konsumen:</b>
	<table class="table table-bordered" >
	<tr>
		<td>Nama</td><td>   <?php echo $data_konsumen->nama_konsumen?></td>
	</tr>

	<tr>
		<td>Telp</td><td>  <?php echo $data_konsumen->telp_konsumen?></td>
	</tr>

	<tr>
		<td>Alamat</td><td>   <?php echo $data_konsumen->alamat_konsumen?></td>
	</tr>
	</table>
	
</div>


<div class="text-center">
	<button class="btn btn-primary " id="tambah_item">Add Item</button>
<hr>
</div>

	<div class="row">

	<div class="col-xs-4 col-sm-4">
		
		<b>TYPE</b>
	
	</div>

	

	<div class="col-xs-2 col-sm-2">
		
		<b>QTY</b>
	
	</div>
	
	<div class="col-xs-3 col-sm-3">
		
		<b>HARGA</b>
	
	</div>

	<div class="col-xs-3 col-sm-3">
		
		<b>ACTION</b>
	
	</div>

	</div>
<form id="form_penjualan">
<input type="hidden" name="id_member" id="id_member" class="form-control" value="<?php echo $id_member?>"> 
<div id="t4_item">
	
	
	
</div>
<hr>
<div id="t4_total">
	
	<div class="row">
		<div class="col-xs-4 col-sm-4">
			
			
		
		</div>
		
		<div class="col-xs-2 col-sm-2">
			
				<button class="btn btn-xs" id="cari_total"><span class="glyphicon glyphicon-refresh"></span> Total:</button>
		
		</div>
		
		
		<div class="col-xs-3 col-sm-3 text-right">
			
			Rp.<span id="total" style="font-weight:bold"><span>
		
		</div>
		
		<div class="col-xs-3 col-sm-3">
			
			
		
		</div>
		<div style="clear:both"></div>
	</div>

</div>
<hr>
Memo:
<textarea name="memo" class="form-control"></textarea>
<hr>
<div id="t4_submit">
	<input type="submit" value="Jual" class="btn btn-lg btn-success btn-block" id="submit">
	
</div>
</form>

<style>
.na{
	border:1px solid red;
	color:red;
}
</style>
<script>
add_item(function(){
	
});


$("#cari_total").click(function(){
	cari_total();
	return false;
})

$("#form_penjualan").submit(function(){	
	var serialnya = $(this).serialize();	
	$.get(url+"home/go_jual",serialnya,function(e){		
		cari_total();
		window.open(url+"home/struk/"+e, "_blank");
		data_penjualan(e);
		
	});
	return false;
});



$("#menu_data_barang").on("click",function(){
	
	data_barang();

})



$("#tambah_item").on("click",function(){
	
	add_item();

})



$("#t4_item").on("click", "#delete_item",function(){
	
	delete_item($(this));
	
	return false;
})


function proses_jual()
{
	var form_serialize = $("#form_penjualan").serialize();
	$.get(url+"home/go_jual",form_serialize,function(e){		
		cari_total();
		window.open(url+"home/struk/"+e, "_blank");
		data_penjualan(e);
		
	});
	return false;
}

function delete_item(item)
{
	var cek_nama_barang = item.parent().parent().find("#nama_barang").val();
	if(cek_nama_barang != "")
	{
		if(confirm("Anda yakin menghapus?"))
		{			
			item.parent().parent().remove();
		}
	}else
	{
		item.parent().parent().remove();
	}
	
	cari_total();
	return false;
	
}

function cari_total()
{		
		var serialnya = $("#form_penjualan").serialize();		
		$.get(url+"home/cari_total",serialnya,function(e){		
			$("#t4_total #total").html(e);
		});
		return false;
	
}

function cek_style_na(harga_barang,e)
{
	if(e =="n-a")
	{
		harga_barang.addClass("na");
	}else{
		harga_barang.removeClass("na");
	}
}

function cek_harganya(nama_barang,harga_barang)
{
	$.get(url+"home/ambil_harga/"+nama_barang,function(e){
		cek_style_na(harga_barang,e);
		harga_barang.val(e);
	});
}

function add_item(callback)
{
	
	var item = '<div class="row"><div class="col-xs-4 col-sm-4"><input autofocus  type="text" style="width:75%!important;float:left" name="nama_barang[]" required id="nama_barang" class="form-control" placeholder="nama_barang"></div><div class="col-xs-2 col-sm-2"><input type="text" id="qty" name="qty[]" class="form-control" placeholder="qty" value="1"> </div><div class="col-xs-3 col-sm-3"><input type="text" id="harga_barang"  name="harga_barang[]" class="form-control text-right" placeholder="harga_barang"> </div><div class="col-xs-3 col-sm-3"><div id="press" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-refresh"></span> Cek</div><div id="delete_item" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Hapus</div> </div><div style="clear:both"></div></div>';
	
	$("#t4_item").append(item);	
	$("#t4_item #nama_barang").last().focus();
	
		
		var raw = [
			<?php echo $nama_barang?>
		];
		
				
		var source  = [ ];
		var mapping = { };
		for(var i = 0; i < raw.length; ++i) {
			source.push(raw[i].label);
			mapping[raw[i].label] = raw[i].value;
		}
		var item_point = $( "#t4_item .row #nama_barang" );
		
		var item_qty = $( "#t4_item .row #qty" );
	
		item_point.autocomplete({
		  source: source,
		  minLength: 1,
		  select: function (event, ui) {
			//$("#nama_barang").val(mapping[ui.item.label]); // display the selected text
			$(this).parent().parent().find("#harga_barang").val(mapping[ui.item.value]); // save selected id to hidden input
			cari_total();
		}
		});		
			
	
}


//qrcode-------------------------------------------------
var arg = {
	resultFunction: function(resText, lastImageSrc) {
		var pointer = $( "#t4_item .row #nama_barang" );
		pointer.last().val(resText.trim());
		var nm_barang = resText.trim();
		$.get(url+"home/ambil_harga/",{nm_barang:nm_barang},function(e){
			pointer.last().parent().parent().find("#harga_barang").val(e);
		})
		//alert(lastImageSrc);
		$("#t4_readed_qr").html("<center><img src='"+lastImageSrc+"' width='150px' class='img-rounded'></center>");
		
		add_item();
		cari_total();
		
	}
};
var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
decoder.buildSelectMenu("#select");
decoder.play();
$('#select').on('change', function(){
	decoder.stop().play();	
});
//qrcode-------------------------------------------------



/*

//keyboard based

$(document).bind('keypress', function(e) {
   if (e.keyCode == 187) 
	{
		alert("aa");
		
	}
	
	//alert(e.keyCode);
});

//submit jual
$(document).bind('keypress', function(e) {
   if (e.keyCode == 10) 
	{
		
		proses_jual();
		
	}
	
	
});



*/


$(document.body).attr('tabIndex', 1).bind('keyup', function(e) {
    
	if (e.keyCode == 45) 
	{
		add_item();
		
	}	
	
});



window.onbeforeunload = function() {
		return 'Are you sure you want to navigate away from this page?';
	};

//leave page
var item_nama_barang = $( "#t4_item .row #nama_barang" ).val();
var item_harga_barang = $( "#t4_item .row #harga_barang" ).val();
//alert(item_harga_barang)
if(item_nama_barang !="" || item_harga_barang !="")
{
	
}




</script>