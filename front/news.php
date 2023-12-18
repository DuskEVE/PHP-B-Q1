<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <?php include "./front/marquee.php"; ?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->

    <h3>更多最新消息</h3><hr>

    <div>
        <ol>
        <?php
        $now = 1;
        if(isset($_GET['p'])) $now = $_GET['p'];
        $total = $News->count();
        $start = 0;
        if($now > 1) $start = 5 * ($now - 1);
        $pages = ceil($total / 5);

        echo "<ol class='ssaa' start='$start'>";

        $datas = $News->searchAll(['display'=>1], "limit {$start},5");
        foreach($datas as $data){
            $str = mb_substr($data['text'], 0, 20);
        ?>
            <li>
                <?=$str."...<div class='all' style='display: none;'>{$data['text']}</div>"?>
            </li>
        <?php
        }
        ?>
        </ol>

        <div class="cent">
            <?php
            $perv = ($now == 1? 1:$now-1);
            $next = ($now == $pages? $now: $now+1);
            
            echo "<a href='?do={$_GET['do']}&p=$perv'> < </a>";
            for($i=1; $i<=$pages; $i++){
                $fontSize = ($now == $i? '24px':'16px');
                echo "<a href='?do={$_GET['do']}&p=$i' style='font-size:$fontSize'> $i </a>";
            }
            echo "<a href='?do={$_GET['do']}&p=$next'> > </a>";
            ?>
        </div>
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