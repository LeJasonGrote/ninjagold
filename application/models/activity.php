<?php
class activity extends CI_Model{
	public function create_activity($message){
		$query = "INSERT INTO activities (activity, created_on, updated_on)
				VALUES (?, NOW(), NOW())";
		return $this->db->query($query, $message);

	}

	public function read_activities(){
		$query = "SELECT * FROM activities ORDER BY created_on DESC";
		$activities = $this->db->query($query)->result_array();
		return $activities;
	}
}

?>