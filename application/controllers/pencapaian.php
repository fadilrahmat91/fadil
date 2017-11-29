<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pencapaian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_pencapaian');
		$this->load->helper('custom_func');
		
		
	}
	public function index()
	{
		$data['site_name']="Echo Sale Medan";
		$data['title']="Echo Sale Medan";
		$data['pencapaian_all'] = $this->m_pencapaian->m_pencapaian_all();
		$data['pencapaian_penjualan'] = $this->m_pencapaian->m_pencapaian_penjualan();
		$data['pencapaian_bulan_ini'] = $this->m_pencapaian->m_pencapaian_bulan_ini();
		$data['pencapaian_bulan_lalu'] = $this->m_pencapaian->m_pencapaian_bulan_lalu();
		$data['target'] = $this->m_pencapaian->m_tbl_pencapaian();
		$this->load->view('part/pencapaian.php', $data);	
		
	}
	
	
	public function pencapaian_penjualan()
	{
	
		$data['pencapaian_all'] = $this->m_pencapaian->m_pencapaian_all();
		$data['pencapaian_penjualan'] = $this->m_pencapaian->m_pencapaian_penjualan();
		$data['pencapaian_bulan_ini'] = $this->m_pencapaian->m_pencapaian_bulan_ini();
		$data['pencapaian_bulan_lalu'] = $this->m_pencapaian->m_pencapaian_bulan_lalu();
		$data['target'] = $this->m_pencapaian->m_tbl_pencapaian();
		$this->load->view('part/pencapaian.php', $data);	
		
	}	
	public function update_target_pencapaian()
	{
	
		$this->load->helper(array('form', 'url'));        
		$target_pencapaian 		= hanya_nomor($this->input->get('target_pencapaian'));		
		$this->m_pencapaian->simpan_form_update_target($target_pencapaian);
		
	}	
	
}