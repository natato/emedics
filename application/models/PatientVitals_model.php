<?php
class PatientVitals_model extends CI_Model{
	public function __construct(){
	}
	public function addVitals($patientid,$date,$temperature,$weight,$height,$pressure,$bloodsugar){
		$data=array(
			"date"=>$date,
			"patientID"=>$patientid,
			"Temperature"=>$temperature,
			"Weight"=>$weight,
			"Height"=>$height,
			"bloodPressure"=>$pressure,
			"bloodSugar"=>$bloodsugar

		);
		$this->db->insert("patient_vitals",$data);
	}
	public function editVitals($patientid,$date,$temperature,$weight,$height,$pressure,$bloodsugar){
		$data=array(
			"date"=>$date,
			"patientID"=>$patientid,
			"Temperature"=>$temperature,
			"Weight"=>$weight,
			"Height"=>$height,
			"bloodPressure"=>$pressure,
			"bloodSugar"=>$bloodsugar
		);
		$this->db->update("patient_vitals",$data);
		$this->db->where("patientID",$patientid);
	}
	public function getVitals($patientid){
		$this->db->select("vitalsID, patientID,date,Temperature,Weight,Height,bloodPressure,bloodSugar");
		$this->db->from("patient_vitals");
		$this->db->where("patientID",$patientid);
		$this->db->orderby("vitalsID","desc");
		return $this->db->get();
	}
	
}

?>