
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="./api/update_bottom.php">
        <input type="hidden" name="id" value="<?=$Total->searchAll()[0]['id']?>">
        <table class="ct" width="80%" style="margin: auto;">
            <tbody>
                <tr>
                    <td width="30%" style="background:#F3DA49;">頁尾版權資料:</td>
                    <td><input type="text" name="text" value="<?=$Bottom->searchAll()[0]['text']?>" style="width: 100%;"></td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:100%;">
            <tbody>
                <tr>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>