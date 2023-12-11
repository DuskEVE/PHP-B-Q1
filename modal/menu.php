<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">

<h3 style="text-align: center;">新增主選單</h3>
<hr>
<form action="./api/add.php" method="post">
    <table>
        <tr>
            <td>
                <label for="">主選單名稱:</label>
                <input type="hidden" name="table" value="<?=$_GET['table']?>">
                <input type="text" name="text" id="text">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">選單連結網址:</label>
                <input type="hidden" name="table" value="<?=$_GET['table']?>">
                <input type="text" name="href" id="href">
            </td>
        </tr>
    </table>
    <div>
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
    </div>
</form>

</div>