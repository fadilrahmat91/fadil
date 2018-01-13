

<div class="container">

	<div class="panel panel-heading">
					
					<a data-toggle="modal" data-target="#tambah-matakuliah" class="btn btn-success btn-sm tombol_kanan " ><i class="glyphicon glyphicon-plus"></i> &nbsp;&nbsp;Tambah</a>
		
	</div>
  <h2>Tampilan Data Produk</h2>
  <div class="panel-body">
  <table class="table table-striped data-produk" ellspacing="0">
    
  </table>
  </div>
  <!-- tambah-data -->
  	<div id="tambah-matakuliah" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah produk</h4>
				</div>
				
				<div class="modal-body">
					<form id="fTambah"  action="<?php echo site_url('admin/do_upload')?>" method="post">
						<div class="form-group">
							
							<label>Nama</label><input class="form-control" id="nama_produk"  name="nama_produk" required> </input>
							<label>Harga</label><input class="form-control" id="harga"  name="harga" required> </input>
							<label>Ukuran</label><input class="form-control" id="ukuran"  name="ukuran" required> </input>
							<label>Merek</label><input class="form-control" id="merek"   name="merek" required> </input>
							<label>Deskrips</label><input class="form-control" id="deskripsi" name="deskripsi" required> </areatext>
							<button     class="btn btn-primary tambah_matkul" >Simpan</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					
					<button type="button"  class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
				</div>
				
			</div>
		</div>
	</div>
	</div>
  			<!-- modal edit data -->
	<div id="edit-data" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit produk</h4>
				</div>
				
				<div class="modal-body">
				   <form action="<?php echo site_url('admin/aupdate')?>"  id="form_edit_matkul">
						<div class="form-group">
							<input class="form-control" type="text" value=" "id="id_produk_edit" name="id_produk"></input>
							<label> Produk</label>
							Nama<input class="form-control"  id="nama_produk_edit" name="nama_produk" required> </input>
							Harga<input class="form-control"  id="harga_edit" name="harga" required> </input>
							Ukuran<input class="form-control"  id="ukuran_edit" name="ukuran" required> </input>
							Merek<input class="form-control"  id="merek_edit" name="merek" required> </input>
							Deskripsi<input class="form-control"  id="deskripsi_edit" name="deskripsi" required> </input>
							<button  class="btn btn-primary edit_matkul" >Edit</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					
					<button type="button"  class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
				</div>
				
			</div>
		</div>
	</div>
	
<script type="text/javascript">

	function load(){
		$.get("<?= site_url()?>/admin/get",function(hasil){
			$(".data-produk").hide("").html(hasil).show("");
		})
	}
	load();
	function getData(id){
		
		$.get("<?= site_url() ?>/admin/update/"+id,function(hasil){
			$("#id_produk_edit").val(hasil.id_produk)
			$("#nama_produk_edit").val(hasil.nama_produk);
			$("#harga_edit").val(hasil.harga);
			$("#ukuran_edit").val(hasil.ukuran);
			$("#merek_edit").val(hasil.merek);
			$("#deskripsi_edit").val(hasil.deskripsi);
			
		})
	}
	
	
	$("#fTambah").submit(function(e){
		e.preventDefault();
		$.post($(this).attr('action'),$(this).serialize(),function(ok){
			
			load();
			
			$("#id_produk").val("")
			$("#nama_produk").val("");
			$("#harga").val("");
			$("#ukuran").val("");
			$("#merek").val("");
			$("#deskripsi").val("");
			
			$(".modal").modal("hide");
			
		})
	})
	
	$("#form_edit_matkul").submit(function(e){
		e.preventDefault();
		$.post($(this).attr('action'),$(this).serialize(),function(ok){
			
			load();
			$(".modal").modal("hide");
		})
	})
	
	
	
	
	 
		
      
</script>