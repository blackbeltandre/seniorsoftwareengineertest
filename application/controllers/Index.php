<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
  public function __construct()
    {
        parent::__construct();
            header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); 
                header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT");
                   header("Cache-Control: no-store, no-cache, must-revalidate");
                 header("Cache-Control: post-check=0, pre-check=0", FALSE);
              header("Pragma: no-cache");
            $this->load->helper('url') ;
         $this->load->library(array('form_validation','encrypt','user_agent'));
       }
        public function index(){
        $data["title"] = "SOAL 1-3";
        $this->load->view("Index",$data);

        }
      public function api(){
      if ($this->agent->is_browser())
          {
              $data["agent"] = $this->agent->browser().' '.$this->agent->version();
          }
          elseif ($this->agent->is_robot())
          {
              $data["agent"] = $this->agent->robot();
          }
          elseif ($this->agent->is_mobile())
          {
              $data["agent"] = $this->agent->mobile();
          }
          else
          {
              $data["agent"] = 'Unidentified User Agent';
          }
        $currencies = "IDR";
        $format = 1;
        $access_key = "4dee1a3e1580ac22c86e99c0b3faabc9";
        header('Content-Type: application/json');
        extract($_POST);
        $url = 'http://apilayer.net/api/live?access_key='.$access_key.'&currencies='.$currencies.'&format='.$format.'';
        $setParam = array("access_key"=> $access_key,
                           "currencies" => $currencies,
                            "format"=>$format);
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'DESCRIPTION: "SOAL NOMOR 1"',
         'BROWSER: '.$_SERVER['HTTP_USER_AGENT'].'',
         'IP: '.$_SERVER['REMOTE_ADDR'].'',
         'OS: '.$this->agent->platform().'',
         'LATEST_TRANSACTION: '.date("d/m/Y h:i:s").'',
         'Content-Type: application/json',
         ));
          curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
               curl_setopt($curl,CURLOPT_POST, count($setParam));
                     curl_setopt($curl,CURLOPT_POSTFIELDS, $setParam);
                         curl_setopt($curl, CURLOPT_VERBOSE, true);
                             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
                          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
                       $handle_curl = fopen('php://temp', 'w+');
                    curl_setopt($curl, CURLOPT_STDERR, $handle_curl);
              echo $api = curl_exec($curl);
             if(!$api){
            die("Connection Failure");
            }
          curl_close($curl);
        return $api;
      }
  }