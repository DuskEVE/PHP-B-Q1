<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
</marquee>
<div style="height:32px; display:block;"></div>
<!--正中央-->
<div>
    <p class="t botli">管理員登入區</p>
    <p class="cent">帳號 ： <input id="user" name="user" type="text"></p>
    <p class="cent">密碼 ： <input id="password" name="password" type="password"></p>
    <p class="cent">
        <button class="login-submit">送出</button>
        <button class="login-reset">清除</button>
    </p>
</div>

<script>
    $('.login-submit').on('click', () => {
        let user = $('#user').val();
        let password = $('#password').val();

        if(user.length === 0 || password.length === 0) alert('請輸入帳號密碼');
        else{
            $.post('./api/login.php', {user, password}, (response) => {
                console.log(response);
                if(response === '1') location.href = './admin.php';
                else alert('帳號或密碼錯誤');
            });
        }
    })

</script>