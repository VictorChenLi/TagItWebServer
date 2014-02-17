<?php
namespace UserManage\Model;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class UserProfile implements InputFilterAwareInterface
{

    private $uid;

    private $display_name;

    private $actual_name;

    private $birthdate;

    private $gender;

    private $last_active;

    private $phone_number;

    private $school;

    private $user_img_url;

    private $interests;
    
    // we need to implement the exchangeArray() method. This method simply copies the data from the passed in array to our entity properties
    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->display_name = (isset($data['display_name'])) ? $data['display_name'] : null;
        $this->actual_name = (isset($data['actual_name'])) ? $data['actual_name'] : null;
        $this->birthdate = (isset($data['birthdate'])) ? $data['birthdate'] : null;
        $this->gender = (isset($data['gender'])) ? $data['gender'] : null;
        $this->last_active = (isset($data['last_active'])) ? $data['last_active'] : null;
        $this->phone_number = (isset($data['phone_number'])) ? $data['phone_number'] : null;
        $this->school = (isset($data['school'])) ? $data['school'] : null;
        $this->user_img_url = (isset($data['user_img_url'])) ? $data['user_img_url'] : null;
        $this->interests = (isset($data['interests'])) ? $data['interests'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function getInputFilter()
    {
        return $this->inputFilter;
    }

    /**
     *
     * @return the $uid
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     *
     * @param field_type $uid            
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     *
     * @return the $display_name
     */
    public function getDisplay_name()
    {
        return $this->display_name;
    }

    /**
     *
     * @return the $actual_name
     */
    public function getActual_name()
    {
        return $this->actual_name;
    }

    /**
     *
     * @return the $birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     *
     * @return the $gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     *
     * @return the $last_active
     */
    public function getLast_active()
    {
        return $this->last_active;
    }

    /**
     *
     * @return the $phone_number
     */
    public function getPhone_number()
    {
        return $this->phone_number;
    }

    /**
     *
     * @return the $school
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     *
     * @return the $user_img_url
     */
    public function getUser_img_url()
    {
        return $this->user_img_url;
    }

    /**
     *
     * @return the $interests
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     *
     * @param field_type $display_name            
     */
    public function setDisplay_name($display_name)
    {
        $this->display_name = $display_name;
    }

    /**
     *
     * @param field_type $actual_name            
     */
    public function setActual_name($actual_name)
    {
        $this->actual_name = $actual_name;
    }

    /**
     *
     * @param field_type $birthdate            
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     *
     * @param field_type $gender            
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     *
     * @param field_type $last_active            
     */
    public function setLast_active($last_active)
    {
        $this->last_active = $last_active;
    }

    /**
     *
     * @param field_type $phone_number            
     */
    public function setPhone_number($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     *
     * @param field_type $school            
     */
    public function setSchool($school)
    {
        $this->school = $school;
    }

    /**
     *
     * @param field_type $user_img_url            
     */
    public function setUser_img_url($user_img_url)
    {
        $this->user_img_url = $user_img_url;
    }

    /**
     *
     * @param field_type $interests            
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {}
}

?>