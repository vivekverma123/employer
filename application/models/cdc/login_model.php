<?php
    
    class login_model extends CI_Model{
        
        public function __construct()
        {
            parent::__construct();
        }

	public function employer_login()
	{
		$user_id=$_POST['user_id'];
		$password=$_POST['pass1'];
		$res= $this->db->query("SELECT * FROM `cdc_user` WHERE `user_id` = '".$user_id."' AND `password` = '".$password."' AND `type`='S'");
		$count = $res->num_rows();
		if ($count > 0) {
			return 1;
		} 
		   else {
			return 0;
		}
	}

}

?>