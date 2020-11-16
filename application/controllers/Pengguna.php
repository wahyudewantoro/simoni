<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mpengguna');
        $this->load->library('form_validation');
          $this->id_pengguna=$this->session->userdata('tax_pengguna');
    }

    private function cekAkses($var=null){
        return cek($this->id_pengguna,$var);
    }

    public function index()
    {
        $akses =$this->cekAkses(uri_string());
        $pengguna = $this->Mpengguna->get_all();

        $data = array(
            'menu_data' => $pengguna
        );

        $this->template->load('blank','pengguna/Pengguna_list', $data);
    }

    

    public function create() 
    {
        $data = array(
            'button'     => 'Form Tambah',
            'action'     => site_url('pengguna/create_action'),
            'id_inc'     => set_value('id_inc'),
            'nama'       => set_value('nama'),
            'username'   => set_value('username'),
            'password'   => set_value('password'),
            'ms_role_id' => set_value('role'),
            'm_role'     => $this->db->query('SELECT * FROM ms_role')->result(),
            'disabled'   => false,
	    );
        $this->template->load('blank','pengguna/Pengguna_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama'       => $this->input->post('nama',TRUE),
                'username'   => $this->input->post('username',TRUE),
                'password'   => sha1($this->input->post('password',TRUE)),
                'ms_role_id' => $this->input->post('role',TRUE),
	       );

            $this->Mpengguna->insert($data);
            
            redirect(site_url('pengguna'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mpengguna->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Form Edit',
                'action'     => site_url('pengguna/update_action'),
                'id_inc'     => set_value('id_inc', $row->id_inc),
                'nama'       => set_value('nama', $row->nama),
                'username'   => set_value('username', $row->username),
                'ms_role_id' => set_value('role', $row->ms_role_id),
                'm_role'     => $this->db->query('SELECT * FROM ms_role')->result(),
                'disabled'   => true
	       );
            $this->template->load('blank','pengguna/Pengguna_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_inc', TRUE));
        } else {
            $passwd_old = $this->input->post('password', TRUE);
            $id_inc     = $this->input->post('id_inc', TRUE);

            if($passwd_old==''){
                $data = array(
                    'nama'       => $this->input->post('nama',TRUE),
                    'username'   => $this->input->post('username',TRUE),
                    'ms_role_id' => $this->input->post('role',TRUE)
                );

                $this->Mpengguna->update($this->input->post('id_inc', TRUE), $data);
                redirect(site_url('pengguna'));
            }else{
                $cek = $this->Mpengguna->cek_password($id_inc, sha1($this->input->post('password')));

                if($cek->jml==1){
                    $data = array(
                        'nama'       => $this->input->post('nama',TRUE),
                        'username'   => $this->input->post('username',TRUE),
                        'ms_role_id' => $this->input->post('role',TRUE),
                        'password'   => sha1($this->input->post('password_new')),
                    );

                    $this->Mpengguna->update($this->input->post('id_inc', TRUE), $data);
                    redirect(site_url('pengguna'));
                }else{
                    $this->session->set_flashdata('msg', 
                        '<div class="note note-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Oppss</h4>
                            <p>Password lama yang dimasukkan tidak ditemukan !</p>
                        </div>');     
                    redirect(site_url('pengguna/update/'.$id_inc));
                }
            }            
            
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mpengguna->get_by_id($id);

        if ($row) {
            $this->Mpengguna->delete($id);
            
            
            redirect(site_url('pengguna'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
    	$this->form_validation->set_rules('username', 'username', 'trim|required');
    	$this->form_validation->set_rules('password', 'password', 'trim');
        // $this->form_validation->set_rules('password_old', 'password old', 'trim|required');
        // $this->form_validation->set_rules('password_new', 'password new', 'trim|required');
    	$this->form_validation->set_rules('role', 'role', 'trim|required');

    	$this->form_validation->set_rules('id_inc', 'id_inc', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 10:34:32 */
/* http://harviacode.com */