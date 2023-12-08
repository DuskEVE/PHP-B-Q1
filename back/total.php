<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站瀏覽人數管理</p>
    <form method="post" action="./api/edit_info.php?do=total">
    <!-- <form method="post" target="back" action="./api/edit_total.php"> -->

        <table style="width:50%; margin:auto;">
            <tbody>

                <tr class="yel">
                    <td>
                        <label for="total">進站總人數:</label>
                    </td>
                    <td>
                        <input type="number" id="total" name="total" value="<?=$Total->search(['id'=>1])['total'];?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>

            </tbody>
        </table>

    </form>
</div>