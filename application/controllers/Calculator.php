<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Calculator class.
 * @property CI_Input $input The input lib
 */
class Calculator extends CI_Controller {
    
    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }
    
    //--------------------------------------------------------------------------
    
    public function index() {
        //view calculater page
        $this->load->view('calculator/calculator_view');
    }
    
    //--------------------------------------------------------------------------

    /*
     * Separate input string numbers into array
     * @param string
     * return mix
     */
    private function separate_numbers($full_number) {
        return str_split($full_number);
    }
    
    //--------------------------------------------------------------------------
    
    /*
     * Main calculation function
     * return number
     */
    public function calculate() {
        $input_str = $this->input->post('input_number');
        $type = $this->input->post('type');
        $total = 0;
        switch ($type) {
            case 'btn1':
                $number_arr = $this->separate_numbers($input_str);
                foreach ($number_arr as $single_number) {
                    if ($single_number % 2 == 1) {
                        $total += $single_number;
                    }
                }
                break;
            case 'btn2':
                $number_arr = $this->separate_numbers($input_str);
                foreach ($number_arr as $single_number) {
                    if ($single_number % 2 == 0) {
                        $total += $single_number;
                    }
                }
                break;
            case 'btn3':
                foreach (range(1, $input_str) as $single_number) {
                    $total += $single_number;
                }
                break;
        }
        echo $total;
    }
}

