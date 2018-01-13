<?php date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
	
	$this->load->helper('url');
	$this->load->model('model_produk');
	
	
	
	
	
	}
	public function index(){
	$this->load->view('admin/login.php');
	}
	public function form_produk(){
	$data['hasil']=$this->model_kategori->select_all()->result();
	$this->load->view('admin/form_produk',$data);
	
	}

	function do_upload(){
    
							
							
							$barang = $_POST['nama_produk'];	
							$deskripsi = $_POST['deskripsi'];
							$harga = $_POST['harga'];
							$merek = $_POST['merek'];
							$ukuran = $_POST['ukuran'];
							
								$this->db->query("INSERT INTO produk SET 		
																nama_produk='$barang',
																harga='$harga',
																deskripsi='$deskripsi',
																merek='$merek',
																ukuran='$ukuran'");
					echo "Sukses";
                }
	

	function  update($id){
		
		
		$data=$this->model_produk->pilih_id($id)->row();
		header('Content-Type: application/json');
		echo json_encode($data);
		
	}
	public function tproduk(){
	
	$this->load->view('admin/tampildata');
	
	}
	
	public function get(){
	$data['hasil']=$this->model_produk->mproduk()->result();
	$this->load->view('admin/getData',$data);
	
	}

	public function depan(){
	$data['test']=$this->model_produk->depanv()->result();
	
	
	}
	public function form_konsumen(){
	$this->load->view('admin/form_konsumen');
	}
	
	function aupdate(){
		$id = $_POST['id_produk'];
		$nama = $_POST['nama_produk'];
		$harga = $_POST['harga'];
		$deskripsi = $_POST['deskripsi'];
		$merek = $_POST['merek'];
		$ukuran = $_POST['ukuran'];
		
	$this->db->query("UPDATE produk SET 		
																nama_produk='$nama',
																harga='$harga',
																deskripsi='$deskripsi',
																merek='$merek',
																ukuran='$ukuran'
																WHERE id_produk='$id'");
					echo "Sukses";
				
	}
	public function hapus_data_produk($id){
		$this->model_produk->delete_produk($id);
		redirect(site_url('admin/tproduk'));
		}
	function insertkons(){
		$nama 	= $_POST['nama_konsumen'];
		$alamat = $_POST['alamat'];
		$no_hp 	= $_POST['no_hp'];
		$email 	= $_POST['email'];
		if($this->db->query("INSERT INTO tbl_konsumen SET
														nama_konsumen='$nama',
														alamat='$alamat',
														no_hp='$no_hp',
														email='$email'
		
														")){
															echo"sukses";
														}else{
															echo"gagal";
														}
	}
	
	
}	
		
 