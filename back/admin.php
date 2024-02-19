
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <form method="post" action="./api/update_admin.php">
        <table class="ct" width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">帳號</td>
                    <td width="45%">密碼</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $admins = $Admin->searchAll();
                foreach($admins as $admin){
                ?>
                <input type="hidden" name="id[]" value="<?=$admin['id']?>">
                <tr>
                    <td><input type="text" name="user[]" value="<?=$admin['user']?>" style="width: 90%;"></td>
                    <td><input type="password" name="password[]" value="<?=$admin['password']?>" style="width: 90%;"></td>
                    <td><input type="checkbox" name="del[]" value="<?=$admin['id']?>"></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_admin.php')" value="新增管理者帳號"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>