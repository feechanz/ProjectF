<?php
    if(isset($_GET['newsid']))
    {
        $newsid = $_GET['newsid'];
        $news = $newsdao->get_one_news($newsid);
    
        if(isset($_POST['submit']))
        {
            $newsid = $_POST['newsid'];
            $newsname = $_POST['newsname'];
            $newsdescription = $_POST['newsdescription'];
            $news_isi = $_POST['news'];
            $category = $_POST['category'];

            $news = new News();
            $news ->setNewsid($newsid);
            $news ->setNewsname($newsname);
            $news ->setNewsdescription($newsdescription);
            $news ->setNews($news_isi);
            $news ->setCategory($category);

            if($newsdao->update_news($news,$newsid))
            {
                echo "<script>alert('Berita baru telah berhasil disimpan!');</script>";
                echo "<script>window.location='index.php?page=setting_news'; </script>";
            }
            else
            {
                echo "<script>alert('Berita baru gagal disimpan!');</script>";
            }
        }
    }
?>
<style>
    .btn
    {
        margin-left: 2px;
    }
    th,td
    {
        border:2px solid brown;
        text-align: center;
        
    }
    
    th
    {
        background: gray;
        color : white;
        font: bold 12px/30px Georgia, serif;
    }
    form
    {
        text-align: center;
    }
    input
    {
        text-align: center;
    }
</style>
<script type="text/javascript" src="js/function.js"></script>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    
                    <h2 class="style" align="center"><?php echo $news->getNewsname()." ".$news->getCreatedate();?></h2>
                    
                    <form method="post" action="" >
                      
                        
                        <div style="background-color: lightyellow;">
                            <input type="hidden" name="newsid" value="<?php echo $news->getNewsid();?>"/>
                            <span><label><h3>Berita <?php echo $news->getNewsdescription();?></h3></label></span>
                            <span><label>Nama Berita</label></span>
                            <span><input name="newsname" type="text" class="textbox" required style="text-align: center;" value="<?php echo $news->getNewsname();?>"></span>
                            <span><label>Deskripsi Singkat Berita</label></span>
                            <span><input name="newsdescription" type="text" class="textbox" required style="text-align: center;" value="<?php echo $news->getNewsdescription();?>"></span>
                            <span><label>Isi Berita</label></span>
                            <span><textarea name="news"><?php echo $news->getNews();?></textarea></span>
                            <span><label>Kategori</label></span>
                                                    <span>
                            <select name="category">
                                <?php
                                    $category = $news->getCategory();
                                    if($category == 1)
                                    {
                                        echo 
                                            '<option value="1">Pemberitahuan</option>
                                            <option value="2">Acara</option>
                                            <option value="3">Pembaharuan</option>
                                            <option value="4">Lain-Lain</option>';
                                    }
                                    else if($category == 2)
                                    {
                                        echo 
                                            '<option value="1">Pemberitahuan</option>
                                            <option value="2" selected>Acara</option>
                                            <option value="3">Pembaharuan</option>
                                            <option value="4">Lain-Lain</option>';
                                    }
                                    else if($category == 3)
                                    {
                                        echo 
                                            '<option value="1">Pemberitahuan</option>
                                            <option value="2">Acara</option>
                                            <option value="3" selected>Pembaharuan</option>
                                            <option value="4">Lain-Lain</option>';
                                    }
                                    else
                                    {
                                        echo 
                                            '<option value="1">Pemberitahuan</option>
                                            <option value="2">Acara</option>
                                            <option value="3">Pembaharuan</option>
                                            <option value="4" selected>Lain-Lain</option>';
                                    }
                                ?>
                                
                            </select>
                                                        
                    </div>
               
                        <div style="background-color: lightyellow;">
                            <div><input type="submit" name="submit" value="Simpan Berita" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
