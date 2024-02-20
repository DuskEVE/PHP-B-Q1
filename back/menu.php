
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/update_menu.php">
        <table class="ct" width="100%">
            <tbody>
                <tr class="yel">
                    <td width="35%">主選單名稱</td>
                    <td width="35%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                    <td width="10%"></td>
                </tr>
                <?php
                $menus = $Menu->searchAll(['menu_id'=>0]);
                foreach($menus as $menu){
                ?>
                <input type="hidden" name="id[]" value="<?=$menu['id']?>">
                <tr>
                    <td><input type="text" name="text[]" value="<?=$menu['text']?>" style="width: 90%;"></td>
                    <td><input type="text" name="href[]" value="<?=$menu['href']?>" style="width: 90%;"></td>
                    <td><?=$Menu->count(['menu_id'=>$menu['id']])?></td>
                    <td><input type="checkbox" name="display[]" value="<?=$menu['id']?>" <?=$menu['display']==1?"checked":""?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$menu['id']?>"></td>
                    <td><input type="button" onclick="op('#cover','#cvr','./modal/update_menu.php?id=<?=$menu['id']?>')" value="編輯次選單"></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/update_menu.php')" value="新增主選單"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>