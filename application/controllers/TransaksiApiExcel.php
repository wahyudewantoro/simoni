<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class TransaksiApiExcel extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $postValue   =$this->input->post('value',true);
            $postTimeDoc   =$this->input->post('timeDoc',true);
            
            $str_arr     = explode ("=", $postValue);
            $deparetement = $str_arr[0];
            $value = $str_arr[1];
            
            $data=array(
            'departement' =>$deparetement,
            'revenue'       =>$value,
            'date_file' =>$postTimeDoc
            );

            $insert=$this->db->insert('tb_transaksi_dept',$data);
            if($insert){
                $this->response(array('status' => 'success', 200));
            }else{
                $this->response(array('status' => 'fail', 502));
            }
        }else{
            $this->response(array('status' => 'fail', 502));
        }


        // $id=$this->input->post('id',true);
        // $departement=$this->input->post('departement',true);

        /*$postValue=$this->input->post('value',true);
        $this->response($data, 200);*/

        // $str_arr = explode ("=", $postValue);
        // $departement     =$str_arr[0];
        // $value       =$str_arr[1];

        // $data=array(
        //     'departement'=>$departement,
        //     'value'=>$value,
        // );
        //  $insert=$this->db->insert('tb_excel',$data);
        // if ($insert) {
        //     $this->response($data, 200);
        // } else {
        //     $this->response(array('status' => 'fail', 502));
        // } 
    }
}
 