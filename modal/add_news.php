<h2 class="ct">新增最新消息資料</h2>
<form action="./api/update_news.php" method="post">

    <div class='ct' style="display: flex; align-items:center; justify-content: center">
        <span>最新消息資料: </span> <textarea name="text" style="width: 300px; height:100px;"></textarea>
    </div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>