<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Transaksiapi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('kd_trx');
        if ($id == '') {
            $kontak = $this->db->get('tb_transaksi')->result();
        } else {
            $this->db->where('kd_trx', $id);
            $kontak = $this->db->get('tb_transaksi')->result();
        }
        $this->response($kontak, 200);
    }

    function index_post() {
        
        $j_pajak = $_POST['jenis_pajak'];
         $query = $this->db->query("SELECT nama_pajak FROM ref_jenispajak WHERE kd_jenispajak='$j_pajak'");
         
         $namaPajak = '';
         foreach($query->result_array() as $a){
             $namaPajak = $a['nama_pajak'];
         }
         
        $data['kd_client']     =$_POST['kd_client'];
        $data['nama_wp']       =$_POST['nama_wp'];
        $data['kd_jenispajak'] =$_POST['kd_jenispajak'];
        //$data['jenis_pajak']   =$_POST['jenis_pajak'];
        $data['jenis_pajak']   =$namaPajak;
        $data['id_transaksi']  =$_POST['id_transaksi'];
        $data['waktu_trx']     =$_POST['waktu_trx'];
        $data['nilai_trx']     =$_POST['nilai_trx'];
        $data['disc_trx']      =$_POST['disc_trx'];
        $data['keterangan']    =$_POST['keterangan'];
        $insert = $this->db->insert('tb_transaksi', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
 