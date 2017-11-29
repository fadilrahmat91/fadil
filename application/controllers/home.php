<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_home');
		$this->load->helper('custom_func');
		
		
	}
	public function index()
	{
		$data['site_name']="Echo Sale Medan";
		$data['title']="Echo Sale Medan";
		$this->load->view('template.php', $data);
		
	}
	
	public function menu_awal()
	{		
		$this->load->view('part/menu_awal.php');
	}	
	
	public function pelanggan_lama()
	{		
		$data['get_id_member'] = $this->m_home->m_get_id_member();		
		$this->load->view('part/pelanggan_lama.php',$data);
	}
	
	public function cari_id_member()
	{		
		$id_member 	= $this->input->get('id_member');
		$data['cari_id_member'] = $this->m_home->m_cari_id_member($id_member);		
		$this->load->view('part/cari_id_member.php',$data);
	}
	
	
	public function form_pelanggan()
	{		
		$data['id_member'] = $this->m_home->id_member();		
		$this->load->view('part/form_pelanggan.php',$data);
	}
	
	public function form_penjualan($id_member)
	{		
		$data['data_konsumen'] 	= $this->m_home->m_last_id_member($id_member);
		
		$get_all = $this->m_home->m_all_barang();
		$autocomplete = "";
		foreach ($get_all as $get)
		{
			//$nama_barang .= '"'.trim($get->nama_barang).'",';
			$autocomplete .= '{ value: "'.trim($get->harga_barang).'", label: "'.trim($get->nama_barang).'" },';
		}
		
		$data['nama_barang'] 	= rtrim($autocomplete,',');
		$data['id_member'] 		= $id_member;
		$this->load->view('part/form_penjualan.php',$data);
	}
	
	public function go_form_pelanggan()
	{		
		$this->load->helper(array('form', 'url'));        
		$nama_konsumen 		= $this->input->get('nama_konsumen');
		$telp_konsumen 		= $this->input->get('telp_konsumen');
		$alamat_konsumen 	= $this->input->get('alamat_konsumen');
		$id_member 			= $this->input->get('id_member');
		$serialize = array(
			'nama_konsumen' => $nama_konsumen, 
			'telp_konsumen'=> $telp_konsumen, 
			'alamat_konsumen'=>$alamat_konsumen,
			'id_member'=>$id_member
		);
		$this->m_home->simpan_form_pelanggan($serialize);
		
		$data['id_member'] = $this->m_home->id_member();		
		$this->load->view('part/form_pelanggan.php',$data);
	}
	
	public function data_barang()
	{		
		$data['all_barang'] = $this->m_home->model_data_barang();
		$this->load->view('part/data_barang.php',$data);
	}
	
	public function data_penjualan($penjualan_uniq=null)
	{
		
		 $data['data_penjualan']=$this->m_home->m_penjualan($penjualan_uniq);
		 
		 if($penjualan_uniq != null)
		 {
			 $data['penjualan_uniq']=$penjualan_uniq;
		 }else{
			 $data['penjualan_uniq']="";
		 }
		 $this->load->view('part/data_penjualan.php', $data);
	}
	
	public function ambil_harga()
	{
		$this->load->helper(array('form', 'url'));        		
		$nama_barang   = $this->input->get('nm_barang');
		 $data['harga']=$this->m_home->m_ambil_harga($nama_barang);
		 $this->load->view('part/ambil_harga.php', $data);
	}
	
	public function cari_total()
	{
		$this->load->helper(array('form', 'url'));        
		
		$nama_barang 		= $this->input->get('nama_barang');
		$qty		 		= $this->input->get('qty');
		$harga_barang	 	= $this->input->get('harga_barang');
		
		 $array_nama_barang 	= count($nama_barang);

		$total =0;
		for($i=0; $i<$array_nama_barang; $i++)
		{
			$nama_barang_ 	= $nama_barang[$i];
			$qty_		 	= $qty[$i];
			$harga_barang_ 	= $harga_barang[$i];
			$harga_barang_	= hanya_nomor($harga_barang_)*$qty_;
			$total			+= $harga_barang_;				
		}

		$data['total'] =  rupiah($total);
		$this->load->view('part/cari_total.php', $data);
	}
	
	public function go_jual()
	{
		$this->load->helper(array('form', 'url'));        
		$id_member 			= trim($this->input->get('id_member'));
		$penjualan_uniq		= date("ymdhis");
		$nama_barang 		= $this->input->get('nama_barang');
		$qty		 		= $this->input->get('qty');
		$harga_barang	 	= $this->input->get('harga_barang');		
		$memo			 	= $this->input->get('memo');		
		$array_nama_barang 	= count($nama_barang);

		
		for($i=0; $i<$array_nama_barang; $i++)
		{
			$nama_barang_ 	= $nama_barang[$i];
			
			if(trim($nama_barang_) !== "")
			{
			
				$qty_		 	= $qty[$i];
				$harga_barang_ 	= $harga_barang[$i];
				//$harga_barang_	= hanya_nomor($harga_barang_)*$qty_;
				$harga_barang_	= hanya_nomor($harga_barang_);
				
				$serialize = array(
					'id_member' 		=> $id_member, 
					'memo' 				=> $memo, 
					'penjualan_uniq'	=> $penjualan_uniq, 
					'nama_barang'		=> $nama_barang_,
					'harga_satuan'		=> $harga_barang_,
					'jumlah_terjual'	=> $qty_
				);
				$this->m_home->m_go_jual($serialize);
				$this->m_home->m_go_jual_update_stok($qty_,$nama_barang_);
			}
		}
		
		$data['penjualan_uniq'] = $penjualan_uniq;
		$this->load->view('part/go_jual.php', $data);
		
	}
	
	public function struk($penjualan_uniq=null,$goprint=null)
	{
		
		if($penjualan_uniq===null)
		{
			die();
		}
		
		if($goprint == "goprint")
		{
			$data['goprint']='goprint';
		}else{
			$data['goprint']='notprint';
		}
		
		$data['data_penjualan'] = $this->m_home->m_struk($penjualan_uniq);
		$data['nn']=$this->m_home->m_struk_nama($penjualan_uniq);
		if($data['data_penjualan'] !== null || $data['nn'] !==null)
		{
			
		$data['site_name']="Echo Sale Medan";
		$data['title']="Echo Sale Medan";
		
			$this->load->view('part/struk.php', $data);	
		}
		
	}	
	public function struk_pdf($penjualan_uniq=null,$pdf=null)
	{
		
		if($penjualan_uniq===null)
		{
			die();
		}
		
		if($pdf == "goprint")
		{
			$data['pdf']='pdf';
		}else{
			$data['pdf']='notpdf';
		}
		
		$data['data_penjualan'] = $this->m_home->m_struk($penjualan_uniq);
		$data['nn']=$this->m_home->m_struk_nama($penjualan_uniq);
		if($data['data_penjualan'] !== null || $data['nn'] !==null)
		{
			
		$data['site_name']="Echo Sale Medan";
		$data['title']="Echo Sale Medan";
		
			$this->load->view('part/struk.php', $data);	
			
			//pdf
			$filename = $penjualan_uniq;
			$pdfFilePath = FCPATH."/downloads/reports/$filename.pdf";
			
			 
			if (file_exists($pdfFilePath) == FALSE)
			{
				ini_set('memory_limit','32M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
				$html = $this->load->view('laporan_mpdf/struk_pdf.php', $data, true); // render the view into HTML				 
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'F'); // save to file because we can
			}			 
			redirect(base_url()."downloads/reports/$filename.pdf","refresh");
		}
		
	}	
	
	public function data_konsumen()
	{
	
		$data['data_konsumen'] = $this->m_home->m_data_pelanggan();
		
		$this->load->view('part/data_konsumen.php', $data);	
		
	}	
	
	
}