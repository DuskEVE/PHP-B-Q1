<h2 class="ct">新增管理者帳號</h2>
<form action="./api/update_admin.php" method="post">

    <div class='ct'>
        帳號: <input type='text' name='user'>
    </div>
    <div class='ct'>
        密碼: <input type='password' name='password'>
    </div>
    <div class='ct'>
        確認密碼: <input type='password' name='passwordRe'>
    </div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>