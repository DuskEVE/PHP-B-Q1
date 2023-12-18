
<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <?php include "./front/marquee.php"; ?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <div style="width:100%; padding:2px; height:290px;">
        <div id="mvim-box" loop="true" style="width:100%; height:100%;">
            <div style="width:99%; height:100%; position:relative;" class="cent">
                some gif here
            </div>
        </div>
    </div>
    <?php
        // $mvims = $Mvim->searchAll(['display'=>1]);
        // $urls = [];
        // foreach($mvims as $mvim){
        //     array_push($urls, $mvim['img']);
        // }
        // $urls = implode(" ", $urls);
        // echo "<div id='mvim-url' class='{$urls}'></div>";
    ?>
    <script>
    // let lin = document.querySelector("#mvim-url").className.split(" ");

    let lin = [];
    <?php
        $mvims = $Mvim->searchAll(['display'=>1]);
        foreach($mvims as $mvim){
            echo "lin.push('{$mvim['img']}');";
        }
    ?>
    
    let now = 0;
    if (lin.length > 1) {
        loopMvim();
        setInterval(loopMvim, 3000);
    }

    function loopMvim() {
        $("#mvim-box").html("<embed loop=true src='./img/" + lin[now] + "' style='width:99%; height:100%;'></embed>");
        // $("#mvim-box").attr("src",lin[now]);
        now++;
        if (now >= lin.length) now = 0;
    }
    </script>
    <div
    style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
        <span class="t botli">最新消息區
        <?php
        $count = $News->count(['display'=>1]);
        if($count > 5) echo "<a href='?do=news'>More...</a>";
        ?>
        </span>
        <ul class="ssaa" style="list-style-type:decimal;">
        <?php
            $news = $News->searchAll(['display'=>1], "limit 0,5");
            $arr = [];
            foreach($news as $element){
                $str = mb_substr($element['text'], 0, 20);
                array_push($arr, "<li>$str...<div class='all' style='display: none;'>{$element['text']}</div></li>");
            }

            echo (implode("", $arr));
        ?>
        </ul>
        <div id="altt"
            style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
        </div>
        <script>
        $(".ssaa li").hover(
            function() {
                $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
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
</div>