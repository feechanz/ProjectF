<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author Feechan
 */
class Student {
    //put your code here
    private $studentid;
    private $registrationid;
    private $registration;
    private $userid;
    private $user;
    private $status;
    private $namakelas;
    private $createdate;
    
    function getStudentid() {
        return $this->studentid;
    }

    function getRegistrationid() {
        return $this->registrationid;
    }

    function getRegistration() {
        return $this->registration;
    }

    function getUserid() {
        return $this->userid;
    }

    function getUser() {
        return $this->user;
    }

    function getStatus() {
        return $this->status;
    }

    function getNamakelas() {
        return $this->namakelas;
    }

    function getCreatedate() {
        return $this->createdate;
    }

    function setStudentid($studentid) {
        $this->studentid = $studentid;
    }

    function setRegistrationid($registrationid) {
        $this->registrationid = $registrationid;
    }

    function setRegistration($registration) {
        $this->registration = $registration;
    }

    function setUserid($userid) {
        $this->userid = $userid;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setNamakelas($namakelas) {
        $this->namakelas = $namakelas;
    }

    function setCreatedate($createdate) {
        $this->createdate = $createdate;
    }
}
