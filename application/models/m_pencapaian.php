<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_pencapaian extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		
		public function m_pencapaian_penjualan()
		{	
			$query 	= $this->db->query("SELECT `tanggal_terjual` FROM `tbl_penjualan` GROUP BY YEAR(`tanggal_terjual`), MONTH(`tanggal_terjual`) ORDER BY tanggal_terjual DESC");
			$data 	= $query->result();	
			return 	$data;
		}
		
		public function m_pencapaian_bulan_ini()
		{	
			$query 	= $this->db->query("SELECT 	a.nama_barang,
												a.jumlah_terjual,
												a.id_member,
												a.harga_satuan,
												a.penjualan_uniq,
												a.tanggal_terjual												
											FROM tbl_penjualan a
											WHERE YEAR(a.tanggal_terjual)=YEAR(NOW()) AND MONTH(a.tanggal_terjual)=MONTH(NOW()) 
											ORDER BY a.tanggal_terjual DESC");
			$data 	= $query->result();	
			return 	$data;
		}
		public function m_pencapaian_bulan_lalu()
		{	
			$query 	= $this->db->query("SELECT 	a.nama_barang,
												a.jumlah_terjual,
												a.id_member,
												a.harga_satuan,
												a.penjualan_uniq,
												a.tanggal_terjual												
											FROM tbl_penjualan a
											WHERE YEAR(a.tanggal_terjual)=YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(a.tanggal_terjual)=MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
											ORDER BY a.tanggal_terjual DESC");																					
			$data 	= $query->result();	
			return 	$data;
		}
		public function m_pencapaian_all()
		{	
			$query 	= $this->db->query("SELECT `tanggal_terjual` FROM tbl_penjualan GROUP by MONTH(tanggal_terjual) ORDER BY MONTH(tanggal_terjual) DESC");																					
			$data 	= $query->result();	
			return 	$data;
		}
		
		
		public function m_cek_tanggal($get)
		{	
			$query 	= $this->db->query("SELECT 	a.nama_barang,
												a.jumlah_terjual,
												a.id_member,
												a.harga_satuan,
												a.penjualan_uniq,
												a.tanggal_terjual												
											FROM tbl_penjualan a
											WHERE YEAR(a.tanggal_terjual)=YEAR('$get') AND MONTH(a.tanggal_terjual)=MONTH('$get')
											ORDER BY a.tanggal_terjual DESC");																					
			$data 	= $query->result();	
			return 	$data;
		}
		public function m_cari_range($from,$to)
		{	
			$query 	= $this->db->query("SELECT 	a.nama_barang,
												a.jumlah_terjual,
												a.id_member,
												a.harga_satuan,
												a.penjualan_uniq,
												a.tanggal_terjual												
											FROM tbl_penjualan a
											WHERE a.tanggal_terjual BETWEEN '$from' AND '$to'
											ORDER BY a.tanggal_terjual DESC");																					
			$data 	= $query->result();	
			return 	$data;
		}
		
		public function simpan_form_update_target($target_pencapaian)
		{	
			$query 	= $this->db->query("UPDATE tbl_pencapaian SET target_pencapaian='$target_pencapaian'");																								
			
		}
		
		public function m_tbl_pencapaian()
		{	
			
			$query 	= $this->db->query("SELECT target_pencapaian FROM tbl_pencapaian");
			$data 	= $query->result();				
			
			
			if($query->num_rows()>0)
			{
				$row 	= $data[0];				
				return $row->target_pencapaian;
				
			}else{
				return "n-a";
			}
  
		}
		
	}
?>
