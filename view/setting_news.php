<?php
    if(isset($_POST['submit']))
    {
        $newsname = $_POST['newsname'];
        $newsdescription = $_POST['newsdescription'];
        $news_isi = $_POST['news'];
        $category = $_POST['category'];
        
        $news = new News();
        $news ->setNewsname($newsname);
        $news ->setNewsdescription($newsdescription);
        $news ->setNews($news_isi);
        $news ->setCategory($category);
        
        if($newsdao->insert_news($news))
        {
            echo "<script>alert('Berita baru telah berhasil ditambahkan!');</script>";
        }
        else
        {
            echo "<script>alert('Berita baru gagal ditambahkan!');</script>";
        }
    }
?>

<!--main-->
<style>
    form
    {
        text-align: center;
    }
</style>
<div class="main_btm">
<div class="wrap">
    <div class="main">
        <div class="col span_2_of_4">
            <div class="adddata-form">
                <h2 class="style" align="center">Menambah Berita</h2>
                <form method="post" action="" >
                    <div>
                        <span><label>Nama Berita</label></span>
                        <span><input name="newsname" type="text" class="textbox" required style=" text-align: center;"></span>
                    </div>
                    <div>
                        <span><label>Deskripsi Singkat Berita</label></span>
                        <span><input name="newsdescription" type="text" class="textbox" required style="text-align: center;"></span>
                    </div>
                    <div>
                        <span><label>Berita</label></span>
                        <span><textarea name="news"> </textarea></span>
                    </div>
                    <div>
                        <span><label>Kategori</label></span>
                        <span>
                            <select name="category">
                                <option value="1">Pemberitahuan</option>
                                <option value="2">Acara</option>
                                <option value="3">Pembaharuan</option>
                                <option value="4">Lain-Lain</option>
                            </select>

                        </span>
                    </div>
                    <div>
                        <div><input type="submit" name="submit" value="Tambah Berita" ></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="specials">
            <div class="specials-heading">
                <h3>Berita Terkini</h3>
                <div class="clear"> </div>
            </div>
            <div class="box_news">
                <script type="text/javascript" src="js/paging.js"></script>
                <link rel="stylesheet" href="css/news.css">
                <table class="content_news" id="results">
                <?php
                        $iterator = $newsdao->get_news()->getIterator();
                        while ($iterator -> valid()) 
                        {
                            $category = $iterator->current()->getCategory();
                            $link = "index.php?page=detail_news_edit&newsid=".$iterator->current()->getNewsid();
                            $newsname = $iterator->current()->getNewsname();
                            $newsdescription = $iterator->current()->getNewsdescription();
                            $createdate = $iterator->current()->getCreatedate();
                            echo "<tr>";
                            if($category == 1)
                            {
                                $src = "images/Notice-Icon.png";
                            }
                            else if($category == 2)
                            {
                                $src = "images/Event-Icon.png";
                            }
                            else if($category == 3)
                            {
                                $src = "images/Update-Icon.png";
                            }
                            else
                            {
                                $src = "images/ETC-Icon.png";
                            }
                            echo "<td class='type-news text-center'><img src=".$src."></td>";
                            echo "<td>";
                            echo "<a href='".$link."'>";
                            echo "<h3>".$newsname."</h3>";
                            echo "<p>".$newsdescription."</p>";
                            echo "</a>";
                            echo "</td>";
                            echo "<td align='center'>";
                            echo "<span></span><br>";
                            echo "<span>".$createdate."</span>";
                            echo "</td>";
                            echo "</tr>";
                            $iterator->next();
                        }
                    ?>
            </table>
            <div class="pagination_box" style="margin-bottom: 500px;">
                <div id="pageNavPosition"></div>
            </div>
            <script type="text/javascript">
            var pager = new Pager('results', 4); 
            pager.init(); 
            pager.showPageNav('pager', 'pageNavPosition'); 
            pager.showPage(1);
            </script>
        </div>
            <br>
            <br>
        <div class="clear"> </div>
        </div>
        
    </div>
</div>
</div>