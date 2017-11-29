<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_pdf extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_laporan_pdf');
		$this->load->helper('custom_func');
		date_default_timezone_set("Asia/jakarta");
	}
	public function laporan_penjualan($param=null)
	{
		if($param ===null)
		{
			die("Param empty");
		}
		/*		
		$data['laporan_all'] = $this->m_laporan->m_laporan_all();
		$data['laporan_penjualan'] = $this->m_laporan->m_laporan_penjualan();
		$data['laporan_bulan_ini'] = $this->m_laporan->m_laporan_bulan_ini();
		$data['laporan_bulan_lalu'] = $this->m_laporan->m_laporan_bulan_lalu();
		*/
		
		if($param == "all")
		{
			$data['laporan'] = $this->m_laporan_pdf->m_laporan_all();
			$data['judul'] = "Semua";
		}else if($param == "tahun_ini")
		{
			$data['laporan'] = $this->m_laporan_pdf->m_laporan_penjualan();
			$data['judul'] = "Tahun Ini ".date('_Y');
		}
		else if($param == "bulan_ini")
		{
			$data['laporan'] = $this->m_laporan_pdf->m_laporan_bulan_ini();
			$data['judul'] = "Penjualan Bulan ".date('_m_Y');
		}
		else if($param == "bulan_lalu")
		{
			$data['laporan'] = $this->m_laporan_pdf->m_laporan_bulan_lalu();
			
			$datestring=date("Y-m-d").' first day of last month';
			$dt=date_create($datestring);					
			$data['judul'] = "Penjualan Bulan ".$dt->format('_m_Y');
		}
		
		
		

		//pdf
			$filename = str_replace(" ","_",$data['judul']);
			$pdfFilePath = FCPATH."/downloads/laporan/$filename.pdf";
			
			 
			ini_set('memory_limit','32M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
			$html = $this->load->view('laporan_mpdf/pdf_report.php', $data, true); // render the view into HTML				 
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
			
		 
			//redirect(base_url()."downloads/laporan/$filename.pdf","refresh");
			
			$data['download'] = base_url()."downloads/laporan/$filename.pdf";
		
		$this->load->view('laporan_mpdf/pdf_report', $data);
	}	
	
	public function cek_tanggal_pdf()
	{
		
		$cari 				= $this->input->get('cari');
		$data['laporan'] 	= $this->m_laporan_pdf->m_cek_tanggal($cari);
		$data['data_bulan'] = bulantahunindo($cari);
		$data['judul'] 		= $data['data_bulan'];
		//pdf----------------------------------------------------------------------------------------------------------------------
			$filename = "Penjualan-".str_replace(" ","_",$data['data_bulan']);
			$filename = str_replace(":","-",$filename);
			$pdfFilePath = FCPATH."/downloads/laporan/$filename.pdf";
			
			 
			ini_set('memory_limit','32M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
			$html = $this->load->view('laporan_mpdf/pdf_report.php', $data, true); // render the view into HTML				 
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
			
		 
			//redirect(base_url()."downloads/laporan/$filename.pdf","refresh");
			
			$data['download'] = base_url()."downloads/laporan/$filename.pdf";
		
			$this->load->view('laporan_mpdf/pdf_report', $data);
		//pdf----------------------------------------------------------------------------------------------------------------------
		
	}
	
	
	
	
	public function cari_range_pdf()
	{
		
		$from 					= $this->input->get('from');
		$to 					= $this->input->get('to');
		$data['laporan'] 		= $this->m_laporan_pdf->m_cari_range($from,$to);
		$data['from'] 			= tanggalindo($from);
		$data['to'] 			= tanggalindo($to);
		$data['judul'] 			= "Penjualan ".tanggalindo($from)."-sd-".tanggalindo($to);
		
		
		//pdf----------------------------------------------------------------------------------------------------------------------
			$filename = "Penjualan ".tanggalindo($from)."-sd-".tanggalindo($to);
			$filename = str_replace(":","-",$filename);
			$pdfFilePath = FCPATH."/downloads/laporan/$filename.pdf";
			
			 
			ini_set('memory_limit','32M'); 
			$html = $this->load->view('laporan_mpdf/pdf_report.php', $data, true); 
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
			
		 
			//redirect(base_url()."downloads/laporan/$filename.pdf","refresh");
			
			$data['download'] = base_url()."downloads/laporan/$filename.pdf";
		
			$this->load->view('laporan_mpdf/pdf_report', $data);
		//pdf----------------------------------------------------------------------------------------------------------------------
		
	}	
	
	
	
	
	public function buat_pdf()
	{
				
				
		// As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
		$pdfFilePath = FCPATH."/downloads/reports/$filename.pdf";
		$data['page_title'] = 'Hello world'; // pass data to the view
		 
		if (file_exists($pdfFilePath) == FALSE)
		{
			ini_set('memory_limit','32M'); // boost the memory limit if it's low <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
			$html = $this->load->view('laporan_mpdf/pdf_report', $data, true); // render the view into HTML
			 
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img class="emoji" draggable="false" alt="" src="https://s.w.org/images/core/emoji/72x72/1f609.png">
			$pdf->WriteHTML($html); // write the HTML into the PDF
			$pdf->Output($pdfFilePath, 'F'); // save to file because we can
		}
		 
		redirect(base_url()."downloads/reports/$filename.pdf","refresh");
		
		
	}	
	
	public function download()
	{
		$file 	= ($this->input->get('file'));
		
		preg_match("/[^\/]+$/", $file, $matches);
		$last_word = $matches[0];
		
		header("Content-Type: application/octet-stream");		
		header("Content-Disposition: attachment; filename=" . urlencode($last_word));   
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Description: File Transfer");            
		header("Content-Length: " . filesize($file));
		flush(); // this doesn't really matter.
		$fp = fopen($file, "r");
		while (!feof($fp))
		{
			echo fread($fp, 65536);
			flush(); // this is essential for large downloads
		} 
		fclose($fp); 
		
	}	
	
	
}