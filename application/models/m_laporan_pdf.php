<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_laporan_pdf extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		
		public function m_laporan_penjualan()
		{	
			$query 	= $this->db->query("SELECT 	a.nama_barang,
												a.jumlah_terjual,
												a.id_member,
												a.harga_satuan,
												a.penjualan_uniq,
												a.tanggal_terjual												
											FROM tbl_penjualan a
											WHERE YEAR(a.tanggal_terjual)=YEAR(NOW())
											ORDER BY a.tanggal_terjual DESC");																					
			$data 	= $query->result();	
			return 	$data;
		}
		
		public function m_laporan_bulan_ini()
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
		public function m_laporan_bulan_lalu()
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
		public function m_laporan_all()
		{	
			$query 	= $this->db->query("SELECT 	a.nama_barang,
												a.jumlah_terjual,
												a.id_member,
												a.harga_satuan,
												a.penjualan_uniq,
												a.tanggal_terjual												
											FROM tbl_penjualan a
											WHERE YEAR(a.tanggal_terjual)=YEAR(NOW())
											ORDER BY a.tanggal_terjual DESC");																					
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
		
	}
?>
