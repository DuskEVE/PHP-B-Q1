<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站頁尾管理</p>
    <form method="post" action="./api/edit_info.php?do=bottom">
    <!-- <form method="post" target="back" action="./api/edit_bottom.php"> -->

        <table style="width:50%; margin:auto;">
            <tbody>

                <tr class="yel">
                    <td>
                        <label for="bottom">頁尾版權資料:</label>
                    </td>
                    <td>
                        <input type="text" id="bottom" name="bottom" value="<?=$Bottom->search(['id'=>1])['bottom'];?>">
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