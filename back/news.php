
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="./api/update_news.php">
        <table class="ct" width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%">最新消息資料內容</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $pageCount = ($News->count()==0?1:ceil($News->count() / 4));
                $currentPage = (isset($_GET['p'])?$_GET['p']:1);
                $start = ($currentPage - 1) * 4;
                $end = ($currentPage==$pageCount?$News->count():$start+4);
                $datas = $News->searchAll();
                for($i=$start; $i<$end; $i++){
                    $data = $datas[$i];
                ?>
                <input type="hidden" name="id[]" value="<?=$data['id']?>">
                <tr>
                    <td><textarea name="" id="" style="width: 80%; height:50px"><?=$data['text']?></textarea></td>
                    <td><input type="checkbox" name="display[]" value="<?=$data['id']?>" <?=$data['display']==1?"checked":""?>></td>
                    <td><input type="checkbox" name="del[]" value="<?=$data['id']?>"></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="ct">
            <?php
            if($currentPage>1){
                $prev = $currentPage-1;
                echo "<a href='?do=news&p=$prev' style='margin:10px; text-decoration:none;'><</a>";
            }
            for($i=1; $i<=$pageCount; $i++){
                $fontSize = "16px";
                if($i == $currentPage) $fontSize = "20px";

                echo "<a href='?do=news&p={$i}' style='margin:10px; text-decoration:none; font-size:$fontSize'>$i</a>";
            }
            if($currentPage<$pageCount){
                $next = $currentPage+1;
                echo "<a href='?do=news&p=$next' style='margin:10px; text-decoration:none;'>></a>";
            }
            ?>
        </div>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_news.php')" value="新增最新消息資料"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>