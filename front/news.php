<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
</marquee>
<div style="height:32px; display:block;"></div>
<?php
$pageCount = ($News->count(['display'=>1])==0?1:ceil($News->count(['display'=>1]) / 5));
$currentPage = (isset($_GET['p'])?$_GET['p']:1);
$start = ($currentPage - 1) * 5;
$end = ($currentPage==$pageCount?$News->count(['display'=>1]):$start+5);
$allNews = $News->searchAll(['display'=>1]);
?>
    <span class="t botli">
        更多最新消息顯示區
    </span>
    <ul class="ssaa" style="list-style-type:none;">
    <?php
    for($i=$start; $i<$end; $i++){
        $news = $allNews[$i];
        echo "<li>".($i+1).".".mb_substr($news['text'], 0, 10)."...<p class='all' hidden>{$news['text']}</p></li>";
    }
    ?>
    </ul>
    <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
    </div>
    <script>
        $(".ssaa li").hover(
            function() {
                $("#altt").html("<pre>" + $(this).children(".all").text() + "</pre>")
                $("#altt").show()
            }
        )
        $(".ssaa li").mouseout(
            function() {
                $("#altt").hide()
            }
        )
    </script>
<div style="text-align:center;">
    <!-- <a class="bl" style="font-size:30px;" href="?do=meg&p=0">&lt;&nbsp;</a>
    <a class="bl" style="font-size:30px;" href="?do=meg&p=0">&nbsp;&gt;</a> -->
    <?php
    if($currentPage>1){
        $prev = $currentPage-1;
        echo "<a href='?do=news&p=$prev' class='bl' style='font-size:30px;'><</a>";
    }
    for($i=1; $i<=$pageCount; $i++){
        $fontSize = "20px";
        if($i == $currentPage) $fontSize = "30px";

        echo "<a href='?do=news&p={$i}' class='bl' style='font-size:$fontSize; margin:10px;'>$i</a>";
    }
    if($currentPage<$pageCount){
        $next = $currentPage+1;
        echo "<a href='?do=news&p=$next' class='bl' style='font-size:30px;'>></a>";
    }
    ?>
</div>