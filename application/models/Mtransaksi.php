<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mtransaksi extends CI_Model
{

    public $table = 'tb_transaksi';
    public $table_baru = 'tb_transaksi_dept';
    public $id = 'kd_trx';
    public $id_baru = 'id';
    public $tgl_transaksi = 'tgl_transaksi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($filltanggal)
    {
        if(!empty($filltanggal)){
            $this->db->where("DATE(waktu_trx)","$filltanggal");       
        }
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function gagalnow(){
        return $this->db->query("SELECT a.* ,bayar_terakhir_baru(id_client) tanggal_terakhir FROM tb_config a WHERE a.id_client  NOT IN (SELECT DISTINCT npwpd FROM tb_transaksi_dept WHERE DATE(tgl_transaksi) =DATE(NOW())) ORDER BY tanggal_terakhir DESC")->result();
    }

    function getdatabynow()
    {
        $this->db->where("DATE(tanggal_insert)","DATE(now())",false);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function getdatabynow_baru($tgl,$nama_wp)
    {

        if($nama_wp!='all'){
            $this->db->where("nama_wp","$nama_wp");
        }

        $this->db->where("DATE(tgl_transaksi)","$tgl");   

        $this->db->order_by($this->tgl_transaksi, $this->order);
        return $this->db->get($this->table_baru)->result();
    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kd_trx', $q);
	$this->db->or_like('kd_jenispajak', $q);
	$this->db->or_like('id_transaksi', $q);
	$this->db->or_like('waktu_trx', $q);
	$this->db->or_like('nilai_trx', $q);
	$this->db->or_like('disc_trx', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kd_trx', $q);
	$this->db->or_like('kd_jenispajak', $q);
	$this->db->or_like('id_transaksi', $q);
	$this->db->or_like('waktu_trx', $q);
	$this->db->or_like('nilai_trx', $q);
	$this->db->or_like('disc_trx', $q);
	$this->db->or_like('keterangan', $q);
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

    function byWp($tgl1, $tgl2, $wp){
        return $this->db->query("SELECT * FROM tb_transaksi_dept WHERE DATE(tgl_transaksi) BETWEEN '$tgl1' AND '$tgl2' AND nama_wp='$wp' ORDER BY DATE(tgl_transaksi) DESC ")->result();
    }

}

/* End of file Mtransaksi.php */
/* Location: ./application/models/Mtransaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-12 08:37:45 */
/* http://harviacode.com */