
<h1>Member:</h1>
<form id="form_pelanggan_lama" >
ID MEMBER:<br>
<input autofocus name="id_member" class="form-control" id="id_member" placeholder="Cari ID MEMBER" required>
<small>Masukkan ID MEMBER</small><br>
<input  name="submit" type="submit" class="btn btn-primary btn-block" value="Cari">
</form>
<div id="info" class="alert alert-danger" style="display:none;"></div>
<?php 
$id_member = "";
foreach($get_id_member as $data){
	
	$id_member .= '"'.trim($data->id_member).'",';
}

?>
<script>
$("#id_member").focus();
$(function(){
	var id_member = [
		<?php echo $id_member?>
	];
	var item_point = $( "#id_member" );
	
	item_point.autocomplete({
	  source: id_member
	});
});

$('#id_member').keyup(function(){
    var besar = $(this).val().toUpperCase();
	$(this).val(besar);
})
			
$("#form_pelanggan_lama").submit(function(){
	
	$.get(url+"home/cari_id_member",$(this).serialize(),function(e){
		//alert(e)
		if(e ==1)
		{
			var id_member = $("#id_member").val();
			form_penjualan(id_member);
		}else if(e ==0){
			var id_member = $("#id_member").val();
			$("#info").hide().html("Tidak ditemukan id_member:<b>"+id_member+"</b><br><a href='#pelanggan_baru' id='pelanggan_baru'>Mendaftar</a>").fadeIn();
		}
		
		
	})
	return false;
});

$("#info").on("click","#pelanggan_baru",function(){
	
	form_pelanggan();
});
</script>