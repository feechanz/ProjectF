<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jadwalpelajaran
 *
 * @author Fenita
 */
class Jadwalpelajaran {
    //put your code here
    private $jadwalpelajaranid;
    private $mapelkelasid;
    private $mapelkelas;
    private $slotjadwalid;
    private $slotjadwal;
    private $hari;
    private $createdate;
    
    function getJadwalpelajaranid() {
        return $this->jadwalpelajaranid;
    }

    function getMapelkelasid() {
        return $this->mapelkelasid;
    }

    function getMapelkelas() {
        return $this->mapelkelas;
    }

    function getSlotjadwalid() {
        return $this->slotjadwalid;
    }

    function getSlotjadwal() {
        return $this->slotjadwal;
    }

    function getHari() {
        return $this->hari;
    }

    function getCreatedate() {
        return $this->createdate;
    }

    function setJadwalpelajaranid($jadwalpelajaranid) {
        $this->jadwalpelajaranid = $jadwalpelajaranid;
    }

    function setMapelkelasid($mapelkelasid) {
        $this->mapelkelasid = $mapelkelasid;
    }

    function setMapelkelas($mapelkelas) {
        $this->mapelkelas = $mapelkelas;
    }

    function setSlotjadwalid($slotjadwalid) {
        $this->slotjadwalid = $slotjadwalid;
    }

    function setSlotjadwal($slotjadwal) {
        $this->slotjadwal = $slotjadwal;
    }

    function setHari($hari) {
        $this->hari = $hari;
    }

    function setCreatedate($createdate) {
        $this->createdate = $createdate;
    }
}
