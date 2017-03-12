<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bobotjarak
 *
 * @author Fenita
 */
class Bobotjarak {
    //put your code here
    private $bobotjarakid;
    private $batasjarakbawah;
    private $bobot;
    
    function getBobotjarakid() {
        return $this->bobotjarakid;
    }

    function getBatasjarakbawah() {
        return $this->batasjarakbawah;
    }

    function getBobot() {
        return $this->bobot;
    }

    function setBobotjarakid($bobotjarakid) {
        $this->bobotjarakid = $bobotjarakid;
    }

    function setBatasjarakbawah($batasjarakbawah) {
        $this->batasjarakbawah = $batasjarakbawah;
    }

    function setBobot($bobot) {
        $this->bobot = $bobot;
    }
}
