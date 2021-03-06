<!--main-->
<div class="main_btm">
<div class="wrap">
    <div class="main">
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
                            $link = "index.php?page=detail_news&newsid=".$iterator->current()->getNewsid();
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