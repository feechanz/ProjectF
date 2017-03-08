<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News
 *
 * @author Fenita
 */
class News {
    //put your code here
    private $newsid;
    private $newsname;
    private $newsdescription;
    private $news;
    private $category;
    private $createdate;
    
    function getNewsid() {
        return $this->newsid;
    }

    function getNewsname() {
        return $this->newsname;
    }

    function getNewsdescription() {
        return $this->newsdescription;
    }

    function getNews() {
        return $this->news;
    }

    function getCategory() {
        return $this->category;
    }

    function getCreatedate() {
        //$date = date_create('2000-01-01');
        return date_format(date_create($this->createdate), 'd-m-Y');
    }

    function setNewsid($newsid) {
        $this->newsid = $newsid;
    }

    function setNewsname($newsname) {
        $this->newsname = $newsname;
    }

    function setNewsdescription($newsdescription) {
        $this->newsdescription = $newsdescription;
    }

    function setNews($news) {
        $this->news = $news;
    }

    function setCategory($category) {
        $this->category = $category;
    }

    function setCreatedate($createdate) {
        $this->createdate = $createdate;
    }
}
