<h2 class="ct"><?=isset($_GET['id'])?"更新動畫圖片":"新增動畫圖片"?></h2>
<form action="./api/update_mvim.php" method="post" enctype="multipart/form-data">
    <?=isset($_GET['id'])?"<input type='hidden' name='id' value='{$_GET['id']}'>":""?>
    <div class="ct">
        動畫圖片: <input type="file" name="file" id="file">
    </div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>