<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Auth extends CI_Controller {

     function __construct(){

        parent::__construct();

            $this->load->library('curl');

                    }

	function index(){

        $data['action']=base_url().'auth/proses.html';

		$this->load->view('vlogin',$data);	

	}



    function proses(){

        if(isset($_POST['submit'])){

            $username=$_POST['username'];

            $password=sha1($_POST['password']);

            $sql="SELECT a.id_inc,nama,ms_role_id,nama_role

                    FROM ms_pengguna a

                    JOIN ms_role b ON b.id_inc=a.ms_role_id

                    WHERE username=? AND PASSWORD=?";

            $row=$this->db->query($sql,array($username,$password))->row();

            if($row){

                // $trues

                $session=array(

                        'tax'          =>1,

                        'tax_nama'     =>$row->nama,

                        'tax_role'     =>$row->ms_role_id,

                        'tax_pengguna' =>$row->id_inc,

                    );

                $this->session->set_userdata($session);

                redirect('welcome');

            }else{

                // false

                $this->session->set_flashdata('notif',' <div class="note note-warning">Username/password anda salah</div>');

                redirect('auth');

            }

        }else{

            $this->session->set_flashdata('notif',' <div class="note note-warning">Silahkan login terlebih dahulu</div>');

                redirect('auth');

        }

    }





    function logout(){

        $this->session->sess_destroy();

                redirect('auth');

    }





    function test(){

        $data["kd_client"]     ="2";

        $data["nama_wp"]       ="wp satu";

        $data["kd_jenispajak"] ="2";

        $data["jenis_pajak"]   ="pajak satu";

        $data["id_transaksi"]  ="1";

        $data["waktu_trx"]     ="2017-12-13 06]=00]=00";

        $data["nilai_trx"]     ="10000";

        $data["disc_trx"]      ="0";

        $data["keterangan"]    ="keterangan satu";



        $url=base_url().'Transaksiapi';

         $rk =  $this->curl->simple_post($url, $data, array(CURLOPT_BUFFERSIZE => 10)); 

         if($rk){

            echo "1";

         }else{

            echo "string";

         }



    }





}



