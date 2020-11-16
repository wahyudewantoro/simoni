<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class TransaksiApiSqlserver extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // $datefile       = $_POST["datefile"];
            // $pcid = $_POST["pcid"];
            // $departement   = $_POST["departement"];
            // $revenue  = $_POST["revenue"];
            // $bill_no     = $_POST["bill_no"];
            // $room_no    = $_POST["room_no"];
            // $remark     = $_POST["remark"];
            
            $idx = $_POST["idx"];
            $tglTransaksi = $_POST["tgl_transaksi"];
            $versi_etax = $_POST["versi_etax"];
            $npwpd = $_POST["npwpd"];
            $nama_wp = $_POST["nama_wp"];
            
            $data = array(
                'versi_etax' => $versi_etax
            );

            $params = array(
                'id_client' => $npwpd
            );

            $updateConfig=$this->db->where($params)->update('tb_config',$data);
            if ($updateConfig) {
                $data["tgl_transaksi"]   = $tglTransaksi;
                $data["keterangan"] = $_POST["keterangan"];
                $data["kode_item"]   = $_POST["kode_item"];
                $data["jumlah"]  = $_POST["jumlah"];
                $data["harga"]     = $_POST["harga"];
                $data["qty"]     = $_POST["qty"];
                $data["disc"]      = $_POST["disc"];
                $data["nama_wp"]      = $nama_wp;
                $data["npwpd"]      = $npwpd;
    
                $insert = $this->db->insert('tb_transaksi_dept', $data);
                if ($insert) {
                    $this->response($updateConfig, 200);
                } else {
                    $this->response(array('status2' => 'fail', 502));
                }
            } else {
                $this->response(array('status1' => 'fail', 502));
            }
        }
    }
}
 