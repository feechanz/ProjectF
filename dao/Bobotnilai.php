<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bobotnilai
 *
 * @author Fenita
 */
class Bobotnilai {
    //put your code here
    private $bobotnilaiid;
    private $batasnilaiatas;
    private $bobot;
    
    function getBobotnilaiid() {
        return $this->bobotnilaiid;
    }

    function getBatasnilaiatas() {
        return $this->batasnilaiatas;
    }

    function getBobot() {
        return $this->bobot;
    }

    function setBobotnilaiid($bobotnilaiid) {
        $this->bobotnilaiid = $bobotnilaiid;
    }

    function setBatasnilaiatas($batasnilaiatas) {
        $this->batasnilaiatas = $batasnilaiatas;
    }

    function setBobot($bobot) {
        $this->bobot = $bobot;
    }
}
