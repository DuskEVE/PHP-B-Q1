
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動態文字廣告管理</p>
    <form method="post" action="./api/update_ad.php">
        <table class="ct" width="100%">
            <tbody>
                <tr class="yel">
                    <td>動態文字廣告</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                </tr>
                <?php
                $ads = $Ad->searchAll();
                foreach($ads as $ad){
                ?>
                <input type="hidden" name="id[]" value="<?=$ad['id']?>">
                <tr>
                    <td><input type="text" name="text[]" value="<?=$ad['text']?>" style="width: 90%;"></td>
                    <td><input type="checkbox" name="display[]" value="<?=$ad['id']?>" <?=$ad['display']==1?"checked":""?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$ad['id']?>"></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_ad.php')" value="新增動態文字廣告"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>