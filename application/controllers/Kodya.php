<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kodya extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->model('Kodya_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('parsial/head');
        $this->load->view('kodya/kodya_list');
        $this->load->view('parsial/foot');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kodya_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kodya_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'provinsi_id' => $row->provinsi_id,
		'nama' => $row->nama,
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('kodya/kodya_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kodya'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kodya/create_action'),
	    'id' => set_value('id'),
	    'provinsi_id' => set_value('provinsi_id'),
	    'nama' => set_value('nama'),
	);
       
$this->load->view('parsial/head');
        $this->load->view('kodya/kodya_form', $data);
        $this->load->view('parsial/foot');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'provinsi_id' => $this->input->post('provinsi_id',TRUE),
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Kodya_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kodya'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kodya_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kodya/update_action'),
		'id' => set_value('id', $row->id),
		'provinsi_id' => set_value('provinsi_id', $row->provinsi_id),
		'nama' => set_value('nama', $row->nama),
	    );
          
$this->load->view('parsial/head');
            $this->load->view('kodya/kodya_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kodya'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'provinsi_id' => $this->input->post('provinsi_id',TRUE),
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->Kodya_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kodya'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kodya_model->get_by_id($id);

        if ($row) {
            $this->Kodya_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kodya'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kodya'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('provinsi_id', 'provinsi id', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kodya.xls";
        $judul = "kodya";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->Kodya_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kodya.doc");

        $data = array(
            'kodya_data' => $this->Kodya_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kodya/kodya_doc',$data);
    }

}

/* End of file Kodya.php */
/* Location: ./application/controllers/Kodya.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-03 10:35:02 */
/* http://harviacode.com */