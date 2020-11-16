<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class JavaJson extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        $this->load->database();
    }

    public function krmDataJsonConfig(){
        $npwp = $_GET["npwp"];
        $url=base_url().'CheckDataConfig';
        $data["npwp"] = $npwp;
        $rk =  $this->curl->simple_get($url, $data);

        $myObj->fungsi = 'krmDataJsonConfig';
        $myObj->message = $rk;
        $myObj->success = 1;
        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }

    public function krmDataJsonEmptyData(){
        $npwp = $_GET["npwp"];
        $tglFull = date("Y-m-d");
        // $tglFull = "2020-01-01";
        $tgl = explode("-",$tglFull);

        // $sql = $this->db->query("SELECT hari FROM (SELECT DATE_FORMAT(a.tgl,'%d') hari,IFNULL(omset,0) omset,a.tgl FROM (SELECT * FROM
        // (SELECT ADDDATE('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) tgl FROM
        // (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        // 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t0,
        // (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        // 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t1,
        // (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        // 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t2,
        // (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        // 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t3,
        // (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        // 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t4) v
        // WHERE DATE_FORMAT(tgl,'%Y-%m') = DATE_FORMAT(tglFull,'%Y-%m')) a LEFT JOIN (
        // SELECT DATE(tgl_transaksi) tgl, SUM(jumlah) AS omset FROM tb_transaksi_dept
        // WHERE DATE_FORMAT(tgl_transaksi,'%Y-%m') = DATE_FORMAT(tglFull,'%Y-%m') AND npwpd = '$npwp'
        // GROUP BY DATE(tgl_transaksi))b ON a.tgl=b.tgl) c WHERE omset = 0 AND DAY(tgl) < DAY(CURRENT_DATE)");

        $sql = $this->db->query("SELECT hari FROM (SELECT DATE_FORMAT(a.tgl,'%d') hari,IFNULL(omset,0) omset,a.tgl 
        FROM (SELECT * FROM
        (SELECT ADDDATE('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) tgl FROM
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t0,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t1,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t2,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t3,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t4) v
        WHERE DATE_FORMAT(tgl,'%Y-%m') = DATE_FORMAT('$tglFull','%Y-%m')) a LEFT JOIN (
        SELECT DATE(tgl_transaksi) tgl, SUM(jumlah) AS omset FROM tb_transaksi_dept
        WHERE DATE_FORMAT(tgl_transaksi,'%Y-%m') = DATE_FORMAT('$tglFull','%Y-%m') AND npwpd = '$npwp'
        GROUP BY DATE(tgl_transaksi))b ON a.tgl=b.tgl) c WHERE omset = 0 AND DAY(tgl) < DAY(CURRENT_DATE)");

        $ab = "";
        foreach($sql->result_array() as $a){
            $ab .= $tgl[0]."-".$tgl[1]."-".$a['hari']."|";
        }
        $ab = rtrim($ab,"|");

        $myObj->fungsi = 'krmDataJsonEmptyData';
        $myObj->message = $ab;
        $myObj->success = 1;
        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }

    public function krmDataJsonEditStatConfig(){
        $npwp = $_POST["parameter"];
        $url=base_url().'EditDataConfig';
        $data["npwp"] = $npwp;
        $rk =  $this->curl->simple_post($url, $data);

        $myObj->fungsi = 'krmDataJsonEditStatConfig';
        $myObj->message = $rk;
        $myObj->success = 1;
        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }

    public function krmDataJsonUpdateConfig(){
        $npwp = $_GET["string_query"];
        $url=base_url().'UpdateDataConfig';
        $data["npwp"] = $npwp;
        $rk =  $this->curl->simple_get($url, $data);

        $myObj->fungsi = 'krmDataJsonUpdateConfig';
        $myObj->message = $rk;
        $myObj->success = 1;
        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }

    public function krmDataJson(){
        $parameter=$_POST["parameter"];
        $dec = json_decode($parameter);
        $count_gagal = 0;
        $countDecode = count($dec);
        for($idx = 0; $idx < $countDecode; $idx++){
            $obj = (Array)$dec[$idx];
            $data["kd_client"]     = $obj["kd_client"];
            $data["nama_wp"]       = $obj["nama_wp"];
            $data["kd_jenispajak"] = $obj["kd_jenispajak"];
            $data["jenis_pajak"]   = $obj["jenis_pajak"];
            $data["id_transaksi"]  = $obj["id_transaksi"];
            $data["waktu_trx"]     = $obj["waktu_trx"];
            $data["nilai_trx"]     = $obj["nilai_trx"];
            $data["disc_trx"]      = $obj["disc_trx"];
            $data["keterangan"]    = $obj["keterangan"];

            // $url='http://dnh-solution.com/etax/Transaksiapi';
            $url=base_url().'Transaksiapi';
            $rk =  $this->curl->simple_post($url, $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if(!$rk){
                $count_gagal++;
                $idTransaksi = "id_transaksi{$idx}";
                $respon[$idTransaksi] = $obj["id_transaksi"];
            }else{
                $idTransaksi = "id_transaksi{$idx}";
                $respon[$idTransaksi] = 'error is not available.';
            }
        }
        // $countGgl = "count_gagal{$count_gagal}";
        // $respon[$countGgl] = $count_gagal;
        // print_r(json_encode($respon));

        $myObj->fungsi = 'krmDataJson';
        $myObj->message = "$countDecode";
        $myObj->countGagal = $count_gagal;
        $myObj->success = 1;
        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }

    public function krmDataJsonExcel2(){
        $parameter=$_POST["parameter"];
        $modifiedParameter=str_replace("/and/","&",$parameter);
        $dec = json_decode($modifiedParameter);
        $count_gagal = 0;
        $text = "";
        $countDecode = count($dec);
        $npwpd = "";

        $arrayTglTransaksi = array();
        for($idx = 0; $idx < $countDecode; $idx++){
            $obj = (Array)$dec[$idx];
            $value = $obj["tgl_transaksi"];
            if($npwpd == "") {
                $npwpd = $obj["npwpd"];
            }
            
            if(!in_array($value,$arrayTglTransaksi)){
                array_push($arrayTglTransaksi,$value);
            }
        }

        foreach($arrayTglTransaksi as $vTglTransaksi){
            $splitvTglTransaksi = explode(' ',$vTglTransaksi);

            $this->db->where("DATE_FORMAT(tgl_transaksi,'%Y-%m-%d')", $splitvTglTransaksi[0]);
            $this->db->where('npwpd', $npwpd);
            $this->db->delete('tb_transaksi_dept');
        }

        for($idx = 0; $idx < $countDecode; $idx++){
            $obj = (Array)$dec[$idx];
            $data["idx"]     = $idx;
            $data["tgl_transaksi"]       = $obj["tgl_transaksi"];
            $data["keterangan"] = $obj["keterangan"];
            $data["jumlah"]  = $obj["jumlah"];
            $data["harga"]     = $obj["harga"];
            $data["qty"]     = $obj["qty"];
            $data["disc"]      = $obj["disc"];
            $data["nama_wp"]      = $obj["nama_wp"];
            $data["npwpd"]      = $obj["npwpd"];
            $data["kode_item"]      = $obj["kode_item"];
            $data["versi_etax"]      = $obj["versi_etax"];

            $url=base_url().'TransaksiApiSqlserver';
            $rk =  $this->curl->simple_post($url, $data, array(CURLOPT_BUFFERSIZE => 10));
            // $text .=$rk." ";
            if(!$rk){
                $count_gagal++;
                $idTransaksi = "id_transaksi{$idx}";
                $respon[$idTransaksi] = $obj["id_transaksi"];
            }else{
                $idTransaksi = "id_transaksi{$idx}";
                $respon[$idTransaksi] = 'error is not available.';
            }
        }
        
        $myObj->fungsi = 'krmDataJsonSqlserver';
        $myObj->message = $countDecode;
        $myObj->countGagal = $count_gagal;
        $myObj->success = 1;
        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }
    
    public function krmDataJsonExcel(){

        $parameter=$_POST["parameter"];
        $modifiedParameter=str_replace("/and/","&",$parameter);
        $dec = json_decode($modifiedParameter);
        $count_gagal = 0;
        $countDecode = count($dec);

        for($idx = 0; $idx < $countDecode; $idx++){
            $obj = (Array)$dec[$idx];
            //old code
            $data["value"]     = $obj["value"];
            //20191013
            $data["timeDoc"]     = $obj["timeDoc"];

            // echo $data;
            
            $url=base_url().'TransaksiApiExcel';
            $rk =  $this->curl->simple_post($url, $data, array(CURLOPT_BUFFERSIZE => 10));
            if(!$rk){
                $count_gagal++;
                $idTransaksi = "id_transaksi{$idx}";
            } 
            // else {
            //     echo $rk;
            // }
        }

        $myObj->fungsi = 'krmDataJsonExcel';
        $myObj->message = "$countDecode";
        $myObj->countGagal = $count_gagal;
        $myObj->success = 1;
        $myJSON = json_encode($myObj);

        echo $myJSON;
    }

    public function krmDataJsonLog(){
        $parameter=$_POST["parameter"];
        $dec = json_decode($parameter);
        $count_gagal = 0;
        $text = "";
        $countDecode = count($dec);
        for($idx = 0; $idx < $countDecode; $idx++){
            $obj = (Array)$dec[$idx];
            $data["npwp"]     = $obj["npwp"];
            $data["nama_wp"]       = $obj["nama_wp"];

            $url=base_url().'TransaksiApiLog';
            $rk =  $this->curl->simple_post($url, $data, array(CURLOPT_BUFFERSIZE => 10));
            // $text .=$rk." ";
            if(!$rk){
                $count_gagal++;
                $idTransaksi = "id_transaksi{$idx}";
                $respon[$idTransaksi] = $obj["id_transaksi"];
            }else{
                $idTransaksi = "id_transaksi{$idx}";
                $respon[$idTransaksi] = 'error is not available.';
            }
        }

        $myObj->fungsi = 'krmDataJsonLog';
        $myObj->message = "$countDecode";
        $myObj->countGagal = $count_gagal;
        $myObj->success = 1;
        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }
    
    public function krmDataJsonSqlserver(){
        $parameter=$_POST["parameter"];
        $modifiedParameter=str_replace("/and/","&",$parameter);
        $dec = json_decode($modifiedParameter);
        $count_gagal = 0;
        $text = "";
        $countDecode = count($dec);
        $npwpd = "";

        $arrayTglTransaksi = array();
        for($idx = 0; $idx < $countDecode; $idx++){
            $obj = (Array)$dec[$idx];
            $value = $obj["tgl_transaksi"];
            if($npwpd == "") {
                $npwpd = $obj["npwpd"];
            }
            
            if(!in_array($value,$arrayTglTransaksi)){
                array_push($arrayTglTransaksi,$value);
            }
        }

        foreach($arrayTglTransaksi as $vTglTransaksi){
            $splitvTglTransaksi = explode(' ',$vTglTransaksi);

            $this->db->where("DATE_FORMAT(tgl_transaksi,'%Y-%m-%d')", $splitvTglTransaksi[0]);
            $this->db->where('npwpd', $npwpd);
            $this->db->delete('tb_transaksi_dept');
        }

        for($idx = 0; $idx < $countDecode; $idx++){
            $obj = (Array)$dec[$idx];
            $data["idx"]     = $idx;
            $data["tgl_transaksi"]       = $obj["tgl_transaksi"];
            $data["keterangan"] = $obj["keterangan"];
            $data["jumlah"]  = $obj["jumlah"];
            $data["harga"]     = $obj["harga"];
            $data["qty"]     = $obj["qty"];
            $data["disc"]      = $obj["disc"];
            $data["nama_wp"]      = $obj["nama_wp"];
            $data["npwpd"]      = $obj["npwpd"];
            $data["kode_item"]      = $obj["kode_item"];
            $data["versi_etax"]      = $obj["versi_etax"];

            $url=base_url().'TransaksiApiSqlserver';
            $rk =  $this->curl->simple_post($url, $data, array(CURLOPT_BUFFERSIZE => 10));
            // $text .=$rk." ";
            if(!$rk){
                $count_gagal++;
                $idTransaksi = "id_transaksi{$idx}";
                $respon[$idTransaksi] = $obj["id_transaksi"];
            }else{
                $idTransaksi = "id_transaksi{$idx}";
                $respon[$idTransaksi] = 'error is not available.';
            }
        }
        
        $myObj->fungsi = 'krmDataJsonSqlserver';
        $myObj->message = $countDecode;
        $myObj->countGagal = $count_gagal;
        $myObj->success = 1;
        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }

    public function krmDataJsonPostgres(){
        $parameter=$_POST["parameter"];
        $modifiedParameter=str_replace("/and/","&",$parameter);
        $dec = json_decode($modifiedParameter);
        $count_gagal = 0;
        $text = "";
        $countDecode = count($dec);

        $arrayTglTransaksi = array();
        for($idx = 0; $idx < $countDecode; $idx++){
            $obj = (Array)$dec[$idx];
            $value = $obj["tgl_transaksi"];
            
            if(!in_array($value,$arrayTglTransaksi)){
                array_push($arrayTglTransaksi,$value);
            }
        }

        foreach($arrayTglTransaksi as $vTglTransaksi){
            $this->db->where('tgl_transaksi', $vTglTransaksi);
            $this->db->delete('tb_transaksi_dept');
        }

        for($idx = 0; $idx < $countDecode; $idx++){
            $obj = (Array)$dec[$idx];
            $data["idx"]     = $idx;
            $data["tgl_transaksi"]       = $obj["tgl_transaksi"];
            $data["keterangan"] = $obj["keterangan"];
            $data["jumlah"]  = $obj["jumlah"];
            $data["harga"]     = $obj["harga"];
            $data["qty"]     = $obj["qty"];
            $data["disc"]      = $obj["disc"];
            $data["nama_wp"]      = $obj["nama_wp"];
            $data["npwpd"]      = $obj["npwpd"];
            $data["kode_item"]      = $obj["kode_item"];

            $url=base_url().'TransaksiApiSqlserver';
            $rk =  $this->curl->simple_post($url, $data, array(CURLOPT_BUFFERSIZE => 10));
            // $text .=$rk." ";
            if(!$rk){
                $count_gagal++;
                $idTransaksi = "id_transaksi{$idx}";
                $respon[$idTransaksi] = $obj["id_transaksi"];
            }else{
                $idTransaksi = "id_transaksi{$idx}";
                $respon[$idTransaksi] = 'error is not available.';
            }
        }
        
        $myObj->fungsi = 'krmDataJsonPostgres';
        $myObj->message = "$countDecode";
        $myObj->countGagal = $count_gagal;
        $myObj->success = 1;
        $myJSON = json_encode($myObj);
        
        echo $myJSON;
    }
    
    public function cek_data(){
        $kode = $_GET['kode'];
        
        $result = array();
        array_push($result, array(
				'pesan'=>'Sukses',
				'kode_aktivasi'=>$kode,
				));
        
        echo json_encode(array("result"=>$result));
    }
}
