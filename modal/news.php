
<!-- <h3>新增網站標題圖片</h3> -->

<h3>新增最新消息資料</h3>
<hr>

<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="text">最新消息資料:</label>
        <input type="hidden" name="table" value="<?=$_GET['table']?>">
        <textarea name="text" id="text" cols="50" rows="5"></textarea>
    </div>
    <div>
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
    </div>
</form>