<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    <?php
    $ads = $Ad->searchAll(['display'=>1]);
    foreach($ads as $ad){
        echo "{$ad['text']}&nbsp&nbsp";
    }
    ?>
</marquee>
<div style="height:32px; display:block;"></div>
<!--正中央-->


<div style="width:100%; padding:2px; height:290px;">
    <div id="mwww" loop="true" style="width:100%; height:100%;">
        <div style="width:99%; height:100%; position:relative;" class="cent">

        </div>
    </div>
</div>

<script>
    let lin = [];
    <?php
    $mvims = $Mvim->searchAll(['display'=> 1]);
    foreach($mvims as $mvim){
        echo "lin.push('{$mvim['img']}');";
    }
    ?>
    let now = 0;
    if (lin.length > 1) {
        setInterval("ww()", 3000);
        ww();
    }

    function ww() {
        $("#mwww").html("<embed loop=true src='./img/" + lin[now] + "' style='width:99%; height:100%;'></embed>")
        //$("#mwww").attr("src",lin[now])
        now++;
        if (now >= lin.length)
            now = 0;
    }
</script>

<?php
$allNews = $News->searchAll(['display'=>1]);
?>
<div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
    <span class="t botli">
        最新消息區<?=count($allNews)>5?"<a href='?do=news' style='float:right;'>More...</a>":""?>
    </span>
    <ul class="ssaa" style="list-style-type:decimal;">
    <?php
    $end = (count($allNews)>5? 5:count($allNews));
    for($i=0; $i<$end; $i++){
        $news = $allNews[$i];
        echo "<li>".mb_substr($news['text'], 0, 10)."...<p class='all' hidden>{$news['text']}</p></li>";
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
</div>