<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_laporan');
		$this->load->helper('custom_func');
		
	}
	public function laporan_penjualan()
	{
	
		$data['laporan_all'] = $this->m_laporan->m_laporan_all();
		$data['laporan_penjualan'] = $this->m_laporan->m_laporan_penjualan();
		$data['laporan_bulan_ini'] = $this->m_laporan->m_laporan_bulan_ini();
		$data['laporan_bulan_lalu'] = $this->m_laporan->m_laporan_bulan_lalu();
		$this->load->view('part/laporan_penjualan.php', $data);	
		
	}	
	
	public function get_laporan()
	{
	
		$data['get_laporan'] = $this->m_laporan->m_laporan_all();
		
		$this->load->view('part/laporan_penjualan.php', $data);	
		
	}	
	
	public function cek_tanggal()
	{
		
		$cari 					= $this->input->get('cari');
		$data['cek_tanggal'] 	= $this->m_laporan->m_cek_tanggal($cari);
		$data['data_bulan'] 	= bulantahunindo($cari);
		
		$this->load->view('part/part_laporan.php', $data);	
		
	}	
	
	public function cari_range()
	{
		
		$from 					= $this->input->get('from');
		$to 					= $this->input->get('to');
		$data['cek_tanggal'] 	= $this->m_laporan->m_cari_range($from,$to);
		$data['from'] 			= tanggalindo($from);
		$data['to'] 			= tanggalindo($to);
		
		$this->load->view('part/part_cari_range.php', $data);	
		
	}	
	
	
	
	
}