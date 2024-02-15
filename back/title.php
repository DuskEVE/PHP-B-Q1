<table width="100%">
    <tbody>
        <tr>
            <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a>
            </td>
            <td><button onclick="document.cookie='user=';location.replace('?')" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
        </tr>
    </tbody>
</table>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <form method="post" action="./api/update_title.php">
        <table class="ct" width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $titles = $Title->searchAll();
                foreach($titles as $title){
                ?>
                <input type="hidden" name="id[]" value="<?=$title['id']?>">
                <tr>
                    <td><img src="./img/<?=$title['img']?>" style="width: 100%;"></td>
                    <td><input type="text" name="text[]" value="<?=$title['text']?>"></td>
                    <td><input type="radio" name="display" value="<?=$title['id']?>" <?=$title['display']==1?"checked":""?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$title['id']?>"></td>
                    <td><input type="button" onclick="op('#cover','#cvr','./modal/update_title.php?id=<?=$title['id']?>')" value="更新圖片"></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/update_title.php')" value="新增網站標題圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>