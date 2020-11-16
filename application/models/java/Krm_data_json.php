<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Krm_data_json extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function KrmDataJson($parameter){
		// $file_handle = fopen("json/jsontransaksi.json", "r");
		// $file_handle = fopen('percobaan_result.txt', 'r') or die("Unable to open file!");
		$file_handle_read = fopen('json/jsontransaksi.json', 'r') or die("Unable to open file!");
		// $dataFile = fgets($file_handle);
		$line = 0;
		$asdf = '';

		while (($buffer = fgets($file_handle_read)) !== FALSE) {
		   if ($line == 0) {
		       $asdf = $buffer;
		       break;
		   }   
		   $line++;
		}

		fclose($file_handle_read);

		$file_handle_write = fopen('json/jsontransaksi.json', 'w') or die("Unable to open file!");
		$json = json_decode($asdf, true);
		if($json['data'] == null){
			$json = str_replace('null',$parameter,$asdf);
			// $json = "Data null";
		}else{
			$edit_parameter = str_replace('[', ',', $parameter).'}';
			$json = str_replace(']}',$edit_parameter,$asdf);;
		}
		$jsonOri = str_replace('/\/', '', $json);
        fwrite($file_handle_write, $jsonOri);
		fclose($file_handle_write);

        $response["success"] = 1;
		$response["report"] = $json;
		echo json_encode($response);
	}
}