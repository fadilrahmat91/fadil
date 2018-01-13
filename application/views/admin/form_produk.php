<head>
  <title>Kitaenginering</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/das.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>"  rel="stylesheet">
   <script src="<?php echo base_url('assets/jquery-3.1.1.js') ?>"></script>
</head>


<div class="col-md-3"></div>
<form class="col-md-6" <?php echo form_open_multipart('admin/do_upload');?>>
	<h3>Form Produk</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Produk</label>
    <input type="text" class="form-control" name="nama_produk"  placeholder="Enter Nama">
    
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Kategori</label>
    <select required type="text" name="id" >

			
			
			
			<?php foreach ($kategori as $dapat) {?>
			 <option value="" disabled selected style="display: none;">-Pilih kategori-</option>
			<option value="<?php echo $dapat->id_kategori;?>"> <?php echo $dapat->nama_kategori;?></option>
		
			<?php }?>
			
			
			
			</select>
    
  </div>
   <div class="form-group">
    <label for="InputHarga">Harga</label>
    <input type="text" class="form-control" name="harga" placeholder="Enter Harga">
    
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Ukuran</label>
    <input type="text" class="form-control" name="ukuran" placeholder="Enter Ukuran">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Merek</label>
    <input type="text" class="form-control" name="merek" placeholder="Enter Merek">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Gambar</label>
    <input type="file" class="form-control" name="gambar" placeholder="Enter email">
    
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Deskripsi</label>
    <textarea type="text" class="form-control" name="deskripsi" placeholder="Enter deskripsi"></textarea>
   
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>