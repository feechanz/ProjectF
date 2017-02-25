<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kelas
 *
 * @author Feechan
 */
class Kelas {
    //put your code here
    private $kelasid;
    private $namakelas;
    private $classlevel;
    private $teacherid;
    private $teacher;
    private $periodeid;
    private $periode;
    
    
    private $jumlahsiswa;
    
    function getJumlahsiswa() {
        return $this->jumlahsiswa;
    }

    function setJumlahsiswa($jumlahsiswa) {
        $this->jumlahsiswa = $jumlahsiswa;
    }

    function getKelasid() {
        return $this->kelasid;
    }

    function getNamakelas() {
        return $this->namakelas;
    }

    function getClasslevel() {
        return $this->classlevel;
    }

    function getTeacherid() {
        return $this->teacherid;
    }

    function getTeacher() {
        return $this->teacher;
    }

    function getPeriodeid() {
        return $this->periodeid;
    }

    function getPeriode() {
        return $this->periode;
    }

    function setKelasid($kelasid) {
        $this->kelasid = $kelasid;
    }

    function setNamakelas($namakelas) {
        $this->namakelas = $namakelas;
    }

    function setClasslevel($classlevel) {
        $this->classlevel = $classlevel;
    }

    function setTeacherid($teacherid) {
        $this->teacherid = $teacherid;
    }

    function setTeacher($teacher) {
        $this->teacher = $teacher;
    }

    function setPeriodeid($periodeid) {
        $this->periodeid = $periodeid;
    }

    function setPeriode($periode) {
        $this->periode = $periode;
    }
}
