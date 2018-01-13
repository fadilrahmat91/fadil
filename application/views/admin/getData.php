<thead>
      <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Ukuran</th>
        <th>Merek</th>
        <th>Deskripsi</th>
        <th>aksi</th>
      </tr>
    </thead>

	<?php $no=0;?>
	<?php foreach($hasil as $goes){ ?>
	
	
	
	<?php $no++;?>
	
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $goes->nama_produk?></td>
        <td><?php echo $goes->harga?></td>
        <td><?php echo $goes->ukuran?></td>
        <td><?php echo $goes->merek?></td>
        <td><?php echo $goes->deskripsi?></td>
        <td><div class="btn-group">
			<a 
				data-id="<?php echo $goes->id_produk;?>"
				data-name="<?php echo $goes->nama_produk;?>"
				data-name="<?php echo $goes->harga;?>"
				data-name="<?php echo $goes->ukuran;?>"
				data-name="<?php echo $goes->merek;?>"
				data-name="<?php echo $goes->deskripsi;?>"
				type="button" onclick="getData('<?= $goes->id_produk; ?>')" data-toggle="modal" data-target="#edit-data"  class="btn btn-md btn-info edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit<a>
           
			<a onclick="hapus('<?= $goes->id_produk; ?>')" class="btn btn-danger btn-md" role="button" ><i class="fa fa-times" aria-hidden="true"></i> Delete</a>
			</div>
		</td>		
	</tr>
	<?php }?>
	<script>
		function hapus(id){
		$.get("<?= site_url()?>/admin/hapus_data_produk/"+id,function(){
			load();
		})
	}
	</script>