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
    private $deskripsiekskul;
    private $jammulai;
    private $jamselesai;
    private $hari;
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

    function getDeskripsiekskul() {
        return $this->deskripsiekskul;
    }

    function getJammulai() {
        
        return date_format(date_create($this->jammulai), 'H:i');;
    }

    function getJamselesai() {
        return date_format(date_create($this->jamselesai), 'H:i');;
    }

    function getHari() {
        return $this->hari;
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

    function setDeskripsiekskul($deskripsiekskul) {
        $this->deskripsiekskul = $deskripsiekskul;
    }

    function setJammulai($jammulai) {
        $this->jammulai = $jammulai;
    }

    function setJamselesai($jamselesai) {
        $this->jamselesai = $jamselesai;
    }

    function setHari($hari) {
        $this->hari = $hari;
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
