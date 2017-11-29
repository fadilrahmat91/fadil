<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grocery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_home');
		$this->load->helper('custom_func');
		$this->load->library('grocery_CRUD');
	}
	
	//grocery_CRUD
	public function view_grocery($output = null)
	{
		$this->load->view('part/view_grocery.php',$output);
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->view_grocery($output);
	}

	public function index()
	{
		$data['info']="Welcome..";
		$this->load->view('template.php', $data);
		$this->view_grocery((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	
	function tbl_konsumen()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('tbl_konsumen');
		$crud->set_subject('Data Konsumen');
		$crud->columns('nama_konsumen','telp_konsumen','alamat_konsumen','waktu','id_member');	 
		$output = $crud->render();		
		$this->view_grocery($output);
		
	}
	
	function tbl_barang()
	{
		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
		$crud->set_table('tbl_barang');
		$crud->set_subject('Data Barang');
		$crud->columns('nama_barang','harga_barang','stok_barang','tgl_barang_masuk');	 
		$output = $crud->render();		
		$this->view_grocery($output);
		
	}
	
	function tbl_stok()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('tbl_stok');		
		$crud->set_subject('Data Stok');		
		$crud->set_relation('id_barang','tbl_barang','nama_barang');
		$crud->display_as('id_barang','Nama Barang');		
		$crud->columns('id_barang','stok_barang');	 
		
		$output = $crud->render();		
		$this->view_grocery($output);
		
	}
	
	
	
}