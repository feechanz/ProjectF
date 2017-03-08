<?php
    if(isset($_GET['newsid']))
    {
        $newsid = $_GET['newsid'];
        $news = $newsdao->get_one_news($newsid);
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
                            <span><label><h3>Berita <?php echo $news->getNewsdescription();?></h3></label></span>
                            <span><?php echo $news->getNews();?></span>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
