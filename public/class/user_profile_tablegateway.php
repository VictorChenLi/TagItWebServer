<?php
include "user_profile.php";
class user_profile_tablegateway {

		function select($where) {
		$user_profile = new user_profile(); 
		$sql = "SELECT * FROM user_profile WHERE " + $where;
		$db = new db(); 
		$user_profile->exchangeArray($db->runQuery($sql)); 
		return $user_profile; 
	}

	function select_by_id($id) {
		return select("uid = " + $id);
	}

	function insert($user_profile) {
		$sql = "INSERT INTO user_profile ('uid', 'display_name', 'actual_name', 'birthdate', 'gender', 'last_active','phone_number','school','user_img_url','interests') 
			    VALUES('"+$user_profile->getUid()+"','"+$user_profile->getDisplay_name()+"','"+$user_profile->getActual_name()
			    +"','"+$user_profile->getBirthdate()+"','"+$user_profile->getGender()+"','"+$user_profile->getLast_active()
			    +"','"+$user_profile->getPhone_number()+"','"+$user_profile->getSchool()+"','"+$user_profile->getUser_img_url()
			    +"','"+$user_profile->getInterests()+"')";
		
		$db->runQuery($sql); 
	}

	function update($value) {
		$sql = "UPDATE user_profile SET 'uid'="+$user_profile->getUid()+",'display_name'='"+$user_profile->getDisplay_name()
				+"','actual_name'='"+$user_profile->getActual_name()+"','birthdate'='"+$user_profile->getBirthdate()
				+"','gender'='"+$user_profile->getGender()+"','last_active'='"+$user_profile->getLast_active()
				+"','phone_number'='"+$user_profile->getPhone_number()+"','gender'='"+$user_profile->getGender()
				+"','user_img_url'='"+$user_profile->getUser_img_url()+"','interests'='"+$user_profile->getInterests()
				+"' where 'uid'="+$user_profile->getUid();
		$db = new db();
		$db->runQuery($sql);
	}

	function delete($id) {
		$sql= "DELETE from user_profile where uid="+$id;
		$db = new db();
		$db->runQuery($sql);
	}
}
