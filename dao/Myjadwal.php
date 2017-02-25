<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Myjadwal
 *
 * @author Feechan
 */
class Myjadwal {
    //put your code here
    private $jadwalpelajaranid;
    private $mapelkelasid;
    private $slotjadwalid;
    private $hari;
    private $awal;
    private $akhir;
    private $kelasid;
    private $kelas;
    private $teacherid;
    private $teacher;
    private $lessonid;
    private $lesson;
    private $periodeid;
    private $createdate;
    
    function getJadwalpelajaranid() {
        return $this->jadwalpelajaranid;
    }

    function getMapelkelasid() {
        return $this->mapelkelasid;
    }

    function getSlotjadwalid() {
        return $this->slotjadwalid;
    }

    function getHari() {
        return $this->hari;
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

    function getTeacherid() {
        return $this->teacherid;
    }

    function getTeacher() {
        return $this->teacher;
    }

    function getLessonid() {
        return $this->lessonid;
    }

    function getLesson() {
        return $this->lesson;
    }

    function getPeriodeid() {
        return $this->periodeid;
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

    function setSlotjadwalid($slotjadwalid) {
        $this->slotjadwalid = $slotjadwalid;
    }

    function setHari($hari) {
        $this->hari = $hari;
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

    function setTeacherid($teacherid) {
        $this->teacherid = $teacherid;
    }

    function setTeacher($teacher) {
        $this->teacher = $teacher;
    }

    function setLessonid($lessonid) {
        $this->lessonid = $lessonid;
    }

    function setLesson($lesson) {
        $this->lesson = $lesson;
    }

    function setPeriodeid($periodeid) {
        $this->periodeid = $periodeid;
    }

    function setCreatedate($createdate) {
        $this->createdate = $createdate;
    }    
}
