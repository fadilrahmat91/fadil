<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_qr_code extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		
		public function model_data_qrcode() {			
			$query = $this->db->query("select a.id_barang,a.nama_barang,a.harga_barang,a.tgl_barang_masuk,a.stok_barang FROM tbl_barang a  order by a.id_barang");
			return $query->result();
		}
		
				
		public function m_generate_qrcode($nama_barang=null)
		{	
			$query 	= $this->db->query("SELECT nama_barang FROM tbl_barang ");
			
			return 	$query->result();	
		}
			
		
		
	}
?>
