<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends CI_Controller {

     function __construct(){

        parent::__construct();

    	$this->kode_role=$this->session->userdata('tax_role');
    	$this->load->model('Mtransaksi');
        $this->load->model('Mclient');
          $this->id_pengguna=$this->session->userdata('tax_pengguna');
          $this->db2 = $this->load->database('pdrd2', TRUE);
          $connected = $this->db2->initialize();
          if (!$connected) {
             echo 'Tidak Dapat Mengambil Data Dari Server. <a href="javascript:history.back()">Kembali Halaman Sebelumnya</a> ';
          }

    }

     private function cekAkses($var=null){
        return cek($this->id_pengguna,$var);
    }

	function index(){
			$akses =$this->cekAkses(uri_string());
			$tanggal=date('Y-m-d');

			$rk=$this->Mtransaksi->getdatabynow_baru($tanggal, 'all');

			$rn= $this->Mclient->get_all_baru();

			$gagal=$this->Mtransaksi->gagalnow();

			$data['jtc']=count($rn);

			$data['jtr']=count($rk);
			$data['gagal']=count($gagal);


			$this->template->load('blank','konten',$data);

		

		

	}



	



	 

}



