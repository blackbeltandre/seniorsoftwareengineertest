<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class custom404 extends CI_Controller 
{
public function __construct() 
{
    parent::__construct(); 
} 

public function index() 
{ 
    $this->output->set_status_header('404'); 
    $data['title'] = 'PAGE NOT FOUND !!!';
    $this->load->view('Error_404',$data);
} 
 } 
 