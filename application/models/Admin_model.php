<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    function total_rows($q = NULL,$w=NULL) {
        if($w){
            $this->db->where($w);
        }
       
	    $this->db->from($q);

        return $this->db->count_all_results();
    }
}