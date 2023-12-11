<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站跑馬燈文字管理</p>
    <form method="post" action="./api/edit.php">
        <input type="hidden" name="table" id="table" value="<?=$_GET['do']?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">網站標題</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $datas = $Ad->searchAll();
                foreach($datas as $data){
                ?>
                <tr>
                    <td width="80%">
                        <input style="width:90%" type="text" name="text[<?=$data['id']?>]" id="text" value="<?=$data['text']?>">
                    </td>
                    <td width="10%">
                        <input type="checkbox" name="display[]" value="<?=$data['id']?>" <?=($data['display']==1? 'checked':'')?>>
                    </td>
                    <td width="10%">
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
                            value="新增動態文字廣告"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>