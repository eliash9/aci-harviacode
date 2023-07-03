<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class Cetak extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model');
        $this->load->model('Skck_model');
           
    }

	public function index()
	{
		$phpWord = new PhpWord();
		$section = $phpWord->addSection();
		$section->addText('Hello World !');
		
		$writer = new Word2007($phpWord);
		
		$filename = 'simple';
		
		header('Content-Type: application/msword');
        	header('Content-Disposition: attachment;filename="'. $filename .'.docx"'); 
		header('Cache-Control: max-age=0');
		
		$writer->save('php://output');
	}

    public function Word($id) {
        $templateFile = APPPATH . 'doc/permohonan_skck.docx'; // Path to your Word template file
     
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor($templateFile);
		
        $row = $this->Penduduk_model->get_by_id($id);
        if ($row) {
            $data = array(
                    'id' => $row->id,
                    'nik' => $row->nik,
                    'nama' => $row->nama,
                    'jenis_kelamin' => $row->jenis_kelamin,
                    'nama_lengkap' => $row->nama_lengkap,
                    'alamat' => $row->alamat,
                    'no_rt' => $row->no_rt,
                    'no_rw' => $row->no_rw,
                    
                    );   

                    $phpWord->setValue('NO', $id);
                    $phpWord->setValue('BLN', get_romawi(date('n')));
                    $phpWord->setValue('THN', date('Y'));
           
                    $phpWord->setValue('NIK',$row->nik);
                    $phpWord->setValue('NAMA',ucwords($row->nama));
                    $phpWord->setValue('ALAMAT',ucwords($row->alamat));
                    $phpWord->setValue('JENIS_KELAMIN',ucwords($row->jenis_kelamin));
                
        }

      
            $name = $id.'_'.$row->nama.'permohohonan_skck.docx';
            $phpWord->saveAs(APPPATH .'doc/'.$name);			
			$data = file_get_contents(APPPATH .'doc/'.$name);
			
			$this->load->helper('download');
			force_download($name, $data); 
            unlink(APPPATH .'doc/'.$name);

      //  echo 'Word document modified and saved successfully!';
    }

    public function Skck($id) {
        $templateFile = APPPATH . 'doc/permohonan_skck.docx'; // Path to your Word template file
     
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor($templateFile);

        $skck =  $this->Skck_model->get_by_id($id);		
        $row = $this->Penduduk_model->get_by_nik($skck->nik);
        if ($row) {
            
                    $phpWord->setValue('NO', $id);
                    $phpWord->setValue('BLN', get_romawi(date('n')));
                    $phpWord->setValue('THN', date('Y'));
           
                    $phpWord->setValue('NIK',$row->nik);
                    $phpWord->setValue('NAMA',ucwords($row->nama));
                    $phpWord->setValue('ALAMAT',ucwords($row->alamat));
                    $phpWord->setValue('JENIS_KELAMIN',ucwords($row->jenis_kelamin));
                    $phpWord->setValue('TLAHIR',ucwords($row->tmp_lahir));
                    $date = DateTime::createFromFormat('Y-m-d',$row->tgl_lahir);

                    // Format the date in the inverted format
                    $invertedDate = $date->format('d-m-Y');
                    $phpWord->setValue('TGLLAHIR',$invertedDate);
                    $phpWord->setValue('TUJUAN',$skck->tujuan);
                
        }

      
            $name = $id.'_'.$row->nama.'permohohonan_skck.docx';
            $phpWord->saveAs(APPPATH .'doc/'.$name);			
			$data = file_get_contents(APPPATH .'doc/'.$name);
			
			$this->load->helper('download');
			force_download($name, $data); 
            unlink(APPPATH .'doc/'.$name);

      //  echo 'Word document modified and saved successfully!';
    }



}