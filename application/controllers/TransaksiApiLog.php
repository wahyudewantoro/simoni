<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class TransaksiApiLog extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $npwp   =$this->input->post('npwp',true);
            $nama_wp   =$this->input->post('nama_wp',true);
            
            $data=array(
            'npwp' =>$npwp,
            'nama_wp'       =>$nama_wp
            );

            $insert=$this->db->insert('tb_log',$data);
            if($insert){
                $this->response(array('status' => 'success', 200));
            }else{
                $this->response(array('status' => 'fail', 502));
            }
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }
}
 