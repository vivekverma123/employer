<?php

/**
 * 
 */
class Auth extends CI_Controller
{
	public function dashboard()
	{
		$this->load->view('cdc/dashboard');
		
	}


	public function register()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_message('is_unique','Entry already exits,pls enter another!');

		$this->form_validation->set_rules('emp_id','Employee Id','trim|strip_tags|required');
		$this->form_validation->set_rules('password','Password','trim|strip_tags|required');
		$this->form_validation->set_rules('name','Name','trim|strip_tags|required');
		$this->form_validation->set_rules('website','Website','trim|strip_tags|required');
		$this->form_validation->set_rules('email_id','Email ID','trim|strip_tags|required');
		$this->form_validation->set_rules('contact_no','Contact Number','trim|strip_tags|required');
		

		if($this->form_validation->run() == false)
		{
			/**
			 * Loads register page view in case of form validation rules not followed
			*/
	        $this->load->view('cdc/register');
		}
		else
		{	
			/**
			 * Loads Auth_model model in case form validation rules are followed
			*/
			$this->load->model('cdc/Auth_model');
			$formArray=array();
			$formArray['user_id']=$this->input->post('emp_id',true);
			$formArray['password']=$this->input->post('password',true);
			$formArray['type']='E';
			$formArray['enabled']='Y';
			$formArray1=array();
			$formArray1['emp_id']=$this->input->post('emp_id',true);
			$formArray1['name']=$this->input->post('name',true);
			$formArray1['website']=$this->input->post('website',true);
			$formArray1['email_id']=$this->input->post('email_id',true);
			$formArray1['contact_no']=$this->input->post('contact_no',true);
			$formArray1['approved']='N';
			$this->Auth_model->userCreate($formArray);
			$this->Auth_model->employerCreate($formArray1);
			$this->session->set_flashdata('msg','Accout Created Successfully');
			redirect(base_url().'index.php/cdc/Auth/register');
		}
	}


	public function JNFregister()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_message('is_unique','Entry already exits,pls enter another!');
		//$this->form_validation->set_rules('job_id','Job Id','trim|strip_tags|required');
		$this->form_validation->set_rules('emp_id','Employee ID','trim|strip_tags|required');
		$this->form_validation->set_rules('designation','Designation','trim|strip_tags');
		$this->form_validation->set_rules('jd','Job Describtion','trim|strip_tags');
		$this->form_validation->set_rules('place','Place','trim|strip_tags');
		$this->form_validation->set_rules('ctc','CTC','trim|strip_tags');
		$this->form_validation->set_rules('ctc_break','CTC Breakdown','trim|strip_tags');
		$this->form_validation->set_rules('bond','Bond Details','trim|strip_tags');
		$this->form_validation->set_rules('resume_shortlist','Resume Shortlist','trim|strip_tags');
		$this->form_validation->set_rules('type_of_test','Type of Test','trim|strip_tags');
		$this->form_validation->set_rules('rounds','Number of rounds','trim|strip_tags');
		$this->form_validation->set_rules('offers','Number of offers','trim|strip_tags');
		$this->form_validation->set_rules('gpa','GPA','trim|strip_tags');
		$this->form_validation->set_rules('female_only','Female Only','trim|strip_tags');
		$data['btech'] = $this->get_data1('b.tech');
		$data['dual'] = $this->get_data1('dualdegree');
		$data['int_mtech'] = $this->get_data1('int.m.tech');
		$data['msc_tech'] = $this->get_data1('m.sc.tech');
		$data['mtech'] = $this->get_data1('m.tech');
		$data['mba'] = $this->get_data1('mba');
		$data['branch'] = $this->get_data2();
		if($this->form_validation->run() == false)
		{
			/**
			 * Loads register page view in case of form validation rules not followed
			*/
	        $this->load->view('cdc/jnf',$data);
		}
		else
		{	
			/**
			 * Loads Auth_model model in case form validation rules are followed
			*/
			$this->load->model('cdc/Auth_model');
			$formArray=array();
			//$formArray['job_id']=$this->input->post('job_id',true);
			$formArray['emp_id']=$this->input->post('emp_id',true);
			$num = $this->Auth_model->find_no_job($formArray['emp_id']);
			$num = $num + 1;
			$formArray['job_id'] = "J".$formArray['emp_id'].'_'.$num;
			//echo($formArray['job_id']);
			$formArray['designation']=$this->input->post('designation',true);
			$formArray['jd']=$this->input->post('jd',true);
			$formArray['place']=$this->input->post('place',true);
			$formArray['ctc_lpa']=$this->input->post('ctc',true);
			$formArray['ctc_breakdown']=$this->input->post('ctc_break',true);
			$formArray['bond_details']=$this->input->post('bond',true);
			$formArray['resume_shortlist']=$this->input->post('resume_shortlist',true);
			$formArray['type_of_test']=$this->input->post('type_of_test',true);
			$formArray['no_of_rounds']=$this->input->post('rounds',true);
			$formArray['no_of_offers']=$this->input->post('offers',true);
			$formArray['gpa']=$this->input->post('gpa',true);
			$formArray['female_only']=$this->input->post('female_only',true);
			$formArray['approved']='N';

			$check = $_POST['check'];

			for($i=0;$i<count($check);$i++){
				$data1['course_branch_id'] = $check[$i];
				$data1['role_id'] = $formArray['job_id'];
				$this->Auth_model->insert_branch_criteria($data1);
			}


			

			$this->Auth_model->jnfCreate($formArray);

			$this->session->set_flashdata('msg','JNF Created Successfully');
			redirect(base_url().'index.php/cdc/Auth/JNFregister');
		}
	}


	public function INFregister()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_message('is_unique','Entry already exits,pls enter another!');

		//$this->form_validation->set_rules('intern_id','Intern Id','trim|strip_tags|required');
		$this->form_validation->set_rules('emp_id','Employee ID','trim|strip_tags|required');
		$this->form_validation->set_rules('designation','Designation','trim|strip_tags');
		$this->form_validation->set_rules('jd','Job Describtion','trim|strip_tags');
		$this->form_validation->set_rules('place','Place','trim|strip_tags');
		$this->form_validation->set_rules('stipend','Stipend','trim|strip_tags');
		$this->form_validation->set_rules('duration_weeks','Duration in weeks','trim|strip_tags');
		$this->form_validation->set_rules('resume_shortlist','Resume Shortlist','trim|strip_tags');
		$this->form_validation->set_rules('type_of_test','Type of Test','trim|strip_tags');
		$this->form_validation->set_rules('rounds','Number of rounds','trim|strip_tags');
		$this->form_validation->set_rules('offers','Number of offers','trim|strip_tags');
		$this->form_validation->set_rules('gpa','GPA','trim|strip_tags');
		$this->form_validation->set_rules('female_only','Female Only','trim|strip_tags');
		$this->form_validation->set_rules('ppo_offered','PPO Offer','trim|strip_tags');
		$this->form_validation->set_rules('ctc_lpa','CTC in LPA','trim|strip_tags');

		$data['btech'] = $this->get_data1('b.tech');
		$data['dual'] = $this->get_data1('dualdegree');
		$data['int_mtech'] = $this->get_data1('int.m.tech');
		$data['msc_tech'] = $this->get_data1('m.sc.tech');
		$data['mtech'] = $this->get_data1('m.tech');
		$data['mba'] = $this->get_data1('mba');
		
		$data['branch'] = $this->get_data2();
		

		if($this->form_validation->run() == false)
		{
			/**
			 * Loads register page view in case of form validation rules not followed
			*/
	        $this->load->view('cdc/inf',$data);
		}
		else
		{	
			/**
			 * Loads Auth_model model in case form validation rules are followed
			*/
			$this->load->model('cdc/Auth_model');
			$formArray=array();

			//$formArray['intern_id']=$this->input->post('intern_id',true);
			$formArray['emp_id']=$this->input->post('emp_id',true);
			$num = $this->Auth_model->find_no_int($formArray['emp_id']);
			$num = $num + 1;
			$formArray['intern_id'] = "I".$formArray['emp_id'].'_'.$num;
			$formArray['designation']=$this->input->post('designation',true);
			$formArray['jd']=$this->input->post('jd',true);
			$formArray['place']=$this->input->post('place',true);
			$formArray['stipend']=$this->input->post('stipend',true);
			$formArray['duration_weeks']=$this->input->post('duration_weeks',true);
			$formArray['resume_shortlist']=$this->input->post('resume_shortlist',true);
			$formArray['type_of_test']=$this->input->post('type_of_test',true);
			$formArray['no_of_rounds']=$this->input->post('rounds',true);
			$formArray['no_of_offers']=$this->input->post('offers',true);
			$formArray['gpa']=$this->input->post('gpa',true);
			$formArray['female_only']=$this->input->post('female_only',true);
			$formArray['ppo_offered']=$this->input->post('ppo_offered',true);
			$formArray['ctc_lpa']=$this->input->post('ctc_lpa',true);
			$formArray['approved']='N';

			$check = $_POST['check'];

			for($i=0;$i<count($check);$i++){
				$data1['course_branch_id'] = $check[$i];
				$data1['role_id'] = $formArray['intern_id'];
				$this->Auth_model->insert_branch_criteria($data1);
			}

			$this->Auth_model->infCreate($formArray);

			$this->session->set_flashdata('msg','INF Created Successfully');
			redirect(base_url().'index.php/cdc/Auth/INFregister');
		}
	}


	public function reportslots(){
		$this->load->model("cdc/Auth_model");
		$data["fetch_data_slots"] = $this->Auth_model->fetch_data_slots();
		$this->load->view('cdc/getslots',$data);
	}
	
	//Returns record from course_branch with matching course_id
	public function get_data1($branch_id)
	{
		$this->load->model("cdc/Auth_model");
		return $this->Auth_model->course_branch($branch_id);
	}

	///Returns all branches from table cs_branches
	public function get_data2()
	{
		$this->load->model("cdc/Auth_model");
		$data = $this->Auth_model->fetch_branch();
		return $data;
		
	}

	//Fetches all required data for view application
	public function load_applications()
	{
		$this->load->model("cdc/Auth_model");
		if(isset($_SESSION['emp_id']))
		{
			$emp_id = $_SESSION['emp_id'];
			if($_SESSION['param']=="0")
			{
				$data['roles'] = $this->Auth_model->get_full_time_roles($emp_id);
			}
			else
			{
				$data['roles'] = $this->Auth_model->get_intern_roles($emp_id);
			}
			if(isset($_SESSION['role_id']))
			{
				$data['app'] = $this->Auth_model->get_applicants($_SESSION['role_id']);
				//print_r($data['app']);
			}
			$this->load->view("cdc/applications",$data);
		}
		else
		{
			$this->load->view("cdc/applications");
		}
	}

	//Sets required emp_id and a paremter into session array
	public function set_data()
	{
		$_SESSION['emp_id'] = $_POST['emp_id'];
		$_SESSION['param'] = $_POST['param'];
	}

	//Sets required role_id into session array
	public function set_data2()
	{
		$this->load->model("cdc/Auth_model");
		$_SESSION['role_id'] = $_POST['role_id'];
		$role_id = $_POST['role_id'];
		$app = $this->Auth_model->get_applicants($role_id);
		print_r($app);
	}


}