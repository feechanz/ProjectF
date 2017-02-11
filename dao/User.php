<?php
class User
{
    private $userid;
    private $email;
    private $password;
    private $role;
    private $status;
        
    function getUserid() {
        return $this->userid;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole() {
        return $this->role;
    }

    function getStatus() {
        return $this->status;
    }

    function setUserid($userid) {
        $this->userid = $userid;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setStatus($status) {
        $this->status = $status;
    }
}