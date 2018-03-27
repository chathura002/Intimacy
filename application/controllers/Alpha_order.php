<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alpha_order extends CI_Controller {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //view calculater page
        $data['client_data'] = $this->Alpha_order_model->get_all_data();
        $this->load->view('alpha/alpha_view',$data);
    }

//    public function categorize() {
//        $rtn_data = $this->Alpha_order_model->get_all_data();
//        $i = 0;
//        foreach ($rtn_data as $key => $value) {
//            $arr[$value->bp_name]['url'] = $value->bp_url;
//            $arr[$value->bp_name]['image'] = $value->bp_image;
//            $i++;
//        }
//        ksort($arr);
//        foreach ($arr as $key => $val) {
//            $result[substr($key, 0, 1)][] = $val;
//        }
//        $azRange = range('A', 'C');
//        foreach ($azRange as $letter) {
//            if(array_key_exists($letter,$result)){
//                var_dump($result[$letter]);
//            }
//        }
//    }

}
