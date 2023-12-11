

<h3><?=(isset($_GET['id'])? '更新校園資料映像圖片':'新增校園資料映像圖片')?></h3>
<hr>

<form  <?=(isset($_GET['id'])? 'action="./api/update.php"':'action="./api/add.php"')?> method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>校園資料映像圖片</td>
            <td>
                <input type="file" name="img" id="img">
                <input type="hidden" name="table" value="<?=$_GET['table']?>">
                <?=(isset($_GET['id'])? '<input type="hidden" name="id" value='.$_GET['id'].'>':'') ?>
            </td>
        </tr>

    </table>

    <div>
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
    </div>
</form>