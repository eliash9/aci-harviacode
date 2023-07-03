<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Menu_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_menus() {
        $this->db->order_by('urutan', 'asc');
        return $this->db->get('menus')->result_array();
    }
}
