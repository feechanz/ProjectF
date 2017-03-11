<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Calonbeasiswa
 *
 * @author Fenita
 */
class Calonbeasiswa {
    //put your code here
    private $nama;
    private $kelas;
    private $jarakrumah;
    private $jumlahsaudara;
    private $nilairatarata;
    private $gajiorangtua;
    
    function getNama() {
        return $this->nama;
    }

    function getKelas() {
        return $this->kelas;
    }

    function getJarakrumah() {
        return $this->jarakrumah;
    }

    function getJumlahsaudara() {
        return $this->jumlahsaudara;
    }

    function getNilairatarata() {
        return $this->nilairatarata;
    }

    function getGajiorangtua() {
        return $this->gajiorangtua;
    }

    function setNama($nama) {
        $this->nama = $nama;
    }

    function setKelas($kelas) {
        $this->kelas = $kelas;
    }

    function setJarakrumah($jarakrumah) {
        $this->jarakrumah = $jarakrumah;
    }

    function setJumlahsaudara($jumlahsaudara) {
        $this->jumlahsaudara = $jumlahsaudara;
    }

    function setNilairatarata($nilairatarata) {
        $this->nilairatarata = $nilairatarata;
    }

    function setGajiorangtua($gajiorangtua) {
        $this->gajiorangtua = $gajiorangtua;
    }
}
