<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DiseaseAdministration extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($facility)
	{
		$user=$this->session->userdata("user");
		if(isset($user)){
			$this->session->set_userdata("facility",$facility);
			$this->load->model("Disease_model");
			$diseases=$this->Disease_model->getAll();
			$this->load->view('disease',["user"=>$user,"facility"=>$facility,"diseases"=>$diseases]);
		}
		else{
			redirect("login/index");
		}
	}
	public function addDisease($facility){
			$user=$this->session->userdata("user");
		if(isset($user)){
			$this->session->set_userdata("facility",$facility);
			$this->load->model("Disease_model");

			$name=$this->input->post("name");
			$description=$this->input->post("description");

			$created_at=DATE("Y-m-d H:i:s");
			$this->Disease_model->add($name,$description,$created_at);
			$diseases=$this->Disease_model->getAll();
			$this->load->view('disease',["user"=>$user,"facility"=>$facility,"diseases"=>$diseases]);
		}
		else{
			redirect("login/index");
		}
		
	}
	public function symptoms($facility){
		$user=$this->session->userdata("user");
		if(isset($user)){
			$this->session->set_userdata("facility",$facility);
			$this->load->model("Disease_model");
			$diseases=$this->Disease_model->getAll();
			$this->load->model("Symptoms_model");
			$symptoms=$this->Symptoms_model->getAll();
			$symptoms_arr=array();
			foreach($symptoms->result() as $s){
				$d=$this->Disease_model->get($s->disease_id);
				$d=$d->row();
				$d=$d->name;
				$s->disease=$d;
				array_push($symptoms_arr,$s);
			}
			$this->load->view('symptoms',["user"=>$user,"facility"=>$facility,"symptoms"=>$symptoms,"diseases"=>$diseases]);
		}
		else{
			redirect("login/index");
		}
	}
	public function addSymptoms($facility){
		$user=$this->session->userdata("user");
		if(isset($user)){
			$this->session->set_userdata("facility",$facility);
			$this->load->model("Symptoms_model");
			$disease_id=$this->input->post("disease");
			$description=$this->input->post("description");
			$created_at=DATE("Y-m-d H:i:s");
			$this->Symptoms_model->add($disease_id,$description,$created_at);
			$this->load->model("Disease_model");
			$diseases=$this->Disease_model->getAll();
			$symptoms=$this->Symptoms_model->getAll();
			$symptoms_arr=array();
			foreach($symptoms->result() as $s){
				$d=$this->Disease_model->get($s->disease_id);
				$d=$d->row();
				$d=$d->name;
				$s->disease=$d;
				array_push($symptoms_arr,$s);
			}
			$this->load->view('symptoms',["user"=>$user,"facility"=>$facility,"symptoms"=>$symptoms,"diseases"=>$diseases]);
		}
		else{
			redirect("login/index");
		}
		
	}
	public function medicine($facility){
		$user=$this->session->userdata("user");
		if(isset($user)){
			$this->session->set_userdata("facility",$facility);
			$this->load->model("Disease_model");
			$diseases=$this->Disease_model->getAll();
			$this->load->model("Medicine_model");
			$medicines=$this->Medicine_model->getAll();
			$medicines_arr=array();
			foreach($medicines->result() as $m){
				$d=$this->Disease_model->get($m->disease_id);
				$d=$d->row();
				$d=$d->name;
				$m->disease=$d;
				array_push($medicines_arr,$m);
			}
			$this->load->view('medicine',["user"=>$user,"facility"=>$facility,"diseases"=>$diseases,"medicines"=>$medicines]);
		}
		else{
			redirect("login/index");
		}
	}
	public function addMedicine($facility){
		$user=$this->session->userdata("user");
		if(isset($user)){
			$this->session->set_userdata("facility",$facility);
			$this->load->model("Disease_model");
			$diseases=$this->Disease_model->getAll();
			$this->load->model("Medicine_model");
			$disease_id=$this->input->post("disease");
			$name=$this->input->post("name");
			$description=$this->input->post("description");
			$created_at=DATE("Y-m-d H:i:s");
			$this->Medicine_model->add($disease_id,$name,$description,$created_at);
			$medicines=$this->Medicine_model->getAll();
			$medicines_arr=array();
			foreach($medicines->result() as $m){
				$d=$this->Disease_model->get($m->disease_id);
				$d=$d->row();
				$d=$d->name;
				$m->disease=$d;
				array_push($medicines_arr,$m);
			}
			$this->load->view('medicine',["user"=>$user,"facility"=>$facility,"diseases"=>$diseases,"medicines"=>$medicines]);
		}
		else{
			redirect("login/index");
		}
	}
	
	
	
}
