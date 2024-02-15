
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/update_image.php">
        <table class="ct" width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $images = $Image->searchAll();
                foreach($images as $image){
                ?>
                <input type="hidden" name="id[]" value="<?=$image['id']?>">
                <tr>
                    <td><img src="./img/<?=$image['img']?>" style="width:100px;"></td>
                    <td><input type="checkbox" name="display[]" value="<?=$image['id']?>" <?=$image['display']==1?"checked":""?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$image['id']?>"></td>
                    <td><input type="button" onclick="op('#cover','#cvr','./modal/update_image.php?id=<?=$image['id']?>')" value="更換圖片"></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/update_image.php')" value="新增校園映像圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>