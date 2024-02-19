<?php
	include_once "./api/db.php";
	if(!isset($_SESSION['visited'])){
		$total = $Total->searchAll()[0];
		$total['total'] += 1;
		$Total->update($total);
		$_SESSION['visited'] = 1;
	}
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
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<iframe style="display:none;" name="back" id="back"></iframe>
	<div id="main">
		<a title="" href="./home_files/home.htm">
			<div class="ti" style="background:url('./img/<?=$Title->search(['display'=>1])['img']?>'); background-size:cover;"></div><!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>
				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 :<?=$Total->searchAll()[0]['total']?></span>
				</div>
			</div>
			<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
			
			<?php
			$do = "main";
			if(isset($_GET['do'])) $do = $_GET['do'];
			$file = "./front/$do.php";
			if(file_exists($file)) include $file;
			else include "./front/main.php";
			?>

			</div>
			<div id="alt"
				style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
			</div>
			<script>
				$(".sswww").hover(
					function () {
						$("#alt").html("" + $(this).children(".all").html() + "").css({ "top": $(this).offset().top - 50 })
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function () {
						$("#alt").hide()
					}
				)
			</script>

			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<?php
				if(isset($_SESSION['user'])) echo "<button style='width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;'
				onclick=\"lo('./admin.php')\">回到管理</button>";
				else echo "<button style='width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;'
				onclick=\"lo('?do=login')\">管理登入</button>";
				?>
				<!-- <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
					onclick="lo('?do=login')">管理登入</button> -->
				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
					<div class="ct"><img class="perv-img-btn" src="./icon/01E01.jpg"></div>
					<?php
					$images = $Image->searchAll(['display'=>1]);
					foreach($images as $index=>$image){
						echo "<div class='ct images image-{$index}'><img src='./img/{$image['img']}' style='width:150px; border:2px solid orange;'></div>";
					}
					?>
					<div class="ct"><img class="next-img-btn" src="./icon/01E02.jpg"></div>
					<script>
						const images = $('.images');
						let start = 0;
						let end = 3;

						const perv = () => {
							if(start > 0){
								start--;
								end--;
								changeDisplay();
							}
						};
						const next = () => {
							if(end < images.length){
								start++;
								end++;
								changeDisplay();
							}
						};
						const changeDisplay = () => {
							images.each((index, element) => {
								console.log(element);
								if(index>=start && index<end) $(element).show();
								else $(element).hide();
							})
						};

						$('.perv-img-btn').on('click', perv);
						$('.next-img-btn').on('click', next);

						changeDisplay();
						// var nowpage = 0, num = 0;
						// function pp(x) {
						// 	var s, t;
						// 	if (x == 1 && nowpage - 1 >= 0) { nowpage--; }
						// 	if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) { nowpage++; }
						// 	$(".im").hide()
						// 	for (s = 0; s <= 2; s++) {
						// 		t = s * 1 + nowpage * 1;
						// 		$("#ssaa" + t).show()
						// 	}
						// }
						// pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div
			style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"></span>
		</div>
	</div>

</body>

</html>