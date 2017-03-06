<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nilai
 *
 * @author Fenita
 */
class Nilai {
    private $nilaiid;
    private $uts_ulangan1;
    private $uts_ulangan2;
    private $uts_ulangan3;
    private $uts_ulangan4;
    private $uts_ulangan5;
    
    private $uts_quiz1;
    private $uts_quiz2;
    private $uts_quiz3;
    private $uts_quiz4;
    private $uts_quiz5;
    
    private $uts;
    
    private $uas_ulangan1;
    private $uas_ulangan2;
    private $uas_ulangan3;
    private $uas_ulangan4;
    private $uas_ulangan5;
    
    private $uas_quiz1;
    private $uas_quiz2;
    private $uas_quiz3;
    private $uas_quiz4;
    private $uas_quiz5;
    
    private $uas;
    
    private $mapelkelasid;
    private $mapelkelas;
    
    private $studentid;
    private $student;
    
    function getNilaiid() {
        return $this->nilaiid;
    }

    function getUts_ulangan1() {
        return $this->uts_ulangan1;
    }

    function getUts_ulangan2() {
        return $this->uts_ulangan2;
    }

    function getUts_ulangan3() {
        return $this->uts_ulangan3;
    }

    function getUts_ulangan4() {
        return $this->uts_ulangan4;
    }

    function getUts_ulangan5() {
        return $this->uts_ulangan5;
    }

    function getUts_quiz1() {
        return $this->uts_quiz1;
    }

    function getUts_quiz2() {
        return $this->uts_quiz2;
    }

    function getUts_quiz3() {
        return $this->uts_quiz3;
    }

    function getUts_quiz4() {
        return $this->uts_quiz4;
    }

    function getUts_quiz5() {
        return $this->uts_quiz5;
    }

    function getUts() {
        return $this->uts;
    }

    function getUas_ulangan1() {
        return $this->uas_ulangan1;
    }

    function getUas_ulangan2() {
        return $this->uas_ulangan2;
    }

    function getUas_ulangan3() {
        return $this->uas_ulangan3;
    }

    function getUas_ulangan4() {
        return $this->uas_ulangan4;
    }

    function getUas_ulangan5() {
        return $this->uas_ulangan5;
    }

    function getUas_quiz1() {
        return $this->uas_quiz1;
    }

    function getUas_quiz2() {
        return $this->uas_quiz2;
    }

    function getUas_quiz3() {
        return $this->uas_quiz3;
    }

    function getUas_quiz4() {
        return $this->uas_quiz4;
    }

    function getUas_quiz5() {
        return $this->uas_quiz5;
    }

    function getUas() {
        return $this->uas;
    }

    function getMapelkelasid() {
        return $this->mapelkelasid;
    }

    function getMapelkelas() {
        return $this->mapelkelas;
    }

    function getStudentid() {
        return $this->studentid;
    }

    function getStudent() {
        return $this->student;
    }

    function setNilaiid($nilaiid) {
        if(isset($nilaiid) && $nilaiid != "")
            $this->nilaiid = $nilaiid;
    }

    function setUts_ulangan1($uts_ulangan1) {
        if(isset($uts_ulangan1) && $uts_ulangan1 != "")
            $this->uts_ulangan1 = $uts_ulangan1;
    }

    function setUts_ulangan2($uts_ulangan2) {
        if(isset($uts_ulangan2) && $uts_ulangan2 != "")
            $this->uts_ulangan2 = $uts_ulangan2;
    }

    function setUts_ulangan3($uts_ulangan3) {
        if(isset($uts_ulangan3) && $uts_ulangan3 != "")
            $this->uts_ulangan3 = $uts_ulangan3;
    }

    function setUts_ulangan4($uts_ulangan4) {
        if(isset($uts_ulangan4) && $uts_ulangan4 != "")
            $this->uts_ulangan4 = $uts_ulangan4;
    }

    function setUts_ulangan5($uts_ulangan5) {
        if(isset($uts_ulangan5) && $uts_ulangan5 != "")
            $this->uts_ulangan5 = $uts_ulangan5;
    }

    function setUts_quiz1($uts_quiz1) {
        if(isset($uts_quiz1) && $uts_quiz1 != "")
            $this->uts_quiz1 = $uts_quiz1;
    }

    function setUts_quiz2($uts_quiz2) {
        if(isset($uts_quiz2) && $uts_quiz2 != "")
            $this->uts_quiz2 = $uts_quiz2;
    }

    function setUts_quiz3($uts_quiz3) {
        if(isset($uts_quiz3) && $uts_quiz3 != "")
            $this->uts_quiz3 = $uts_quiz3;
    }

    function setUts_quiz4($uts_quiz4) {
        if(isset($uts_quiz4) && $uts_quiz4 != "")
            $this->uts_quiz4 = $uts_quiz4;
    }

    function setUts_quiz5($uts_quiz5) {
        if(isset($uts_quiz5) && $uts_quiz5 != "")
            $this->uts_quiz5 = $uts_quiz5;
    }

    function setUts($uts) {
        if(isset($uts) && $uts != "")
            $this->uts = $uts;
    }

    function setUas_ulangan1($uas_ulangan1) {
        if(isset($uas_ulangan1) && $uas_ulangan1 != "")
            $this->uas_ulangan1 = $uas_ulangan1;
    }

    function setUas_ulangan2($uas_ulangan2) {
        if(isset($uas_ulangan2) && $uas_ulangan2 != "")
            $this->uas_ulangan2 = $uas_ulangan2;
    }

    function setUas_ulangan3($uas_ulangan3) {
        if(isset($uas_ulangan3) && $uas_ulangan3 != "")
            $this->uas_ulangan3 = $uas_ulangan3;
    }

    function setUas_ulangan4($uas_ulangan4) {
        if(isset($uas_ulangan4) && $uas_ulangan4 != "")
            $this->uas_ulangan4 = $uas_ulangan4;
    }

    function setUas_ulangan5($uas_ulangan5) {
        if(isset($uas_ulangan5) && $uas_ulangan5 != "")
            $this->uas_ulangan5 = $uas_ulangan5;
    }

    function setUas_quiz1($uas_quiz1) {
        if(isset($uas_quiz1) && $uas_quiz1 != "")
            $this->uas_quiz1 = $uas_quiz1;
    }

    function setUas_quiz2($uas_quiz2) {
        if(isset($uas_quiz2) && $uas_quiz2 != "")
            $this->uas_quiz2 = $uas_quiz2;
    }

    function setUas_quiz3($uas_quiz3) {
        if(isset($uas_quiz3) && $uas_quiz3 != "")
            $this->uas_quiz3 = $uas_quiz3;
    }

    function setUas_quiz4($uas_quiz4) {
        if(isset($uas_quiz4) && $uas_quiz4 != "")
            $this->uas_quiz4 = $uas_quiz4;
    }

    function setUas_quiz5($uas_quiz5) {
        if(isset($uas_quiz5) && $uas_quiz5 != "")
            $this->uas_quiz5 = $uas_quiz5;
    }

    function setUas($uas) {
        if(isset($uas) && $uas != "")
            $this->uas = $uas;
    }

    function setMapelkelasid($mapelkelasid) {
        $this->mapelkelasid = $mapelkelasid;
    }

    function setMapelkelas($mapelkelas) {
        $this->mapelkelas = $mapelkelas;
    }

    function setStudentid($studentid) {
        $this->studentid = $studentid;
    }

    function setStudent($student) {
        $this->student = $student;
    }    
    //put your code here
}
