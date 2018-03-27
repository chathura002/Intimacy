<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alpha_order_model extends CI_Model{
    
    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        parent::__construct();
        
    }
    
    public function get_all_data() {
        $this->db->select('t.bp_name,t.bp_url,t.bp_image');
        $this->db->from('test_tb t');
        //$this->db->order_by('bp_name','ASC');
        return $this->db->get()->result();
    }
}
