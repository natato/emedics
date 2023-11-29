<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./vendor/autoload.php');
use Postmark\PostmarkClient;

class Dashboard extends CI_Controller {

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
			$this->load->model("User_model");
			$this->load->model("Patient_model");
			$noOfUsers=$this->User_model->getNoOfUsers($this->session->userdata("facility_id"));
			$noOfPatients=$this->Patient_model->getNoOfPatients($this->session->userdata("facility_id"));
			$this->load->view('dashboard',["user"=>$user,"facility"=>$facility,"noOfUsers"=>$noOfUsers,"noOfPatients"=>$noOfPatients]);
		}
		else{
			redirect("login/index");
		}
	}
	public function consultations($facility,$i=0){
		$user=$this->session->userdata("user");
		if(isset($user)){
			if($i==0){
				$this->load->view('consultations',["user"=>$user,"facility"=>$facility]);
			}
		}
	}
	public function invited_users($facility,$i=0){
		if($i==0){
			$user=$this->session->userdata("user");
			if(isset($user)){
				$this->load->model("User_model");

				$users=$this->User_model->getFacilityUsers($this->session->userdata("facility_id"));
				$this->load->view('invitedusers',["user"=>$user,"facility"=>$facility,"users"=>$users]);
			}
			else{
				redirect("login/index");
			}
		}
		else if($i==1){
			$user=$this->session->userdata("user");
			if(isset($user)){
				$this->load->view('newusers',["user"=>$user,"facility"=>$facility]);
			}
			else{
				redirect("login/index");
			}
		}
		else{
			$user=$this->session->userdata("user");
			if(isset($user)){
				$this->load->model("User_model");
				$users=$this->User_model->getFacilityUsers($this->session->userdata("facility_id"));
				$firstnameArray=$this->input->post("firstname[]");
				$lastnameArray=$this->input->post("lastname[]");
				$emailArray=$this->input->post("email[]");
				$roleArray=$this->input->post("role[]");
				for($i=0;$i<count($firstnameArray);$i++){
					if($roleArray[$i]==0){
						$msg="You have to select a role for all your entry";
						$this->load->view('newusers',["user"=>$user,"facility"=>$facility,"msg"=>$msg]);
						break;
						return;
					}
				}
				for($j=0;$j<count($firstnameArray);$j++){
					$this->add_invited_users($facility,$emailArray[$j],$firstnameArray[$j],$lastnameArray[$j],$roleArray[$j]);
				}
				redirect("dashboard/invited_users/".$facility);
			}
			else{
				redirect("login/index");
			}
		}

	}
	private function add_invited_users($facility,$email,$firstname,$lastname,$role){
		$user=$this->session->userdata("user");
		$facility_id=$this->session->userdata("facility_id");
		if(isset($user)){
			$this->load->model("User_model");
			$user=$this->User_model->getuser($email);
			if($user==null){
				$this->load->model("Facility_model");
				//write code to allow user to enter password;
				$password=$email;
				$date=DATE("Y-m-d H:i:s",strtotime('+24 hours'));
				$this->User_model->adduser($email,$password,$firstname,$lastname,$role,$date);
				$user=$this->User_model->getuser($email);
				$this->load->model("Facility_model");
				
				$this->User_model->link_facility($user->userID,$facility_id);

				$actionUrl=site_url("login/activate/".$user->userID);
				$productUrl=site_url("login");
				$client = new PostmarkClient("3c161207-01be-475a-b9c5-860d645c2990");
				$sendResult = $client->sendEmailWithTemplate(
				  "info@equicksales.com",
				  $email,
				  11656264,
				  [
				  "product_name" => "Emedics",
				  "name" => $firstname,
				  "product_url" => $productUrl,
				  "action_url" => $actionUrl,
				  "username" => $email,
				  "support_email" => "support@equicksales.com",
				  "company_name" => "Equicksales Consulting Ltd.",
				]);
				
			}
			else{
				$user=$this->session->userdata("user");
				$msg="Email already exists";
				$this->load->view('newusers',["user"=>$user,"facility"=>$facility,"msg"=>$msg]);
			}		
		}
		else{
			redirect("login/index");
		}
			
	}
	public function update_or_add_users($facility,$id,$i=0){
		if($i==0){
			$user=$this->session->userdata("user");
			if(isset($user)){
				$this->load->model("User_model");

				$users=$this->User_model->getFacilityUsers($this->session->userdata("facility_id"));

				$usertoupdate=$this->User_model->getuserbyid($id);

				$this->load->view('update-user',["user"=>$user,"facility"=>$facility,"users"=>$users,"usertoupdate"=>$usertoupdate]);
			}
			else{
				redirect("login/index");
			}
		}
		else if($i==1){

			$user=$this->session->userdata("user");
			if(isset($user)){
				$this->load->model("User_model");
				$id=$this->input->post("userID");
				$firstname=$this->input->post("firstname");
				$lastname=$this->input->post("lastname");
				$email=$this->input->post("email");
				$usertype=$this->input->post("usertype");
				$extraroles=$this->input->post("extra_roles");
				$activated=$this->input->post("activated");
				$this->User_model->editname($id,$firstname,$lastname);
				$this->User_model->editemailaddress($id,$email);
				$this->User_model->editroles($id,$usertype,$extraroles);
				$this->User_model->editactivated($id,$activated);

				$users=$this->User_model->getFacilityUsers($this->session->userdata("facility_id"));
				$this->load->view('invitedusers',["user"=>$user,"facility"=>$facility,"users"=>$users]);
			}
			else{
				redirect("login/index");
			}
		}
		else{
			
		}

	}
	public function patient_vitals($facility,$id,$i=0){
		if($i==0){
			$user=$this->session->userdata("user");
			if(isset($user)){
				$this->load->model("User_model");
				$users=$this->User_model->getFacilityUsers($this->session->userdata("facility_id"));
				$this->load->model("Patient_model");
				$patient=$this->Patient_model->getPatient($id);
				$this->load->view('patient-vitals',["user"=>$user,"facility"=>$facility,"users"=>$users,"patient"=>$patient]);
			}
			else{
				redirect("login/index");
			}
		}
		else{
			$user=$this->session->userdata("user");
			if(isset($user)){
				$patientid=$id;
				$date=$this->input->post("date");
				$temperature=$this->input->post("temperature");
				$weight=$this->input->post("weight");
				$height=$this->input->post("height");
				$sys=$this->input->post("sys");
				$dia=$this->input->post("dia");
				$pulse=$this->input->post("pulse");
				$pressure=$sys.",".$dia.",".$pulse;
				$bloodsugar=$this->input->post("bloodsugar");
				$this->load->model("PatientVitals_model");
				$this->PatientVitals_model-> addVitals($patientid,$date,$temperature,$weight,$height,$pressure,$bloodsugar);
				echo "Patient Vitals Saved Successfully";
			}
		}

	}
	public function update_patient_info($facility,$id,$i=0){
		$user=$this->session->userdata("user");
		if($i==0){
			if(isset($user)){
				$this->load->model("Patient_model");
				$patient=$this->Patient_model->getPatient($id);
				$this->load->view('update-patient',["user"=>$user,"facility"=>$facility,"patient"=>$patient]);
			}
			else{
				redirect("login/index");
			}
		}
		else if($i==1){
			if(isset($user)){
				$name=$this->input->post("name");
				$town=$this->input->post("town");
				$dob=$this->input->post("dob");
				$dofv=$this->input->post("dofv");
				$phone=$this->input->post("phone");
				$this->load->model("Patient_model");
				$this->Patient_model->updatePatient($id,$name,$town,$dob,$dofv,$phone);
				echo "Patient Information Updated Successfully";
				

			}
		}
	}
	public function patients_info($facility,$i=0){
		$user=$this->session->userdata("user");
		if($i==0){
			if(isset($user)){
				$this->load->model("Patient_model");
				$facilityid=$this->session->userdata("facility_id");
				$patients=$this->Patient_model->getFacilityPatients($facilityid);
				$this->load->view('patients',["user"=>$user,"facility"=>$facility,"patients"=>$patients]);
			}
			else{
				redirect("login/index");
			}
		}
		else if($i==2){
			if(isset($user)){
				$name=$this->input->post("name");
				$town=$this->input->post("town");
				$dob=$this->input->post("dob");
				$dofv=$this->input->post("dofv");
				$phone=$this->input->post("phone");
				$this->load->model("Patient_model");
				$patientid=Date("dmYhis");
				$this->Patient_model->addPatient($patientid,$name,$town,$dob,$dofv,$phone);
				$facilityid=$this->session->userdata("facility_id");
				$this->Patient_model->link_facility($patientid,$facilityid);
				echo "Patient added successfully";
			}
		}
		else{
			$this->load->view('addpatient',["user"=>$user,"facility"=>$facility]);
		}
	}
	public function delete_patient_info(){
		$user=$this->session->userdata("user");
		if(isset($user)){
			$patientid=$this->input->post("patientid");
			$this->load->model("Patient_model");
			$this->Patient_model->deletePatient($patientid);
			echo "Patient Information deleted successfully";
		}
	}
	public function patient_history($facility, $i=0,$id=0,$historyid=0){
		$user=$this->session->userdata("user");
		if($i==0){
			if(isset($user)){

				$this->load->view('patienthistory',["user"=>$user,"facility"=>$facility,"patientid"=>$id,"historyid"=>$historyid]);
			}
			else{
				redirect("login/index");
			}
		}
		else if($i==1){
			if($id!==0){
				
				//get patient history based on patient id
				$this->load->view('viewpatienthistory',["user"=>$user,"facility"=>$facility,"patientid"=>$id,"historyid"=>$historyid]);
			}
			else{
				redirect("login/index");
			}
			
		}
		else if($i==2){
			if(isset($user)){
				$this->load->view('viewdatehistory',["user"=>$user,"facility"=>$facility,"patientid"=>$id,"historyid"=>$historyid]);
			}
		}
	}
	public function settings($facility,$i=0){
		if($i==0){
			$user=$this->session->userdata("user");
			if(isset($user)){
				$this->load->view('settings',["user"=>$user,"facility"=>$facility]);
			}
			else{
				redirect("login/index");
			}
		}
		else if($i==1){// for updating system settings such as theme
			$user=$this->session->userdata("user");
			if(isset($user)){
				$systemtheme=$this->input->post("systemtheme");
				$this->load->view('settings',["user"=>$user,"facility"=>$facility]);

			}
		}
		else if($i==2){// for updating basic settings such as user firstname and lastname
			$user=$this->session->userdata("user");
			if(isset($user)){
				$firstname=$this->input->post("firstname");
				$lastname=$this->input->post("lastname");
				$this->load->view('settings',["user"=>$user,"facility"=>$facility]);

			}
		}
		else if($i==3){// for updating login settings such as password
			$user=$this->session->userdata("user");
			if(isset($user)){
				$oldpassword=$this->input->post("oldpassword");
				$newpassword=$this->input->post("newpassword");
				$confirmnewpassword=$this->input->post("confirmnewpassword");
				$this->load->view('settings',["user"=>$user,"facility"=>$facility]);

			}
		}

	}
}
