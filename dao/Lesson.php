<?php
class Lesson
{
    private $lessonid;
    private $lessonname;
    private $minimumscore;
    private $ulanganpct;
    private $quizpct;
    private $ujianpct;
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

    function getUlanganpct() {
        return $this->ulanganpct;
    }

    function getQuizpct() {
        return $this->quizpct;
    }

    function getUjianpct() {
        return $this->ujianpct;
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

    function setUlanganpct($ulanganpct) {
        $this->ulanganpct = $ulanganpct;
    }

    function setQuizpct($quizpct) {
        $this->quizpct = $quizpct;
    }

    function setUjianpct($ujianpct) {
        $this->ujianpct = $ujianpct;
    }

    function setClasslevel($classlevel) {
        $this->classlevel = $classlevel;
    }

    function setStatus($status) {
        $this->status = $status;
    }
}
?>