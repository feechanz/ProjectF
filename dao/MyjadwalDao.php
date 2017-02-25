<?php
include_once 'Myjadwal.php';
include_once 'KelasDao.php';
include_once 'TeacherDao.php';
include_once 'LessonDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyjadwalDao
 *
 * @author Feechan
 */
class MyjadwalDao {
    //put your code here
    public function get_myjadwal_row($row)
    {
        $myjadwal = new Myjadwal();
        $myjadwal ->setJadwalpelajaranid($row['jadwalpelajaranid']);
        $myjadwal ->setMapelkelasid($row['mapelkelasid']);
        $myjadwal ->setSlotjadwalid($row['slotjadwalid']);
        $myjadwal ->setHari($row['hari']);
        $myjadwal ->setAwal($row['awal']);
        $myjadwal ->setAkhir($row['akhir']);
        
        $kelasid = $row['kelasid'];
        $kelasdao = new KelasDao();
        $kelas = $kelasdao->get_one_kelasid($kelasid);
        
        $myjadwal ->setKelasid($kelasid);
        $myjadwal ->setKelas($kelas);
        
        $teacherid = $row['teacherid'];
        $teacherdao = new TeacherDao();
        $teacher = $teacherdao ->get_one_teacher($teacherid);
        
        $myjadwal ->setTeacherid($teacherid);
        $myjadwal ->setTeacher($teacher);
        
        $lessonid = $row['lessonid'];
        $lessondao = new LessonDao();
        $lesson = $lessondao ->get_one_lesson($lessonid);
        
        $myjadwal ->setLessonid($lessonid);
        $myjadwal ->setLesson($lesson);
        
        $myjadwal ->setPeriodeid($row['periodeid']);
        $myjadwal ->setCreatedate($row['createdate']);
        
        return $myjadwal;
    }
    
    public function get_myjadwal($teacherid, $periodeid)
    {
        $myjadwals = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT jp.jadwalpelajaranid as jadwalpelajaranid, jp.mapelkelasid as mapelkelasid, jp.slotjadwalid as slotjadwalid,
                         jp.hari as hari, jp.createdate as createdate, sj.awal as awal, sj.akhir as akhir, sj.kelasid as kelasid, 
                         mk.teacherid as teacherid, mk.lessonid as lessonid, k.periodeid as periodeid
                    FROM jadwalpelajaran jp
                    JOIN slotjadwal sj
                    ON jp.slotjadwalid = sj.slotjadwalid
                    JOIN mapelkelas mk
                    ON jp.mapelkelasid = mk.mapelkelasid
                    JOIN kelas k
                    ON sj.kelasid = k.kelasid
                    WHERE k.periodeid = 3
                    AND mk.teacherid = 5";
            
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $periodeid);
            $stmt -> bindValue(2, $teacherid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $myjadwal = $this ->get_myjadwal_row($row);
                    $myjadwals->append($myjadwal);
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
        return $myjadwals;
    }
}
