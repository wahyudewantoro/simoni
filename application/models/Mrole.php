<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mrole extends CI_Model
{

    public $table = 'ms_role';
    public $id = 'id_inc';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_inc', $q);
	$this->db->or_like('nama_role', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_inc', $q);
	$this->db->or_like('nama_role', $q);
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

    function getMenu($id){
        $cm=$this->db->query('SELECT id_inc FROM ms_menu')->result_array();
        foreach($cm as $rm){
            $kode_menu=$rm['id_inc'];
            $sql="SELECT ms_menu_id FROM ms_privilege WHERE ms_role_id='$id' AND ms_menu_id='$kode_menu'";
            $qcm=$this->db->query($sql)->num_rows();
            if($qcm == null){
                $data=array('ms_menu_id'=>$kode_menu,'ms_role_id'=>$id);

                $this->db->insert('ms_privilege',$data);
            }
        }

        $qr=$this->db->query("SELECT * FROM (
                                SELECT b.id_inc kode_role,nama_menu,CASE parent WHEN 0 THEN '#'  ELSE NULL END AS parent,STATUS,a.sort sort
                                FROM ms_menu a , ms_privilege b WHERE a.id_inc=b.ms_menu_id 
                                AND parent=0 AND ms_role_id='$id' 
                                UNION 
                                    SELECT c.id_inc kode_role,a.nama_menu,b.nama_menu parent,STATUS,a.sort 
                                    FROM ms_menu a,(SELECT id_inc,nama_menu FROM ms_menu) b, ms_privilege c WHERE a.parent=b.id_inc AND a.id_inc=c.ms_menu_id AND ms_role_id='$id' ) cb ORDER BY parent ASC,cb.sort ASC")->result_array();
        return $qr;     
    }

    function do_role($kode_group,$role){
        $ua=$this->db->query("UPDATE ms_privilege SET status='0' WHERE ms_role_id ='$kode_group'");
        if($ua){
            $jumlah=count($role);
            for($i=0; $i < $jumlah; $i++){
                $kode_role=$role[$i];
                $ur=$this->db->query("UPDATE ms_privilege SET status='1' WHERE id_inc='$kode_role'");
                // echo "UPDATE ms_privilege SET status='1' WHERE id_inc='$kode_role'";
                // echo "<br>";
            }
        }

        return $ur;
    }
}

/* End of file Mrole.php */
/* Location: ./application/models/Mrole.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-02 14:20:07 */
/* http://harviacode.com */