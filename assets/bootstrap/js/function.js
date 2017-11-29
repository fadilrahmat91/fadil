$(document).ready(function(){
	
	$("#wrapper").toggleClass("toggled");
		
		$("#aaaa").click(function() {			
		
			$("#wrapper").toggleClass("toggled");
			return false;
		});
	//menu_awal();	
		
	//menu
	
	$("#home").on("click",function(){
		menu_awal();
	});
	
	
	/*
	//keyboard 
	$(document).bind('keypress', function(e) {
	   if(e.keyCode ==77)//keyboar shift m
		{
			menu_awal();
		}
		//alert(e.keyCode)
	});
	*/
});

function menu_awal()
{
	$.get(url+"home/menu_awal",function(e){
	
		$("#isi").hide().html(e).fadeIn();
	
	});
}

function data_barang()
{
	loading();
	$.get(url+"home/data_barang",function(e){
		
		$("#isi").hide().html(e).fadeIn();
	loading_hide();
	});
}


function data_qrcode()
{
	loading();
	$.get(url+"qr_code/data_qrcode",function(e){
		
		$("#isi").hide().html(e).fadeIn();
	loading_hide();
	});
}

function laporan_penjualan()
{
	loading();
	$.get(url+"laporan/laporan_penjualan",function(e){
		
		$("#isi").hide().html(e).fadeIn();
	loading_hide();
	});
}

function data_pencapaian()
{
	loading();
	$.get(url+"pencapaian",function(e){
		
		$("#isi").hide().html(e).fadeIn();
	loading_hide();
	});
}

function form_penjualan(id_member)
{
	$.get(url+"home/form_penjualan/"+id_member,function(e){
		
		$("#isi").html(e);
		//$("#isi").hide().html(e).fadeIn();
	
	});
}


function tbl_konsumen()
{
	$.get(url+"grocery/tbl_konsumen/",function(e){
		
		$("#isi").hide().html(e).fadeIn();
	
	});
}


function form_pelanggan()
{
	$.get(url+"home/form_pelanggan",function(e){
		
		$("#isi").html(e);
		//$("#isi").hide().html(e).fadeIn();
		
	
	});
}

function pelanggan_lama()
{

	$.get(url+"home/pelanggan_lama",function(e){
		
		$("#isi").html(e);
		//$("#isi").hide().html(e).fadeIn();
	
	});
}

function data_penjualan(data_penjualan)
{
	if (typeof data_penjualan == 'undefined' || typeof data_penjualan == '') {
			$.get(url+"home/data_penjualan",function(e){
		
				$("#isi").hide().html(e).fadeIn();
			
			});
		}else{
			$.get(url+"home/data_penjualan/"+data_penjualan,function(e){
		
				$("#isi").hide().html(e).fadeIn();
			
			});
		}
	
}


function generate_qrcode()
{
	loading();
	$.get(url+"qr_code/generate_qrcode",function(e){
		
		$("#alternatif_isi").hide().html("<b>Sukses generate ["+e+"] code...</b> Silahkan cetak..").fadeIn().delay(5000).fadeOut();
		data_qrcode();
	loading_hide();
	});
	
}


function delete_qrcode()
{
	loading();
	$.get(url+"qr_code/delete_qrcode",function(e){
		
		$("#alternatif_isi").hide().html("<b>Sukses delete_qrcode ["+e+"] code...</b> ").fadeIn().delay(5000).fadeOut();
		data_qrcode();
	loading_hide();
	});
	
}




function loading()
{
	$("#loading").fadeIn();	

}

function loading_hide()
{

	$("#loading").fadeOut();
	
}

function load_menu_hash(url_target)
{
	$("#isi").hide();
	loading();
		if($("#isi").html(''))
		{
			$.get(url_target,function(e){
				if($("#isi").html(e))
				{
					loading_hide();
					$("#isi").fadeIn(1000);
				}
				
			});
		}
		
				
}

//link hash
if(window.location.hash) 
{
  var link = window.location.hash.substr(1);

	if (typeof link == 'undefined' || typeof link == '') {
	  load_menu_hash(url+"home/menu_awal");
	}else{
		load_menu_hash(url+link);
	}
  
}else{
	menu_awal();
}


//iframe
function iframe(url,title)
{		
	loading();
		var event = '<iframe src="'+url+'" frameborder="0" scrolling="yes" style="border: 0; position:relative; width:100%; height:600px; padding:10px;"></iframe>';
		$("#isi").hide().html("<h1>"+title+"</h1>").append(event).fadeIn();
	loading_hide();
}


