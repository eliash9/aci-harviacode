<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Registration_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('parsial/head');
        $this->load->view('registration/skck_registration_list');
        $this->load->view('parsial/foot');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Registration_model->json();
    }

    public function read($id) 
    {
        $row = $this->Registration_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'applicant_id' => $row->applicant_id,
		'applicant_name' => $row->applicant_name,
		'applicant_email' => $row->applicant_email,
		'unit_type' => $row->unit_type,
		'reg_type' => $row->reg_type,
		'status_type' => $row->status_type,
		'purpose_desc' => $row->purpose_desc,
		'staff_id' => $row->staff_id,
		'application_id' => $row->application_id,
		'print_id' => $row->print_id,
		'timestamps' => $row->timestamps,
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('registration/skck_registration_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('registration'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('registration/create_action'),
	    'id' => set_value('id'),
	    'applicant_id' => set_value('applicant_id'),
	    'applicant_name' => set_value('applicant_name'),
	    'applicant_email' => set_value('applicant_email'),
	    'unit_type' => set_value('unit_type'),
	    'reg_type' => set_value('reg_type'),
	    'status_type' => set_value('status_type'),
	    'purpose_desc' => set_value('purpose_desc'),
	    'staff_id' => set_value('staff_id'),
	    'application_id' => set_value('application_id'),
	    'print_id' => set_value('print_id'),
	    'timestamps' => set_value('timestamps'),
	);
       
$this->load->view('parsial/head');
        $this->load->view('registration/skck_registration_form', $data);
        $this->load->view('parsial/foot');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'applicant_id' => $this->input->post('applicant_id',TRUE),
		'applicant_name' => $this->input->post('applicant_name',TRUE),
		'applicant_email' => $this->input->post('applicant_email',TRUE),
		'unit_type' => $this->input->post('unit_type',TRUE),
		'reg_type' => $this->input->post('reg_type',TRUE),
		'status_type' => $this->input->post('status_type',TRUE),
		'purpose_desc' => $this->input->post('purpose_desc',TRUE),
		'staff_id' => $this->input->post('staff_id',TRUE),
		'application_id' => $this->input->post('application_id',TRUE),
		'print_id' => $this->input->post('print_id',TRUE),
		'timestamps' => $this->input->post('timestamps',TRUE),
	    );

            $this->Registration_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('registration'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Registration_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('registration/update_action'),
		'id' => set_value('id', $row->id),
		'applicant_id' => set_value('applicant_id', $row->applicant_id),
		'applicant_name' => set_value('applicant_name', $row->applicant_name),
		'applicant_email' => set_value('applicant_email', $row->applicant_email),
		'unit_type' => set_value('unit_type', $row->unit_type),
		'reg_type' => set_value('reg_type', $row->reg_type),
		'status_type' => set_value('status_type', $row->status_type),
		'purpose_desc' => set_value('purpose_desc', $row->purpose_desc),
		'staff_id' => set_value('staff_id', $row->staff_id),
		'application_id' => set_value('application_id', $row->application_id),
		'print_id' => set_value('print_id', $row->print_id),
		'timestamps' => set_value('timestamps', $row->timestamps),
	    );
          
$this->load->view('parsial/head');
            $this->load->view('registration/skck_registration_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('registration'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'applicant_id' => $this->input->post('applicant_id',TRUE),
		'applicant_name' => $this->input->post('applicant_name',TRUE),
		'applicant_email' => $this->input->post('applicant_email',TRUE),
		'unit_type' => $this->input->post('unit_type',TRUE),
		'reg_type' => $this->input->post('reg_type',TRUE),
		'status_type' => $this->input->post('status_type',TRUE),
		'purpose_desc' => $this->input->post('purpose_desc',TRUE),
		'staff_id' => $this->input->post('staff_id',TRUE),
		'application_id' => $this->input->post('application_id',TRUE),
		'print_id' => $this->input->post('print_id',TRUE),
		'timestamps' => $this->input->post('timestamps',TRUE),
	    );

            $this->Registration_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('registration'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Registration_model->get_by_id($id);

        if ($row) {
            $this->Registration_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('registration'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('registration'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('applicant_id', 'applicant id', 'trim|required');
	$this->form_validation->set_rules('applicant_name', 'applicant name', 'trim|required');
	$this->form_validation->set_rules('applicant_email', 'applicant email', 'trim|required');
	$this->form_validation->set_rules('unit_type', 'unit type', 'trim|required');
	$this->form_validation->set_rules('reg_type', 'reg type', 'trim|required');
	$this->form_validation->set_rules('status_type', 'status type', 'trim|required');
	$this->form_validation->set_rules('purpose_desc', 'purpose desc', 'trim|required');
	$this->form_validation->set_rules('staff_id', 'staff id', 'trim|required');
	$this->form_validation->set_rules('application_id', 'application id', 'trim|required');
	$this->form_validation->set_rules('print_id', 'print id', 'trim|required');
	$this->form_validation->set_rules('timestamps', 'timestamps', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "skck_registration.xls";
        $judul = "skck_registration";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Applicant Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Applicant Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Applicant Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Unit Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Reg Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Purpose Desc");
	xlsWriteLabel($tablehead, $kolomhead++, "Staff Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Application Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Print Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Timestamps");

	foreach ($this->Registration_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->applicant_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->applicant_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->applicant_email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->unit_type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->reg_type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->purpose_desc);
	    xlsWriteNumber($tablebody, $kolombody++, $data->staff_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->application_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->print_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->timestamps);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=skck_registration.doc");

        $data = array(
            'skck_registration_data' => $this->Registration_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('registration/skck_registration_doc',$data);
    }

}

/* End of file Registration.php */
/* Location: ./application/controllers/Registration.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-27 11:13:19 */
/* http://harviacode.com */