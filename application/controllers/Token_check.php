<?php
class Token_check extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sign_model');
    }

    function verify($token){
        $where=array(
            'token'=>$token
        );
        $data['token'] = $this->Sign_model->get_where($where);

        if(isset($data['token']['id']))
        {
            $params = array (
                'visited_count' => $data['token']['visited_count'] + 1
            );
            $token_id = $this->Sign_model->update_where($where,$params);
            if($token_id > 0){
                $this->load->view('token/check', $data);
            }
            else{
                $this->load->view('token/check_error_visited_count');
            }
        }
        else{
            $this->load->view('token/check_error');
        }
    }

}