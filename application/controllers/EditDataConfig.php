<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class EditDataConfig extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $npwp   =$this->input->post('npwp',true);
            $data = array(
                'stat_config' => 0
            );
            $dataConfig=$this->db->where('id_client',$npwp)->update('tb_config',$data);
            $this->response(array('status' => 'success', 200));
            
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }
}
 