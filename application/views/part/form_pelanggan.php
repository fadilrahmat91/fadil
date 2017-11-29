
<h1>Pelanggan Baru:</h1>
<form id="form_pelanggan_baru" >

ID MEMBER:<br>
<input name="id_member" class="form-control" readonly value="<?php echo $id_member?>">
<br>
Nama:<br>
<input autofocus name="nama_konsumen" class="form-control" required>
<br>

Telp:<br>
<input name="telp_konsumen" class="form-control" required>
<br>

Alamat:<br>
<textarea name="alamat_konsumen" class="form-control" required></textarea>

<br>

<input type="submit" name="submit" class="btn btn-info btn-block" value="Simpan">
</form>

<script>
$("#form_pelanggan_baru").submit(function(){
	
	$.get(url+"home/go_form_pelanggan",$(this).serialize(),function(e){
		var id_member = "<?php echo $id_member?>";		
		form_penjualan(id_member);
	});
	return false;
});
</script>