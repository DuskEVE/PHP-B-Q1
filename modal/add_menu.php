<h2 class="ct">新增主選單</h2>
<form action="./api/update_menu.php" method="post" style="display: flex; flex-wrap: wrap;">
    <input type="hidden" name="menu_id" value="0">
    <div class="ct" style="width: 100%; display: flex; justify-content: center;">
        <div style="width:30%">主選單名稱</div>
        <div style="width:30%">主選單連結網址</div>
    </div>
    <div class="ct" style="width: 100%; display: flex; justify-content: center;">
        <div style="width:30%">
            <input type="text" name="text" style="width: 90%">
        </div>
        <div style="width:30%">
            <input type="text" name="href" style="width: 90%">
        </div>
    </div>

    <div class="ct" style="width: 100%; display: flex; justify-content: center;">
        <input type="submit" class="add-admin-btn" value="新增">
        <input type="reset" class="reset-admin-btn" value="重置">
    </div>
</form>
