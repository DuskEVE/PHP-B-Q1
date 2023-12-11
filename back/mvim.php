<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站動態圖片管理</p>
    <form method="post" action="./api/edit.php">
        <input type="hidden" name="table" id="table" value="mvim">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="60%">動態圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $datas = $Mvim->searchAll();
                foreach($datas as $data){
                ?>
                <tr>
                    <td style="display: flex; justify-content: center;">
                        <img src="./img/<?=$data['img']?>" alt="" style="width: 150px; height: 100px;">
                        <input type="hidden" name="text[<?=$data['id']?>]" value="null">
                    </td>
                    <td >
                        <input type="checkbox" name="display[]" value="<?=$data['id']?>" <?=($data['display']==1? 'checked':'')?>>
                    </td>
                    <td >
                        <input type="checkbox" name="del[]" value="<?=$data['id']?>">
                    </td>
                    <td>
                        <input type="button" 
                            onclick="op('#cover','#cvr','./modal/<?=$_GET['do']?>.php?table=<?=$_GET['do']?>&id=<?=$data['id']?>')"
                            value="更新圖片">
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
                    <td width="200px">
                        <input type="button" 
                            onclick="op('#cover','#cvr','./modal/<?=$_GET['do']?>.php?table=<?=$_GET['do']?>')"
                            value="新增動態圖片">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>