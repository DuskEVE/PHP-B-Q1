<?php
    session_start();
    include_once "./api/db.php";
?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;"
                onclick="cl('#cover')">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>
    <iframe style="display:none;" name="back" id="back"></iframe>
    <div id="main">
        <a title="<?=$Title->search(['display'=>1])['text']?>" href="">
            <div class="ti" style="background:url('./img/<?=$Title->search(['display'=>1])['img']?>'); background-size:cover;"></div>
            <!--標題-->
        </a>
        <div id="ms">
            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor">
                    <!--主選單放此-->
                    <span class="t botli">主選單區</span>
                    <!-- <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=title">
                        <div class="mainmu">
                            網站標題管理 </div>
                    </a> -->
                    <?php
                    $menus = $Menu->searchAll(['menu_id'=>0, 'display'=>1]);
                    foreach($menus as $menu){
                        ?>
                    
                    <a style="color:#000; font-size:13px; text-decoration:none;" href=<?=$menu['href']?>>
                        <div class="mainmu"><?=$menu['text']?>
                            <div class="mw">
                            <?php
                            if($Menu->count(['menu_id'=>$menu['id']]) > 0){
                                $subMenus = $Menu->searchAll(['menu_id'=>$menu['id']]);
                                foreach($subMenus as $subMenu){
                            ?>

                            <a style="color:#000; font-size:13px; text-decoration:none;" href="<?=$subMenu['href']?>">
                                <div class="mainmu2"><?=$subMenu['text']?></div>
                            </a>

                            <?php
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </a>
                    <?php
                    }
                    ?>
                </div>
                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 :<?=$Total->search(['id'=>1])['total'];?> </span>
                </div>
            </div>

			<!-- di -->
			<?php 
			// if(isset($_GET['do']) && $_GET['do'] == 'login') include "./front/login.php";
			// else if(isset($_GET['do']) && $_GET['do'] == 'news') include "./front/news.php";
			// else include "./front/main.php";
			$fronts = ['login_error', 'login', 'news'];

			if(isset($_GET['do']) && in_array($_GET['do'], $fronts)) include "./front/{$_GET['do']}.php";
			else include "./front/main.php";

			?>

            <div id="alt"
                style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
            </div>
            <!-- <script>
            $(".sswww").hover(
                function() {
                    $("#alt").html("" + $(this).children(".all").html() + "").css({
                        "top": $(this).offset().top - 50
                    })
                    $("#alt").show()
                }
            )
            $(".sswww").mouseout(
                function() {
                    $("#alt").hide()
                }
            )
            </script> -->
            <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                <!--右邊-->
                <?php
                if(isset($_SESSION['user'])){
                ?>
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
                    onclick="lo('./admin.php?do=title')">返回管理</button>
                <?php
                }else{
                ?>
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
                    onclick="lo('?do=login')">管理登入</button>
                <?php
                }
                ?>
                <div style="width:89%; height:480px;" class="dbor">
                    <span class="t botli">校園映象區</span>
                    <div class="cent"><img src="./icon/up.jpg" alt="" onclick="pp(1)"></div>
                    <?php
                    $imgs = $Image->searchAll(['display'=>1]);
                    foreach($imgs as $index=>$img){
                    ?>

                    <div id="ssaa<?=$index;?>" class="im cent">
                        <img src="./img/<?=$img['img'];?>" alt="" style="width: 150px; height: 103px; 
                            border:3px solid orange; margin: 3px;">
                    </div>

                    <?php
                    }
                    ?>
                    <script>
                    var nowpage = 0,
                        num = <?=$Image->count(['display'=>1]);?>;

                    function pp(x) {
                        var s, t;
                        if (x == 1 && nowpage - 1 >= 0) {
                            nowpage--;
                        }
                        if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) {
                            nowpage++;
                        }
                        $(".im").hide()
                        for (s = 0; s <= 2; s++) {
                            t = s * 1 + nowpage * 1;
                            $("#ssaa" + t).show()
                        }
                    }
                    pp(1)
                    </script>
                    <div class="cent"><img src="./icon/dn.jpg" alt="" onclick="pp(2)"></div>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
        <div
            style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
            <span class="t" style="line-height:123px;"> <?=$Bottom->search(['id'=>1])['bottom'];?> </span>
        </div>
    </div>

</body>

</html>