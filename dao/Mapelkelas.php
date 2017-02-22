<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mapelkelas
 *
 * @author Feechan
 */
class Mapelkelas {
    //put your code here
    private $mapelkelasid;
    private $lessonid;
    private $lesson;
    private $lessonname;
    private $minimumscore;
    private $teacherid;
    private $teacher;
    private $kelasid;
    private $kelas;
    private $createdate;
    
    function getMapelkelasid() {
        return $this->mapelkelasid;
    }

    function getLessonid() {
        return $this->lessonid;
    }

    function getLesson() {
        return $this->lesson;
    }

    function getLessonname() {
        return $this->lessonname;
    }

    function getMinimumscore() {
        return $this->minimumscore;
    }

    function getTeacherid() {
        return $this->teacherid;
    }

    function getTeacher() {
        return $this->teacher;
    }

    function getKelasid() {
        return $this->kelasid;
    }

    function getKelas() {
        return $this->kelas;
    }

    function getCreatedate() {
        return $this->createdate;
    }

    function setMapelkelasid($mapelkelasid) {
        $this->mapelkelasid = $mapelkelasid;
    }

    function setLessonid($lessonid) {
        $this->lessonid = $lessonid;
    }

    function setLesson($lesson) {
        $this->lesson = $lesson;
    }

    function setLessonname($lessonname) {
        $this->lessonname = $lessonname;
    }

    function setMinimumscore($minimumscore) {
        $this->minimumscore = $minimumscore;
    }

    function setTeacherid($teacherid) {
        $this->teacherid = $teacherid;
    }

    function setTeacher($teacher) {
        $this->teacher = $teacher;
    }

    function setKelasid($kelasid) {
        $this->kelasid = $kelasid;
    }

    function setKelas($kelas) {
        $this->kelas = $kelas;
    }

    function setCreatedate($createdate) {
        $this->createdate = $createdate;
    }
}
