<?php
 
class Auth_model extends CI_Model
{
	public function userCreate($formArray)
	{
		$this->db->insert('cdc_user',$formArray);
	}

	public function employerCreate($formArray)
	{
		$this->db->insert('cdc_employer',$formArray);
	}

	public function infCreate($formArray)
	{
		$this->db->insert('cdc_inf',$formArray);
	}

	public function jnfCreate($formArray)
	{
		$this->db->insert('cdc_jnf',$formArray);
	}


	public function fetch_data_slots()
	{
		$query = $this->db->get('cdc_slots');
		return $query;
	}

	//Returns record from table course_code with matching course_id
	public function fetch_branch_data($course_id)
	{
		//echo($course_id);
		$query = $this->db->query("SELECT * FROM `course_code` where `course_id` = '".$course_id."'");
		//echo("here");
		return $query->result();
	}

	//Returns course_branch_id from table course_branch with matching course_id and branch_id
	public function fetch_course_branch_id($course_id, $branch_id)
	{
		$query = $this->db->query("SELECT * FROM `course_branch` where `course_id` = '".$course_id."' and `branch_id` = '".$branch_id."'");
		$row = $query->row();
		//print_r($row);
		return $row->course_branch_id;
	}

	//Returns record from course_branch with matching course_id
	public function course_branch($course_id)
	{
		$query = $this->db->query("SELECT * FROM `course_branch` where `course_id` = '".$course_id."'");
		return $query->result();
	}

	//Returns all branches from table cs_branches
	public function fetch_branch()
	{
		$query = $this->db->query("SELECT * FROM `cs_branches`");
		return $query->result();
	}

	//Returns number of job roles posted by an employer with matching emp_id
	public function find_no_job($id)
	{
		$query = $this->db->query("SELECT * FROM `cdc_jnf` where `emp_id` = '".$id."'");
		return $query->num_rows();
	}

	//Returns number of intern roles posted by an employer with matching emp_id
	public function find_no_int($id)
	{
		$query = $this->db->query("SELECT * FROM `cdc_inf` where `emp_id` = '".$id."'");
		return $query->num_rows();
	}

	//Adds record to cdc_elligible_branches denoting elligibility of a certain branch and course for a certian job/intern role
	public function insert_branch_criteria($data)
	{
		$this->db->insert('cdc_elligible_branches',$data);
	}

	//Returns all full time roles with matching emp_id
	public function get_full_time_roles($emp_id)
	{
		$query = $this->db->query("SELECT * FROM `cdc_jnf` where `emp_id` = '".$emp_id."'");
		return $query->result();
	}

	//Returns all intern time roles with matching emp_id
	public function get_intern_roles($emp_id)
	{
		$query = $this->db->query("SELECT * FROM `cdc_inf` where `emp_id` = '".$emp_id."'");
		return $query->result();
	}

	//Returns the data of all applicants of matching role_id
	public function get_applicants($role_id)
	{
		$query = $this->db->query("SELECT * FROM `cdc_applications`,`stu_details`,`user_details`,`cdc_student` where `cdc_applications`.`adm_no` = `stu_details`.`admn_no` and  `cdc_applications`.`adm_no` = `user_details`.`id` and `cdc_applications`.`role_id` = '".$role_id."' and `cdc_applications`.`adm_no` = `cdc_student`.`adm_no`");
		return $query->result();
	}


	
}