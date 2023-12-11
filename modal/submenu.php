<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">

<h3 style="text-align: center;">新增次選單</h3>
<hr>
<form action="./api/add.php" method="post">
    <table>
        <tr>
            <td>次選單名稱:</td>
            <td>選單連結網址:</td>
            <td>刪除</td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="table" value="<?=$_GET['table']?>">
                <input type="text" name="text" id="text">
            </td>
            <td>
                <input type="hidden" name="table" value="<?=$_GET['table']?>">
                <input type="text" name="href" id="href">
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$_GET['id']?>">
            </td>
        </tr>
    </table>
    <div>
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
    </div>
</form>

</div>