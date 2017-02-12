<?php

class Teacher {
    private $teacherid;
    private $nip;
    private $fullname;
    private $gender;
    private $phone;
    private $email;
    private $hiredate;
    private $status;
    
    function getTeacherid() {
        return $this->teacherid;
    }

    function getNip() {
        return $this->nip;
    }

    function getFullname() {
        return $this->fullname;
    }

    function getGender() {
        return $this->gender;
    }

    function getPhone() {
        return $this->phone;
    }

    function getEmail() {
        return $this->email;
    }

    function getHiredate() {
        return $this->hiredate;
    }

    function getStatus() {
        return $this->status;
    }

    function setTeacherid($teacherid) {
        $this->teacherid = $teacherid;
    }

    function setNip($nip) {
        $this->nip = $nip;
    }

    function setFullname($fullname) {
        $this->fullname = $fullname;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setHiredate($hiredate) {
        $this->hiredate = $hiredate;
    }

    function setStatus($status) {
        $this->status = $status;
    }
}
?>