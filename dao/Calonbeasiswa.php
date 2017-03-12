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
    
    private $bobotjarak;
    private $bobotjaraknormalisasi;
    private $bobotsaudara;
    private $bobotsaudaranormalisasi;
    private $bobotnilai;
    private $bobotnilainormalisasi;
    private $bobotgaji;
    private $bobotgajinormalisasi;
    
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

    function getBobotjarak() {
        return $this->bobotjarak;
    }

    function getBobotjaraknormalisasi() {
        return $this->bobotjaraknormalisasi;
    }

    function getBobotsaudara() {
        return $this->bobotsaudara;
    }

    function getBobotsaudaranormalisasi() {
        return $this->bobotsaudaranormalisasi;
    }

    function getBobotnilai() {
        return $this->bobotnilai;
    }

    function getBobotnilainormalisasi() {
        return $this->bobotnilainormalisasi;
    }

    function getBobotgaji() {
        return $this->bobotgaji;
    }

    function getBobotgajinormalisasi() {
        return $this->bobotgajinormalisasi;
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

    function setBobotjarak($bobotjarak) {
        $this->bobotjarak = $bobotjarak;
    }

    function setBobotjaraknormalisasi($bobotjaraknormalisasi) {
        $this->bobotjaraknormalisasi = $bobotjaraknormalisasi;
    }

    function setBobotsaudara($bobotsaudara) {
        $this->bobotsaudara = $bobotsaudara;
    }

    function setBobotsaudaranormalisasi($bobotsaudaranormalisasi) {
        $this->bobotsaudaranormalisasi = $bobotsaudaranormalisasi;
    }

    function setBobotnilai($bobotnilai) {
        $this->bobotnilai = $bobotnilai;
    }

    function setBobotnilainormalisasi($bobotnilainormalisasi) {
        $this->bobotnilainormalisasi = $bobotnilainormalisasi;
    }

    function setBobotgaji($bobotgaji) {
        $this->bobotgaji = $bobotgaji;
    }

    function setBobotgajinormalisasi($bobotgajinormalisasi) {
        $this->bobotgajinormalisasi = $bobotgajinormalisasi;
    }
}
