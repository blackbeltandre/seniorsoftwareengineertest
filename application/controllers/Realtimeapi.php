<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realtimeapi extends CI_Controller {
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
        $endpoint = 'convert';
        $access_key = "4dee1a3e1580ac22c86e99c0b3faabc9";
        $from = 'IDR';
        $to = 'USD';
        $amount = 10;
        $curl = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');   
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'DESCRIPTION: "SOAL NOMOR 1"',
        'BROWSER: '.$_SERVER['HTTP_USER_AGENT'].'',
        'IP: '.$_SERVER['REMOTE_ADDR'].'',
        'OS: '.$this->agent->platform().'',
        'LATEST_TRANSACTION: '.date("d/m/Y h:i:s").'',
        'Content-Type: application/json',
         ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $api = curl_exec($curl);
        $exchangeRates = json_decode($api, true);
           if($exchangeRates["error"]['code'] == '105'){
            echo "<script>
            alert('".$exchangeRates["error"]['info']."');
            </script>";
              echo $api;
               echo "<meta http-equiv='refresh' content='180'>";
               exit(0);
               die("Connection Failure");
               }
               else{
                echo $api;
              echo "<meta http-equiv='refresh' content='180'>";
            }
          curl_close($curl);
      }
  }