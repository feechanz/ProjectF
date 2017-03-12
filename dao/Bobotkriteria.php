<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bobotkriteria
 *
 * @author Fenita
 */
class Bobotkriteria {
    //put your code here
    private $bobotkriteriaid;
    private $idkriteria;
    private $namakriteria;
    private $bobot;
    
    function getBobotkriteriaid() {
        return $this->bobotkriteriaid;
    }

    function getIdkriteria() {
        return $this->idkriteria;
    }

    function getNamakriteria() {
        return $this->namakriteria;
    }

    function getBobot() {
        return $this->bobot;
    }

    function setBobotkriteriaid($bobotkriteriaid) {
        $this->bobotkriteriaid = $bobotkriteriaid;
    }

    function setIdkriteria($idkriteria) {
        $this->idkriteria = $idkriteria;
    }

    function setNamakriteria($namakriteria) {
        $this->namakriteria = $namakriteria;
    }

    function setBobot($bobot) {
        $this->bobot = $bobot;
    }
}
