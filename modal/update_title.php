<h2 class="ct"><?=isset($_GET['id'])?"更新標題區圖片":"新增標題區圖片"?></h2>
<form action="./api/update_title.php" method="post" enctype="multipart/form-data">
    <?=isset($_GET['id'])?"<input type='hidden' name='id' value='{$_GET['id']}'>":""?>
    <div class="ct">
        標題區圖片: <input type="file" name="file" id="file">
    </div>
    <?php
        if(!isset($_GET['id'])) echo "<div class='ct'>標題區替代文字: <input type='text' name='text' id='text'></div>";
    ?>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>