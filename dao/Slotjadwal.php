<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Slotjadwal
 *
 * @author Feechan
 */
class Slotjadwal {
    //put your code here
    private $slotjadwalid;
    private $awal;
    private $akhir;
    private $kelasid;
    private $kelas;
    
    function getSlotjadwalid() {
        return $this->slotjadwalid;
    }

    function getAwal() {
        return date_format(date_create($this->awal), 'H:i');
    }

    function getAkhir() {
        return date_format(date_create($this->akhir), 'H:i');
    }

    function getKelasid() {
        return $this->kelasid;
    }

    function getKelas() {
        return $this->kelas;
    }

    function setSlotjadwalid($slotjadwalid) {
        $this->slotjadwalid = $slotjadwalid;
    }

    function setAwal($awal) {
        $this->awal = $awal;
    }

    function setAkhir($akhir) {
        $this->akhir = $akhir;
    }

    function setKelasid($kelasid) {
        $this->kelasid = $kelasid;
    }

    function setKelas($kelas) {
        $this->kelas = $kelas;
    }
}
