<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ekskul
 *
 * @author Fenita
 */
class Ekskul {
    //put your code here
    private $ekskulid;
    private $namaekskul;
    private $periodeid;
    private $periode;
    private $teacherid;
    private $teacher;
    
    function getEkskulid() {
        return $this->ekskulid;
    }

    function getNamaekskul() {
        return $this->namaekskul;
    }

    function getPeriodeid() {
        return $this->periodeid;
    }

    function getPeriode() {
        return $this->periode;
    }

    function getTeacherid() {
        return $this->teacherid;
    }

    function getTeacher() {
        return $this->teacher;
    }

    function setEkskulid($ekskulid) {
        $this->ekskulid = $ekskulid;
    }

    function setNamaekskul($namaekskul) {
        $this->namaekskul = $namaekskul;
    }

    function setPeriodeid($periodeid) {
        $this->periodeid = $periodeid;
    }

    function setPeriode($periode) {
        $this->periode = $periode;
    }

    function setTeacherid($teacherid) {
        $this->teacherid = $teacherid;
    }

    function setTeacher($teacher) {
        $this->teacher = $teacher;
    }
}
