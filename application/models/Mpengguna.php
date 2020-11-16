<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mpengguna extends CI_Model
{

    public $table = 'ms_pengguna';
    public $id = 'id_inc';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // cek password
    function cek_password($id, $pswd)
    {   
        return $this->db->query("SELECT COUNT(*) AS jml FROM ms_pengguna WHERE id_inc='$id' AND password='$pswd'")->row();
    }

    // get all
    function get_all()
    {   
        return $this->db->query("SELECT a.*, b.nama_role FROM ms_pengguna a LEFT JOIN ms_role b ON a.ms_role_id=b.id_inc ORDER BY a.id_inc ASC")->result();
    }

    // get data by id
    function get_by_id($id)
    {
        return $this->db->query("SELECT a.*, b.nama_role FROM ms_pengguna a LEFT JOIN ms_role b ON a.ms_role_id=b.id_inc WHERE a.id_inc='$id' ORDER BY a.id_inc DESC")->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_inc', $q);
	$this->db->or_like('nama_menu', $q);
	$this->db->or_like('link_menu', $q);
	$this->db->or_like('parent', $q);
	$this->db->or_like('sort', $q);
	$this->db->or_like('icon', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_inc', $q);
	$this->db->or_like('nama_menu', $q);
	$this->db->or_like('link_menu', $q);
	$this->db->or_like('parent', $q);
	$this->db->or_like('sort', $q);
	$this->db->or_like('icon', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $rk=$this->db->insert($this->table, $data);
        if($rk) {
                $this->session->set_flashdata('msg', 
                        '<div class="note note-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Berhasil </h4>
                            <p>Data telah disimpan.</p>
                        </div>');                
            } else {    
                $this->session->set_flashdata('msg', 
                        '<div class="note note-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Oppss</h4>
                            <p>Data gagal disimpan.</p>
                        </div>');    
            }
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $rk=$this->db->update($this->table, $data);
        if($rk) {
                $this->session->set_flashdata('msg', 
                        '<div class="note note-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Berhasil </h4>
                            <p>Data telah disimpan.</p>
                        </div>');                
            } else {    
                $this->session->set_flashdata('msg', 
                        '<div class="note note-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Oppss</h4>
                            <p>Data gagal disimpan.</p>
                        </div>');    
            }
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $rk=$this->db->delete($this->table);
        if($rk) {
                $this->session->set_flashdata('msg', 
                        '<div class="note note-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Berhasil </h4>
                            <p>Data telah dihapus.</p>
                        </div>');                
            } else {    
                $this->session->set_flashdata('msg', 
                        '<div class="note note-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Oppss</h4>
                            <p>Data gagal dihapus.</p>
                        </div>');    
            }
    }

    function getParent(){
        return $this->db->query("SELECT id_inc , nama_menu FROM ms_menu WHERE parent=0 ORDER BY sort ASC")->result();
    }

}

/* End of file Mmenu.php */
/* Location: ./application/models/Mmenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 10:34:32 */
/* http://harviacode.com */