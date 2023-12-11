<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">

<h3 style="text-align: center;">新增管理者帳號</h3>
<hr>
<form action="./api/add.php" method="post">
    <table>
        <tr>
            <label for="">帳號:</label>
            <input type="hidden" name="table" value="<?=$_GET['table']?>">
            <input type="text" name="password" id="password">
        </tr>
        <tr>
            <label for="">密碼:</label>
            <input type="hidden" name="table" value="<?=$_GET['table']?>">
            <input type="password" name="password" id="password">
        </tr>
        <tr>
            <label for="">確認密碼:</label>
            <input type="hidden" name="table" value="<?=$_GET['table']?>">
            <input type="password" name="password2" id="password2">
        </tr>
    </table>
    <div>
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
    </div>
</form>

</div>