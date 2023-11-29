<?php
class Disease_model extends CI_Model{
	public function __construct(){
	}
	public function add($name,$description,$created_at){
		$data=array(
			"name"=>$name,
			"description"=>$description,
			"created_at"=>$created_at

		);
		$this->db->insert("disease",$data);
	}
	public function edit($id,$name,$description,$updated_at){
			$data=array(
			"name"=>$name,
			"description"=>$description,
			"updated_at"=>$updated_at

		);
		$this->db->update("disease",$data);
		$this->db->where("id",$id);
	}
	public function get($id){
		$this->db->select("id,name,description,created_at,updated_at");
		$this->db->from("disease");
		$this->db->where("id",$id);
		$this->db->order_by("created_at","desc");
		return $this->db->get();
	}
	public function getAll(){
		$this->db->select("id,name,description,created_at,updated_at");
		$this->db->from("disease");
		$this->db->order_by("name","asc");
		return $this->db->get();
	}
	
}

?>