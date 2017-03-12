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
    private $bobotjarakkriteria;
    private $bobotsaudara;
    private $bobotsaudaranormalisasi;
    private $bobotsaudarakriteria;
    private $bobotnilai;
    private $bobotnilainormalisasi;
    private $bobotnilaikriteria;
    private $bobotgaji;
    private $bobotgajinormalisasi;
    private $bobotgajikriteria;
    
    private $totalbobot;
    
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

    function getBobotjarakkriteria() {
        return $this->bobotjarakkriteria;
    }

    function getBobotsaudara() {
        return $this->bobotsaudara;
    }

    function getBobotsaudaranormalisasi() {
        return $this->bobotsaudaranormalisasi;
    }

    function getBobotsaudarakriteria() {
        return $this->bobotsaudarakriteria;
    }

    function getBobotnilai() {
        return $this->bobotnilai;
    }

    function getBobotnilainormalisasi() {
        return $this->bobotnilainormalisasi;
    }

    function getBobotnilaikriteria() {
        return $this->bobotnilaikriteria;
    }

    function getBobotgaji() {
        return $this->bobotgaji;
    }

    function getBobotgajinormalisasi() {
        return $this->bobotgajinormalisasi;
    }

    function getBobotgajikriteria() {
        return $this->bobotgajikriteria;
    }

    function getTotalbobot() {
        return $this->totalbobot;
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

    function setBobotjarakkriteria($bobotjarakkriteria) {
        $this->bobotjarakkriteria = $bobotjarakkriteria;
    }

    function setBobotsaudara($bobotsaudara) {
        $this->bobotsaudara = $bobotsaudara;
    }

    function setBobotsaudaranormalisasi($bobotsaudaranormalisasi) {
        $this->bobotsaudaranormalisasi = $bobotsaudaranormalisasi;
    }

    function setBobotsaudarakriteria($bobotsaudarakriteria) {
        $this->bobotsaudarakriteria = $bobotsaudarakriteria;
    }

    function setBobotnilai($bobotnilai) {
        $this->bobotnilai = $bobotnilai;
    }

    function setBobotnilainormalisasi($bobotnilainormalisasi) {
        $this->bobotnilainormalisasi = $bobotnilainormalisasi;
    }

    function setBobotnilaikriteria($bobotnilaikriteria) {
        $this->bobotnilaikriteria = $bobotnilaikriteria;
    }

    function setBobotgaji($bobotgaji) {
        $this->bobotgaji = $bobotgaji;
    }

    function setBobotgajinormalisasi($bobotgajinormalisasi) {
        $this->bobotgajinormalisasi = $bobotgajinormalisasi;
    }

    function setBobotgajikriteria($bobotgajikriteria) {
        $this->bobotgajikriteria = $bobotgajikriteria;
    }

    function setTotalbobot($totalbobot) {
        $this->totalbobot = $totalbobot;
    }
}
