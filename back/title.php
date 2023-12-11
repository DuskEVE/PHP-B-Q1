<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <!-- <form method="post" target="back" action="?do=tii"> -->
    <form method="post" action="./api/edit.php">
        <input type="hidden" name="table" id="table" value="title">
        <table width="100%" style="text-align: center;">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $datas = $Title->searchAll();
                foreach($datas as $data){
                ?>
                <tr>
                    <td width="45%">
                        <img src="./img/<?=$data['img']?>" alt="" style="width: 300px; height: 30px;">
                        <input type="hidden" name="id[]" value="<?=$data['id']?>">
                    </td>
                    <td width="23%">
                        <input type="text" name="text[<?=$data['id']?>]" id="text" value="<?=$data['text']?>">
                    </td>
                    <td width="7%">
                        <input type="radio" name="display" value="<?=$data['id']?>" <?=($data['display']==1? 'checked':'')?>>
                    </td>
                    <td width="7%">
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
                            value="新增網站標題圖片">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>