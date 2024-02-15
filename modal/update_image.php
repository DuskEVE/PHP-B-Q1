<h2 class="ct"><?=isset($_GET['id'])?"更新校園映像圖片":"新增校園映像圖片"?></h2>
<form action="./api/update_image.php" method="post" enctype="multipart/form-data">
    <?=isset($_GET['id'])?"<input type='hidden' name='id' value='{$_GET['id']}'>":""?>
    <div class="ct">
        校園映像圖片: <input type="file" name="file" id="file">
    </div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>