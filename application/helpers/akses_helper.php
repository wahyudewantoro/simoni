<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Session Helper
 *
 * A simple session class helper for Codeigniter
 *
 * @package     Codeigniter Session Helper
 * @author      Dwayne Charrington
 * @copyright   Copyright (c) 2014, Dwayne Charrington
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 * @link        http://ilikekillnerds.com
 * @since       Version 1.0
 * @filesource
 */



if (!function_exists('errorbos'))
{
    function errorbos()
    {
            $CI = &get_instance();
            $err= $CI->load->view('errors/403','',true);
            echo $err;
            die();

    }
}

if (!function_exists('cek'))
{
    function cek($pengguna,$var)
    {
        $CI = get_instance();
        $CI->load->database();

        if(empty($var)){
            errorbos();
        }
        $res=$CI->db->query("SELECT a.*
                                FROM ms_privilege a
                                JOIN ms_menu b ON a.ms_menu_id=b.id_inc
                                JOIN ms_role d on d.id_inc=a.ms_role_id                                
                                JOIN ms_pengguna c ON C.MS_ROLE_ID =D.ID_INC
                                WHERE c.id_inc=$pengguna AND a.status ='1' and upper(link_menu)=upper('$var')")->row();

        $ff=$CI->db->query("SELECT count(a.id_inc) cek
                                FROM ms_privilege a
                                JOIN ms_menu b ON a.ms_menu_id=b.id_inc
                                JOIN ms_role d on d.id_inc=a.ms_role_id                                
                                JOIN ms_pengguna c ON C.MS_ROLE_ID =D.ID_INC
                                WHERE c.id_inc=$pengguna AND a.status ='1' and upper(link_menu)=upper('$var')")->row();

          // echo $CI->db->last_query();
          // die();
        if($ff->cek > 0){
                return array(
                    'read'=>$res->STATUS
                    /*'create'=>$res->CREATED,
                    'update'=>$res->UPDATED,
                    'delete'=>$res->DELETED*/
                );

        }else{
            errorbos();

        }
    }
}
