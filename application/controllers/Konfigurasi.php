<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mkonfigurasi');
        $this->load->library('form_validation');
        $this->load->library('curl');
          $this->id_pengguna=$this->session->userdata('tax_pengguna');
    }

    private function cekAkses($var=null){
        return cek($this->id_pengguna,$var);
    }

    public function index()
    {
        $akses =$this->cekAkses(uri_string());
        $konfigurasi = $this->Mkonfigurasi->get_all();

        $data = array(
            'konfigurasi_data' => $konfigurasi
        );

        $this->template->load('blank','konfigurasi/Konfigurasi_list', $data);
    }

    

    public function create() 
    {
        $wp = $this->Mkonfigurasi->get_all_wp();
        $data = array(
            'button'            => 'Form Tambah',
            'action'            => site_url('konfigurasi/create_action'),
            'kd_config'         => set_value('kd_config'),
            'last_id_database'  => set_value('last_id_database'),
            'kd_jenispajak'     => set_value('kd_jenispajak'),
            'id_client'         => set_value('id_client'),
            'username'          => set_value('username'),
            'password'          => set_value('password'),
            'database_client'   => set_value('database_client'),
            'interval_process'  => set_value('interval_process'),
            'path_csv'          => set_value('path_csv'),
            'string_query'      => set_value('string_query'),
            'string_query_dept' => set_value('string_query_dept'),
            //'path_move'         => set_value('path_move'),
            'url_server'        => set_value('url_server'),
            'kode_aktivasi'     => set_value('kode_aktivasi'),
            'tipe_db'           => set_value('tipe_db'),
            'nama_wp'           => set_value('nama_wp'),
            'wp'                => $wp,
            'ref_tipe_db'       => $this->db->query("SELECT * FROM tb_tipe_db")->result(),
	    );
        $this->template->load('blank','konfigurasi/Konfigurasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'nama_wp'           => $this->input->post('nama_wp',TRUE),
            'kode_aktivasi'     => $this->input->post('kode_aktivasi',TRUE),
            'last_id_database'  => $this->input->post('last_id_database',TRUE),
            'kd_jenispajak'     => $this->input->post('kd_jenispajak',TRUE),
            'id_client'         => $this->input->post('id_client',TRUE),
            'username'          => $this->input->post('username',TRUE),
            'password'          => $this->input->post('password',TRUE),
            'database_client'   => $this->input->post('database_client',TRUE),
            'interval_process'  => $this->input->post('interval_process',TRUE),
            'path_csv'          => $this->input->post('path_csv',TRUE),
            'string_query'      => $this->input->post('string_query',TRUE),
            'string_query_dept' => $this->input->post('string_query_dept',TRUE),
            'stat_db'           => $this->input->post('tipe_db',TRUE),
            //'path_move'         => $this->input->post('path_move',TRUE),
            'url_server'        => $this->input->post('url_server',TRUE),
	    );

           $this->Mkonfigurasi->insert($data);
            
            redirect(site_url('konfigurasi'));
        }
    }
    
    public function update($id) 
    {
        
        $row = $this->Mkonfigurasi->get_by_id($id);
        $wp = $this->Mkonfigurasi->get_all_wp();

        if ($row) {
            $data = array(
                'button'            => 'Form Edit',
                'action'            => site_url('konfigurasi/update_action'),
                'kd_config'         => set_value('kd_config', $row->kd_config),
                'last_id_database'  => set_value('last_id_database', $row->last_id_database),
                'kd_jenispajak'     => set_value('kd_jenispajak', $row->kd_jenispajak),
                'id_client'         => set_value('id_client', $row->id_client),
                'username'          => set_value('username', $row->username),
                'password'          => set_value('password', $row->password),
                'database_client'   => set_value('database_client', $row->database_client),
                'interval_process'  => set_value('interval_process', $row->interval_process),
                'path_csv'          => set_value('path_csv', $row->path_csv),
                'string_query'      => set_value('string_query', $row->string_query),
                'string_query_dept' => set_value('string_query_dept', $row->string_query_dept),
                //'path_move'         => set_value('path_move', $row->path_move),
                'url_server'        => set_value('url_server', $row->url_server),
                'kode_aktivasi'     => set_value('kode_aktivasi', $row->kode_aktivasi),
                'nama_wp'           => set_value('nama_wp', $row->nama_wp),
                'tipe_db'           => set_value('tipe_db', $row->stat_db),
                'wp'                => $wp,
                'ref_tipe_db'       => $this->db->query("SELECT * FROM tb_tipe_db")->result(),
	    );
            $this->template->load('blank','konfigurasi/Konfigurasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('refjenispajak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd_config', TRUE));
        } else {
            $data = array(
            'nama_wp'           => $this->input->post('nama_wp',TRUE),
            'kode_aktivasi'     => $this->input->post('kode_aktivasi',TRUE),
            'last_id_database'  => $this->input->post('last_id_database',TRUE),
            'kd_jenispajak'     => $this->input->post('kd_jenispajak',TRUE),
            'id_client'         => $this->input->post('id_client',TRUE),
            'username'          => $this->input->post('username',TRUE),
            'password'          => $this->input->post('password',TRUE),
            'database_client'   => $this->input->post('database_client',TRUE),
            'interval_process'  => $this->input->post('interval_process',TRUE),
            'path_csv'          => $this->input->post('path_csv',TRUE),
            'string_query'      => $this->input->post('string_query',TRUE),
            'string_query_dept' => $this->input->post('string_query_dept',TRUE),
            //'path_move'         => $this->input->post('path_move',TRUE),
            'url_server'        => $this->input->post('url_server',TRUE),
            'stat_db'           => $this->input->post('tipe_db',TRUE),
            'stat_config'       => '1',
	    );

            $this->Mkonfigurasi->update($this->input->post('kd_config', TRUE), $data);
            
            redirect(site_url('konfigurasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mkonfigurasi->get_by_id($id);

        if ($row) {
            $this->Mkonfigurasi->delete($id);
            
            
            redirect(site_url('konfigurasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konfigurasi'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('rekening', 'rekening', 'trim|required');
	$this->form_validation->set_rules('kode_aktivasi', 'kode aktivasi', 'trim|required');
	$this->form_validation->set_rules('last_id_database', 'last id database', 'trim|required');
	$this->form_validation->set_rules('kd_jenispajak', 'kd jenis pajak', 'trim|required');
	$this->form_validation->set_rules('id_client', 'id client', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', '');
	$this->form_validation->set_rules('database_client', 'database client', 'trim|required');
	$this->form_validation->set_rules('interval_process', 'interval process', 'trim|required');
	$this->form_validation->set_rules('path_csv', 'path csv', 'trim|required');
	$this->form_validation->set_rules('string_query', 'string query', 'trim|required');
    $this->form_validation->set_rules('string_query_dept', 'string query dept', 'trim|required');
    $this->form_validation->set_rules('tipe_db', 'tipe database', 'trim|required');
	//$this->form_validation->set_rules('path_move', 'path move', 'trim|required');
	$this->form_validation->set_rules('url_server', 'url server', 'trim|required');

	$this->form_validation->set_rules('kd_config', 'kd_config', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    public function cek_data(){
        $kode = $_GET['kode'];
        
        $data = $this->Mkonfigurasi->cek_data($kode);
        
        if($data->num_rows()==1){
            foreach($data->result_array() as $d){
                $myObj->success = 1;
                $myObj->pesan = "1";
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
        }else {
            $myObj->success = 0;
            $myObj->pesan = "0";
        }
        
        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }

}

/* End of file Refjenispajak.php */
/* Location: ./application/controllers/Refjenispajak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-12 08:09:55 */
/* http://harviacode.com */