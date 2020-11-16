<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Msclient');
        $this->load->library('form_validation');

        $this->id_pengguna=$this->session->userdata('tax_pengguna');
    }

    public function index()
    {
        $client = $this->Msclient->get_all();

        $data = array(
            'client_data' => $client
        );

        $this->template->load('blank','client/Client_list', $data);
    }

    

    public function create() 
    {
        $data = array(
            'button'        => 'Form Tambah',
            'action'        => site_url('client/create_action'),
            'id_inc'        => set_value('id_inc'),
            'kd_client'     => set_value('kd_client'),
            'kd_jenispajak' => set_value('kd_jenispajak'),
            'client'=>$this->db->query("SELECT kd_client,nama_wp FROM ref_client ORDER BY nama_wp ASC")->result(),
            'pajak'=>$this->db->query("SELECT * FROM ref_jenispajak")->result()
	);
        $this->template->load('blank','client/Client_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kd_client' => $this->input->post('kd_client',TRUE),
		'kd_jenispajak' => $this->input->post('kd_jenispajak',TRUE),
	    );

           $this->Msclient->insert($data);
            
            redirect(site_url('client'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Msclient->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Form Edit',
                'action'        => site_url('client/update_action'),
                'id_inc'        => set_value('id_inc', $row->id_inc),
                'kd_client'     => set_value('kd_client', $row->kd_client),
                'kd_jenispajak' => set_value('kd_jenispajak', $row->kd_jenispajak),
                'client'=>$this->db->query("SELECT kd_client,nama_wp FROM ref_client ORDER BY nama_wp ASC")->result(),
                'pajak'=>$this->db->query("SELECT * FROM ref_jenispajak")->result()
	    );
            $this->template->load('blank','client/Client_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_inc', TRUE));
        } else {
            $data = array(
		'kd_client' => $this->input->post('kd_client',TRUE),
		'kd_jenispajak' => $this->input->post('kd_jenispajak',TRUE),
	    );

            $this->Msclient->update($this->input->post('id_inc', TRUE), $data);
            
            redirect(site_url('client'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Msclient->get_by_id($id);

        if ($row) {
            $this->Msclient->delete($id);
            
            
            redirect(site_url('client'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_client', 'wajib pajak', 'trim|required');
	$this->form_validation->set_rules('kd_jenispajak', 'jenis pajak', 'trim|required');

	$this->form_validation->set_rules('id_inc', 'id_inc', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Client.php */
/* Location: ./application/controllers/Client.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-12 08:38:45 */
/* http://harviacode.com */