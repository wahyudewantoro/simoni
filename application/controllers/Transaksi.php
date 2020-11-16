<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

      var $API ="";
    
    public function __construct()
    {
          parent::__construct();
          $this->load->model('Mtransaksi');
          $this->load->library('form_validation');
          $this->load->library('curl');
          $this->API=base_url()."Transaksiapi";
          $this->db2 = $this->load->database('pdrd2', TRUE);
          $connected = $this->db2->initialize();
          $this->id_pengguna=$this->session->userdata('tax_pengguna');
          if (!$connected) {
             echo 'Tidak Dapat Mengambil Data Dari Server. <a href="javascript:history.back()">Kembali Halaman Sebelumnya</a> ';
          }
 
    }

    private function cekAkses($var=null){
        return cek($this->id_pengguna,$var);
    }

    public function index()
    {
        // $transaksi = $this->Mtransaksi->getdatabynow();
        $akses =$this->cekAkses(uri_string());
        if(isset($_POST['tanggal'])){
            $tanggal=$_POST['tanggal'];
            $filltanggal=date('Y-m-d',strtotime($_POST['tanggal']));
        }else{
            $tanggal=date('Y-m-d');
            $filltanggal=date('Y-m-d');
        }

        if(isset($_POST['nama_wp']) && $_POST['nama_wp'] != ''){
            $nama_wp = $_POST['nama_wp'];
        }else{
            $nama_wp = 'all';
        }

        $transaksi = $this->Mtransaksi->getdatabynow_baru($filltanggal, $nama_wp);
        
        $total=0;
        foreach ($transaksi as $res) {
            $total += $res->jumlah;
        }

        $data = array(
            'nama_wp'        => $nama_wp,
            'tanggal'        =>$tanggal,    
            'transaksi_data' => $transaksi,
            'total'          => $total,
            'jum_row'        => count($transaksi),
        );

        $this->template->load('blank','transaksi/Transaksi_list_baru', $data);
    }


    public function cetakharini(){
        $tanggal   = date('Y-m-d', strtotime($this->uri->segment(3)));
        $nama_wp   = $this->uri->segment(4);

        $transaksi = $this->Mtransaksi->getdatabynow_baru($tanggal, $nama_wp);

        if($nama_wp=='all'){
            $nama_wp = 'Semua WP';
        }
      
        $data = array(
            'tanggal'        => date('d-m-Y', strtotime($tanggal)),
            'waktu'          => date('dmYHis'),
            'nama_wp'        => $nama_wp,
            'transaksi_data' => $transaksi,
            
        );
        
            // $this->template->load('blank','transaksi/Transaksi_list', $data);/
            $this->load->view('transaksi/cetakTransaksi_list', $data)    ;
    }

    function alldata(){

        if(isset($_POST['tanggal'])){
            $tanggal=$_POST['tanggal'];
            $filltanggal=date('Y-m-d',strtotime($_POST['tanggal']));
        }else{
            $tanggal=date('Y-m-d');
            $filltanggal=null;
        }

        $alldata=$this->Mtransaksi->get_all($filltanggal);
        $data = array(
            'tanggal'=>$tanggal,
            'alldata'=>$alldata
        );

        $this->template->load('blank','transaksi/Transaksi_alldata', $data);   
    }


    function cetakalldata($tanggal=null){
        if(isset($tanggal)){
            // $tanggal=$_POST['tanggal'];
            $filltanggal=date('Y-m-d',strtotime($tanggal));
        }else{
            // $tanggal=null;
            $filltanggal=null;
        }

        $alldata=$this->Mtransaksi->get_all($filltanggal);
        $data = array(
            'tanggal'=>$tanggal,
            'alldata'=>$alldata
        );        

        // print_r($data);
        $this->load->view('transaksi/cetakalldata',$data);
    }
    

    public function wp(){
         $akses =$this->cekAkses(uri_string()); 
        if(isset($_POST['tanggal1'])){
            $tanggal1=date('Y-m-d', strtotime($_POST['tanggal1']));
        }else{
            $tanggal1=date('Y-m-d');
        }

        if(isset($_POST['tanggal2'])){
            $tanggal2=date('Y-m-d', strtotime($_POST['tanggal2']));
        }else{
            $tanggal2=date('Y-m-d');
        }

        if(isset($_POST['nama_wp'])){
            $nama_wp=$_POST['nama_wp'];
        }else{
            $nama_wp='all';
        }

        if(isset($_POST['submit'])){
            $row = $this->Mtransaksi->byWp($tanggal1, $tanggal2, $nama_wp);
            $total=0;
            foreach ($row as $a) {
                $total += $a->jumlah;
            }

            $data = array(
                'data'     => $this->Mtransaksi->byWp($tanggal1, $tanggal2, $nama_wp),
                'tanggal1' => $tanggal1,
                'tanggal2' => $tanggal2,
                'nama_wp'  => $nama_wp,
                'submit'   => true,
                'total'    => $total,
            );
        }else{
            $data = array(
                'data'     => null,
                'tanggal1' => $tanggal1,
                'tanggal2' => $tanggal2,
                'nama_wp'  => $nama_wp,
                'submit'   => false,
            );
        }

        $this->template->load('blank','transaksi/transaksiwp_baru', $data);      
    }

    public function wpcetak(){
        $tanggal1   = date('Y-m-d', strtotime($this->uri->segment(3)));
        $tanggal2   = date('Y-m-d', strtotime($this->uri->segment(4)));
        $nama_wp   = $this->uri->segment(5);

        $row = $this->Mtransaksi->byWp($tanggal1, $tanggal2, $nama_wp);
      
        $data = array(
            'tanggal1' => date('d-m-Y', strtotime($tanggal1)),
            'tanggal2' => date('d-m-Y', strtotime($tanggal2)),
            'waktu'    => date('dmYHis'),
            'nama_wp'  => $nama_wp,
            'data'     => $row,
            
        );
        
            // $this->template->load('blank','transaksi/Transaksi_list', $data);/
            $this->load->view('transaksi/cetakTransaksiWP', $data);
    }


    public function gagal(){
         $akses =$this->cekAkses(uri_string()); 
        $data['data']=$this->Mtransaksi->gagalnow();
        $this->template->load('blank','transaksi/transaksigagal', $data);         
    }

    public function cetaktransaksigagal(){
        $data['tanggal']=date('d-m-Y');
        $data['data']=$this->Mtransaksi->gagalnow();
        $this->load->view('transaksi/cetaktransaksigagal', $data);
        // $this->template->load('blank','transaksi/cetaktransaksigagal', $data);            
    }

    public function create() 
    {
        $data = array(
            'button' => 'Form Tambah',
            'action' => site_url('transaksi/create_action'),
	    'kd_trx' => set_value('kd_trx'),
	    'kd_jenispajak' => set_value('kd_jenispajak'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'waktu_trx' => set_value('waktu_trx'),
	    'nilai_trx' => set_value('nilai_trx'),
	    'disc_trx' => set_value('disc_trx'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('blank','transaksi/Transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_jenispajak' => $this->input->post('kd_jenispajak',TRUE),
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
		'waktu_trx' => $this->input->post('waktu_trx',TRUE),
		'nilai_trx' => $this->input->post('nilai_trx',TRUE),
		'disc_trx' => $this->input->post('disc_trx',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

           $this->Mtransaksi->insert($data);
            
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mtransaksi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Form Edit',
                'action' => site_url('transaksi/update_action'),
		'kd_trx' => set_value('kd_trx', $row->kd_trx),
		'kd_jenispajak' => set_value('kd_jenispajak', $row->kd_jenispajak),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'waktu_trx' => set_value('waktu_trx', $row->waktu_trx),
		'nilai_trx' => set_value('nilai_trx', $row->nilai_trx),
		'disc_trx' => set_value('disc_trx', $row->disc_trx),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('blank','transaksi/Transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_trx', TRUE));
        } else {
            $data = array(
		'kd_jenispajak' => $this->input->post('kd_jenispajak',TRUE),
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
		'waktu_trx' => $this->input->post('waktu_trx',TRUE),
		'nilai_trx' => $this->input->post('nilai_trx',TRUE),
		'disc_trx' => $this->input->post('disc_trx',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Mtransaksi->update($this->input->post('kd_trx', TRUE), $data);
            
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mtransaksi->get_by_id($id);

        if ($row) {
            $this->Mtransaksi->delete($id);
            
            
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_jenispajak', 'kd jenispajak', 'trim|required');
	$this->form_validation->set_rules('id_transaksi', 'id transaksi', 'trim|required');
	$this->form_validation->set_rules('waktu_trx', 'waktu trx', 'trim|required');
	$this->form_validation->set_rules('nilai_trx', 'nilai trx', 'trim|required');
	$this->form_validation->set_rules('disc_trx', 'disc trx', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('kd_trx', 'kd_trx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function bacajson(){
        $json = file_get_contents(base_url()."json/jsontransaksi.json");
         $obj = json_decode($json);
     
        if(count($obj->data)>0){
            $this->db->trans_start();
            foreach($obj->data as $rk){
                $data['kd_client']     =$rk->kd_client;
                $data['nama_wp']       =$rk->nama_wp;
                $data['kd_jenispajak'] =$rk->kd_jenispajak;
                $data['jenis_pajak']   =$rk->jenis_pajak;
                $data['id_transaksi']  =$rk->id_transaksi;
                $data['waktu_trx']     =$rk->waktu_trx;
                $data['nilai_trx']     =$rk->nilai_trx;
                $data['disc_trx']      =$rk->disc_trx;
                $data['keterangan']    =$rk->keterangan;
                $this->db->insert('tb_transaksi',$data);
                
                // echo $rk->kd_jenispajak[$i];
                
            }
            


            $response['data'] = null;
            $fp               = fopen('json/jsontransaksi.json', 'w');
            fwrite($fp, json_encode($response));
            fclose($fp);


            $this->db->trans_complete();
            if ($this->db->trans_status() === true)
            {
                    $res='<div class="note note-success">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4>Berhasil </h4>
                            <p>Data json telah disimpan.</p>
                        </div>';
            }else{
                        $res='<div class="note note-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4>Oppss</h4>
                            <p>Data json gagal disimpan.</p>
                        </div>';    
            }

        }else{
                        $res='<div class="note note-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4>Oppss</h4>
                            <p>Data json kosong.</p>
                        </div>';    
        }

        echo $res;
        // redirect('transaksi');
    }


    function ajaxdatatransaksi(){
        // echo "halaman auto refresh setiap 5 detik: ".rand(99,2); //Hanya contoh saja..
        $transaksi = $this->Mtransaksi->getdatabynow();
       
        $data = array(
            'transaksi_data' => $transaksi,
        );

        $this->load->view('transaksi/kontenajaxtransaksi',$data);
        // $this->template->load('blank','transaksi/Transaksi_list', $data);
    }

    function ajaxdatatransaksi_baru(){
        // echo "halaman auto refresh setiap 5 detik: ".rand(99,2); //Hanya contoh saja..
        
        $tanggal = date('Y-m-d', strtotime($this->uri->segment('3')));
        $nama_wp = $this->uri->segment('4');
        $transaksi = $this->Mtransaksi->getdatabynow_baru($tanggal,$nama_wp);
        $total=0;
        foreach ($transaksi as $res) {
            $total += $res->jumlah;
        }

        $data = array(
             'tgl' => $tanggal,
             'total' => $total,
            'transaksi_data' => $transaksi,
        );

        $this->load->view('transaksi/kontenajaxtransaksi_baru',$data);
        // $this->template->load('blank','transaksi/Transaksi_list', $data);
    }


    function addtransaksi($data){
                $data['kd_client']     =$_POST['kd_client'];
                $data['nama_wp']       =$_POST['nama_wp'];
                $data['kd_jenispajak'] =$_POST['kd_jenispajak'];
                $data['jenis_pajak']   =$_POST['jenis_pajak'];
                $data['id_transaksi']  =$_POST['id_transaksi'];
                $data['waktu_trx']     =$_POST['waktu_trx'];
                $data['nilai_trx']     =$_POST['nilai_trx'];
                $data['disc_trx']      =$_POST['disc_trx'];
                $data['keterangan']    =$_POST['keterangan'];

            
 
    }

    function viewdata(){
         // echo $this->API;
        // echo $this->curl->simple_get($this->API);
          $data['transaksi'] = json_decode($this->curl->simple_get($this->API));
          print_r($data);
    }
 
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-12 08:37:45 */
/* http://harviacode.com */