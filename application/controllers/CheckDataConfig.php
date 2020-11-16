<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class CheckDataConfig extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get(){

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $npwp   =$this->input->get('npwp',true);
            // $npwp = "000000000000";
            $dataVerConfig=$this->db->select('ver_etax,ver_etax_dept')->from('tb_version')->get();
            if($dataVerConfig->num_rows()==1){
                $dataConfig=$this->db->select('*')->from('tb_config')->where('id_client',$npwp)->get();
            
                if($dataConfig->num_rows()==1){
                    foreach($dataVerConfig->result_array() as $a){
                        $myObj->ver_etax = $a['ver_etax'];
                        $myObj->ver_etax_dept = $a['ver_etax_dept'];

                        foreach($dataConfig->result_array() as $d){
                            $stat_config = $d['stat_config'];
                            if ($stat_config == "1") {
                                $myObj->kode_aktivasi = $d['kode_aktivasi'];
                                $myObj->nama_wp = $d['nama_wp'];
                                $myObj->last_id_database = $d['last_id_database'];
                                $myObj->kd_jenispajak = $d['kd_jenispajak'];
                                $myObj->id_client = $d['id_client'];
                                $myObj->username = $d['username'];
                                $myObj->password = $d['password'];
                                $myObj->database_client = $d['database_client'];
                                $myObj->interval_process = $d['interval_process'];
                                $myObj->path_csv = $d['path_csv'];
                                $myObj->string_query = $d['string_query'];
                                $myObj->string_query_dept = $d['string_query_dept'];
                                $myObj->tipe_db = $d['stat_db'];
                                $myObj->path_move = $d['path_move'];
                                $myObj->url_server = $d['url_server'];
                            }
                            $myObj->stat_config = $stat_config;
                        }

                    }
                }
            }
            $this->response($myObj, 200);
            
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }
}
 