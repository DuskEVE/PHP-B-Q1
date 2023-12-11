<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/edit.php">
        <input type="hidden" name="table" id="table" value="<?=$_GET['do']?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="30%">主選單名稱</td>
                    <td width="30%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $datas = $Menu->searchAll();
                foreach($datas as $data){
                ?>
                <tr>
                    <td >
                        <input type="text" name="text[<?=$data['id']?>]" id="text" value="<?=$data['text']?>" style="width:90%">
                        <input type="hidden" name="id" value="<?=$data['id']?>">
                    </td>
                    <td >
                        <input type="text" name="href[]" value="<?=$data['href']?>" style="width:90%">
                    </td>
                    <td></td>
                    <td>
                        <input type="checkbox" name="display[]" value="<?=$data['id']?>" <?=($data['display']==1? 'checked':'')?>>
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
                            value="新增主選單"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>