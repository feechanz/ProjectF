<?php
class Lesson
{
    private $lessonid;
    private $lessonname;
    private $minimumscore;
    private $classlevel;
    private $status;
    
    function getLessonid() {
        return $this->lessonid;
    }

    function getLessonname() {
        return $this->lessonname;
    }

    function getMinimumscore() {
        return $this->minimumscore;
    }

    function getClasslevel() {
        return $this->classlevel;
    }

    function getStatus() {
        return $this->status;
    }

    function setLessonid($lessonid) {
        $this->lessonid = $lessonid;
    }

    function setLessonname($lessonname) {
        $this->lessonname = $lessonname;
    }

    function setMinimumscore($minimumscore) {
        $this->minimumscore = $minimumscore;
    }

    function setClasslevel($classlevel) {
        $this->classlevel = $classlevel;
    }

    function setStatus($status) {
        $this->status = $status;
    }
}
?>