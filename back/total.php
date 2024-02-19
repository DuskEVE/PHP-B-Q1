
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站總人數管理</p>
    <form method="post" action="./api/update_total.php">
        <input type="hidden" name="id" value="<?=$Total->searchAll()[0]['id']?>">
        <table class="ct" width="50%" style="margin: auto;">
            <tbody>
                <tr>
                    <td width="40%" style="background:#F3DA49;">進站總人數:</td>
                    <td><input type="number" name="total" min='0' value="<?=$Total->searchAll()[0]['total']?>"></td>
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