
<!-- <h3>新增網站標題圖片</h3> -->

<h3><?=(isset($_GET['id'])? '更新標題圖片':'新增網站標題圖片')?></h3>
<hr>

<form  <?=(isset($_GET['id'])? 'action="./api/update.php"':'action="./api/add.php"')?> method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片</td>
            <td>
                <input type="file" name="img" id="img">
                <?=(isset($_GET['id'])? '<input type="hidden" name="id" value='.$_GET['id'].'>':'') ?>
            </td>
        </tr>
        <tr <?=(isset($_GET['id'])? 'hidden':'')?>>
            <td>標題區替代文字</td>
            <td>
                <input type="text" name="text" id="text">
                <input type="hidden" name="table" id="table" value="<?=$_GET['table']?>">
            </td>
        </tr>
    </table>

    <div>
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
    </div>
</form>