<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園資料映像圖片管理</p>
    <form method="post" action="./api/edit.php">
        <input type="hidden" name="table" id="table" value="image">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="60%">校園資料映像圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $now = 1;
                if(isset($_GET['p'])) $now = $_GET['p'];
                $total = $Image->count();
                $start = 0;
                if($now > 1) $start = 3 * ($now - 1);
                $pages = ceil($total / 3);

                $datas = $Image->searchAll([], "limit {$start},3");
                foreach($datas as $data){
                ?>
                <tr>
                    <td style="display: flex; justify-content: center;">
                        <img src="./img/<?=$data['img']?>" alt="" style="width: 100px; height: 68px;">
                        <input type="hidden" name="id[]" value="<?=$data['id']?>">
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

        <div class="cent">
            <?php
            $perv = ($now == 1? 1:$now-1);
            $next = ($now == $pages? $now: $now+1);
            
            echo "<a href='?do={$_GET['do']}&p=$perv'> < </a>";
            for($i=1; $i<=$pages; $i++){
                $fontSize = ($now == $i? '24px':'16px');
                echo "<a href='?do={$_GET['do']}&p=$i' style='font-size:$fontSize'> $i </a>";
            }
            echo "<a href='?do={$_GET['do']}&p=$next'> > </a>";
            ?>
        </div>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" 
                            onclick="op('#cover','#cvr','./modal/<?=$_GET['do']?>.php?table=<?=$_GET['do']?>')"
                            value="新增校園資料映像圖片">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>