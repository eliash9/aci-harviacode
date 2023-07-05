<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->model('Setting_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('parsial/head');
        $this->load->view('setting/setting_list');
        $this->load->view('parsial/foot');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Setting_model->json();
    }

    public function read($id) 
    {
        $row = $this->Setting_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'tlp' => $row->tlp,
		'email' => $row->email,
		'logo' => $row->logo,
		'website' => $row->website,
		'bank_mandiri' => $row->bank_mandiri,
		'bank_bca' => $row->bank_bca,
		'wallet' => $row->wallet,
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('setting/setting_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('setting/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'tlp' => set_value('tlp'),
	    'email' => set_value('email'),
	    'logo' => set_value('logo'),
	    'website' => set_value('website'),
	    'bank_mandiri' => set_value('bank_mandiri'),
	    'bank_bca' => set_value('bank_bca'),
	    'wallet' => set_value('wallet'),
	);
       
    $this->load->view('parsial/head');
        $this->load->view('setting/setting_form', $data);
        $this->load->view('parsial/foot');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tlp' => $this->input->post('tlp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'logo' => $this->input->post('logo',TRUE),
		'website' => $this->input->post('website',TRUE),
		'bank_mandiri' => $this->input->post('bank_mandiri',TRUE),
		'bank_bca' => $this->input->post('bank_bca',TRUE),
		'wallet' => $this->input->post('wallet',TRUE),
	    );

            $this->Setting_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('setting'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Setting_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('setting/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'tlp' => set_value('tlp', $row->tlp),
		'email' => set_value('email', $row->email),
		'logo' => set_value('logo', $row->logo),
		'website' => set_value('website', $row->website),
		'bank_mandiri' => set_value('bank_mandiri', $row->bank_mandiri),
		'bank_bca' => set_value('bank_bca', $row->bank_bca),
		'wallet' => set_value('wallet', $row->wallet),
	    );
          
        $this->load->view('parsial/head');
            $this->load->view('setting/setting_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting'));
        }
    }


    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tlp' => $this->input->post('tlp',TRUE),
		'email' => $this->input->post('email',TRUE),
		//'logo' => $this->input->post('logo',TRUE),
		'website' => $this->input->post('website',TRUE),
		'bank_mandiri' => $this->input->post('bank_mandiri',TRUE),
		'bank_bca' => $this->input->post('bank_bca',TRUE),
		'wallet' => $this->input->post('wallet',TRUE),
	    );

       
       // $this->form_validation->set_rules('file', 'File', 'callback_validate_file');
          // Validation passed, process the uploaded file
          $config['upload_path'] = './assets/img/'; // Folder storage path
          $config['allowed_types'] = 'gif|jpg|png'; // Allowed file types
          $config['max_size'] = 1024; // Maximum file size (in kilobytes)
  
          $this->load->library('upload', $config);
  
          if ($this->upload->do_upload('logo')) {
              // File uploaded successfully
              $dataupload = $this->upload->data();
              $data['logo'] = $dataupload['orig_name'];
              // Perform actions with the uploaded file
          } else {
              // File upload failed, handle the error
              $error = $this->upload->display_errors();
              // Display error message to the user
          }


            $this->Setting_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('setting'));
        }
    }



    
    public function delete($id) 
    {
        $row = $this->Setting_model->get_by_id($id);

        if ($row) {
            $this->Setting_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('setting'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setting'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('tlp', 'tlp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	//$this->form_validation->set_rules('logo', 'logo', 'trim|required');
   // $this->form_validation->set_rules('file', 'file', 'trim|required');
	$this->form_validation->set_rules('website', 'website', 'trim|required');
	$this->form_validation->set_rules('bank_mandiri', 'bank mandiri', 'trim|required');
	$this->form_validation->set_rules('bank_bca', 'bank bca', 'trim|required');
	$this->form_validation->set_rules('wallet', 'wallet', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "setting.xls";
        $judul = "setting";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tlp");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Logo");
	xlsWriteLabel($tablehead, $kolomhead++, "Website");
	xlsWriteLabel($tablehead, $kolomhead++, "Bank Mandiri");
	xlsWriteLabel($tablehead, $kolomhead++, "Bank Bca");
	xlsWriteLabel($tablehead, $kolomhead++, "Wallet");

	foreach ($this->Setting_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tlp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->logo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->website);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bank_mandiri);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bank_bca);
	    xlsWriteLabel($tablebody, $kolombody++, $data->wallet);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=setting.doc");

        $data = array(
            'setting_data' => $this->Setting_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('setting/setting_doc',$data);
    }

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-05-08 12:01:17 */
/* http://harviacode.com */