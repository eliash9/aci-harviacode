<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->model('Surat_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('parsial/head');
        $this->load->view('surat/surat_list');
        $this->load->view('parsial/foot');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Surat_model->json();
    }

    public function read($id) 
    {
        $row = $this->Surat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'keterangan' => $row->keterangan,
		'ttd1' => $row->ttd1,
		'ttd2' => $row->ttd2,
		'file' => $row->file,
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('surat/surat_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('surat/create_action'),
	    'id' => set_value('id'),
	    'keterangan' => set_value('keterangan'),
	    'ttd1' => set_value('ttd1'),
	    'ttd2' => set_value('ttd2'),
	    'file' => set_value('file'),
	);
       
        $this->load->view('parsial/head');
        $this->load->view('surat/surat_form', $data);
        $this->load->view('parsial/foot');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $config['upload_path'] = APPPATH.'./doc/';
            $config['allowed_types'] = 'doc|docx';
            $config['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
              $uploadData = $this->upload->data();
              $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
             
            } else {
              $error = $this->upload->display_errors();
              // Handle the upload error (e.g., show an error message)
            }


            $data = array(
            'keterangan' => $this->input->post('keterangan',TRUE),
            'ttd1' => $this->input->post('ttd1',TRUE),
            'ttd2' => $this->input->post('ttd2',TRUE),
            'file' =>  $filename,
            );

            $this->Surat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat/update_action'),
		'id' => set_value('id', $row->id),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'ttd1' => set_value('ttd1', $row->ttd1),
		'ttd2' => set_value('ttd2', $row->ttd2),
		'file' => set_value('file', $row->file),
	    );
          
$this->load->view('parsial/head');
            $this->load->view('surat/surat_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $config['upload_path'] = APPPATH.'./doc/';
            $config['allowed_types'] = 'doc|docx';
            $config['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
              $uploadData = $this->upload->data();
              $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
             
            } else {
              $error = $this->upload->display_errors();
              // Handle the upload error (e.g., show an error message)
            }

            $data = array(
		'keterangan' => $this->input->post('keterangan',TRUE),
		'ttd1' => $this->input->post('ttd1',TRUE),
		'ttd2' => $this->input->post('ttd2',TRUE),
		'file' => $filename,
	    );

            $this->Surat_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Surat_model->get_by_id($id);

        if ($row) {
            $this->Surat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('ttd1', 'ttd1', 'trim|required');
	$this->form_validation->set_rules('ttd2', 'ttd2', 'trim|required');
	//$this->form_validation->set_rules('file', 'file', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "surat.xls";
        $judul = "surat";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Ttd1");
	xlsWriteLabel($tablehead, $kolomhead++, "Ttd2");
	xlsWriteLabel($tablehead, $kolomhead++, "File");

	foreach ($this->Surat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ttd1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ttd2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=surat.doc");

        $data = array(
            'surat_data' => $this->Surat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('surat/surat_doc',$data);
    }

}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-04 05:01:27 */
/* http://harviacode.com */