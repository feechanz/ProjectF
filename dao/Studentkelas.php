<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Studentkelas
 *
 * @author Fenita
 */
class Studentkelas {
    //put your code here
    private $studentkelasid;
    private $sakit;
    private $izin;
    private $tanpaketerangan;
    private $studentid;
    private $student;
    private $kelasid;
    private $kelas;
    private $createdate;
    
    function getStudentkelasid() {
        return $this->studentkelasid;
    }

    function getSakit() {
        return $this->sakit;
    }

    function getIzin() {
        return $this->izin;
    }

    function getTanpaketerangan() {
        return $this->tanpaketerangan;
    }

    function getStudentid() {
        return $this->studentid;
    }

    function getStudent() {
        return $this->student;
    }

    function getKelasid() {
        return $this->kelasid;
    }

    function getKelas() {
        return $this->kelas;
    }

    function getCreatedate() {
        return $this->createdate;
    }

    function setStudentkelasid($studentkelasid) {
        $this->studentkelasid = $studentkelasid;
    }

    function setSakit($sakit) {
        $this->sakit = $sakit;
    }

    function setIzin($izin) {
        $this->izin = $izin;
    }

    function setTanpaketerangan($tanpaketerangan) {
        $this->tanpaketerangan = $tanpaketerangan;
    }

    function setStudentid($studentid) {
        $this->studentid = $studentid;
    }

    function setStudent($student) {
        $this->student = $student;
    }

    function setKelasid($kelasid) {
        $this->kelasid = $kelasid;
    }

    function setKelas($kelas) {
        $this->kelas = $kelas;
    }

    function setCreatedate($createdate) {
        $this->createdate = $createdate;
    }
}
