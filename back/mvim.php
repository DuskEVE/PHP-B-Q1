
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片管理</p>
    <form method="post" action="./api/update_mvim.php">
        <table class="ct" width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%">動畫圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $mvims = $Mvim->searchAll();
                foreach($mvims as $mvim){
                ?>
                <input type="hidden" name="id[]" value="<?=$mvim['id']?>">
                <tr>
                    <td><img src="./img/<?=$mvim['img']?>" style="width:100px;"></td>
                    <td><input type="checkbox" name="display[]" value="<?=$mvim['id']?>" <?=$mvim['display']==1?"checked":""?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$mvim['id']?>"></td>
                    <td><input type="button" onclick="op('#cover','#cvr','./modal/update_mvim.php?id=<?=$mvim['id']?>')" value="更換動畫"></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/update_mvim.php')" value="新增動畫圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>