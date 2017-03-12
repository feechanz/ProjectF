<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bobotsaudara
 *
 * @author Fenita
 */
class Bobotsaudara {
    //put your code here
    private $bobotsaudaraid;
    private $batasjumlahbawah;
    private $bobot;
    
    function getBobotsaudaraid() {
        return $this->bobotsaudaraid;
    }

    function getBatasjumlahbawah() {
        return $this->batasjumlahbawah;
    }

    function getBobot() {
        return $this->bobot;
    }

    function setBobotsaudaraid($bobotsaudaraid) {
        $this->bobotsaudaraid = $bobotsaudaraid;
    }

    function setBatasjumlahbawah($batasjumlahbawah) {
        $this->batasjumlahbawah = $batasjumlahbawah;
    }

    function setBobot($bobot) {
        $this->bobot = $bobot;
    }
}
