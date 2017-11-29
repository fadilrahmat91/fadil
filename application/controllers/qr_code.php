<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class qr_code extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_qr_code');
		$this->load->helper('custom_func');
		date_default_timezone_set("Asia/jakarta");
	}
	
	public function cetak_qrcode()
	{
		$file = array();
		if ($handle = opendir('assets/qrcode/')) {

			while (false !== ($entry = readdir($handle))) {

				if ($entry != "." && $entry != "..") {

					//echo "$entry\n";					
					array_push($file,$entry);
					
				}
			}

			closedir($handle);
		}
		$data['data_qrcode'] = $file;
		$this->load->view('part/cetak_qrcode.php', $data);	
		/*
			//pdf----------------------------------------------------------------------------------------------------------------------
			$filename = "data_qrcode_".date("Y-m-d_H-I-s");
			$filename = str_replace(":","-",$filename);
			$pdfFilePath = FCPATH."/downloads/qrcode/$filename.pdf";						 
			ini_set('memory_limit','32M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
			$html = $this->load->view('part/cetak_qrcode.php', $data, true); // render the view into HTML				 
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
			
		 
			//redirect(base_url()."downloads/qrcode/$filename.pdf","refresh");
			
			$data['download'] = base_url()."downloads/qrcode/$filename.pdf";
		
			//$this->load->view('part/cetak_qrcode.php', $data);
			//pdf----------------------------------------------------------------------------------------------------------------------
		*/
	}
	public function cetak_qrcode_satu($nama_barang)
	{
		if($nama_barang===null)
		{
			die();
		}
		
		$data['nama_barang'] = $nama_barang;
		$this->load->view('part/cetak_qr_satu.php', $data);	
		
	}	
	
	public function generate_qrcode()
	{
						
		$get_data = $this->m_qr_code->m_generate_qrcode();
		$no = 0;
		foreach($get_data as $data)
		{
			$no ++;					
			$url = base_url("assets/phpqrcode/")."/custom_get.php?data=".urlencode($data->nama_barang);					
			$nama_barang = preg_replace('/\s+/', '', $data->nama_barang);			
			$nama_barang = str_replace('/', '_', $nama_barang);				
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 

			$result = curl_exec($ch);
			curl_close($ch); 	
			
			
		}
		echo $no;
		
	}	
	public function delete_qrcode()
	{
		$dir = "assets/qrcode/";
		$no = 0;
		if ($handle = opendir($dir)) {
			
			while (false !== ($entry = readdir($handle))) {
			$no ++;	
				if ($entry != "." && $entry != "..") {

					//echo "$entry\n";					
					unlink($dir.$entry);
					
					
				}
			}

			closedir($handle);
		}
		echo $no;
		
	}
	
	public function data_qrcode()
	{		
		$data['all_barang'] = $this->m_qr_code->model_data_qrcode();
		$this->load->view('part/data_qrcode.php',$data);
	}
	
	
	
}