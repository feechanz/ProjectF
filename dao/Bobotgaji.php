<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bobotgaji
 *
 * @author Fenita
 */
class Bobotgaji {
    //put your code here
    private $bobotgajiid;
    private $batasgajibawah;
    private $bobot;
    
    function getBobotgajiid() {
        return $this->bobotgajiid;
    }

    function getBatasgajibawah() {
        return $this->batasgajibawah;
    }

    function getBobot() {
        return $this->bobot;
    }

    function setBobotgajiid($bobotgajiid) {
        $this->bobotgajiid = $bobotgajiid;
    }

    function setBatasgajibawah($batasgajibawah) {
        $this->batasgajibawah = $batasgajibawah;
    }

    function setBobot($bobot) {
        $this->bobot = $bobot;
    }
}
