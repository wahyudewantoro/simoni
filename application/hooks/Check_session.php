<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Check_session
{
        public function __construct()
        {
                $this->CI = &get_instance();
                $this->CI->load->library('session');
        }

        public function validate()
        {
            $exp=array('auth','CheckDataConfig','EditDataConfig','Transaksiapi','TransaksiApiExcel','TransaksiApiLog','TransaksiApiSqlserver','JavaJson', 'Konfigurasi', 'konfigurasi');
            $ctrl=$this->CI->uri->segment(1);
            $var=$this->CI->session->userdata('tax');

            if(!in_array($ctrl,$exp)){
                if ($var <> 1 ) {
                    $this->CI->session->set_flashdata('notif',' <div class="note note-warning">Silahkan login terlebih dahulu</div>');
                    redirect('auth');
                    die();
                }
            }        
        }
}