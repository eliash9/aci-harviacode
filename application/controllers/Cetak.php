<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class Cetak extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
      
        $this->load->model('Permohonan_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Surat_model');
        $this->load->model('Sign_model');
        $this->load->model('Kelurahan_model');
        $this->load->model('Kecamatan_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
           
    }

    public function index()
	{

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'cetak/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'cetak/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'cetak/index.html';
            $config['first_url'] = base_url() . 'cetak/index.html';
        }

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

       


        $config ['prev_link'] = ' <i class="w-4 h-4" data-feather="chevrons-left"></i>';
        $config ['next_link'] = ' <i class="w-4 h-4" data-feather="chevrons-right"></i>';


        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Permohonan_model->total_rows($q);
        $menus = $this->Permohonan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'cetak_data' => $menus,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );


        $this->load->view('parsial/head');
		$this->load->view('cetak',$data);
        $this->load->view('parsial/foot');
	}
   

	public function print()
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

        $sr= $this->Permohonan_model->get_by_id($id);

        $tk= $this->Sign_model->get_by_token($sr->token);

        if($sr->status==1 && $sr->token!=""){
            $template = $this->Surat_model->get_by_id($sr->permohonan);

            $templateFile = APPPATH .'doc/'. $template->file; // Path to your Word template file
     
            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor($templateFile);
		
             $row = $this->Penduduk_model->get_by_nik($sr->nik);
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
                        $phpWord->setValue('NO_KK',$row->no_kk);
                        $phpWord->setValue('NAMA',ucwords($row->nama));
                        $phpWord->setValue('ALAMAT',ucwords($row->alamat));
                        $phpWord->setValue('JENIS_KELAMIN',ucwords($row->jenis_kelamin));
                        $phpWord->setValue('TLAHIR',ucwords($row->tmp_lahir));
                        $date = DateTime::createFromFormat('Y-m-d',$row->tgl_lahir);
                        $phpWord->setValue('AGAMA',ucwords($row->agama));
                        $phpWord->setValue('KEBANGSAAN',ucwords($row->kebangsaan));
                        $phpWord->setValue('PEKERJAAN',ucwords($row->pekerjaan));
                        $phpWord->setValue('STATUS_PERKAWINAN',ucwords($row->status_perkawinan));
                        $phpWord->setValue('ALAMAT',ucwords($row->alamat));
                        $phpWord->setValue('PENDIDIKAN_TERAKHIR',ucwords($row->pendidikan_terakhir));
                       
                        $desa= $this->Kelurahan_model->get_by_id($row->no_kel)->nama;                       
                        $phpWord->setValue('DESA',ucwords($desa));
                        $kecamatan= $this->Kecamatan_model->get_by_id($row->no_kec)->nama;
                        $phpWord->setValue('KECAMATAN',ucwords($kecamatan));

                        // Format the date in the inverted format
                        $invertedDate = $date->format('d-m-Y');
                        $phpWord->setValue('TGLLAHIR',$invertedDate);
                        $phpWord->setValue('TUJUAN',$sr->tujuan);
                        $phpWord->setValue('ISSUINGDATE',date('d-m-Y'));
                        $phpWord->setImageValue('DIGISIGN', $tk->qrcode);

                        $phpWord->setValue('NAMA_KADES',ucwords($this->Kelurahan_model->get_by_id($row->no_kel)->kades));
                        $phpWord->setValue('ALAMAT_DESA',ucwords($this->Kelurahan_model->get_by_id($row->no_kel)->alamat));
                        
                        $phpWord->setValue('NAMA_CAMAT',ucwords($this->Kecamatan_model->get_by_id($row->no_kec)->camat));

                    
            }

      
                $name = $id.'_'.$row->nama.'.docx';
                $phpWord->saveAs('./resources/doc/'.$name);			
                $data = file_get_contents('./resources/doc/'.$name);
                
                $this->load->helper('download');
                force_download($name, $data); 
                unlink('./resources/doc/'.$name);

        }else {
            $this->session->set_flashdata('message', 'Belum Bisa dicetak!');
            redirect(site_url('cetak'));
        }

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