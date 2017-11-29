<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_home extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		
		public function m_penjualan($penjualan_uniq) {			
			
			$query = $this->db->query("SELECT a.penjualan_uniq,a.id_member,a.tanggal_terjual,b.nama_konsumen,COUNT(a.jumlah_terjual) AS qty FROM tbl_penjualan a INNER JOIN tbl_konsumen b ON a.id_member=b.id_member  GROUP BY a.penjualan_uniq ORDER BY a.id_penjualan DESC");
			
			return $query->result();
		}
		
	
		
		public function model_data_barang() {			
			$query = $this->db->query("select a.id_barang,a.nama_barang,a.harga_barang,a.tgl_barang_masuk,a.stok_barang FROM tbl_barang a  order by a.id_barang");
			return $query->result();
		}
		
		
		public function id_member()
		{	
			//MEMBER0001
			$query 	= $this->db->query("SELECT id_member FROM tbl_konsumen ORDER BY id_konsumen DESC LIMIT 1");
			$data 	= $query->result();
			
			if($query->num_rows()>0)
			{
				$row 	= $data[0];
				$id_member = hanya_nomor($row->id_member);
				$id_member = sprintf('%04d', $id_member + 1);
				$id_member = "MEMBER".$id_member;
				
			}else{
				$id_member = "MEMBER0001";
			}
			return $id_member;
		}
		
		public function simpan_form_pelanggan($serialize)
		{	
			
			$this->db->insert('tbl_konsumen', $serialize);
  
		}
		
		public function m_last_id_member($id_member)
		{	
			$query 	= $this->db->query("SELECT nama_konsumen,telp_konsumen,alamat_konsumen FROM tbl_konsumen WHERE id_member='$id_member'");
			$data 	= $query->result();	
			$row 	= $data[0];			
			return $row;
  
		}
		public function m_all_barang()
		{	
			$query 	= $this->db->query("SELECT id_barang,nama_barang,harga_barang FROM tbl_barang ORDER BY id_barang DESC");
			$data 	= $query->result();				
			return $data;
  
		}
		public function m_ambil_harga($nama_barang=null)
		{	
			$term = ($nama_barang);
			$query 	= $this->db->query("SELECT a.harga_barang, a.id_barang, a.stok_barang 
							FROM tbl_barang a 
							WHERE a.stok_barang <> 0 AND a.nama_barang='$term' LIMIT 1");
			$data 	= $query->result();				
			
			$harga_barang = "";
			if($query->num_rows()>0)
			{
				$row 	= $data[0];
				$harga_barang .= $row->harga_barang;
			
					
				return rupiah(hanya_nomor($harga_barang));
				
			}else{
				return "n-a";
			}
  
		}
		
		public function m_go_jual($serialize)
		{	
			$this->db->insert('tbl_penjualan', $serialize);			
  
		}
		public function m_go_jual_update_stok($qty,$nama_barang)
		{	
			$this->db->query("UPDATE tbl_barang SET stok_barang =stok_barang-'$qty' WHERE nama_barang='$nama_barang'");			
  
		}
		
		public function m_struk($penjualan_uniq=null)
		{	
			$query = $this->db->query("SELECT a.nama_barang,a.tanggal_terjual,a.jumlah_terjual,a.id_member,a.harga_satuan, a.memo,
										b.nama_konsumen
									FROM tbl_penjualan a
									INNER JOIN tbl_konsumen b
									ON a.id_member = b.id_member
									WHERE a.penjualan_uniq='$penjualan_uniq'");
			$data 	= $query->result();		
			if($query->num_rows()>0)
			{
				return $data;
			}
			
		}
		
		
		public function m_struk_nama($penjualan_uniq=null)
		{	
			$query = $this->db->query("SELECT a.penjualan_uniq, a.tanggal_terjual, b.nama_konsumen,b.telp_konsumen,b.alamat_konsumen
										FROM tbl_penjualan a
										INNER JOIN tbl_konsumen b
										ON a.id_member = b.id_member
										WHERE a.penjualan_uniq='$penjualan_uniq'
										LIMIT 1");
			$data 	= $query->result();	
			if($query->num_rows()>0)
			{
				$row 	= $data[0];
				return $row;
			}
		}
		
		public function m_get_id_member()
		{	
			$query 	= $this->db->query("SELECT id_member FROM tbl_konsumen");
			$data 	= $query->result();	
			return 	$data;
		}
		
		public function m_cari_id_member($id_member=null)
		{	
			$query 	= $this->db->query("SELECT id_member FROM tbl_konsumen WHERE id_member='$id_member'");
			
			if($query->num_rows()>0)
			{
				$data = 1;
			}else{
				$data = 0;
			}
			
			return 	$data;
		}
	
		
	}
?>
