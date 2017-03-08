<?php
include_once 'News.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsDao
 *
 * @author Fenita
 */
class NewsDao {
    //put your code here
    public function get_news_row($row)
    {
        $news = new News();
        $news ->setNewsid($row['newsid']);
        $news ->setNewsname($row['newsname']);
        $news ->setNewsdescription($row['newsdescription']);
        $news ->setNews($row['news']);
        $news ->setCategory($row['category']);
        $news ->setCreatedate($row['createdate']);  
        
        return $news;
    }
    
    public function get_one_news($newsid)
    {
        $news = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM news 
                    WHERE newsid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $newsid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $news = $this->get_news_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $news;
    }
    
    public function get_news()
    {
        $newss = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * 
                     FROM news
                     ORDER BY createdate DESC";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $news = $this ->get_news_row($row);
                    $newss->append($news);
                }
            }
        } 
        catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        try {
            if (!empty($conn) || $conn != null) {
                $conn = null;
            }
        } catch (PDOException $e) {
            echo $e -> getMessage();
        }
        return $newss;
    }
    
    public function insert_news($news)
    {
        $result = 0;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO news(newsname,newsdescription,news,category)  
                    VALUES(?,?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $news ->getNewsname());
            $stmt -> bindValue(2, $news ->getNewsdescription());
            $stmt -> bindValue(3, $news ->getNews());
            $stmt -> bindValue(4, $news ->getCategory());
            
            $stmt -> execute();
            $result = $conn ->lastInsertId();
            $conn -> commit();
            
            
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
            $stmt -> rollBacxk();
            die();
        }
        try
        {
            if(!empty($conn) || $conn != null)
            {
                $conn = null;
            }
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
        }
        return $result;	
    }
    
    
    public function update_news($news, $newsid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE news  
                    SET 
                        newsname = ?,
                        newsdescription = ?,
                        news = ?,
                        category = ?
                    WHERE newsid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $news -> getNewsname() );
            $stmt -> bindValue(2, $news -> getNewsdescription() );
            $stmt -> bindValue(3, $news -> getNews() );
            $stmt -> bindValue(4, $news -> getCategory() );
            $stmt -> bindValue(5, $newsid);
            
            $result = $stmt -> execute();
            $conn -> commit();
        } catch (PDOException $e) {
            echo $e -> getMessage();
            $conn -> rollBack();
            die();
        }
        $conn = null;
        return $result;	
    }
}
