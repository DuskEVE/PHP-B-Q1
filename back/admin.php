<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <form method="post" action="./api/edit.php">
        <input type="hidden" name="table" id="table" value="<?=$_GET['do']?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="40%">帳號</td>
                    <td width="40%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $datas = $Admin->searchAll();
                foreach($datas as $data){
                ?>
                <tr>
                    <td >
                        <input type="text" name="user[<?=$data['id']?>]" id="user" value="<?=$data['user']?>" style="width:80%">
                        <input type="hidden" name="id[]" value="<?=$data['id']?>">
                    </td>
                    <td >
                        <input type="password" name="password[]" value="<?=$data['password']?>" style="width:80%">
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$data['id']?>">
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$_GET['do']?>.php?table=<?=$_GET['do']?>')"
                            value="新增管理者帳號"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>