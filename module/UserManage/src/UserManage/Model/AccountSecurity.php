<?php
namespace UserManage\Model;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class AccountSecurity implements InputFilterAwareInterface
{

    private $uid;
    private $username;
    private $password;
    private $security_question;
    private $answer;
    private $verified_account;
    private $create_data;
    
    // we need to implement the exchangeArray() method. This method simply copies the data from the passed in array to our entity properties
    public function exchangeArray($data)
    {
    	$this->uid = (isset($data['uid'])) ? $data['uid'] : null;
    	$this->username = (isset($data['username'])) ? $data['username'] : null;
    	$this->password = (isset($data['password'])) ? $data['password'] : null;
    	$this->security_question = (isset($data['security_question'])) ? $data['security_question'] : null;
    	$this->answer = (isset($data['answer'])) ? $data['answer'] : null;
    	$this->verified_account = (isset($data['verified_account'])) ? $data['verified_account'] : null;
    	$this->create_data = (isset($data['create_data'])) ? $data['create_data'] : null;
    }
    
    public function getArrayCopy()
    {
    	return get_object_vars($this);
    }
    
    /**
	 * @return the $uid
	 */
	public function getUid() {
		return $this->uid;
	}

	/**
	 * @return the $username
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @return the $password
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @return the $security_question
	 */
	public function getSecurity_question() {
		return $this->security_question;
	}

	/**
	 * @return the $answer
	 */
	public function getAnswer() {
		return $this->answer;
	}

	/**
	 * @return the $verified_account
	 */
	public function getVerified_account() {
		return $this->verified_account;
	}

	/**
	 * @return the $create_data
	 */
	public function getCreate_data() {
		return $this->create_data;
	}

	/**
	 * @param field_type $uid
	 */
	public function setUid($uid) {
		$this->uid = $uid;
	}

	/**
	 * @param field_type $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * @param field_type $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @param field_type $security_question
	 */
	public function setSecurity_question($security_question) {
		$this->security_question = $security_question;
	}

	/**
	 * @param field_type $answer
	 */
	public function setAnswer($answer) {
		$this->answer = $answer;
	}

	/**
	 * @param field_type $verified_account
	 */
	public function setVerified_account($verified_account) {
		$this->verified_account = $verified_account;
	}

	/**
	 * @param field_type $create_data
	 */
	public function setCreate_data($create_data) {
		$this->create_data = $create_data;
	}

	public function getInputFilter()
    {}

    public function setInputFilter(InputFilterInterface $inputFilter)
    {}
}

?>