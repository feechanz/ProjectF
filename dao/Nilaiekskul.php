<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nilaiekskul
 *
 * @author Fenita
 */
class Nilaiekskul {
    //put your code here
    private $nilaiekskulid;
    private $studentid;
    private $student;
    private $ekskulid;
    private $ekskul;
    private $nilaimutu;
    
    function getNilaiekskulid() {
        return $this->nilaiekskulid;
    }

    function getStudentid() {
        return $this->studentid;
    }

    function getStudent() {
        return $this->student;
    }

    function getEkskulid() {
        return $this->ekskulid;
    }

    function getEkskul() {
        return $this->ekskul;
    }

    function getNilaimutu() {
        return $this->nilaimutu;
    }

    function setNilaiekskulid($nilaiekskulid) {
        $this->nilaiekskulid = $nilaiekskulid;
    }

    function setStudentid($studentid) {
        $this->studentid = $studentid;
    }

    function setStudent($student) {
        $this->student = $student;
    }

    function setEkskulid($ekskulid) {
        $this->ekskulid = $ekskulid;
    }

    function setEkskul($ekskul) {
        $this->ekskul = $ekskul;
    }

    function setNilaimutu($nilaimutu) {
        $this->nilaimutu = $nilaimutu;
    }
}
