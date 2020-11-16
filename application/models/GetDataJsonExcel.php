<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GetDataJsonExcel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getDataJsonExcel($parameter){
		$sql = $parameter;
		$result = $this->db->query($sql)->result_array();
		if (count($result) > 0) {
			$response["success"] = 1;
			$response["message"] = "Berhasil.";
			$response["listData"] = array();
			//create an array
			foreach ($result as $row) {
				$emparray["value"] = $row["value"];
				$emparray["departement"] = $row["departement"];
				array_push($response["listData"], $emparray);
			}
			echo json_encode($response);
			
			//close the db connection
			
		} else {
			$response["success"] = 0;
			$response["message"] = "Tidak ada data yang ditemukan";

			echo json_encode($response);
		}
	}
}