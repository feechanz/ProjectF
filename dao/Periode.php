<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Periode
 *
 * @author Fenita
 */
class Periode 
{
    //put your code here
    private $periodeid;
    private $periodename;
    private $status;
    private $datecreated;
    
    function getPeriodeid() {
        return $this->periodeid;
    }

    function getPeriodename() {
        return $this->periodename;
    }

    function getStatus() {
        return $this->status;
    }

    function getDatecreated() {
        return $this->datecreated;
    }

    function setPeriodeid($periodeid) {
        $this->periodeid = $periodeid;
    }

    function setPeriodename($periodename) {
        $this->periodename = $periodename;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setDatecreated($datecreated) {
        $this->datecreated = $datecreated;
    }
}


?>