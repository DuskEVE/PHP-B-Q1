<h2 class="ct">新增管理者帳號</h2>
<div>

    <div class='ct'>
        帳號: <input type='text' name='user' id="user">
    </div>
    <div class='ct'>
        密碼: <input type='password' name='password' id="password">
    </div>
    <div class='ct'>
        確認密碼: <input type='password' name='passwordRe' id="passwordRe">
    </div>
    <div class="ct">
        <input type="submit" class="add-admin-btn" value="新增">
        <input type="reset" class="reset-admin-btn" value="重置">
    </div>
</div>

<script>
$('.add-admin-btn').on('click', () => {
    let datas = {user:$('#user').val(), password:$('#password').val(), passwordRe:$('#passwordRe').val()};
    $.post('./api/update_admin.php', datas, (response) => {
        if(response === '1') location.href = './admin.php?do=admin';
        else alert('密碼和確認密碼的內容不同!');
    });
});
$('.reset-admin-btn').on('click', () => {
    $('#user').val('');
    $('#password').val('');
    $('#passwordRe').val('');
});
</script>