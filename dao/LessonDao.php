<?php
include_once 'Lesson.php';

class LessonDao {
    public function get_lesson_row($row)
    {
        $lesson = new Lesson();
        $lesson ->setLessonid($row['lessonid']);
        $lesson ->setLessonname($row['lessonname']);
        $lesson ->setMinimumscore($row['minimumscore']);
        $lesson ->setClasslevel($row['classlevel']);
        $lesson ->setStatus($row['status']);
        
        return $lesson;
    }
    
    public function get_lesson_by_class($classlevel)
    {
        $lessons = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from lesson
                      WHERE classlevel = ?
                      AND status = 1
                      ORDER BY lessonname";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $classlevel);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $lesson = $this ->get_lesson_row($row);
                    $lessons->append($lesson);
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
        return $lessons;
    }
    
    public function get_one_lesson($lessonid)
    {
        $lesson = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM lesson 
                    WHERE lessonid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $lessonid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $lesson = $this->get_lesson_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $lesson;
    }
    
    public function insert_lesson($lesson)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO lesson(lessonname,minimumscore,classlevel)  
                    VALUES(?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $lesson ->getLessonname());
            $stmt -> bindValue(2, $lesson ->getMinimumscore());
            $stmt -> bindValue(3, $lesson ->getClasslevel());
            
            $result = $stmt -> execute();
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
    
    public function update_lesson($lesson)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE lesson  
                    SET 
                        lessonname = ?,
                        minimumscore = ?,
                        classlevel = ?
                    WHERE lessonid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $lesson ->getLessonname());
            $stmt -> bindValue(2, $lesson ->getMinimumscore());
            $stmt -> bindValue(3, $lesson ->getClasslevel());
            $stmt -> bindValue(4, $lesson ->getLessonid());
            
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
    
    public function update_status($status, $lessonid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE lesson  
                    SET 
                        status = ?
                    WHERE lessonid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $status );
            $stmt -> bindValue(2, $lessonid );
            
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
?>