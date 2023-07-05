<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sign extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        $this->load->model('Sign_model');
        $this->load->model('Permohonan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $this->load->view('parsial/head');
        $this->load->view('sign/token_list');
        $this->load->view('parsial/foot');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Sign_model->json();
    }

    function add(){
        $this->form_validation->set_rules('request_by','Requested By','required');
        $this->form_validation->set_rules('needs','Needs','required');

        if($this->form_validation->run() != false) {

            $this->load->helper('string');
            $token =  sha1(random_string('alnum',20));

            $this->load->library('ciqrcode');
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './resources/qrcode/cachedir/'; //string, the default is application/cache/
            $config['errorlog']     = './resources/qrcode/errorlog/'; //string, the default is application/logs/
            $config['imagedir']     = './resources/qrcode/imagedir/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);

            $image_name = $token.'.png'; //buat name dari qr code sesuai dengan nim

            $params['data'] = site_url().'token_check/verify/'.$token; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            $params = array(
                'request_by' => $this->input->post('request_by'),
                'needs' => $this->input->post('needs'),
                'token' => $token,
                'qrcode' => 'resources/qrcode/imagedir/'.$image_name,
            );

            $token_id = $this->addtabel("token",$params);

            if($token_id>0){
                $this->session->set_flashdata('message', '<i class="fa fa-check"></i> &nbsp; Token Berhasil Ditambahkan');
                redirect('token/index');
            }
            else{
                $this->session->set_flashdata('message', '<i class="fa fa-warning"></i> &nbsp; Token Gagal Ditambahkan');
                echo "<script>window.history.back();</script>";
//                $error = $this->db->error();
//                print_r($error);
            }

		}
		else
		{
		    $data['_select2'] = true;
			$data['_view'] = 'token/add';
			$this->page($data);
		}
	}





    public function read($id) 
    {
        $row = $this->Sign_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'created_on' => $row->created_on,
		'request_by' => $row->request_by,
		'needs' => $row->needs,
		'token' => $row->token,
		'qrcode' => $row->qrcode,
		'visited_count' => $row->visited_count,
	    );
          
            $this->load->view('parsial/head');
            $this->load->view('sign/token_read', $data);
            $this->load->view('parsial/foot');


        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sign'));
        }
    }

    public function create() 
    {
        
        
        $data = array(
                'button' => 'Create',
                'action' => site_url('sign/create_action'),
            'id' => set_value('id'),
            'created_on' => set_value('created_on'),
            'request_by' => set_value('request_by'),
            'needs' => set_value('needs'),
            'token' => set_value('token'),
            'qrcode' => set_value('qrcode'),
            'visited_count' => set_value('visited_count'),
        );
        $data['permohonans'] = $this->Permohonan_model->getlist();
        $this->load->view('parsial/head');
        $this->load->view('sign/token_form', $data);
        $this->load->view('parsial/foot');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $this->load->helper('string');
            $token =  sha1(random_string('alnum',20));

            $this->load->library('ciqrcode');
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './resources/qrcode/cachedir/'; //string, the default is application/cache/
            $config['errorlog']     = './resources/qrcode/errorlog/'; //string, the default is application/logs/
            $config['imagedir']     = './resources/qrcode/imagedir/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);

            $image_name = $token.'.png'; //buat name dari qr code sesuai dengan nim

            $params['data'] = site_url().'token_check/verify/'.$token; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            $params = array(
                'request_by' => $this->input->post('request_by'),
                'needs' => $this->input->post('needs'),
                'token' => $token,
                'qrcode' => 'resources/qrcode/imagedir/'.$image_name,
            );

            $this->Sign_model->insert($params);

            $dataupdate=array(
                'token'=>$token,
                'status'=>1
            );
            $this->Permohonan_model->update($this->input->post('permohonan', TRUE), $dataupdate);;
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sign'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sign_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sign/update_action'),
		'id' => set_value('id', $row->id),
		'created_on' => set_value('created_on', $row->created_on),
		'request_by' => set_value('request_by', $row->request_by),
		'needs' => set_value('needs', $row->needs),
		'token' => set_value('token', $row->token),
		'qrcode' => set_value('qrcode', $row->qrcode),
		'visited_count' => set_value('visited_count', $row->visited_count),
	    );
          
$this->load->view('parsial/head');
            $this->load->view('sign/token_form', $data);
            $this->load->view('parsial/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sign'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'created_on' => $this->input->post('created_on',TRUE),
		'request_by' => $this->input->post('request_by',TRUE),
		'needs' => $this->input->post('needs',TRUE),
		'token' => $this->input->post('token',TRUE),
		'qrcode' => $this->input->post('qrcode',TRUE),
		'visited_count' => $this->input->post('visited_count',TRUE),
	    );

            $this->Sign_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sign'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sign_model->get_by_id($id);

        if ($row) {
            $this->Sign_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sign'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sign'));
        }
    }

    public function _rules() 
    {
//	$this->form_validation->set_rules('created_on', 'created on', 'trim|required');
	$this->form_validation->set_rules('request_by', 'request by', 'trim|required');
	$this->form_validation->set_rules('needs', 'needs', 'trim|required');
//	$this->form_validation->set_rules('token', 'token', 'trim|required');
//	$this->form_validation->set_rules('qrcode', 'qrcode', 'trim|required');
//	$this->form_validation->set_rules('visited_count', 'visited count', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "token.xls";
        $judul = "token";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Created On");
	xlsWriteLabel($tablehead, $kolomhead++, "Request By");
	xlsWriteLabel($tablehead, $kolomhead++, "Needs");
	xlsWriteLabel($tablehead, $kolomhead++, "Token");
	xlsWriteLabel($tablehead, $kolomhead++, "Qrcode");
	xlsWriteLabel($tablehead, $kolomhead++, "Visited Count");

	foreach ($this->Sign_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_on);
	    xlsWriteLabel($tablebody, $kolombody++, $data->request_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->needs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->token);
	    xlsWriteLabel($tablebody, $kolombody++, $data->qrcode);
	    xlsWriteNumber($tablebody, $kolombody++, $data->visited_count);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=token.doc");

        $data = array(
            'sign_data' => $this->Sign_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sign/token_doc',$data);
    }

}

/* End of file Sign.php */
/* Location: ./application/controllers/Sign.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-07-05 05:54:47 */
/* http://harviacode.com */